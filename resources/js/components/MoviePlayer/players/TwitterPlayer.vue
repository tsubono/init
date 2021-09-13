<template>
    <iframe id="twitter-widget-0" scrolling="no" frameborder="0" allowtransparency="true" allowfullscreen="true"
            class="" title="Twitter Tweet"
            :src="embedUrl"
            style="position: static; visibility: visible; width: 466px; height: 520px; display: block; flex-grow: 1;"
            :data-tweet-id="tweetId"></iframe>
</template>

<script>
export default {
    name: 'TwitterPlayer.vue',

    props: {
        path: {
            type: String,
            required: true,
        },
    },

    computed: {
        tweetId () {
            return this.path.replace(/^.*status\/(\d+).*$/, '$1')
        },

        embedUrl () {
            return `https://platform.twitter.com/embed/Tweet.html?dnt=false&embedId=twitter-widget-0&features=eyJ0ZndfZXhwZXJpbWVudHNfY29va2llX2V4cGlyYXRpb24iOnsiYnVja2V0IjoxMjA5NjAwLCJ2ZXJzaW9uIjpudWxsfSwidGZ3X2hvcml6b25fdHdlZXRfZW1iZWRfOTU1NSI6eyJidWNrZXQiOiJodGUiLCJ2ZXJzaW9uIjpudWxsfSwidGZ3X3NwYWNlX2NhcmQiOnsiYnVja2V0Ijoib2ZmIiwidmVyc2lvbiI6bnVsbH19&frame=false&hideCard=false&hideThread=false&id=${this.tweetId}&lang=ja&origin=http%3A%2F%2Finit.test%2Fadvisers%2F1&theme=light&widgetsVersion=1890d59c%3A1627936082797&width=550px`
        }
    },
}
</script>
