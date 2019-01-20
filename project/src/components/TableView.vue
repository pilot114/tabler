<template>
    <b-tabs v-if="schema">
        <b-tab title="Схема" active>
            <br>
            <b-table hover bordered fixed head-variant="dark" :items="schema.columns"></b-table>
        </b-tab>
        <b-tab title="Данные">
            <br>
            <b-table hover bordered fixed head-variant="dark" :items="tableData"></b-table>
        </b-tab>
    </b-tabs>
</template>

<script>
    export default {
        name: "TableView",
        props: {
            schema: null,
        },
        data() {
            return {
                tableData: [
                    {fio:"Олег",  age: 29},
                    {fio:"Ира",   age: 29},
                    {fio:"Артём", age: 6},
                ]
            }
        }
    }
</script>

<style scoped>

</style>