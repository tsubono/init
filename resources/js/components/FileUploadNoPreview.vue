<template>
  <div>
    <label class="p-input-file px-100px">
      <input type="file" @change="onSelect">
      <span>{{ $t('select file')}}</span>
    </label>
    <input type="hidden" :name="nameFilePath" :value="filePath" />
    <input type="hidden" :name="nameFileName" :value="fileName" />
    <div v-if="msg">
      <span class="p-error-text">{{ msg }}</span>
    </div>
    {{ fileName }}
  </div>
</template>

<script>
export default {
  name: 'FileUploadNotPreview',
  props: {
    nameFilePath: {
      type: String,
      required: true,
    },
    nameFileName: {
      type: String,
      required: true,
    },
    valueFilePath: {
      type: String,
      default: null,
    },
    valueFileName: {
      type: String,
      default: null,
    },
    uploadUrl: {
      type: String,
      default: '/api/upload-image',
    },
    uploadDir: {
      type: String,
      default: 'uploaded/file',
    },
  },
  created () {
    this.filePath = this.valueFilePath
    this.fileName = this.valueFileName
  },
  data () {
    return {
      msg: null,
      filePath: null,
      fileName: null,
    }
  },
  methods: {
    onSelect (event) {
      this.filePath = null
      this.fileName = null
      this.msg = null

      let fileList = event.target.files || event.dataTransfer.files
      // ファイルが無い時は処理を中止
      if (!fileList.length || !fileList[0].type.match('image.*')) {
        this.msg = $t('The file format is invalid.')
        return false
      }
      // ファイルサイズチェック
      if(fileList[0].size > 8000000){
        this.msg = $t('The size of the image that can be uploaded at one time has been exceeded.')
        return false
      }

      // ファイルデータ送信
      let formData = new FormData()
      formData.append('img', fileList[0])
      formData.append('dir', this.uploadDir)
      let self = this.$data
      fetch(this.uploadUrl, {
        method: 'POST',
        body: formData,
      }).then(function (response) {
        return response.clone().json()
      }).then(function (json) {
        if (json.status === 'ok') {
          self.filePath = json.path
          self.fileName = json.name
        }
      })
    },
    onDelete () {
      this.filePath = null
      this.fileName = null
    }
  }
}
</script>