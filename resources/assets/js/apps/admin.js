const appName = 'vue-admin'

if (jQuery('#' + appName).length > 0) {
    let adminApp = new Vue({
        el: '#' + appName,

        data: {
            edition: {
                columns: 3,
                column_size: 4,
            },

            tables: {
                editions: [],
            },

            busy: false,

            filler: false,

            modalMode: 'filter',

            currentPost: {
                laravel: Laravel.currentPost,
                imported: null,
            },

            filter: '',

            orderBy: '',

            current: {
                edition: null,

                article: {},

                articles: [],

                articlesCopies: [],
            },

            newEdition: {
                number: null,
                year: null,
                month: null,
            },

            laravel: Laravel,

            iframeUrl: null,
        },

        methods: {
            __typeKeyUp() {
                clearTimeout(this.timeout)

                me = this

                this.timeout = setTimeout(function() {
                    me.__refreshMarkdown()
                }, 1500)
            },

            __clearFilter() {
                this.filter = ''
            },

            __findFirstArticle: function() {
                if (!empty(this.__currentArticle())) {
                    return this.__findArticleById(this.__currentArticle().id)
                }

                return !empty(this.current.articles) &&
                    !empty(this.current.articles[this.current.edition.id]) &&
                    !empty(this.current.articles[this.current.edition.id][0])
                    ? this.current.articles[this.current.edition.id][0]
                    : null
            },

            __loadArticles() {
                var me = this

                me.busy = true

                if (!empty(me.current.edition)) {
                    axios
                        .get('/api/posts/' + me.current.edition.id + '/all')
                        .then(function(response) {
                            me.current.articles[me.current.edition.id] =
                                response.data

                            me.current.articlesCopies[
                                me.current.edition.id
                            ] = clone(response.data)

                            me.__selectArticle(me.__findFirstArticle())

                            me.busy = false
                        })
                }
            },

            __loadEditions() {
                var me = this

                me.busy = true

                axios.get('/api/editions').then(function(response) {
                    me.tables.editions = response.data

                    me.__selectEdition(me.tables.editions[0])
                })
            },

            __getArrowClass() {
                if (this.orderType == 'asc') {
                    return 'fa-arrow-down'
                }

                return 'fa-arrow-up'
            },

            __selectEdition(edition, force) {
                if ((!empty(force) && force) || empty(this.current.edition)) {
                    this.current.edition = edition
                }

                this.__loadArticles()
            },

            __selectArticle(article) {
                if (!article) {
                    return
                }

                this.current.article[
                    article.edition.id
                ] = this.__findArticleById(article.id)

                adminApp.$forceUpdate()
            },

            __isCurrentArticle(article) {
                return (
                    article &&
                    this.__currentArticle() &&
                    article.id === this.__currentArticle().id
                )
            },

            __unchanged() {
                return (
                    JSON.stringify(this.__currentArticle()) ===
                    JSON.stringify(
                        this.__findArticleById(
                            this.__currentArticle().id,
                            this.current.articlesCopies[
                                this.__currentArticle().edition.id
                            ],
                        ),
                    )
                )
            },

            __updateLead(lead) {
                this.current.article[this.current.edition.id].lead = lead

                adminApp.$forceUpdate()

                this.__typeKeyUp()
            },

            __updateBody(body) {
                this.current.article[this.current.edition.id].body = body

                adminApp.$forceUpdate()

                this.__typeKeyUp()
            },

            __refreshMarkdown() {
                article = this.__currentArticle()


                let me = this

                axios
                    .post('/api/markdown/to/html', {
                        lead: article.lead,
                        body: article.body,
                    })
                    .then(function(response) {
                        article.lead_html = response.data.lead_html

                        article.body_html = response.data.body_html

                        adminApp.$forceUpdate()
                    })
            },

            __createArticle() {
                var article = clone(this.__currentArticle())

                for (var prop in article) {
                    if (article.hasOwnProperty(prop)) {
                        article[prop] = null
                    }
                }

                article['new'] = true

                article['edition_id'] = this.current.edition.id

                article['order'] = this.__getLastArticleOrder() + 1

                this.__currentArticles().push(article)

                this.__selectArticle(article)
            },

            __toggleCurrentPublished() {
                const command = this.__currentArticle().published_at
                    ? 'unpublish'
                    : 'publish'

                this.__get(
                    '/api/posts/' +
                        this.__currentArticle().edition.id +
                        '/' +
                        this.__currentArticle().id +
                        '/' +
                        command,
                ).then(function() {
                    me.__loadEditions()
                })
            },

            __toggleCurrentFeatured() {
                this.__currentArticle().featured = !this.__currentArticle()
                    .featured

                this.__saveCurrent()
            },

            __get(url) {
                me = this

                me.busy = true

                return axios.get(url).then(function() {
                    me.busy = false
                })
            },

            __saveCurrent() {
                me = this

                axios
                    .post('/api/posts/', { article: this.__currentArticle() })
                    .then(function() {
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
                    if (!this.current.edition) {
                        return null
                    }

                    articles = this.__currentArticles()
                }

                if (!articles || typeof articles === 'undefined') {
                    return null
                }

                for (var i = 0; i < articles.length; i++) {
                    if (articles[i].id == id) {
                        return articles[i]
                    }
                }

                return null
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
                        found = false

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
                return _.orderBy(this.tables.editions, 'number', 'desc')
            },

            __selectAdminPane() {
                this.iframeUrl = null
            },

            __selectPreviewPane() {
                this.iframeUrl =
                    'http://parla.test/editions/' + this.current.edition.number
            },

            __updateField(field, value) {
                this.current.article[this.current.edition.id][field] = value

                adminApp.$forceUpdate()
            },

            __createNewEdition() {
                me = this

                axios
                    .post('/api/editions', this.newEdition)
                    .then(function(response) {
                        me.tables.editions = response.data

                        me.__selectEdition(me.tables.editions[0])

                        me.__clearNewEdition()
                    })
            },

            __clearNewEdition() {
                this.newEdition = {
                    number: null,
                    year: null,
                    month: null,
                }
            },

            __currentArticle() {
                article = empty(this.current.article) ||
                empty(this.current.edition) ||
                empty(this.current.article[this.current.edition.id])
                    ? null
                    : this.current.article[this.current.edition.id]

                if (article) {
                    console.log('-----lead', article.lead)
                }

                return empty(this.current.article) ||
                    empty(this.current.edition) ||
                    empty(this.current.article[this.current.edition.id])
                    ? null
                    : this.current.article[this.current.edition.id]
            },

            __currentArticles() {
                return empty(this.current.articles) ||
                    empty(this.current.edition) ||
                    empty(this.current.articles[this.current.edition.id])
                    ? []
                    : this.current.articles[this.current.edition.id]
            },
        },

        mounted() {
            this.__clearNewEdition()

            this.__loadEditions()

            this.__loadArticles()

            this.__clearFilter()

            jQuery('textarea').autogrow()
        },
    })
}
