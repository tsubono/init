<template>
    <div class="p-search__content tab-content">
      <div v-if="isEmpty">該当のレッスンは見つかりませんでした。</div>
      <template v-else>
        <SearchLesson
            v-for="lesson in lessons"
            :key="lesson.id"
            :lesson="lesson"
        />
      </template>
    </div><!-- /.p-search__content -->
</template>

<script>
import SearchLesson from './SearchLesson'
export default {
    name: 'SearchLessonsResultContent',
    components: {SearchLesson},
    props: {
        lessons: {
            type: Array,
            required: true,
        },
    },

    computed: {
        isEmpty () {
            return this.lessons.length === 0
        },
    },
}
</script>

<style scoped>

</style>
