<template>
    <div class="p-card3 p-room">
        <div class="p-card3__img2">
            <a :href="lessonUrl">
                <img :src="lesson.eye_catch_image" :alt="lesson.name">
            </a>
        </div>
        <div class="p-card3__detail">
            <a :href="lessonUrl">
                <h3>{{ lesson.name }}</h3>
                <p>
                    {{ description }}
                    <a :href="lessonUrl"><span class="more">{{ $t('more')}}</span></a>
                </p>
                <div class="p-card3__info">
                    <div class="p-card3__info_cate">
                        <ul class="p-profile__category">
                            <li v-for="category in lesson.categories">
                                <div class="p-category">
                                    <img :src="category.icon_path" alt="アイコン"/>
                                    {{ category.name_locale }}
                                </div>
                            </li>
                        </ul>
                    </div>
                    <div class="p-card3__info_point">
                        {{ lesson.coin_amount.toLocaleString() }}{{ $t('Coin') }}
                    </div>
                </div><!-- /.p-card3__info -->
                <div class="p-card3__advisor">
                    <div class="p-card3__advisor_img">
                        <img :src="lesson.adviser_user.avatar_image" alt="講師画像">
                    </div>
                    <div class="p-card3__advisor_text">
                        <h4>
                            {{ lesson.adviser_user.full_name }}
                        </h4>
                        <div class="p-card3__box">
                            <h5 class="p-heading3">{{ $t('Language') }}</h5>
                            <div class="p-card3__country">
                                <p>
                                    {{ languages }}
                                </p>
                            </div>
                        </div>
                    </div>
                </div>
            </a>
        </div><!--/.p-card3__detail -->
        <div class="p-card3__timezone">
            <div class="border p-timezone text-center">
                <a data-bs-toggle="collapse" href="#collapseDetail2" role="button" aria-expanded="false"
                   aria-controls="collapseDetail2">
                    <h3>{{ $t('Lesson available time') }}</h3>
                </a>
                <div class="collapse" id="collapseDetail2">
                    <div class="inner py-4">
                        <ul class="p-timezone__list">
                          <li>
                            {{ $t('monday') }}
                            <span class="time time-first">{{ getStartTime('monday') }}</span>
                            <span class="time time-last">{{ getEndTime('monday') }}</span>
                          </li>
                          <li>
                            {{ $t('tuesday') }}
                            <span class="time time-first">{{ getStartTime('tuesday') }}</span>
                            <span class="time time-last">{{ getEndTime('tuesday') }}</span>
                          </li>
                          <li>
                            {{ $t('wednesday') }}
                            <span class="time time-first">{{ getStartTime('wednesday') }}</span>
                            <span class="time time-last">{{ getEndTime('wednesday') }}</span>
                          </li>
                          <li>
                            {{ $t('thursday') }}
                            <span class="time time-first">{{ getStartTime('thursday') }}</span>
                            <span class="time time-last">{{ getEndTime('thursday') }}</span>
                          </li>
                          <li>
                            {{ $t('friday') }}
                            <span class="time time-first">{{ getStartTime('friday') }}</span>
                            <span class="time time-last">{{ getEndTime('friday') }}</span>
                          </li>
                          <li>
                            {{ $t('saturday') }}
                            <span class="time time-first">{{ getStartTime('saturday') }}</span>
                            <span class="time time-last">{{ getEndTime('saturday') }}</span>
                          </li>
                          <li>
                            {{ $t('sunday') }}
                            <span class="time time-first">{{ getStartTime('sunday') }}</span>
                            <span class="time time-last">{{ getEndTime('sunday') }}</span>
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
    name: 'SearchLesson',

    props: {
        lesson: {
            type: Object,
            required: true,
        },
    },

    computed: {
        lessonUrl () {
            return location.origin + '/lessons/' + this.lesson.id
        },
        description () {
            if (this.lesson.description.length < 100) {
                return this.lesson.description
            } else {
                return this.lesson.description.slice(0, 100) + '...'
            }
        },
        languages () {
            return this.lesson.adviser_user.languages.map(({name_locale}) => name_locale).join(' / ')
        }
    },

    methods: {
        getStartTime (day) {
            return this.lesson.adviser_user.available_times.find((times) => times.day === day).start
        },
        getEndTime (day) {
            return this.lesson.adviser_user.available_times.find((times) => times.day === day).end
        },
    },
}
</script>
