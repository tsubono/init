<template>
    <div class="TwitterThumbnail">
        動画URLからのサムネイル取得は不可
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
