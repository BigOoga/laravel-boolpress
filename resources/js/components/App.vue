<template>
    <div class="container">
        <div class="row justify-content-center">
            <h1>My Blog</h1>
            <Index />
        </div>
    </div>
</template>

<script>
import Index from "./Posts/Index.vue";
export default {
    name: "root",
    components: {
        Index
    },
    mounted() {
        console.log("Component mounted.");
    }
};
</script>
