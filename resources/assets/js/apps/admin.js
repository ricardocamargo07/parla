const appName = 'vue-admin'

if (jQuery("#" + appName).length > 0) {
    const app = new Vue({
        el: '#'+appName,

        data: {
            edition: {
                columns: 3,
                column_size: 4,
            },

            tables: {
                editions: [],

                articles: [],
            },

            loading: {
                editions: false,

                articles: false,
            },

            filler: false,

            modalMode: 'filter',

            currentPost: {
                laravel: Laravel.currentPost,
                imported: null,
            },

            search: '',

            orderBy: '',

            currentArticle: false,

            currentEdition: false,

            laravel: Laravel,
        },

        computed: {
        },

        methods: {
            __typeKeyUp() {
                clearTimeout(this.timeout)

                me = this

                this.timeout = setTimeout(function () {
                    me.__refreshMarkdown()
                }, 700)
            },

            __clearFilter() {
                this.filter = ''
            },

            __loadEditions() {

            },

            __loadArticles(edition) {
                var me = this

                me.loading.articles = true

                edition = (edition ? edition : me.currentEdition)

                if (edition) {
                    axios.get('/api/posts/'+edition.number+'/all')
                        .then(function (response) {
                            me.tables.articles = response.data

                            me.__selectArticle((me.currentArticle && me.currentArticle != undefined) ? me.currentArticle : me.tables.articles[0])

                            me.loading.articles = false
                        })
                }
            },

            __loadEditions() {
                var me = this

                me.loading.articles = true

                axios.get('/api/editions')
                    .then(function (response) {
                        me.tables.editions = response.data

                        me.__selectEdition(me.tables.editions[0])

                        me.loading.articles = false
                    })
            },

            __getArrowClass() {
                if (this.orderType == 'asc') {
                    return 'fa-arrow-down'
                }

                return 'fa-arrow-up'
            },

            __selectEdition(edition) {
                this.currentEdition = edition

                this.__loadArticles(edition)
            },

            __selectArticle(article) {
                this.currentArticle = this.tables.articles.find(function (item) {
                    return article.id === item.id
                })

                this.currentArticle = (this.currentArticle === undefined) ? this.tables.articles[0] : this.currentArticle

                this.currentArticleCopy = JSON.parse(JSON.stringify(this.currentArticle))
            },

            __isCurrentArticle(article) {
                return article && this.currentArticle && article.id === this.currentArticle.id
            },

            __unchanged() {
                return JSON.stringify(this.currentArticle) === JSON.stringify(this.currentArticleCopy);
            },

            __updateLead(article, lead) {
                article.lead = lead

                this.__typeKeyUp()
            },

            __updateBody(article, body) {
                article.body = body

                this.__typeKeyUp()
            },

            __refreshMarkdown() {
                article = this.currentArticle;

                axios.post('/api/markdown/to/html', {lead: article.lead, body: article.body})
                    .then(function (response) {
                        article.lead_html = response.data.lead_html

                        article.body_html = response.data.body_html
                    })
            },

            __createArticle() {
                var article = clone(this.currentArticle);

                for (var prop in article) {
                    if (article.hasOwnProperty(prop)) {
                        article[prop] = null;
                    }
                }

                article['new'] = true;

                article['edition_id'] = this.currentEdition.id;

                article['order'] = this.__getLastArticleOrder() + 1

                this.tables.articles.push(article);

                this.currentArticle = article;
            },

            __toggleCurrentPublished() {
                const command = this.currentArticle.published_at ? 'unpublish' : 'publish'

                this.__get('/api/posts/'+this.currentArticle.edition.number+'/'+this.currentArticle.id+'/'+command).then(function () {
                    me.__loadArticles()
                });
            },

            __get(url) {
                me = this

                me.loading.articles = true

                return axios.get(url)
                    .then(function () {
                        me.loading.articles = false
                    })
            },

            __saveCurrent() {
                me = this

                axios.post('/api/posts/', {article: this.currentArticle})
                    .then(function () {
                        me.__loadArticles()
                    })
            },

            __moveUp(article) {
                this.__get('/api/posts/'+this.currentArticle.id+'/move-up').then(function () {
                    me.__loadArticles()
                });
            },

            __moveDown(article) {
                this.__get('/api/posts/'+this.currentArticle.id+'/move-down').then(function () {
                    me.__loadArticles()
                });
            },

            __canMoveUp(article) {
                return article.order > 1
            },

            __canMoveDown(article) {
                return article.order < this.__getLastArticleOrder()
            },

            __getLastArticleOrder() {
                return this.tables.articles.reduce(function (a, b) {
                    return a.order >= b.order ? a : b
                }).order
            },
        },

        mounted() {
            this.__loadEditions()

            this.__loadArticles()

            this.__clearFilter()

            jQuery('textarea').autogrow()
        },
    })
}
