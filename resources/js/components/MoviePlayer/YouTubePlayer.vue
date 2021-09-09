<template>
    <div class="YouTubePlayer iframe-wrapper">
        <iframe :src="path" title="YouTube video player" frameborder="0"
                allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture"
                allowfullscreen></iframe>
    </div>
</template>

<script>
export default {
    name: 'YouTubePlayer',

    props: {
        path: {
            type: String,
            required: true,
        },
    },
}
</script>
