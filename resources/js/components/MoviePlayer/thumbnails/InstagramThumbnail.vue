<template>
    <div class="InstagramThumbnail">
        動画URLからのサムネイル取得にはAPIとの連携が必要
    </div>
</template>

<script>
export default {
    name: 'InstagramThumbnail',

    props: {
        path: {
            type: String,
            required: true,
        },
    },
}
</script>
