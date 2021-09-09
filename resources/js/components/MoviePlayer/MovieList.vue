<template>
<div class="MovieList">
    <div class="p-profile__movie">
        <div class="row">
            <!-- TODO: アイキャッチ画像の表示 -->
            <div
                v-for="(movie, index) in movies"
                :key="movie.id"
                class="col-md-4 mb-3 mb-md-0"
            >
                <a
                    data-bs-toggle="modal"
                    :data-bs-target="`#profire-movieModal${ index }`"
                >
                    <img src="/img/movie-sample01@2x.png" class="w-100" alt="">
                </a>
            </div>
        </div>
    </div>
    <!-- 動画モーダルの設定 -->
    <!-- TODO: 動画種別によって表示方法を変更する -->
    <div
        v-for="(movie, index) in movies"
        :key="movie.id"
        class="modal fade p-modal p-modal__movie"
        :id="`profire-movieModal${ index }`"
        tabindex="-1"
        :aria-labelledby="`profire-movieModal${ index }Label`"
    >
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="閉じる"></button>
                <div class="modal-body">
                    <MoviePlayer :movie="movie" />
                </div>
            </div><!-- /.modal-content -->
        </div><!-- /.modal-dialog -->
    </div><!-- /.modal -->
</div>
</template>

<script>
import MoviePlayer from './MoviePlayer'

export default {
    name: 'MovieList',

    components: { MoviePlayer },

    props: {
        movies: {
            type: Array,
            required: true,
        },
    },
}
</script>

<style scoped>

</style>
