import Vue from "vue";
import VueRouter from "vue-router";

import Home from "../components/Home.vue";

Vue.use(VueRouter);

export default new VueRouter({
    mode: "history",
    routes: [
        {
            path: "/",
            name: "Home",
            component: Home
        }
    ]
});
