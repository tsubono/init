<template>
    <div class="FacebookThumbnail">
      {{ $t('Linkage with API is required to get thumbnails from video URLs') }}
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
