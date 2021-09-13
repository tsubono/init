<template>
    <div class="FacebookPlayer ratio ratio-1x1">
        <iframe
            :src="path"
            width="476" height="476" style="border:none;overflow:hidden" scrolling="no" frameborder="0"
            allowfullscreen="true" allow="autoplay; clipboard-write; encrypted-media; picture-in-picture; web-share"
            allowFullScreen="true"></iframe>
    </div>
</template>

<script>
export default {
    name: 'FacebookPlayer',

    props: {
        path: {
            type: String,
            required: true,
        },
    },
}
</script>
