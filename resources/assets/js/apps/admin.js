const appName = 'vue-admin'
import { mapMutations } from 'vuex'
import { mapState } from 'vuex'
import { mapGetters } from 'vuex'

if (jQuery('#' + appName).length > 0) {
    new Vue({
        el: '#' + appName,

        store: window.vuexAdminStore,

        methods: {
            ...mapMutations([
                'setEditions',
                'setBusy',
                'setFilter',
                'setOrderBy',
                'setCurrentArticle',
                'setIFrameUrl',
                'setNewEditionNumber',
                'setNewEditionYear',
                'setNewEditionMonth',
            ]),

            ...mapMutations({
                __updateCurrentArticleField: 'updateCurrentArticleField',
                __updateLead: 'updateLead',
                __updateLeadMutator: 'updateLead',
                __updateBodyMutator: 'updateBody',
                __updateLeadHtml: 'updateLeadHtml',
                __updateBodyHtml: 'updateBodyHtml',
                __pushArticle: 'pushArticle',
                __setCurrentArticleFeatured: 'setCurrentArticleFeatured',
                __clearNewEdition: 'clearNewEdition',
                __setCurrentEdition: 'setCurrentEdition',
                __setEditionArticles: 'setEditionArticles',
            }),

            __typeKeyUp() {
                clearTimeout(this.timeout)

                const me = this

                this.setTimeout(
                    setTimeout(function() {
                        me.__refreshMarkdown()
                    }, 1500),
                )
            },

            __clearFilter() {
                this.setFilter('')
            },

            __findFirstArticle: function() {
                if (!empty(this.currentArticle)) {
                    return this.__findArticleById(this.currentArticle.id)
                }

                return !empty(this.editionArticles) &&
                    !empty(this.editionArticles[this.currentEdition.id]) &&
                    !empty(this.editionArticles[this.currentEdition.id][0])
                    ? this.editionArticles[this.currentEdition.id][0]
                    : null
            },

            __loadArticles() {
                var me = this

                me.setBusy(true)

                if (!empty(me.currentEdition)) {
                    axios
                        .get('/api/posts/' + me.currentEdition.id + '/all')
                        .then(function(response) {
                            me.__setEditionArticles({
                                editionId: me.currentEdition.id,
                                value: response.data,
                            })

                            me.__selectArticle(me.__findFirstArticle())

                            me.setBusy(false)
                        })
                }
            },

            __loadEditions() {
                var me = this

                me.setBusy(true)

                axios.get('/api/editions').then(function(response) {
                    me.setEditions(response.data)

                    me.__selectEdition(me.editions[0])
                })
            },

            __getArrowClass() {
                if (this.orderType == 'asc') {
                    return 'fa-arrow-down'
                }

                return 'fa-arrow-up'
            },

            __selectEdition(edition, force) {
                if ((!empty(force) && force) || empty(this.currentEdition)) {
                    this.__setCurrentEdition(edition)
                }

                this.__loadArticles()
            },

            __selectArticle(article) {
                if (!article) {
                    return
                }

                this.setCurrentArticle(this.__findArticleById(article.id))
            },

            __isCurrentArticle(article) {
                return (
                    article &&
                    this.currentArticle &&
                    article.id === this.currentArticle.id
                )
            },

            __unchanged() {
                if (empty(this.currentArticle)) {
                    return true
                }

                return (
                    JSON.stringify(this.currentArticle) ===
                    JSON.stringify(
                        this.__findArticleById(
                            this.currentArticle.id,
                            this.editionArticlesOriginals[
                                this.currentEdition.id
                            ],
                        ),
                    )
                )
            },

            __updateLead(lead) {
                this.__updateLeadMutator(lead)

                this.__typeKeyUp()
            },

            __updateBody(body) {
                this.__updateBodyMutator(body)

                this.__typeKeyUp()
            },

            __refreshMarkdown() {
                article = this.currentArticle

                let me = this

                axios
                    .post('/api/markdown/to/html', {
                        lead: article.lead,
                        body: article.body,
                    })
                    .then(function(response) {
                        me.__updateLeadHtml(response.data.lead_html)

                        me.__updateBodyHtml(response.data.body_html)
                    })
            },

            __createArticle() {
                let currentArticle = this.currentArticle

                var article = clone(currentArticle ? currentArticle : {})

                for (var prop in article) {
                    if (article.hasOwnProperty(prop)) {
                        article[prop] = null
                    }
                }

                article['id'] = -1

                article['new'] = true

                article['edition_id'] = this.currentEdition.id

                article['order'] = this.__getLastArticleOrder() + 1

                this.__pushArticle(article)

                console.log(
                    '------------------------------ this.__currentArticles()',
                    this.__currentArticles(),
                )

                this.__selectArticle(article)
            },

            __toggleCurrentPublished() {
                const command = this.currentArticle.published_at
                    ? 'unpublish'
                    : 'publish'

                this.__get(
                    '/api/posts/' +
                        this.currentArticle.edition.id +
                        '/' +
                        this.currentArticle.id +
                        '/' +
                        command,
                ).then(function() {
                    me.__loadEditions()
                })
            },

            __toggleCurrentFeatured() {
                this.__setCurrentArticleFeatured(!this.currentArticle.featured)

                this.__saveCurrent()
            },

            __togglePublishedEdition() {
                const me = this

                const command = this.currentEdition.published_at
                    ? 'unpublish'
                    : 'publish'

                this.__get(
                    '/api/editions/' + this.currentEdition.id + '/' + command,
                ).then(function(response) {
                    this.setEditions(response.data)

                    me.__selectEdition(
                        me.__findEditionById(this.currentEdition.id),
                        true,
                    )
                })
            },

            __get(url) {
                const me = this

                me.setBusy(true)

                return axios.get(url).then(function() {
                    me.setBusy(false)
                })
            },

            __saveCurrent() {
                const me = this

                axios
                    .post('/api/posts/', { article: me.currentArticle })
                    .then(function() {
                        dd('----------- 3')

                        me.__loadArticles()
                    })
            },

            __moveUp(article) {
                this.__get('/api/posts/' + article.id + '/move-up').then(
                    function() {
                        me.__loadArticles()
                    },
                )
            },

            __moveDown(article) {
                this.__get('/api/posts/' + article.id + '/move-down').then(
                    function() {
                        me.__loadArticles()
                    },
                )
            },

            __canMoveUp(article) {
                return article.order > 1
            },

            __canMoveDown(article) {
                return article.order < this.__getLastArticleOrder()
            },

            __getLastArticleOrder() {
                const articles = this.__currentArticles()

                if (empty(articles)) {
                    return 0
                }

                return articles.reduce(function(a, b) {
                    return a.order >= b.order ? a : b
                }).order
            },

            __findArticleById(id, articles) {
                if (!articles || typeof articles === 'undefined') {
                    if (!this.currentEdition) {
                        return null
                    }
                    articles = this.__currentArticles()
                }

                if (!articles || typeof articles === 'undefined') {
                    return null
                }

                dd(
                    '__findArticleById ------------------------------------',
                    articles,
                )

                for (var i = 0; i < articles.length; i++) {
                    if (articles[i].id == id) {
                        return articles[i]
                    }
                }

                return null
            },

            __findEditionById(id) {
                for (var i = 0; i < this.editions.length; i++) {
                    if (this.editions[i].id == id) {
                        return this.editions[i]
                    }
                }
            },

            __filteredArticles() {
                var filter = unaccent(this.filter.trim())

                var split = filter.split(' ')

                if (split.length > 1) {
                    filter = '^(?=.*\\b' + split.join('\\b)(?=.*\\b') + '\\b).+'
                    filter = '(?=.*' + split.join(')(?=.*') + ')'
                }

                var filtered = _.filter(this.__currentArticles(), function(
                    item,
                ) {
                    for (var key in item) {
                        if (
                            unaccent(String(item[key])).match(
                                new RegExp(filter, 'i'),
                            )
                        ) {
                            return true
                        }
                    }

                    return false
                })

                var orderBy = this.orderBy

                var orderType = this.orderType

                var ordered = _.orderBy(
                    filtered,

                    function(item) {
                        return item[orderBy] || ''
                    },

                    orderType,
                )

                return ordered
            },

            __filteredEditions() {
                return _.orderBy(this.editions, 'number', 'desc')
            },

            __selectAdminPane() {
                this.setIFrameUrl(null)
            },

            __selectPreviewPane() {
                this.setIFrameUrl(
                    'http://parla.test/editions/' + this.currentEdition.number,
                )
            },

            __updateField(field, value) {
                this.__updateCurrentArticleField({ field: field, value: value })
            },

            __createNewEdition() {
                const me = this

                axios
                    .post('/api/editions', this.newEdition)
                    .then(function(response) {
                        me.setEditions(response.data)

                        me.__selectEdition(me.editions[0])

                        me.__clearNewEdition()
                    })
            },

            __currentArticles() {
                return this.currentArticles
            },

            __currentEditionIsPublished() {
                if (empty(this.currentEdition)) {
                    return false
                }

                return this.currentEdition.published_at
            },
        },

        computed: {
            ...mapGetters(['currentArticles']),

            ...mapState({
                editions: state => state.editions,

                busy: state => state.busy,

                filter: state => state.filter,

                orderBy: state => state.orderBy,

                currentEdition: state => state.currentEdition,

                editionArticles: state => state.editionArticles,

                editionArticlesOriginals: state =>
                    state.editionArticlesOriginals,

                newEdition: state => state.newEdition,

                iFrameUrl: state => state.iFrameUrl,

                currentArticle: state => state.currentArticle,
            }),
        },
        mounted() {
            this.__clearNewEdition()

            this.__loadEditions()

            this.__clearFilter()

            jQuery('textarea').autogrow()

            dd('mounted 1.0')
        },
    })
}
