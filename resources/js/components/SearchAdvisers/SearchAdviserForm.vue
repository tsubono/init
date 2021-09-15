<template>
    <section class="p-searchblock bg-light l-content-block">
        <div class="container">
            <form
                class="p-form"
                @submit.prevent.stop
            >
                <h2 class="p-searchblock__all">
                    <span class="d-none d-md-inline">探しているのは</span>
                    <select
                        class="form-select"
                        v-model="formData.category"
                        @change="search"
                    >
                        <option selected>すべてのカテゴリ</option>
                    </select>
                    の講師。
                </h2>
                <a
                    class="p-btn p-btn__outline d-md-none"
                    data-bs-toggle="collapse"
                    href="#collapseDetail"
                    role="button"
                    aria-expanded="false"
                    aria-controls="collapseDetail"
                >
                    詳細検索
                </a>
                <div
                    class="collapse"
                    id="collapseDetail"
                >
                    <div class="row">
                        <div class="col-md-6 mb-3 mb-md-4">
                            <h3 class="p-heading3">アドバイザーが話せる言語</h3>
                            <select
                                class="form-select"
                                v-model="formData.language"
                                @change="search"
                            >
                                <option value="">指定しない</option>
                                <option
                                    v-for="language in languages"
                                    :key="language.id"
                                    :value="language.name"
                                >
                                    {{ language.name }}
                                </option>
                            </select>
                        </div>
                        <div class="col-md-6 mb-3 mb-md-4">
                            <h3 class="p-heading3">アドバイザー名</h3>
                            <input
                                type="text"
                                class="form-control"
                                placeholder="記入してください"
                                v-model="formData.name"
                                @change="search"
                            >
                        </div>
                        <div class="col-lg-3 col-6 mb-md-4">
                            <h3 class="p-heading3">
                                <span class="d-none d-md-inline">アドバイザーの</span>出身国
                            </h3>
                            <select
                                class="form-select"
                                v-model="formData.country"
                                @change="search"
                            >
                                <option value="">指定しない</option>
                                <option
                                    v-for="country in countries"
                                    :key="country.id"
                                    :value="country.name"
                                >
                                    {{ country.name }}
                                </option>
                            </select>
                        </div>
                        <div class="col-lg-3 col-6 mb-md-4">
                            <h3 class="p-heading3">
                                <span class="d-none d-md-inline">アドバイザーの</span>居住国
                            </h3>
                            <select
                                class="form-select"
                                v-model="formData.residenceCountry"
                                @change="search"
                            >
                                <option value="">指定しない</option>
                                <option
                                    v-for="country in countries"
                                    :key="country.id"
                                    :value="country.name"
                                >
                                    {{ country.name }}
                                </option>
                            </select>
                        </div>
                        <div class="col-lg-3 col-6">
                            <h3 class="p-heading3">
                                <span class="d-none d-md-inline">アドバイザーの</span>年齢
                            </h3>
                            <select class="form-select">
                                <option selected>すべて</option>
                            </select>
                        </div>
                        <div class="col-lg-3 col-6">
                            <h3 class="p-heading3">
                                <span class="d-none d-md-inline">アドバイザーの</span>性別
                            </h3>
                            <select
                                class="form-select"
                                v-model="formData.gender"
                                @change="search"
                            >
                                <option value="">すべて</option>
                                <option value="男性">男性</option>
                                <option value="女性">女性</option>
                            </select>
                        </div>
                    </div><!-- /.row -->
                </div><!-- /.collapse -->

            </form>
        </div>
    </section>
</template>

<script>
export default {
    name: 'SearchAdviserForm',

    props: {
        searchParams: {
            type: Object,
            required: true,
        },

        categories: {
            type: Array,
            required: true,
        },

        languages: {
            type: Array,
            required: true,
        },

        countries: {
            type: Array,
            required: true,
        },
    },

    data: () => ({
        formData: {
            category: '',
            language: '',
            name: '',
            country: '',
            residenceCountry: '',
            gender: '',
        },
    }),

    watch: {
        searchParams: {
            handler () {
                this.formData = this.searchParams
            },
            immediate: true
        },
    },

    methods: {
        search () {
            this.$emit('search', this.formData)
        },
    },
}
</script>
