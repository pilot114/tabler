<template>
    <b-tabs v-if="table">
        <b-tab title="Схема" active>
            <br>
            <b-table hover bordered fixed head-variant="dark" :items="table.schema"></b-table>
        </b-tab>
        <b-tab title="Данные">
            <br>
            <b-table hover bordered fixed head-variant="dark" :items="data"></b-table>
        </b-tab>
    </b-tabs>
</template>

<script>
    export default {
        name: "TableView",
        props: {
            table: null,
        },
        data() {
            return {
                data: [
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