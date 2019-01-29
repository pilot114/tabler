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
                        v-model=currentField.type
                        :options=types
                        selected="String"
                >
                </b-form-select>
                <b-button @click="addField" variant="primary">Добавить</b-button>
            </b-form>

            <br>

            <b-table hover bordered fixed head-variant="dark" :items="schema">
            </b-table>

            <b-button type="submit" variant="primary" @click="">Сохранить</b-button>
            <b-button type="reset" variant="danger" style="margin-left: .5em">Очистить</b-button>
        </b-form>
    </div>
</template>

<script>
    import { mapActions } from 'vuex'

    export default {
        name: "TableCreate",
        data() {
            return {
                name: null,
                schema: [],
                show: true,
                types: [
                    { value: 'string', text: 'String' },
                    { value: 'number', text: 'Number' },
                ],

                currentField: {name:'', type:'string'}
            }
        },
        methods: {
            onSubmit (e) {
                e.preventDefault();

                this.createTable({
                    name: this.name,
                    schema: this.schema,
                });
            },
            onReset (e) {
                e.preventDefault();
                this.name = null;
                this.schema = [];
                this.currentField = {name:'', type:'string'};

                /* Trick to reset/clear native browser form validation state */
                this.show = false;
                this.$nextTick(() => { this.show = true });
            },
            addField() {
                this.schema.push(JSON.parse(JSON.stringify(this.currentField)));
                this.currentField.name = null;
            },
            ...mapActions([
                'createTable',
            ]),
        }
    }
</script>

<style scoped>

</style>