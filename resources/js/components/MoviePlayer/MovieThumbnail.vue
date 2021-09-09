<template>
<div class="MovieThumbnail">
    <component v-if="thumbnail" :is="thumbnail" :path="movie.movie_path" />
    <img v-else src="/img/movie-sample01@2x.png" class="w-100" alt="">
</div>
</template>

<script>
import YouTubeThumbnail from './YouTubeThumbnail'
import VimeoThumbnail from './VimeoThumbnail'
import TwitterThumbnail from './TwitterThumbnail'

const thumbnails = {
    youtube: YouTubeThumbnail,
    vimeo: VimeoThumbnail,
    twitter: TwitterThumbnail,
}

export default {
    name: 'MovieThumbnail',

    props: {
        movie: {
            type: Object,
            default: false,
        },
    },

    computed: {
        thumbnail () {
            return thumbnails[this.movie.type] || null
        }
    },
}
</script>
