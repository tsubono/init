<template>
    <div class="MoviePlayer">
        <component :is="player" :path="movie.movie_path" />
    </div>
</template>

<script>
import YouTubePlayer from './YouTubePlayer'
import VimeoPlayer from './VimeoPlayer'
import TwitterPlayer from './TwitterPlayer'
import FacebookPlayer from './FacebookPlayer'
import InstagramPlayer from './InstagramPlayer'
import TikTokPlayer from './TikTokPlayer'

const players = {
    youtube: YouTubePlayer,
    vimeo: VimeoPlayer,
    twitter: TwitterPlayer,
    fb: FacebookPlayer,
    instagram: InstagramPlayer,
    tiktok: TikTokPlayer,
}

export default {
    name: 'MoviePlayer',

    props: {
        movie: {
            type: Object,
            required: true,
        },
    },

    computed: {
        player() {
            return players[this.movie.type]
        }
    },
}
</script>
