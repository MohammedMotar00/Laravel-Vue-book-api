import Vue from "vue";
import VueRouter from "vue-router";

import Home from "../components/Home.vue";
import Book from "../components/Books_Authors_Genres/single_book/Book.vue";

Vue.use(VueRouter);

export default new VueRouter({
    mode: "history",
    routes: [
        {
            path: "/",
            name: "Home",
            component: Home
        },
        {
            path: "/book/:book_id",
            name: "Book",
            component: Book
        }
    ]
});
