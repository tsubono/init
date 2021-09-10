<template>
    <img :src="thumbnailUrl" class="w-100" alt="">
</template>

<script>
import { VimeoMovie } from './models/VimeoMovie'

export default {
    name: 'VimeoThumbnail',

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
            return new VimeoMovie(this.path)
        },
    },

    async mounted () {
        this.thumbnailUrl = await this.movie.getThumbnail()
    }
}
</script>
