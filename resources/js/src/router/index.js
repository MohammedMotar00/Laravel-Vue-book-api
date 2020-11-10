import Vue from "vue";
import VueRouter from "vue-router";

import Home from "../components/Home.vue";
import Book from "../components/Books_Authors_Genres//single_book_author_genre/Book.vue";
import Author from "../components/Books_Authors_Genres//single_book_author_genre/Author.vue";
import Genre from "../components/Books_Authors_Genres//single_book_author_genre/Genre.vue";

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
        },
        {
            path: "/author/:author_id",
            name: "Author",
            component: Author
        },
        {
            path: "/genre/:genre_id",
            name: "Genre",
            component: Genre
        }
    ]
});
