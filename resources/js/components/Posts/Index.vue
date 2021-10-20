<template>
    <section id="posts">
        <PostCard v-for="(post, i) in posts" :key="i" :post="posts[i]" />
    </section>
</template>

<script>
//l We imported axios globally in front.js
//import axios from 'axios';
import PostCard from "./PostCard.vue";
export default {
    name: "Index",
    //l In VUE CLI, we need to return our data as a result object of a data() method
    data() {
        return {
            baseUri: "http://127.0.0.1:8000",
            posts: []
        };
    },
    components: {
        PostCard
    },
    methods: {
        // Fetch all posts with an API call
        getPosts() {
            axios
                .get(`${this.baseUri}/api/posts`)
                .then(r => {
                    this.posts = r.data;
                })
                .catch(e => {
                    console.error(e);
                });
        }
    },
    created() {
        this.getPosts();
    }
};
</script>

<style lang="scss"></style>
