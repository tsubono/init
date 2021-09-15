<template>
    <div>
        <p class="pb-3">
            {{ languagesSelected }}
        </p>

        <button type="button" class="p-btn p-btn__black" data-bs-toggle="modal" data-bs-target="#form-languagemodal">
            選択してください
        </button>

        <div class="modal p-modal fade" id="form-languagemodal" tabindex="-1" aria-labelledby="form-languagemodalLabel">
            <div class="modal-dialog modal-dialog-centered modal-lg">
                <div class="modal-content">
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="閉じる"></button>
                    <div class="modal-body">
                        <h2 class="p-heading2">教えられる言語</h2>
                        <div class="row">
                            <div
                                v-for="(language, index) in languages"
                                class="col-md-4"
                            >
                                <div class="form-check">
                                    <input type="checkbox"
                                           class="form-check-input"
                                           name="mst_language_ids[]"
                                           id="`form-check__language${index}`"
                                           :value="language.id"
                                           v-model="selected"
                                    />
                                    <label
                                        class="form-check-label"
                                        :for="`form-check__language${index}`"
                                    >
                                        {{ language.name }}
                                    </label>
                                </div>
                            </div>
                        </div><!-- /. row -->
                        <button type="button" class="p-btn p-btn__defalut" data-bs-dismiss="modal">閉じる</button>
                    </div><!-- /.modal-body -->
                </div><!-- /.modal-content -->
            </div><!-- /.modal-dialog -->
        </div><!-- /.modal -->
    </div>
</template>

<script>
export default {
    name: 'LessonFormLanguageSelectMulti',

    props: {
        value: {
            type: Array,
            required: true,
        },

        languages: {
            type: Array,
            required: true,
        },
    },

    data: () => ({
        selected: [],
    }),

    created () {
        this.selected = Array.isArray(this.value) ? this.value : []
    },

    computed: {
        languagesSelected () {
            return this.languages.filter(({id}) => this.selected.includes(id)).map(({name}) => name).join('、')
        }
    },
}
</script>
