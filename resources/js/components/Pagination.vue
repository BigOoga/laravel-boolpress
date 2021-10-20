<template>
    <nav aria-label="pagination">
        <ul class="pagination">
            <li
                class="page-item"
                :class="[currentPage === 1 ? 'disabled' : '']"
                @click="emitPageChange(currentPage - 1)"
            >
                <a class="page-link">Previous</a>
            </li>
            <li
                v-for="n in pages"
                :key="n"
                class="page-item"
                :class="[currentPage === n ? 'active' : '']"
                @click="emitPageChange(n)"
            >
                <a class="page-link">{{ n }}</a>
            </li>

            <li
                class="page-item"
                :class="[currentPage === pages ? 'disabled' : '']"
                @click="emitPageChange(currentPage + 1)"
            >
                <a class="page-link">Next</a>
            </li>
        </ul>
    </nav>
</template>

<script>
export default {
    name: "Pagination",
    props: {
        currentPage: Number,
        pages: Number
    },
    data() {
        return {};
    },
    methods: {
        emitPageChange(n) {
            console.log(`Emitting a page-change event with n= ${n}`);
            this.$emit("page-change", n);
        }
    }
};
</script>

<style lang="scss" scoped>
.page-link:hover {
    cursor: pointer;
}
</style>
