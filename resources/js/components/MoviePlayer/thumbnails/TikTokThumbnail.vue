<template>
    <img :src="thumbnailUrl" class="w-100" alt="">
</template>

<script>
import { TikTokMovie } from '../models/TikTokMovie'

export default {
    name: 'TikTokThumbnail',

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
            return new TikTokMovie(this.path)
        },
    },

    async mounted () {
        this.thumbnailUrl = await this.movie.getThumbnail()
    }
}
</script>
