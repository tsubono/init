<template>
    <img :src="thumbnailUrl" class="w-100" alt="">
</template>

<script>
export default {
    name: 'YouTubeThumbnail',

    props: {
        path: {
            type: String,
            required: true,
        },
    },

    computed: {
        videoId() {
            return this.path.replace(/^.*\/embed\/([^/]+)\/?.*$/, '$1')
        },

        thumbnailUrl() {
            return `https://i.ytimg.com/vi/${this.videoId}/sddefault.jpg`
        },
    },
}
</script>
