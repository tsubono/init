<template>
<div class="MovieThumbnail">
    <img
        class="w-100"
        :src="movie.eye_catch_path"
        :alt="movie.title"
    >
</div>
</template>

<script>
export default {
    name: 'MovieThumbnail',

    props: {
        movie: {
            type: Object,
            default: false,
        },
    },
}
</script>

<style scoped>
.MovieThumbnail {
    margin-bottom: 20px;
}
</style>
