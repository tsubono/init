<template>
    <div class="p-searchresult__info">
        <div class="p-searchresult__num">
            検索結果 <span class="num">{{ total.toLocaleString() }}</span>
        </div>
        <ul
            id="p-searchresult__sort"
            class="nav p-sort"
        >
            <li role="presentation">
                <button
                    class="p-sort__parts"
                    :class="activeClass('new')"
                    type="button"
                    aria-controls="new"
                    aria-selected="true"
                    :aria-selected="isActive('new')"
                    @click="setOrder('new')"
                >
                    新着順
                </button>
            </li>
            <li role="presentation">
                <button
                    class="p-sort__parts"
                    :class="activeClass('fav')"
                    type="button"
                    aria-controls="fav"
                    :aria-selected="isActive('fav')"
                    @click="setOrder('fav')"
                >
                    人気順
                </button>
            </li>
            <li role="presentation">
                <button
                    class="p-sort__parts"
                    :class="activeClass('evaluation')"
                    type="button"
                    aria-controls="evaluation"
                    aria-selected="false"
                    :aria-selected="isActive('evaluation')"
                    @click="setOrder('evaluation')"
                >
                    評価が高い順
                </button>
            </li>
        </ul>
    </div><!-- /.p-searchresult__info -->
</template>

<script>
export default {
    name: 'SearchAdvisersResultInfo',

    props: {
        total: {
            type: Number,
            required: true,
        },

        order: {
            type: String,
            required: true,
        },
    },

    methods: {
        isActive (order) {
            return this.order === order
        },

        activeClass (order) {
            return { active: this.isActive(order) }
        },

        setOrder (order) {
            this.$emit('order', order)
        },
    },
}
</script>

<style scoped>
.num:after {
    content: "人"
}
</style>
