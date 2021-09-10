<template>
<div class="MovieThumbnail">
    <component :is="thumbnail" :path="movie.movie_path" />
</div>
</template>

<script>
import YouTubeThumbnail from './YouTubeThumbnail'
import VimeoThumbnail from './VimeoThumbnail'
import TwitterThumbnail from './TwitterThumbnail'
import InstagramThumbnail from './InstagramThumbnail'
import TikTokThumbnail from './TikTokThumbnail'
import FacebookThumbnail from './FacebookThumbnail'

const thumbnails = {
    youtube: YouTubeThumbnail,
    vimeo: VimeoThumbnail,
    twitter: TwitterThumbnail,
    fb: FacebookThumbnail,
    instagram: InstagramThumbnail,
    tiktok: TikTokThumbnail,
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
