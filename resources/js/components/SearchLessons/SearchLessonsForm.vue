<template>
    <section class="p-searchblock bg-light l-content-block">
        <div class="container">
            <form
                class="p-form"
                @submit.prevent.stop
            >
                <h2 class="p-searchblock__all">
                    <span class="d-none d-md-inline">{{ $t('Looking for')}}</span>
                    <select
                        class="form-select"
                        v-model="formData.category"
                        @change="search"
                    >
                        <option value="">{{ $t('All category')}}</option>
                        <option
                            v-for="category in categories"
                            :key="category.id"
                            :value="category.name"
                        >
                            {{ category.name }}
                        </option>
                    </select>
                  {{ $t('Lesson.')}}
                </h2>
                <a
                    class="p-btn p-btn__outline d-md-none"
                    data-bs-toggle="collapse"
                    href="#collapseDetail"
                    role="button"
                    aria-expanded="false"
                    aria-controls="collapseDetail"
                >
                  {{ $t('Search detail')}}
                </a>
                <div
                    class="collapse"
                    id="collapseDetail"
                >
                    <div class="row">
                        <div class="col-md-6 mb-3 mb-md-4">
                            <h3 class="p-heading3">{{ $t('Adviser language')}}</h3>
                            <select
                                class="form-select"
                                v-model="formData.language"
                                @change="search"
                            >
                                <option value="">{{ $t('Not specified')}}</option>
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
                            <h3 class="p-heading3">{{ $t('Lesson name')}}</h3>
                            <input
                                type="text"
                                class="form-control"
                                placeholder=""
                                v-model="formData.room"
                                @change="search"
                            >
                        </div>
                        <div class="col-lg-3 col-6 mb-md-4">
                            <h3 class="p-heading3">
                                <span class="d-none d-md-inline">{{ $t('Adviser') }}</span>{{ $t('Country of origin') }}
                            </h3>
                            <select
                                class="form-select"
                                v-model="formData.country"
                                @change="search"
                            >
                                <option value="">{{ $t('Not specified')}}</option>
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
                                <span class="d-none d-md-inline">{{ $t('Adviser') }}</span>{{ $t('gender') }}
                            </h3>
                            <select
                                class="form-select"
                                v-model="formData.gender"
                                @change="search"
                            >
                                <option value="">{{ $t('All') }}</option>
                                <option value="男性">{{ $t('Male') }}</option>
                                <option value="女性">{{ $t('Woman') }}</option>
                            </select>
                        </div>
                        <div class="col-lg-6">
                            <h3 class="p-heading3">{{ $t('Required coins') }}</h3>
                            <div class="d-flex align-items-center">
                                <input
                                    type="number"
                                    class="form-control"
                                    placeholder=""
                                    v-model="formData.coinMin"
                                    @change="search"
                                >
                                <span class="mx-2">〜</span>
                                <input
                                    type="number"
                                    class="form-control"
                                    placeholder=""
                                    v-model="formData.coinMax"
                                    @change="search"
                                >
                            </div>
                        </div>
                    </div><!-- /.row -->
                </div><!-- /.collapse -->
            </form>
        </div>
    </section>
</template>

<script>
export default {
    name: 'SearchLessonsForm',

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
            room: '',
            country: '',
            gender: '',
            coinMin: '',
            coinMax: '',
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
