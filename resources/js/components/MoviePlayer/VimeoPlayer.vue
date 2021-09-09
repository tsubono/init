<template>
    <div class="VimeoPlayer iframe-wrapper">
        <iframe :src="path" width="640" height="360" frameborder="0" allow="autoplay; fullscreen; picture-in-picture"
                allowfullscreen></iframe>
    </div>
</template>

<script>
export default {
    name: 'VimeoPlayer',

    props: {
        path: {
            type: String,
            required: true,
        },
    },
}
</script>
