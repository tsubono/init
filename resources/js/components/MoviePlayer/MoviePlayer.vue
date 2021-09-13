<template>
    <div class="MoviePlayer">
        <component :is="player" :path="movie.movie_path" />
    </div>
</template>

<script>
import YouTubePlayer from './players/YouTubePlayer'
import VimeoPlayer from './players/VimeoPlayer'
import TwitterPlayer from './players/TwitterPlayer'
import FacebookPlayer from './players/FacebookPlayer'
import InstagramPlayer from './players/InstagramPlayer'
import TikTokPlayer from './players/TikTokPlayer'

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
