<template>
    <div>
        <SearchLessonsForm
            :categories="categories"
            :languages="languages"
            :countries="countries"
        />
    </div>
</template>

<script>
import SearchLessonsForm from './SearchLessonsForm'

export default {
    name: 'SearchLessons',

    components: {SearchLessonsForm},

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
