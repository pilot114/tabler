<script>
    import axios from 'axios'

    import Vue from "vue"
    import Vuex from "vuex"

    Vue.use(Vuex);

    export default new Vuex.Store({
        state: {
            currentTable: null,
            tables: [],
        },
        mutations: {
            setTables(state, tables) {
                state.tables = tables;
            },
            setCurrentTable(state, table) {
                state.currentTable = table;
            }
        },

        actions: {
            fetchTables({commit}) {
                axios
                    .get('http://localhost/api/v1/table')
                    .then(response => {
                        setTimeout(() => {
                            commit('setTables', response.data);
                        },1000);
                    });
                /*
                    .catch(error => {
                        this.errored = true;
                    })
                    .finally(() => (this.loading = false));
                    */
            }
        }
    })
</script>