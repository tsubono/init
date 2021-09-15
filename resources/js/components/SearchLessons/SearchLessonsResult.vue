<template>
  <section class="p-searchresult l-content-block">
    <div class="container">
      <SearchLessonsResultInfo :total="total"/>
      <SearchLessonsResultContent :lessons="lessons"/>
    </div><!-- /.container -->
  </section>
</template>

<script>
import SearchLessonsResultInfo from './SearchLessonsResultInfo'
import SearchLessonsResultContent from './SearchLessonsResultContent'

export default {
  name: 'SearchLessonsResult',

  components: {SearchLessonsResultInfo, SearchLessonsResultContent},

  props: {
    lessons: {
      type: Array,
      required: true,
    },

    total: {
      type: Number,
      required: true,
    },
  },
}
</script>

<style scoped>

</style>
