<template>
    <div class="TikTokPlayer">
        <iframe
            name="__tt_embed__v39952534415998376"
            :src="embedUrl"
            style="width: 100%; height: 887px; display: block; visibility: unset; max-height: 887px;"
        ></iframe>
    </div>
</template>

<script>
export default {
    name: 'TikTokPlayer',

    props: {
        path: {
            type: String,
            required: true,
        },
    },

    computed: {
        videoId () {
            return this.path.replace(/^.*video\/([^/]+)\/?.*$/, '$1')
        },
        embedUrl () {
            return `https://www.tiktok.com/embed/v2/${this.videoId}?lang=ja`
        }
    },
}
</script>
