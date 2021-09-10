<template>
    <div class="FacebookThumbnail">
        動画URLからのサムネイル取得にはAPIとの連携が必要
    </div>
</template>

<script>

export default {
    name: 'FacebookThumbnail',

    props: {
        path: {
            type: String,
            required: true,
        },
    },
}
</script>
