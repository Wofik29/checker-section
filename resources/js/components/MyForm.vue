<template>
    <v-container align="start">
        <template v-if="isResult">
            <v-col cols="12">
                <v-card class="ma-3 pa-6 maps-container"
                        outlined
                        tile
                >

                    <v-btn
                        v-on:click="isResult = false"
                        absolute
                        dark
                        fab
                        top
                        left
                        color="pink"
                    >
                        <reply :size="size"></reply>
                    </v-btn>
                    <v-list-item>
                        <v-list-item-content>
                            <v-list-item-title>Возможные группы</v-list-item-title>
                        </v-list-item-content>
                    </v-list-item>

                    <template v-for="group in groups">
                        <v-list-item>
                            <div class="text--primary">
                                Номер группы: {{ group.number}} <br>
                                Время занятия: {{group.start}} - {{group.end}} <br>
                                Возраст группы: {{group.min_age}} - {{group.max_age}} <br>
                                Офисы: {{group.offices.join(', ')}}
                            </div>
                        </v-list-item>
                        <v-divider></v-divider>
                    </template>

                    <maps :coords="[58.010450, 56.229434]" :zoom="zoom" :placemarks="marks"></maps>
                </v-card>
            </v-col>
        </template>
        <template v-else>
            <v-row justify="center" class="grey lighten-5">
                <v-col cols="4" justify="center">
                    <v-card
                        class="ma-3 pa-6"
                        style="width: 500px"
                        outlined
                        tile
                        :loading="loading"
                    >
                        <v-form
                            ref="form"
                            v-model="valid"
                            lazy-validation>
                            <v-list-item>
                                <v-text-field
                                    v-model="parentName"
                                    label="ФИО Родителей"
                                    :rules="rules.parentName"
                                    required
                                ></v-text-field>

                            </v-list-item>
                            <v-list-item>
                                <v-text-field
                                    v-model="parentPhone"
                                    label="Контактный телефон"
                                    :rules="rules.parentPhone"
                                    required
                                ></v-text-field>
                            </v-list-item>
                            <v-list-item>
                                <v-text-field
                                    v-model="childName"
                                    label="ФИО ребенка"
                                    :rules="rules.childName"
                                    required
                                ></v-text-field>
                            </v-list-item>
                            <v-list-item>
                                <v-date-picker
                                    v-model="birthDate"
                                    label="Дата Рождения"
                                    :rules="rules.birthDate"
                                    required
                                >
                                </v-date-picker>
                            </v-list-item>
                            <v-list-item>
                                <v-select
                                    :items="items"
                                    v-model="timeEducation"
                                    label="Смена обучения"
                                    :rules="rules.timeEducation"
                                    required
                                ></v-select>
                            </v-list-item>
                            <v-list-item>
                                <v-text-field
                                    v-model="address"
                                    label="Адрес проживания"
                                    :rules="rules.address"
                                    required
                                ></v-text-field>
                            </v-list-item>
                        </v-form>
                        <v-btn
                            @click="getResult"
                            absolute
                            dark
                            fab
                            bottom
                            right
                            color="pink"
                        >
                            <arrow-right-circle :size="size"></arrow-right-circle>
                        </v-btn>
                    </v-card>
                </v-col>
            </v-row>
        </template>
    </v-container>

</template>

<script>
    import Maps from "./Maps";
    import Reply from 'vue-material-design-icons/Reply';
    import ArrowRightCircle from 'vue-material-design-icons/ArrowRightCircle';

    export default {
        name: "MyForm",
        components: {Maps, Reply, ArrowRightCircle},
        data: () => {
            return {
                zoom: 12,
                marks: [],
                groups: [],
                loading: false,
                valid: false,
                size: 50,
                isResult: false,
                items: [
                    {value: 1, text: 'Первая смена'},
                    {value: 2, text: 'Вторая смена'}
                ],
                parentName: null,
                parentPhone: null,
                childName: null,
                birthDate: null,
                address: null,
                timeEducation: null,
                rules: {
                    parentName: [
                        v => !!v || 'Фио обязательно',
                    ],
                    parentPhone: [
                        v => !!v || 'Телефон обязательно',
                        v => /\(\d{3}\) \d{3}\d{2}\d{2}/.test(v) || 'Телефон должен быть вида (999) 9999999    ',
                    ],
                    childName: [
                        v => !!v || 'Фио ребенка обязательно',
                    ],
                    birthDate: [
                        v => !!v || 'Дата рождения обязательно',
                    ],
                    address: [
                        v => !!v || 'Адрес обязательно, с городом',
                    ],
                    timeEducation: [
                        v => !!v || 'Смена обучения обязательно',
                    ],
                }
            }
        },
        methods: {
            getResult() {
                if (this.$refs.form.validate()) {
                    this.loading = true;

                    axios.post('/api/group/suggestion', {
                        parentName: this.parentName,
                        parentPhone: this.parentPhone,
                        childName: this.childName,
                        birthDate: this.birthDate,
                        address: this.address,
                        timeEducation: this.timeEducation,
                    }).then((response) => {
                        if (response.data.result) {
                            this.isResult = true;
                            this.groups = response.data.groups;

                            this.marks = response.data.offices.map((item) => {
                               return {
                                   coords: item.coordinates,
                                   properties: {
                                       iconCaption: item.number + '. ' +item.address,
                                   },
                               };
                            });
                        }
                    }).catch((err) => {
                        console.log(err.response);
                    }).finally(() => {
                        this.loading = false;
                    });
                }
            },
        }
    }
</script>

<style scoped>

</style>
