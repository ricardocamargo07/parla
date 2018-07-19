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
                'setTimeout',
                'setCurrentArticle',
                'setIFrameUrl',
                'setNewEditionNumber',
                'setNewEditionYear',
                'setNewEditionMonth',
                'setCurrentPhotoId',
                'setNewPhotoAuthor',
                'setNewPhotoUrlHighres',
                'setNewPhotoUrlLowres',
                'setNewPhotoNotes',
            ]),

            ...mapMutations({
                __updateCurrentArticleField: 'updateCurrentArticleField',
                __updateCurrentPhotoField: 'updateCurrentPhotoField',
                __updateLead: 'updateLead',
                __updateLeadMutator: 'updateLead',
                __updateBodyMutator: 'updateBody',
                __updateLeadHtml: 'updateLeadHtml',
                __updateBodyHtml: 'updateBodyHtml',
                __pushArticle: 'pushArticle',
                __setCurrentArticleFeatured: 'setCurrentArticleFeatured',
                __clearNewEdition: 'clearNewEdition',
                __clearNewPhoto: 'clearNewPhoto',
                __setCurrentEdition: 'setCurrentEdition',
                __setEditionArticles: 'setEditionArticles',
            }),

            __typeKeyUp() {
                clearTimeout(this.timeout)

                const me = this

                this.setTimeout(
                    setTimeout(function() {
                        me.__refreshMarkdown()
                    }, 500),
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
                    return axios
                        .get('/api/posts/' + me.currentEdition.id + '/all')
                        .then(function(response) {
                            me.__setEditionArticles({
                                editionId: me.currentEdition.id,
                                value: response.data,
                            })

                            dd('__loadArticles ------', response.data)

                            me.__selectArticle(me.__findFirstArticle())

                            me.setBusy(false)
                        })
                }
            },

            __loadEditions() {
                var me = this

                me.setBusy(true)

                return axios.get('/api/editions').then(function(response) {
                    me.setEditions(response.data)

                    me.__selectCurrentOrLastEdition()
                })
            },

            __selectCurrentOrLastEdition(forceLast) {
                this.__selectEdition(
                    this.currentEdition && !forceLast
                        ? this.__findEditionById(this.currentEdition.id)
                        : this.editions[this.editions.length - 1],
                    true,
                )
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

                if (this.currentPhotoId) {
                    this.setCurrentPhotoId(this.currentPhotoId)
                }

                dd(
                    'currentArticle ---------------------------',
                    this.currentArticle,
                )
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

            __photoUnchanged() {
                return (
                    JSON.stringify(this.currentPhoto) ===
                    JSON.stringify(this.currentPhotoOriginal)
                )
            },

            __newPhotoUnchanged() {
                return (
                    JSON.stringify(this.newPhoto) ===
                    JSON.stringify(this.cleanNewPhoto)
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
                const article = this.currentArticle

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

            __toggleCurrentPhotoMain() {
                const me = this

                const command = !this.currentPhoto.main
                    ? 'setMain'
                    : 'unsetMain'

                this.__get(
                    '/api/photos/' + this.currentPhoto.id + '/' + command,
                ).then(function() {
                    me.__loadArticles()
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
                ).then(function() {
                    me.__loadEditions()
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
                        me.__loadArticles()
                    })
            },

            __saveCurrentPhoto() {
                const me = this

                axios
                    .post('/api/photos/' + me.currentPhoto.id, me.currentPhoto)
                    .then(function() {
                        me.__loadArticles()
                    })
            },

            __moveUp(article) {
                const me = this

                this.__get('/api/posts/' + article.id + '/move-up').then(
                    function() {
                        me.__loadArticles()
                    },
                )
            },

            __moveDown(article) {
                const me = this

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

            __findArticleById(id, articles, field) {
                if (!articles || typeof articles === 'undefined') {
                    if (!this.currentEdition) {
                        return null
                    }
                    articles = this.__currentArticles()
                }

                return findItemByValue(id, articles, field)
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

            __orderedPhotos() {
                return _.orderBy(
                    this.currentArticle.photos,

                    'id',

                    'desc',
                )
            },

            __filteredEditions() {
                return _.orderBy(this.editions, 'number', 'desc')
            },

            __selectAdminPane() {
                this.setIFrameUrl(null)
            },

            __selectPreviewPane() {
                this.setIFrameUrl(
                    '/editions/' + this.currentEdition.number,
                )
            },

            __updateField(field, value) {
                this.__updateCurrentArticleField({ field: field, value: value })
            },

            __updatePhotoField(field, value) {
                this.__updateCurrentPhotoField({ field: field, value: value })
            },

            __createNewEdition() {
                const me = this

                axios
                    .post('/api/editions', this.newEdition)
                    .then(function(response) {
                        me.setEditions(response.data)

                        me.__selectCurrentOrLastEdition(true)

                        me.__clearNewEdition()
                    })
            },

            __createNewPhoto() {
                const me = this

                let newPhoto = this.newPhoto

                newPhoto.article_id = this.currentArticle.id

                dd('__createNewPhoto ------------', newPhoto)

                axios.post('/api/photos/', newPhoto).then(function() {
                    me.__loadArticles()

                    me.__clearNewPhoto()
                })
            },

            __currentArticles() {
                return this.currentArticles
            },

            __selectPhoto(photo) {
                this.setCurrentPhotoId(photo.id)
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

                newPhoto: state => state.newPhoto,

                cleanNewPhoto: state => state.cleanNewPhoto,

                iFrameUrl: state => state.iFrameUrl,

                currentArticle: state => state.currentArticle,

                timeout: state => state.timeout,

                currentPhotoId: state => state.currentPhotoId,

                currentPhoto: state => state.currentPhoto,

                currentPhotoOriginal: state => state.currentPhotoOriginal,
            }),
        },
        mounted() {
            this.__clearNewEdition()

            this.__clearNewPhoto()

            this.__loadEditions()

            this.__clearFilter()

            jQuery('textarea').autogrow()
        },
    })
}
