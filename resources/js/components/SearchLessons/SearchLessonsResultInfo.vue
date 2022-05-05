<template>
    <div class="p-searchresult__info">
        <div class="p-searchresult__num">
          {{  $t('Search result') }} <span class="num">{{ total.toLocaleString() }}</span> {{  $t('cases') }}
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
                    :aria-selected="isActive('new')"
                    @click="setOrder('new')"
                >
                  {{ $t('order by new')}}
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
                  {{ $t('order by popularity')}}
                </button>
            </li>
            <li role="presentation">
                <button
                    class="p-sort__parts"
                    :class="activeClass('coin-little')"
                    type="button"
                    aria-controls="coin-little"
                    :aria-selected="isActive('coin-little')"
                    @click="setOrder('coin-little')"
                >
                  {{ $t('order by fewer coins')}}
                </button>
            </li>
            <li role="presentation">
                <button
                    class="p-sort__parts"
                    :class="activeClass('coin-many')"
                    type="button"
                    aria-controls="coin-many"
                    :aria-selected="isActive('coin-many')"
                    @click="setOrder('coin-many')"
                >
                  {{ $t('order by many coins')}}
                </button>
            </li>
            <li role="presentation">
                <button
                    class="p-sort__parts"
                    :class="activeClass('evaluation')"
                    type="button"
                    aria-controls="evaluation"
                    :aria-selected="isActive('evaluation')"
                    @click="setOrder('evaluation')"
                >
                  {{ $t('order by rate')}}
                </button>
            </li>
        </ul>
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
