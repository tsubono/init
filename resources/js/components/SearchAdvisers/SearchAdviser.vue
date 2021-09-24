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
                            出身国 /<br class="d-lg-none">
                            住居国
                        </h4>
                        <div class="p-card3__country">
                            <div>
                                {{ _adviser.fromCountryName }}
                            </div>
                            <span class="d-none d-lg-inline">/</span>
                            <div>
                                {{ _adviser.residenceCountryName }}
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-4 p-card3__box">
                        <h4 class="p-heading3 gender">性別</h4>
                        <div class="p-card3__gender">
                            <div class="p-label__age woman">
                                {{ _adviser.gender }}
                            </div>
                        </div>
                    </div>
                    <div class="col-md-12 p-card3__box">
                        <h4 class="p-heading3">言語</h4>
                        <div class="p-card3__country">
                            <p>{{ _adviser.languagesText }}</p>
                        </div>
                    </div>
                    <div class="col-md-12 p-card3__box">
                        <h4 class="p-heading3">カテゴリー</h4>
                        <div class="p-card3__country">
                            <ul class="p-profile__category">
                                <li
                                    v-for="category in _adviser.categories"
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
                                v-for="(availableTime, day) in _adviser.availableTimes"
                                :key="day"
                            >
                                {{ availableTime.day }}
                                <span class="time time-first">{{ availableTime.start }}</span>
                                <span class="time time-last">{{ availableTime.end }}</span>
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
        }
    },
}
</script>
