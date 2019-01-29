<script>
    import axios from 'axios'

    import Vue from "vue"
    import Vuex from "vuex"

    Vue.use(Vuex);

    let backend = axios.create({
        mode: 'no-cors',
        headers: {
            'Content-Type': 'application/json',
        },
        credentials: 'same-origin',
    });

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
            },
        },
        actions: {
            fetchTables({commit}) {
                backend
                    .get('http://localhost/api/v1/table')
                    .then(response => {
                        commit('setTables', response.data);
                    });
            },
            createTable({commit}, data) {
                backend
                    .post('http://localhost/api/v1/table', data)
                    .then(response => {
                        commit('setTables', response.data);
                    });
            }
        }
    })
</script>