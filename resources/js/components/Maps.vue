<template>
    <yandex-map :settings="settings" :coords="coords" ymap-class="maps" :zoom="zoom">
        <template v-for="(marks, key) in placemarks">
            <ymap-marker
                :coords="marks.coords"
                :marker-id="key"
                :hint-content="marks.hintContent"
                :properties="marks.properties"
            />
        </template>
    </yandex-map>
</template>

<script>
    import {yandexMap, ymapMarker} from 'vue-yandex-maps'

    export default {
        components: {yandexMap, ymapMarker},
        name: "Maps",
        props: {
            zoom: {
                type: Number,
                default: 12,
            },
            coords: {
                type: Array,
                default: () => {
                    return [58.010450, 56.229434]
                },
            },
            placemarks: {
                type: Array,
                default: () => {
                    return [];
                }
            }
        },
        data: () => {
            return {
                settings: {
                    //apiKey: '',
                    lang: 'ru_RU',
                    coordorder: 'latlong',
                    version: '2.1'
                },
            }
        },
    }
</script>
