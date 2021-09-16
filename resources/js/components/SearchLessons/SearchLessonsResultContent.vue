<template>
    <div class="p-search__content">
        <div v-if="isEmpty">該当のレッスンは見つかりませんでした。</div>
        <template v-else>
            <SearchLesson
                v-for="lesson in lessons"
                :key="lesson.id"
                :lesson="lesson"
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
import SearchLesson from './SearchLesson'

export default {
    name: 'SearchLessonsResultContent',

    components: {SearchLesson},

    props: {
        total: {
            type: Number,
            required: true,
        },

        lessons: {
            type: Array,
            required: true,
        },
    },

    computed: {
        isEmpty () {
            return this.lessons.length === 0
        },

        hasMore () {
            return this.lessons.length < this.total
        },
    },

    methods: {
        onClickLoadMoreButton () {
            this.$emit('load')
        }
    },
}
</script>
