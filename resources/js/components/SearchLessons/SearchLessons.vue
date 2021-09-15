<template>
    <div>
        <SearchLessonsForm
            :categories="categories"
            :languages="languages"
            :countries="countries"
            @search="handleSearch"
        />
        <SearchLessonsResult
            :lessons="_lessons"
            :total="_total"
            :order="order"
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

        total: {
            type: Number,
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

    data: () => ({
        _lessons: [],
        _total: 0,
        order: '',
    }),

    created () {
        this._lessons = this.lessons
        this._total = this.total

        const params = new URLSearchParams(location.search)
        this.order = params.get('order') || 'new'
    },

    methods: {
        async handleSearch (params) {
            let response

            try {
                response = await axios.get('/api/lessons/search', { params })
            } catch (e) {
                console.error(e)
                return
            }

            this._lessons = response.data.lessons
            this._total = response.data.total
            this.$forceUpdate()
            this.setUrl(params)
        },

        setUrl (params) {
            const paramsString = Object.entries(params).map((param) => param.join('=')).join('&')
            const url = location.origin + location.pathname + '?' + paramsString
            history.pushState('', '', url)
        }
    },
}
</script>

<style scoped>

</style>
