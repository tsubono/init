<template>
    <div>
        <SearchLessonsForm
            :categories="categories"
            :languages="languages"
            :countries="countries"
        />
        <SearchLessonsResult
            :lessons="lessons"
        />
    </div>
</template>

<script>
import SearchLessonsForm from './SearchLessonsForm'
import SearchLessonsResult from './SearchLessonsResult'

export default {
    name: 'SearchLessons',

    components: {SearchLessonsResult, SearchLessonsForm},

    props: {
        lessons: {
            type: Array,
            required: true,
        },

        categories: {
            type: Array,
            required: true,
        },

        languages: {
            type: Array,
            required: true,
        },

        countries: {
            type: Array,
            required: true,
        },
    },
}
</script>

<style scoped>

</style>
