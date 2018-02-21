const appName = 'vue-parla'

if (jQuery("#" + appName).length > 0) {
    const app = new Vue({
        el: '#'+appName,

        data: {
            edition: {
                columns: 2,
                column_size: 6,
            },

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

            count(items) {
                return Object.keys(items).length
            },

            slice(items, start, end) {
                var sliced = [];

                for (var i=start+1; i<end+1; i++) {
                    if (items[i]) {
                        sliced.push(items[i]);
                    }
                }

                return sliced;
            },
        },

        mounted() {
            this.refreshTable('featured')

            this.refreshTable('nonFeatured')
        },
    })
}
