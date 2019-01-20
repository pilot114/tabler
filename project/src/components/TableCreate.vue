<template>
    <div>
        <b-form @reset="onReset" @submit="onSubmit" v-if="show">
            <b-form-group
                  description="Рекомендуется именовать таблицы в underscore, например: `user_comment`">
                <b-form-input
                      type="text"
                      v-model="name"
                      required
                      placeholder="Имя таблицы">
                </b-form-input>
            </b-form-group>

            <b-form inline>
                <b-input class="mb-4 mr-sm-4 mb-sm-0" v-model="currentField.name" type="text" placeholder="Название"></b-input>

                <b-form-select
                        class="mb-2 mr-sm-2 mb-sm-0"
                        v-model="currentField.type"
                        :options="{ 'string': 'String', 'number': 'Number'}"
                >
                </b-form-select>
                <b-button @click="addField" variant="primary">Добавить</b-button>
            </b-form>

            <br>

            <b-table hover bordered fixed head-variant="dark" :items="schema">
            </b-table>

            <b-button type="submit" variant="primary">Сохранить</b-button>
            <b-button type="reset" variant="danger" style="margin-left: .5em">Очистить</b-button>
        </b-form>
    </div>
</template>

<script>
    export default {
        name: "TableCreate",
        data() {
            return {
                name: null,
                schema: [],
                show: true,

                currentField: {name:'', type:''}
            }
        },
        methods: {
            onSubmit (e) {
                e.preventDefault();
            },
            onReset (e) {
                e.preventDefault();
                this.name = null;
                this.schema = [];

                /* Trick to reset/clear native browser form validation state */
                this.show = false;
                this.$nextTick(() => { this.show = true });
            },
            addField() {
                this.schema.push(JSON.parse(JSON.stringify(this.currentField)));
                this.currentField.name = null;
            },
        }
    }
</script>

<style scoped>

</style>