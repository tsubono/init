<template>
    <div>
        <p class="pb-3">
            {{ languageSelected }}
        </p>
         <!-- 切り替えボタンの設定 -->
        <button type="button" class="p-btn p-btn__black" data-bs-toggle="modal" data-bs-target="#form-languagemodal">
          {{ $t('Please select')}}
        </button>
        <!-- モーダルの設定 -->
        <div class="modal p-modal fade" id="form-languagemodal" tabindex="-1" aria-labelledby="form-languagemodalLabel">
            <div class="modal-dialog modal-dialog-centered modal-lg">
                <div class="modal-content">
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="閉じる"></button>
                    <div class="modal-body">
                        <h2 class="p-heading2 mt-0">{{ $t('Language')}}</h2>
                        <div class="row">
                            <div
                                v-for="(language, index) in languages"
                                class="col-md-4"
                            >
                                <div class="form-check">
                                    <input
                                        type="radio"
                                        class="form-check-input"
                                        name="mst_language_id"
                                        :id="`form-check__language${index}`"
                                        :value="language.id"
                                        v-model="selected"

                                    />
                                    <label
                                        class="form-check-label"
                                        :for="`form-check__language${index}`"
                                    >
                                        {{ language.name_locale }}
                                    </label>
                                </div>
                            </div>
                        </div><!-- /. row -->
                        <button type="button" class="p-btn p-btn__defalut" data-bs-dismiss="modal">{{ $t('Close')}}</button>
                    </div><!-- /.modal-body -->
                </div><!-- /.modal-content -->
            </div><!-- /.modal-dialog -->
        </div><!-- /.modal -->
    </div>
</template>

<script>
export default {
    name: 'LessonFormLanguageSelect',

    props: {
        languages: {
            type: Array,
            required: true,
        },
        value: {
            type: Number,
            required: true,
        },
    },

    data: () => ({
        selected: null,
    }),

    created () {
        this.selected = Number(this.value)
    },

    computed: {
        languageSelected () {
            return this.languages.find(({id}) => id === this.selected)?.name_locale
        },
    },
}
</script>
