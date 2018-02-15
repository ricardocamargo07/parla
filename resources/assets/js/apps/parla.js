const appName = 'vue-parla'

if (jQuery("#" + appName).length > 0) {
    const app = new Vue({
        el: '#'+appName,

        data: {
            tables: {
                featured: [],

                nonFeatured: [],
            },

            pesquisa: '',

            refreshing: false,

            filler: false,

            modalMode: 'filter',
        },

        methods: {
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

                axios.get('/api/posts/'+table)
                    .then(function(response) {
                        me.tables[table] = response.data
                    })
                    .catch(function(error) {
                        console.log(error)

                        me.tables[table] = []
                    })
            },

            openProcesso(id) {
                window.location.href = '/processos/'+id;
            },
        },

        mounted() {
            this.refreshTable('featured')

            this.refreshTable('nonFeatured')
        },
    })
}
