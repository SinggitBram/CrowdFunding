import Vue from "vue";
import router from "./router.js";
import App from "./App.vue";
import vuetify from './plugins/vuetify.js' // path to vuetify export

const app = new Vue({
    el: "#app",
    router,
    vuetify,
    components: {
        App
    }
});
