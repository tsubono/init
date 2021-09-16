<template>
<div class="MovieList">
    <div class="p-profile__movie">
        <div class="row">
            <div
                v-for="(movie) in movies"
                :key="movie.id"
                class="col-md-4 mb-3 mb-md-0"
            >
                <a @click="show(movie)">
                    <MovieThumbnail :movie="movie" />
                </a>
            </div>
        </div>
    </div>
    <!-- 動画モーダルの設定 -->
    <div
        id="p-modal__movie"
        class="modal fade p-modal p-modal__movie"
        tabindex="-1"
        :aria-labelledby="`profire-movieModalLabel`"
        aria-hidden="true"
    >
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <button
                    type="button"
                    class="btn-close"
                    aria-label="閉じる"
                    @click="close"
                />
                <div class="modal-body">
                    <MoviePlayer
                        v-if="movie"
                        :movie="movie"
                    />
                </div>
            </div><!-- /.modal-content -->
        </div><!-- /.modal-dialog -->
    </div><!-- /.modal -->
</div>
</template>

<script>
import MoviePlayer from './MoviePlayer'
import MovieThumbnail from './MovieThumbnail'

export default {
    name: 'MovieList',

    components: { MoviePlayer, MovieThumbnail },

    props: {
        movies: {
            type: Array,
            required: true,
        },
    },

    data: () => ({
        movie: null,
        modal: null,
    }),

    mounted () {
        const modalElement = document.getElementById('p-modal__movie')
        this.modal = new bootstrap.Modal(modalElement)

        modalElement.addEventListener('hidden.bs.modal', () => {
            this.movie = null
        })
    },

    methods: {
        show (movie) {
            this.movie = movie
            this.modal.show()
        },
        close () {
            this.modal.hide()
        },
    },
}
</script>

<style scoped>

</style>
