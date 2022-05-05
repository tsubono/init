<template>
    <div class="file-upload-box">
        <FormulateInput
            type="image"
            accept="image/*"
            :uploader="uploadFile"
            @file-removed="removeFile"
            :value="[
                {
                    url: imagePath || null,
                }
            ]"
        />
        <input type="hidden" :name="name" :value="hiddenPath">
    </div>
</template>

<script>
    import axios from 'axios';

    export default {
        props: {
            name: {
                type: String,
                required: true,
            },
            uploadUrl: {
                type: String,
                default: '/api/upload-image',
            },
            uploadDir: {
                type: String,
                default: 'uploaded/lesson',
            },
            imagePath: {
                type: String,
            },
        },
        data() {
            return {
                hiddenPath: this.imagePath || null,
            }
        },
        methods: {
            async uploadFile(file, progress, error, option) {
                try {
                    const axiosInstance = axios.create();
                    const formData = new FormData();
                    formData.append('dir', this.uploadDir);
                    formData.append('img', file);
                    progress(0);
                    const { data } = await axiosInstance.post(this.uploadUrl, formData, {
                        onUploadProgress({ loaded, total }) {
                            progress(Math.round((loaded * 100) / total));
                        },
                    });
                    this.$data.hiddenPath = data.path;
                    return data;
                } catch (err) {
                    error('Unable to upload file');
                }
            },
            removeFile() {
                this.$data.hiddenPath = null;
            },
        }
    }
</script>

<style lang="scss" scoped>
    .file-upload-box {
        background-color: #EFEFEF;
        border-radius: 4px;
        display: block;
        position: relative;
        padding-bottom: 90%;
        overflow: hidden;
        background-image: url('/img/form-img-picture.svg');
        background-repeat: no-repeat;
        background-position: center;
        background-size: 120px;

        &::before {
            position: absolute;
            bottom: 0;
            left: 0;
            right: 0;
            height: 40px;
            color: #fff;
            background-color: #bababa;
            text-align: center;
            line-height: 40px;
            font-size: 14px;
        }

        &::v-deep {
            .formulate-input {
                position: absolute;
                top: 0;
                bottom: 0;
                left: 0;
                right: 0;
            }
            input[type=file] {
                cursor: pointer;
                -webkit-appearance: none;
                -moz-appearance: none;
                appearance: none;
                opacity: 0;
                position: absolute;
                left: 0;
                right: 0;
                bottom: 0;
                top: 0;
                width: 100%;
                height: 100%;
                z-index: 5;
            }
            .formulate-input-upload-area[data-has-files] input {
                display: none;
            }
            .formulate-file {
                position: absolute;
                top: 0;
                bottom: 0;
                left: 0;
                right: 0;
                display: flex;
                flex-direction: column;
                height: 100%;
            }
            .formulate-file-image-preview {
                flex: 1;
                display: flex;
                overflow: hidden;
                img {
                    flex: 1;
                    object-fit: cover;
                    width: 100%;
                }
            }
            .formulate-file-name {
                height: 40px;
                color: #fff;
                background-color: #bababa;
                text-align: center;
                line-height: 40px;
                font-size: 14px;
                width: 100%;
                overflow: hidden;
                text-overflow: ellipsis;
                white-space: nowrap;
                padding: 0 40px;
            }
            .formulate-file-remove {
                background-image: url('/img/cross.svg');
                background-repeat: no-repeat;
                background-position: center;
                background-size: 100%;
                display: block;
                width: 30px;
                height: 30px;
                position: absolute;
                cursor: pointer;
                right: 14px;
                top: 12px;
            }
            .formulate-file-progress-inner {
                background-color: #8c7afc;
                width: 1%;
                position: absolute;
                left: 0;
                bottom: 0;
                top: 0;
                z-index: 2;
            }
            .formulate-file-progress {
                position: absolute;
                left: 0;
                right: 0;
                bottom: 40px;
                background-color: #cecece;
                height: 8px;
                width: 100%;
                overflow: hidden;
                flex: 0 0 5em;
                z-index: 2;
                &[data-is-finished] {
                    height: 0;
                }
            }
        }
    }
</style>
