<template>
    <img :src="thumbnailUrl" class="w-100" alt="">
</template>

<script>
import { YouTubeMovie } from '../models/YouTubeMovie'

export default {
    name: 'YouTubeThumbnail',

    data: () => ({
        thumbnailUrl: '',
    }),

    props: {
        path: {
            type: String,
            required: true,
        },
    },

    computed: {
        movie () {
            return new YouTubeMovie(this.path)
        },
    },

    async mounted () {
        this.thumbnailUrl = await this.movie.getThumbnail()
    }
}
</script>
