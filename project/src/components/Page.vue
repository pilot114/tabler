<template>
    <b-container>
        <b-row>
            <b-col cols="3">
                <div v-if="tables.length == 0">Загрузка...</div>

                <b-list-group v-else>
                    <b-list-group-item button v-for="(table, idx) in tables" @click="selectTable(table)">
                        {{ table.name }}
                        <b-button size="sm" variant="danger" class="float-right">
                            Удалить
                        </b-button>
                    </b-list-group-item>
                    <b-list-group-item button @click="selectTable()">
                        + Добавить
                    </b-list-group-item>
                </b-list-group>
            </b-col>
            <b-col cols="9">
                <TableView :table="currentTable" v-if="currentTable"></TableView>
                <TableCreate v-else></TableCreate>
            </b-col>
        </b-row>
    </b-container>
</template>

<script>
    import TableView from './TableView'
    import TableCreate from './TableCreate'
    import {mapState, mapActions, mapMutations} from 'vuex'

    export default {
        name: "Page",
        components: {TableView, TableCreate},
        data() {
            return {
                errored: false
            }
        },
        computed: {
            ...mapState([
                'currentTable',
                'tables'
            ])
        },
        created() {
            this.fetchTables();
        },
        methods: {
            selectTable(table) {
                this.setCurrentTable(table);
            },
            ...mapActions([
                'fetchTables'
            ]),
            ...mapMutations([
                'setCurrentTable'
            ])
        }
    }
</script>

<style scoped>
</style>