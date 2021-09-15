<template>
    <div class="p-card3">
        <div class="p-card3__img">
            <a href="#">
                <img :src="adviser.adviser_image" :alt="adviser.full_name">
            </a>
        </div>
        <div class="p-card3__detail">
            <a href="#">
                <h3>{{ adviser.full_name }}</h3>
                <p>この文章はダミーです。文字の大きさ、量、字間、行間等を確認するために入れています。この文章はダミーです。文字の大きさ、量、字間、行間等を確認するために入れています。この文…</p>
                <div class="row">
                    <div class="col-lg-8 p-card3__box">
                        <h4 class="p-heading3">出身国 /<br class="d-lg-none"> 住居国</h4>
                        <div class="p-card3__country">
                            <div class="p-lang p-lang__france">フランス</div><span class="d-none d-lg-inline">/</span><div class="p-lang p-lang__america">アメリカ</div>
                        </div>
                    </div>
                    <div class="col-lg-4 p-card3__box">
                        <h4 class="p-heading3 gender">性別</h4>
                        <div class="p-card3__gender">
                            <div class="p-label__age woman">女性</div>
                        </div>
                    </div>
                    <div class="col-md-12 p-card3__box">
                        <h4 class="p-heading3">言語</h4>
                        <div class="p-card3__country">
                            <p>英語 / 日本語 / フランス語</p>
                        </div>
                    </div>
                    <div class="col-md-12 p-card3__box">
                        <h4 class="p-heading3">カテゴリー</h4>
                        <div class="p-card3__country">
                            <ul class="p-profile__category">
                                <li>
                                    <div class="p-category language">語学</div>
                                </li>
                                <li>
                                    <div class="p-category qualification">資格取得</div>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div><!--/.row -->
            </a>
        </div><!--/.p-card3__detail -->
        <div class="p-card3__timezone">
            <div class="border p-timezone text-center">
                <a data-bs-toggle="collapse" href="#collapseDetail2" role="button" aria-expanded="false" aria-controls="collapseDetail2">
                    <h3>レッスン可能な時間帯</h3>
                </a>
                <div class="collapse" id="collapseDetail2">
                    <div class="inner py-4">
                        <ul class="p-timezone__list">
                            <li>月　<span class="time time-first">20:00</span><span class="time time-last">13:30</span></li>
                            <li>火　<span class="time time-first">12:00</span><span class="time time-last">13:30</span></li>
                            <li>水　<span class="time time-first">20:00</span><span class="time time-last">13:30</span></li>
                            <li>木　<span class="time time-first">14:00</span><span class="time time-last">18:30</span></li>
                            <li>金　<span class="time time-first">20:00</span><span class="time time-last">13:30</span></li>
                            <li>土　<span class="time time-first">20:00</span><span class="time time-last">13:30</span></li>
                            <li>日　<span class="time time-first">20:00</span><span class="time time-last">13:30</span></li>
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
}
</script>

<style scoped>

</style>
