<template>
    <section id="posts" class="d-relative">
        <Loader v-if="isLoading" />
        <PostCard v-for="(post, i) in posts" :key="i" :post="posts[i]" />
        <Pagination
            :pages="lastPage"
            :currentPage="currentPage"
            @page-change="changePage"
        />
    </section>
</template>

<script>
//l We imported axios globally in front.js
//import axios from 'axios';
import PostCard from "./PostCard.vue";
import Loader from "../Loader.vue";
import Pagination from "../Pagination.vue";
export default {
    name: "Index",
    //l In VUE CLI, we need to return our data as a result object of a data() method
    data() {
        return {
            baseUri: "http://127.0.0.1:8000",
            posts: [],
            isLoading: false,
            currentPage: 1,
            lastPage: 1
        };
    },
    components: {
        PostCard,
        Loader,
        Pagination
    },
    methods: {
        // Fetch all posts with an API call
        getPosts() {
            this.isLoading = true;
            axios
                .get(`${this.baseUri}/api/posts?page=${this.currentPage}`)
                .then(r => {
                    const { data, current_page, last_page } = r.data;
                    this.posts = data;
                    this.currentPage = current_page;
                    this.lastPage = last_page;
                    this.isLoading = false;
                })
                .catch(e => {
                    console.error(e);
                });
        },
        changePage(page) {
            console.log(`changePage called with page=${page}`);
            this.currentPage = page;

            this.getPosts();
        }
    },
    created() {
        this.getPosts(1);
    }
};
</script>

<style lang="scss"></style>
