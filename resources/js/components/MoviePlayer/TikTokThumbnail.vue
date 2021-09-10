<template>
    <div class="TikTokThumbnail">
        動画URLからのサムネイル取得にはAPIとの連携が必要
    </div>
</template>

<script>
// https://www.tiktok.com/@hokkaido_uhbnews/video/6975126181439950082
// https://www.tiktok.com/embed/v2/6975126181439950082?lang=ja
// https://p16-sign-sg.tiktokcdn.com/obj/tos-alisg-p-0037/967b024c7fe94a0f869da2141cb4cb25_1624023123?x-expires=1631250000&x-signature=Z1jsEcKsonu1YlRMk2Fo10GJrrY%3D

export default {
    name: 'TikTokThumbnail',

    props: {
        path: {
            type: String,
            required: true,
        },
    },
}
</script>
