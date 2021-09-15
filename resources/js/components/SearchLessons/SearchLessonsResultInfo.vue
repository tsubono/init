<template>
    <div class="p-searchresult__info">
        <!-- TODO: 件数を実データに置き換え -->
        <div class="p-searchresult__num">検索結果 <span class="num">{{ total.toLocaleString() }}</span></div>
        <div class="p-searchresult__tab">
            <!-- TODO: ソート -->
            <ul id="p-searchresult__sort" class="nav p-sort" role="tablist">
                <li role="presentation">
                    <button id="new-tab" class="p-sort__parts active" data-bs-toggle="tab" data-bs-target="#new" type="button" role="tab" aria-controls="new" aria-selected="true">新着順</button>
                </li>
                <li role="presentation">
                    <button id="fav-tab" class="p-sort__parts" data-bs-toggle="tab" data-bs-target="#fav" type="button" role="tab" aria-controls="fav" aria-selected="false">人気順</button>
                </li>
                <li role="presentation">
                    <button id="coin-little-tab" class="p-sort__parts" data-bs-toggle="tab" data-bs-target="#coin-little" type="button" role="tab" aria-controls="coin-little" aria-selected="false">必要コイン少ない順</button>
                </li>
                <li role="presentation">
                    <button id="coin-many-tab" class="p-sort__parts" data-bs-toggle="tab" data-bs-target="#coin-many" type="button" role="tab" aria-controls="coin-many" aria-selected="false">必要コイン多い順</button>
                </li>
                <li role="presentation">
                    <button id="evaluation-tab" class="p-sort__parts" data-bs-toggle="tab" data-bs-target="#evaluation" type="button" role="tab" aria-controls="evaluation" aria-selected="false">評価が高い順</button>
                </li>
            </ul>
        </div><!-- /.p-searchresult__tab -->
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
    },
}
</script>

<style scoped>
.num:after {
    content: "件"
}
</style>
