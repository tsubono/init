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
          <a :href="lessonUrl"><span class="more">もっと見る</span></a>
        </p>
        <div class="p-card3__info">
          <div class="p-card3__info_cate">
            <ul class="p-profile__category">
              <li v-for="category in lesson.categories">
                <div class="p-category">
                  <img :src="category.icon_path" alt="アイコン"/>
                  {{ category.name }}
                </div>
              </li>
            </ul>
          </div>
          <div class="p-card3__info_point">
            {{ lesson.coin_amount.toLocaleString() }}コイン
          </div>
        </div><!-- /.p-card3__info -->
        <div class="p-card3__advisor">
          <div class="p-card3__advisor_img">
            <img :src="lesson.adviser_user.avatar_image" alt="アドバイザー画像">
          </div>
          <div class="p-card3__advisor_text">
            <h4>
              {{ lesson.adviser_user.full_name }}
            </h4>
            <div class="p-card3__box">
              <h5 class="p-heading3">言語</h5>
              <div class="p-card3__country">
                <p>
                  {{ languages}}
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
          <h3>レッスン可能な時間帯</h3>
        </a>
        <div class="collapse" id="collapseDetail2">
          <div class="inner py-4">
            <ul class="p-timezone__list">
              <li>
                月　
                <span class="time time-first">{{ lesson.adviser_user.available_time_monday_start }}</span>
                <span class="time time-last">{{ lesson.adviser_user.available_time_monday_end }}</span>
              </li>
              <li>
                火　
                <span class="time time-first">{{ lesson.adviser_user.available_time_tuesday_start }}</span>
                <span class="time time-last">{{ lesson.adviser_user.available_time_tuesday_end }}</span>
              </li>
              <li>
                水　
                <span class="time time-first">{{ lesson.adviser_user.available_time_wednesday_start }}</span>
                <span class="time time-last">{{ lesson.adviser_user.available_time_wednesday_end }}</span>
              </li>
              <li>
                木　
                <span class="time time-first">{{ lesson.adviser_user.available_time_thursday_start }}</span>
                <span class="time time-last">{{ lesson.adviser_user.available_time_thursday_end }}</span>
              </li>
              <li>
                金　
                <span class="time time-first">{{ lesson.adviser_user.available_time_friday_start }}</span>
                <span class="time time-last">{{ lesson.adviser_user.available_time_friday_end }}</span>
              </li>
              <li>
                土　
                <span class="time time-first">{{ lesson.adviser_user.available_time_saturday_start }}</span>
                <span class="time time-last">{{ lesson.adviser_user.available_time_saturday_end }}</span>
              </li>
              <li>
                日　
                <span class="time time-first">{{ lesson.adviser_user.available_time_sunday_start }}</span>
                <span class="time time-last">{{ lesson.adviser_user.available_time_sunday_end }}</span>
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
      if (this.lesson.description.length <= 200) {
        return this.lesson.description
      } else {
        return this.lesson.description.slice(0, 200) + '...'
      }
    },
    languages () {
      return this.lesson.adviser_user.languages.map(({ name }) => name).join(' / ')
    }
  },
}
</script>
