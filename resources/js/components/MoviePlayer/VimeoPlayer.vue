<template>
    <div class="VimeoPlayer iframe-wrapper">
        <iframe :src="movie.playerUrl" width="640" height="360" frameborder="0" allow="autoplay; fullscreen; picture-in-picture"
                allowfullscreen></iframe>
    </div>
</template>

<script>
import { VimeoMovie } from './models/VimeoMovie'

export default {
    name: 'VimeoPlayer',

    props: {
        path: {
            type: String,
            required: true,
        },
    },

    computed: {
        movie () {
            return new VimeoMovie(this.path)
        }
    },
}
</script>
