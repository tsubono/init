<template>
    <div class="TwitterThumbnail">
        動画URLからのサムネイル取得にはAPIとの連携が必要？
    </div>
</template>

<script>

export default {
    name: 'TwitterThumbnail',

    props: {
        path: {
            type: String,
            required: true,
        },
    },
}
</script>
