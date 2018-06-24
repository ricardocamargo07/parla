const appName = 'vue-parla'

if (jQuery('#' + appName).length > 0) {
    const app = new Vue({
        el: '#' + appName,

        data: {
            edition: {
                columns: 3,
                column_size: 4,
            },

            tables: {
                all: [],

                featured: [],

                nonFeatured: [],
            },

            refreshing: false,

            filler: false,

            modalMode: 'filter',

            currentPost: {
                laravel: Laravel.currentPost,
                imported: null,
            },

            search: '',

            laravel: Laravel,
        },

        computed: {
            filteredFeaturedPosts() {
                return this.tables.featured
            },

            filteredNonFeaturedPosts() {
                return this.tables.nonFeatured
            },

            allFiltered() {
                return this.tables.all.filter(item => {
                    return this.canShowItem(item)
                })
            },
        },

        methods: {
            canShowItem(item) {
                const can =
                    this.search.length === 0 ||
                    item.title
                        .toLowerCase()
                        .indexOf(this.search.toLowerCase()) > -1 ||
                    item.lead.toLowerCase().indexOf(this.search.toLowerCase()) >
                        -1 ||
                    item.subtitle
                        .toLowerCase()
                        .indexOf(this.search.toLowerCase()) > -1 ||
                    item.body.toLowerCase().indexOf(this.search.toLowerCase()) >
                        -1

                return can
            },

            typeKeyUp() {
                // clearTimeout(this.timeout)
                //
                // me = this
                //
                // this.timeout = setTimeout(function () {
                //     me.refresh()
                // }, 500)
            },

            clearSearch() {
                this.pesquisa = ''

                this.refresh()
            },

            filter() {
                this.advancedFilter = true

                this.refresh()
            },

            turnAdvancedFilterOff() {
                this.advancedFilter = false

                this.refresh()
            },

            refreshTable(table) {
                me = this

                axios
                    .get(
                        '/api/posts/' +
                            this.laravel.currentEdition.id +
                            '/' +
                            table,
                    )
                    .then(function(response) {
                        me.tables[table] = response.data
                    })
                    .catch(function(error) {
                        console.log(error)

                        me.tables[table] = []
                    })
            },

            openProcesso(id) {
                window.location.href = '/processos/' + id
            },

            count(items) {
                return Object.keys(items).length
            },

            currentPostPhotos(items) {
                Object.keys(items).length
            },

            slice(items, start, end) {
                var sliced = []

                for (var i = start + 1; i < end + 1; i++) {
                    if (items[i]) {
                        sliced.push(items[i])
                    }
                }

                return sliced
            },

            refreshCurrentPost: function() {
                if (this.currentPost.laravel && this.currentPost.laravel.slug) {
                    axios
                        .get('/api/posts/' + this.currentPost.laravel.slug)
                        .then(function(response) {
                            me.currentPost.imported = response.data
                        })
                        .catch(function(error) {
                            console.log(error)

                            me.currentPost.imported = null
                        })
                }
            },

            otherPhotosForLightbox() {
                if (
                    !this.currentPost.imported ||
                    !this.currentPost.imported.other_photos
                ) {
                    return []
                }

                return this.currentPost.imported.other_photos.map(photo => {
                    return {
                        thumb: photo.url_lowres,
                        src: photo.url_hires,
                        caption: photo.notes_and_author,
                    }
                })
            },

            configureLightbox: function() {
                lightbox.option({
                    albumLabel: 'Foto %1 de %2',
                })
            },
        },

        mounted() {
            this.refreshTable('featured')

            this.refreshTable('nonFeatured')

            this.refreshTable('all')

            this.refreshCurrentPost()

            this.configureLightbox()
        },
    })
}
