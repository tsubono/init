<template>
    <div class="InstagramPlayer">
        <iframe class="instagram-media instagram-media-rendered" id="instagram-embed-0"
                :src="embedUrl"
                allowtransparency="true" allowfullscreen="true" frameborder="0" height="467"
                data-instgrm-payload-id="instagram-media-payload-0" scrolling="no"
                style="background: white; max-width: 540px; width: calc(100% - 2px); border-radius: 3px; border: 1px solid rgb(219, 219, 219); box-shadow: none; display: block; margin: 0px 0px 12px; min-width: 326px; padding: 0px;"></iframe>
    </div>
</template>

<script>
export default {
    name: 'InstagramPlayer',

    props: {
        path: {
            type: String,
            required: true,
        },
    },

    computed: {
        embedUrl () {
            return this.path.replace(/\/?\?.*$/, '/embed')
        },
    },
}
</script>
