<template>
    <v-app id="inspire">

        <v-app-bar
            app
            color="indigo"
            dark
        >
            <v-toolbar-title>{{title}}</v-toolbar-title>
        </v-app-bar>

        <v-content>
            <v-container class="fill-height" fluid>
                <my-form></my-form>
            </v-container>
        </v-content>
        <v-footer color="indigo" app>
            <span class="white--text">Danil Wolf &copy; 2019</span>
        </v-footer>
    </v-app>
</template>
<script>
    import MyForm from "./MyForm";

    export default {
        name: 'app-main',
        components: {MyForm},
        props: {
            source: String,
        },
        data: () => ({
            drawer: null,
            title: "Радиотехнический клуб «ATmega».",
        }),
    }
</script>
