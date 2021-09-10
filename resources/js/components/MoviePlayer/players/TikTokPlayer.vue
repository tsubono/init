<template>
    <div class="TikTokPlayer">
        <iframe
            name="__tt_embed__v39952534415998376"
            :src="movie.playerUrl"
            style="width: 100%; height: 887px; display: block; visibility: unset; max-height: 887px;"
        ></iframe>
    </div>
</template>

<script>
import { TikTokMovie } from '../models/TikTokMovie'

export default {
    name: 'TikTokPlayer',

    props: {
        path: {
            type: String,
            required: true,
        },
    },

    computed: {
        movie () {
            return new TikTokMovie(this.path)
        }
    },
}
</script>
