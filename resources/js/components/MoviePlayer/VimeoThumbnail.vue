<template>
    <img :src="thumbnailUrl" class="w-100" alt="">
</template>

<script>
export default {
    name: 'VimeoThumbnail',

    props: {
        path: {
            type: String,
            required: true,
        },
    },

    computed: {
        videoId() {
            // https://player.vimeo.com/video/83949049?h=d02aef1c94&title=0&byline=0&portrait=0
            return this.path.replace(/^.*\/video\/([^/]+)[/?]?.*$/, '$1')
        },

        thumbnailUrl() {
            return `https://i.vimeocdn.com/video/523628874?mw=1000&mh=563&q=70`
        },
    },
}
</script>
