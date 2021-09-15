<template>
    <!-- パネル部分 -->
    <div class="p-search__content">
        <div v-if="isEmpty">該当のアドバイザーは見つかりませんでした。</div>
        <template v-else>
            <SearchAdviser
                v-for="adviser in advisers"
                :key="adviser.id"
                :adviser="adviser"
            />
            <div
                v-if="hasMore"
                class="my-80px"
            >
                <button
                    type="button"
                    class="mx-auto p-btn p-btn__defalut"
                    @click="onClickLoadMoreButton"
                >
                    もっと読み込む
                </button>
            </div>
        </template>
    </div><!-- /.p-search__content -->
</template>

<script>
import SearchAdviser from './SearchAdviser'

export default {
    name: 'SearchAdvisersResultContent',

    components: {SearchAdviser},

    props: {
        total: {
            type: Number,
            required: true,
        },

        advisers: {
            type: Array,
            required: true,
        },
    },

    computed: {
        isEmpty () {
            return this.advisers.length === 0
        },

        hasMore () {
            return this.advisers.length < this.total
        },

        methods: {
            onClickLoadMoreButton () {
                this.$emit('load')
            }
        },
    },
}
</script>
