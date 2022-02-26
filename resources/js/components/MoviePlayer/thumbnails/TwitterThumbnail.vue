<template>
    <div class="TwitterThumbnail">
      {{ $t('Linkage with API is required to get thumbnails from video URLs') }}
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
