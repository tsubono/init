<template>
    <div class="p-search__content tab-content">
        <div id="new" class="tab-pane active" role="tabpanel" aria-labelledby="new-tab">
            <div v-if="isEmpty">該当のレッスンは見つかりませんでした。</div>
            <template v-else>
                <SearchLessonsRoom
                    v-for="lesson in lessons"
                    :key="lesson.id"
                    :lesson="lesson"
                />
            </template>
        </div><!--/.tab-pane -->

        <!-- TODO: ソート -->
        <div id="fav" class="tab-pane" role="tabpanel" aria-labelledby="fav-tab">
            <p>人気順</p>
        </div>
        <div id="coin-little" class="tab-pane" role="tabpanel" aria-labelledby="coin-little-tab">
            <p>必要コイン少ない順</p>
        </div>
        <div id="coin-many" class="tab-pane" role="tabpanel" aria-labelledby="coin-many-tab">
            <p>必要コイン多い順</p>
        </div>
        <div id="evaluation" class="tab-pane" role="tabpanel" aria-labelledby="evaluation-tab">
            <p>評価が高い順</p>
        </div>
    </div><!-- /.p-search__content -->
</template>

<script>
import SearchLessonsRoom from './SearchLessonsRoom'
export default {
    name: 'SearchLessonsResultContent',
    components: {SearchLessonsRoom},
    props: {
        lessons: {
            type: Array,
            required: true,
        },
    },

    computed: {
        isEmpty () {
            return this.lessons.length === 0
        },
    },
}
</script>

<style scoped>

</style>
