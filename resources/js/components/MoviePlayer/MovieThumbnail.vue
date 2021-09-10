<template>
<div class="MovieThumbnail">
    <component :is="thumbnail" :path="movie.movie_path" />
</div>
</template>

<script>
import YouTubeThumbnail from './thumbnails/YouTubeThumbnail'
import VimeoThumbnail from './thumbnails/VimeoThumbnail'
import TwitterThumbnail from './thumbnails/TwitterThumbnail'
import InstagramThumbnail from './thumbnails/InstagramThumbnail'
import TikTokThumbnail from './thumbnails/TikTokThumbnail'
import FacebookThumbnail from './thumbnails/FacebookThumbnail'

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
