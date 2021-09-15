<template>
    <div class="p-card3">
        <div class="p-card3__img">
            <a href="#">
                <img :src="adviser.avatar_image" :alt="adviser.full_name">
            </a>
        </div>
        <div class="p-card3__detail">
            <a href="#">
                <h3>{{ adviser.full_name }}</h3>
                <p>{{ prText }}</p>
                <div class="row">
                    <div class="col-lg-8 p-card3__box">
                        <h4 class="p-heading3">
                            出身国 /<br class="d-lg-none">
                            住居国
                        </h4>
                        <div class="p-card3__country">
                            <div class="p-lang p-lang__france">
                                {{ adviser.from_country.name }}
                            </div>
                            <span class="d-none d-lg-inline">/</span>
                            <div class="p-lang p-lang__america">
                                {{ adviser.residence_country.name }}
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-4 p-card3__box">
                        <h4 class="p-heading3 gender">性別</h4>
                        <div class="p-card3__gender">
                            <div class="p-label__age woman">
                                {{ adviser.gender }}
                            </div>
                        </div>
                    </div>
                    <div class="col-md-12 p-card3__box">
                        <h4 class="p-heading3">言語</h4>
                        <div class="p-card3__country">
                            <p>{{ languages }}</p>
                        </div>
                    </div>
                    <div class="col-md-12 p-card3__box">
                        <h4 class="p-heading3">カテゴリー</h4>
                        <div class="p-card3__country">
                            <ul class="p-profile__category">
                                <li
                                    v-for="category in adviser.categories"
                                    :key="category.id"
                                >
                                    <div class="p-category language">
                                        {{ category.name }}
                                    </div>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div><!--/.row -->
            </a>
        </div><!--/.p-card3__detail -->
        <div class="p-card3__timezone">
            <div class="border p-timezone text-center">
                <a data-bs-toggle="collapse" href="#collapseDetail2" role="button" aria-expanded="false"
                   aria-controls="collapseDetail2">
                    <h3>レッスン可能な時間帯</h3>
                </a>
                <div class="collapse" id="collapseDetail2">
                    <div class="inner py-4">
                        <ul class="p-timezone__list">
                            <li
                                v-for="(dayText, day) in days"
                                :key="day"
                            >
                                {{ dayText }}
                                <span class="time time-first">{{ getStartTime(day) }}</span>
                                <span class="time time-last">{{ getEndTime(day) }}</span>
                            </li>
                        </ul>
                    </div>
                </div>
            </div><!-- /.p-timezone -->
        </div><!-- /.p-card3__timezone -->
    </div><!-- /.p-card3 -->
</template>

<script>
export default {
    name: 'SearchAdviser',

    props: {
        adviser: {
            type: Object,
            required: true,
        },
    },

    data: () => ({
        days: {
            monday: '月',
            tuesday: '火',
            wednesday: '水',
            thursday: '木',
            friday: '金',
            saturday: '土',
            sunday: '日',
        },
    }),

    computed: {
        prText () {
            if (this.adviser.pr_text.length <= 200) {
                return this.adviser.pr_text
            } else {
                return this.adviser.pr_text.slice(0, 200) + '...'
            }
        },
        languages () {
            return this.adviser.languages.map(({name}) => name).join(' / ')
        }
    },

    methods: {
        getStartTime (day) {
            return this.adviser[`available_time_${day}_start`]
        },
        getEndTime (day) {
            return this.adviser[`available_time_${day}_end`]
        },
    },
}
</script>

<style scoped>

</style>
