<template>
    <div class="row">
        <div class="card col-8">
            <div class="card-header d-flex justify-content-between">
                {{ post.title }}
                <a class="btn btn-primary" href="">Go to</a>
            </div>
            <div class="card-body">
                <p class="card-text">
                    {{ post.content }}
                </p>
            </div>
            <div>{{ getFormattedDate(post.created_at) }}</div>
        </div>
        <div class="card col-4">
            <img :src="post.image" alt="" class="img-fluid" />
        </div>
    </div>
</template>

<script>
export default {
    name: "PostCard",
    props: {
        post: Object
    },
    methods: {
        getFormattedDate(date) {
            //l For this simple operation we use JS built in Date object
            const postDate = new Date(date);
            const dateX = postDate.toLocaleDateString("it-IT");
            return dateX;
        }
    }
};
</script>

<style></style>
