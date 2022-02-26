<template>
    <div>
        <p class="pb-3">
            {{ categoriesSelected }}
        </p>
        <!-- 切り替えボタンの設定 -->
        <button type="button" class="p-btn p-btn__black" data-bs-toggle="modal" data-bs-target="#form-categorymodal">
            選択してください
        </button>
        <!-- モーダルの設定 -->
        <div class="modal p-modal fade" id="form-categorymodal" tabindex="-1" aria-labelledby="form-categorymodalLabel">
            <div class="modal-dialog modal-dialog-centered modal-lg">
                <div class="modal-content">
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="閉じる"></button>
                    <div class="modal-body">
                        <h2 class="p-heading2 mt-0">{{ $t('Category')}}</h2>
                        <div class="row">
                            <template v-for="(room, index) in rooms">
                                <div
                                    :key="room.id"
                                    class="col-12 mb-3"
                                >
                                    <h3>
                                        <strong>{{ room.name }}</strong>
                                    </h3>
                                </div>
                                <div
                                    v-for="(category, index2) in room.categories"
                                    :key="`${room.id}_${category.id}`"
                                    class="col-6 col-md-3"
                                >
                                    <div class="form-check p-card">
                                        <input
                                            type="checkbox"
                                            class="form-check-input"
                                            name="mst_category_ids[]"
                                            :id="`form-check__cate${index}${index2}`"
                                            :value="category.id"
                                            v-model="selected"
                                        />
                                        <label
                                            class="form-check-label"
                                            :for="`form-check__cate${index}${index2}`"
                                        >
                                            <div class="p-card2__icon">
                                                <img :src="category.icon_path" :alt="category.name">
                                            </div>
                                            {{ category.name }}
                                        </label>
                                    </div>
                                </div>
                            </template>
                        </div><!-- /. row -->
                        <button type="button" class="p-btn p-btn__defalut" data-bs-dismiss="modal">{{ $t('Close')}}</button>
                    </div><!-- /.modal-body -->
                </div><!-- /.modal-content -->
            </div><!-- /.modal-dialog -->
        </div><!-- /.modal -->
    </div><!-- /.col-12 -->
    </div>
</template>

<script>
export default {
    name: 'LessonFormCategorySelect',

    props: {
        value: {
            type: Array,
            required: true,
        },

        rooms: {
            type: Array,
            required: true,
        },
    },

    data: () => ({
        selected: [],
    }),

    created () {
        this.selected = Array.isArray(this.value) ? this.value.map(function(value) {
          return Number(value);
        }) : []
    },

    computed: {
        categories () {
            return this.rooms.reduce((sub, {categories}) => [...sub, ...categories], [])
        },

        categoriesSelected () {
            return this.categories.filter(({id}) => this.selected.includes(id)).map(({name}) => name).join('、')
        }
    },
}
</script>

<style scoped>

</style>
