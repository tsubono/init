<template>
    <blockquote class="twitter-tweet">
        <a :href="path" />
    </blockquote>
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
}
</script>
