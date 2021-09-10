<template>
    <div class="YouTubePlayer iframe-wrapper">
        <iframe :src="movie.playerUrl" title="YouTube video player" frameborder="0"
                allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture"
                allowfullscreen></iframe>
    </div>
</template>

<script>
import { YouTubeMovie } from '../models/YouTubeMovie.js'

export default {
    name: 'YouTubePlayer',

    props: {
        path: {
            type: String,
            required: true,
        },
    },

    computed: {
        movie () {
            return new YouTubeMovie(this.path)
        }
    },
}
</script>
