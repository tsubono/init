<template>
    <div class="p-card3">
        <div class="p-card3__img">
            <a :href="_adviser.url">
                <img :src="_adviser.avatarImage" :alt="_adviser.fullName">
            </a>
        </div>
        <div class="p-card3__detail">
            <a :href="_adviser.url">
                <h3>{{ _adviser.fullName }}</h3>
                <p>{{ _adviser.prTextSliced }}</p>
                <div class="row">
                    <div class="col-lg-8 p-card3__box">
                        <h4 class="p-heading3">
                          {{ $t('Country of origin') }} /<br>{{ $t('Country of residence') }}
                        </h4>
                      {{ _adviser.fromCountryName }} /<br>{{ _adviser.residenceCountryName }}
                    </div>
                    <div class="col-lg-4 p-card3__box">
                        <h4 class="p-heading3 gender">{{ $t('gender') }}</h4>
                        <div class="p-card3__gender">
                            <div
                                class="p-label__age"
                                :class="genderIconClass"
                            >
                              <span v-if="_adviser.gender === '男性'">{{ $t('Male') }}</span>
                              <span v-if="_adviser.gender === '女性'">{{ $t('Woman') }}</span>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-12 p-card3__box">
                        <h4 class="p-heading3">{{ $t('Language') }}</h4>
                        <div class="p-card3__country">
                            <p>{{ _adviser.languagesText }}</p>
                        </div>
                    </div>
                    <div class="col-md-12 p-card3__box">
                        <h4 class="p-heading3">{{ $t('Category') }}</h4>
                        <div class="p-card3__country">
                            <ul class="p-profile__category">
                                <li
                                    v-for="category in _adviser.categories"
                                    :key="category.id"
                                >
                                    <div class="p-category language">
                                        {{ category.name_locale }}
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
import { Adviser } from './models/Adviser'

export default {
    name: 'SearchAdviser',

    props: {
        adviser: {
            type: Object,
            required: true,
        },
    },

    computed: {
        _adviser () {
            return new Adviser(this.adviser)
        },

        genderIconClass () {
            return this._adviser.gender === '女性' ? 'woman' : 'men'
        },
    },

  methods: {
    getStartTime (day) {
      return this.adviser.available_times.find((times) => times.day === day).start
    },
    getEndTime (day) {
      return this.adviser.available_times.find((times) => times.day === day).end
    },
  },
}
</script>
