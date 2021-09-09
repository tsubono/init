<template>
    <div class="TikTokPlayer">
        <blockquote class="tiktok-embed" cite="https://www.tiktok.com/@hokkaido_uhbnews/video/6975126181439950082"
                    data-video-id="6975126181439950082" style="max-width: 605px;min-width: 325px;">
            <section><a target="_blank" :title="userId" :href="userUrl"></a></section>
        </blockquote>
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
        userId () {
            return this.path.replace(/^.*www\.tiktok\.com\/([^/]+)\/?.*$/, '$1')
        },
        userUrl () {
            return this.path.replace(/^(.*)\/video.*$/, '$1')
        },
    },
}
</script>
