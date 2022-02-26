<template>
    <div class="InstagramThumbnail">
      {{ $t('Linkage with API is required to get thumbnails from video URLs') }}
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
