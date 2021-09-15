<template>
    <div class="p-searchresult__info">
        <div class="p-searchresult__num">検索結果 <span class="num">{{ total.toLocaleString() }}</span></div>
        <div class="p-searchresult__tab">
            <ul id="p-searchresult__sort" class="nav p-sort" role="tablist">
                <li role="presentation">
                    <button
                        id="new-tab"
                        class="p-sort__parts"
                        :class="activeClass('new')"
                        type="button"
                        aria-controls="new"
                        :aria-selected="isActive('new')"
                        @click="setOrder('new')"
                    >
                        新着順
                    </button>
                </li>
                <li role="presentation">
                    <button
                        id="fav-tab"
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
                        id="coin-little-tab"
                        class="p-sort__parts"
                        :class="activeClass('coin-little')"
                        type="button"
                        aria-controls="coin-little"
                        :aria-selected="isActive('coin-little')"
                        @click="setOrder('coin-little')"
                    >
                        必要コイン少ない順
                    </button>
                </li>
                <li role="presentation">
                    <button
                        id="coin-many-tab"
                        class="p-sort__parts"
                        :class="activeClass('coin-many')"
                        type="button"
                        aria-controls="coin-many"
                        :aria-selected="isActive('coin-many')"
                        @click="setOrder('coin-many')"
                    >
                        必要コイン多い順
                    </button>
                </li>
                <li role="presentation">
                    <button
                        id="evaluation-tab"
                        class="p-sort__parts"
                        :class="activeClass('evaluation')"
                        type="button"
                        aria-controls="evaluation"
                        :aria-selected="isActive('evaluation')"
                        @click="setOrder('evaluation')"
                    >
                        評価が高い順
                    </button>
                </li>
            </ul>
        </div><!-- /.p-searchresult__tab -->
    </div><!-- /.p-searchresult__info -->
</template>

<script>
export default {
    name: 'SearchLessonsResultInfo',

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
    content: "件"
}
</style>
