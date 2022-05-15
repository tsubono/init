<template>
    <div>
        <SearchLessonsForm
            :search-params="searchParams"
            :categories="categories"
            :languages="languages"
            :countries="countries"
            @search="handleSearch"
        />
        <SearchLessonsResult
            :lessons="_lessons"
            :total="_total"
            :order="order"
            @order="handleOrder"
            @load="handleLoad"
        />
    </div>
</template>

<script>
import SearchLessonsForm from './SearchLessonsForm'
import SearchLessonsResult from './SearchLessonsResult'
import { kebabCase } from 'lodash/string'

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

        locale: {
          type: String,
          default: null,
        },
    },

    data: () => ({
        searchParams: {
            category: '',
            language: '',
            room: '',
            country: '',
            gender: '',
            coinMin: '',
            coinMax: '',
        },
        order: '',
        page: 1,
        _lessons: [],
        _total: 0,
    }),

    created () {
        this._lessons = this.lessons
        this._total = this.total

        const params = new URLSearchParams(location.search)

        this.order = params.get('order') || 'new'

        Object
            .keys(this.searchParams)
            .forEach(key => {
                const value = params.get(kebabCase(key))
                if (value) {
                    this.$set(this.searchParams, key, value)
                }
            })
    },

    computed: {
        searchParamsFiltered () {
            return Object.entries(this.searchParams)
                .filter(([_, value]) => value)
                .reduce((sub, [key, value]) => ({...sub, [kebabCase(key)]: value}), {})
        }
    },

    methods: {
        async fetch (page = this.page) {
            let response

            const params = {
                ...this.searchParamsFiltered,
                order: this.order,
                locale: this.locale
            }

            try {
                response = await axios.get('/api/search/lessons', {params: {...params, page}})
            } catch (e) {
                console.error(e)
                return
            }

            this._lessons = this.page !== page ? [...this._lessons, ...response.data.lessons] : response.data.lessons
            this._total = response.data.total
            this.$forceUpdate()
            this.setUrl(params)
        },

        async handleSearch (searchParams) {
            this.page = 1
            this.searchParams = searchParams
            await this.fetch()
        },

        async handleOrder (order) {
            this.page = 1
            this.order = order
            await this.fetch()
        },

        async handleLoad () {
            await this.fetch(this.page + 1)
        },

        setUrl (params) {
            const paramsString = Object.entries(params).map((param) => param.join('=')).join('&')
            const url = location.origin + location.pathname + '?' + paramsString
            history.pushState('', '', url)
        }
    },
}
</script>
