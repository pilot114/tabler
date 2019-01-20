<script>
    import axios from 'axios'

    export default {
        name: "Store",
        state: {
            currentTable: null,
            tables: [],
        },
        mutations: {
            setTables(state, tables) {
                state.tables = tables;
            }
        },

        actions: {
            fetchTables({commit}) {
                axios
                    .get('http://localhost/api/v1/table')
                    .then(response => {
                        commit('setTables', response.data);
                    });
                /*
                    .catch(error => {
                        this.errored = true;
                    })
                    .finally(() => (this.loading = false));
                    */
            }
        }
    }
</script>