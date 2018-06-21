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
                    me.__refresh()
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

                if (edition) {
                    axios.get('/api/posts/'+edition.number+'/all')
                        .then(function (response) {
                            me.tables.articles = response.data

                            me.__selectArticle(me.tables.articles[0])

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
                this.currentArticle = article

                this.currentArticleCopy = JSON.parse(JSON.stringify(article))
            },

            __isCurrentArticle(article) {
                return article.id === this.currentArticle.id
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

            __refresh() {
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
                        article[prop] = '';
                    }
                }

                article['new'] = true;

                article['order'] = this.tables.articles.reduce(function(a, b) {
                    dd('------------------------');
                    dd(a, b, a.order, b.order);
                    return a.order >= b.order ? a : b;
                }).order + 1

                this.tables.articles.push(article);

                this.currentArticle = article;
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
