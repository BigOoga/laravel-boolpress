<template>
    <div class="loader d-flex justify-content-center align-items-center">
        <div class="spinner-border text-primary" role="status">
            <span class="sr-only">Loading...</span>
        </div>
    </div>
</template>

<script>
export default {
    name: "Loader"
};
</script>

<style lang="scss" scoped>
.loader {
    position: fixed;
    bottom: 0;
    left: 0;
    right: 0;
    top: 0;

    .spinner-border {
        width: 100px;
        height: 100px;
    }
}
</style>
