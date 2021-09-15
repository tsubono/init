<template>
    <section class="p-searchresult l-content-block">
        <div class="container">
            <SearchAdvisersResultInfo
                :total="total"
                :order="order"
                @order="handleOrder"
            />
            <SearchAdvisersResultContent
                :total="total"
                :advisers="advisers"
                @load="handleLoad"
            />
        </div>
    </section>
</template>

<script>
import SearchAdvisersResultInfo from './SearchAdvisersResultInfo'
import SearchAdvisersResultContent from './SearchAdvisersResultContent'

export default {
    name: 'SearchAdvisersResult',

    components: {SearchAdvisersResultContent, SearchAdvisersResultInfo},

    props: {
        advisers: {
            type: Array,
            required: true,
        },

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
        handleOrder (order) {
            this.$emit('order', order)
        },

        handleLoad () {
            this.$emit('load')
        }
    },
}
</script>
