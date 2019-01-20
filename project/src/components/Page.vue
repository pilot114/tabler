<template>
    <b-container>
        <b-row>
            <b-col cols="4" class="nav">
                <div v-if="loading">Загрузка...</div>

                <b-list-group v-else>
                    <b-list-group-item button v-for="(table, idx) in tables" @click="selectTable(table)">
                        {{ table.name }}
                        <b-button size="sm" variant="danger" style="margin-left: 2em;">
                            Удалить
                        </b-button>
                    </b-list-group-item>
                    <b-list-group-item button @click="currentTable = null">
                         + Добавить
                    </b-list-group-item>
                </b-list-group>
            </b-col>
            <b-col cols="8">
                <TableView :schema="currentTable" v-if="currentTable"></TableView>
                <TableCreate v-else></TableCreate>
            </b-col>
        </b-row>
    </b-container>
</template>

<script>
    import TableView from './TableView'
    import TableCreate from './TableCreate'
    import { mapState, mapActions } from 'vuex'

    export default {
        name: "Page",
        components: { TableView, TableCreate },
        data() {
            return {
                loading: true,
                errored: false
            }
        },
        computed: {
            ...mapState([
                'currentTable',
                'tables'
            ])
        },
        mounted() {
            this.$store.dispatch('fetchTables');
        },
        methods: {
            selectTable(table) {
                this.currentTable = table;
            },
            ...mapActions([
                'fetchTables'
            ])
        }
    }
</script>

<style scoped>
</style>