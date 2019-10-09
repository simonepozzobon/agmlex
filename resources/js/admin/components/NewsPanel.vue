<template>
<div
    ref="form"
    class="a-news-panel container needs-validation"
    novalidate
>
    <div class="row mt-5">
        <div class="col-md-7">
            <block class="h-100">
                <div class="form-group">
                    <label for="title">
                        Titolo
                    </label>
                    <input
                        type="text"
                        class="form-control"
                        name="title"
                        v-model="title"
                    />
                </div>
                <div class="form-group">
                    <label for="slug">
                        Slug
                    </label>
                    <input
                        type="text"
                        class="form-control"
                        :class="slugIsValidClass"
                        name="slug"
                        v-model="slug"
                    />
                    <small class="form-text text-muted">
                        Parte finale dell'url della news...
                    </small>
                    <div class="invalid-feedback">
                        Lo slug esiste già
                    </div>
                </div>
                <div class="form-group">
                    <label for="published_at">Data di pubblicazione</label>
                    <datepicker
                        v-model="published_at"
                        :bootstrap-styling="true"
                    />
                </div>
            </block>
        </div>
        <div class="col-md-5">
            <block class="h-100">
                <div class="a-news-panel__image-container">
                    <div
                        class="a-news-panel__image-placeholder"
                        @click.prevent="showModal"
                    >
                        <span v-if="!hasImage">+</span>
                        <img
                            v-else
                            :src="imageSrc"
                            class="a-news-panel__image-src"
                        />
                    </div>
                    <div class="a-news-panel__image-action">
                        <button
                            class="btn btn-secondary"
                            @click.prevent="showModal"
                        >
                            Aggiungi Immagine
                        </button>
                    </div>
                </div>
            </block>
        </div>
    </div>
    <div class="row mt-4">
        <div class="col-12">
            <block>
                <div class="form-group">
                    <label for="content">Contenuto</label>
                    <text-editor @update="updateContent" />
                </div>
            </block>
        </div>
    </div>
    <div class="row mt-4 pb-5">
        <div class="col-12">
            <block>
                <button
                    class="btn btn-primary"
                    @click.prevent="sendNews"
                >
                    Crea News
                </button>
            </block>
        </div>
    </div>

    <div
        ref="addImage"
        id="add-image"
        class="modal"
        tabindex="-1"
        role="dialog"
    >
        <div
            class="modal-dialog"
            role="document"
        >
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Aggiungi Foto</h5>
                    <button
                        class="close"
                        data-dismiss="modal"
                        aria-label="close"
                    >
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <div class="input-group">
                        <div class="custom-file">
                            <input
                                type="file"
                                class="custom-file-input"
                                id="user-photo"
                                accept="image/*"
                                @change="fileChanged"
                            >
                            <label
                                for="user-photo"
                                class="custom-file-label"
                            >
                                {{ this.filePlaceholder }}
                            </label>
                        </div>
                    </div>

                </div>
                <div class="modal-footer">
                    <button
                        class="btn btn-secondary"
                        data-dismiss="modal"
                    >
                        Chiudi
                    </button>
                    <button
                        class="btn btn-primary"
                        @click.prevent="hideModal"
                    >
                        Aggiungi Foto
                    </button>
                </div>
            </div>
        </div>
    </div>
</div>
</template>

<script>
import Block from '../components/Block.vue'
import TextEditor from '../components/TextEditor.vue'
import Datepicker from 'vuejs-datepicker'
const debounce = require('lodash.debounce')
import moment from 'moment'
import {
    slugify
}
from '../../Utilities'

export default {
    name: 'NewsPanel',
    components: {
        Block,
        Datepicker,
        TextEditor,
    },
    props: {
        isEdit: {
            type: Boolean,
            default: false,
        },
    },
    data: function () {
        return {
            title: null,
            slug: null,
            content: null,
            slugIsValid: null,
            filePlaceholder: 'Scegli File',
            file: null,
            image: null,
            hasImage: false,
            published_at: null,
        }
    },
    watch: {
        title: function (title) {
            if (this.isEdit == false) {
                this.slug = slugify(title)
            }
        },
        slug: debounce(function (slug) {
            if (slug.length > 3) {
                this.checkSlug(slug)
            }
        }, 500)
    },
    computed: {
        slugIsValidClass: function () {
            if (this.slugIsValid == true) {
                return 'is-valid'
            }
            else if (this.slugIsValid == false) {
                return 'is-invalid'
            }
            else {
                return null
            }
        },
    },
    methods: {
        checkSlug: function (slug) {
            let data = new FormData()
            data.append('slug', slug)

            this.$http.post('/api/admin/news/check-slug', data).then(response => {
                if (response.data.success) {
                    this.slugIsValid = true
                }
                else {
                    this.slugIsValid = false
                }
            })
        },
        fileChanged: function (event) {
            let files = event.target.files
            if (files.length > 0) {
                // resetto le variabili per la preview della foto
                this.hasImage = false
                this.file = null
                this.$nextTick(() => {
                    // setto le variabili con il nuovo file
                    this.file = files[0]
                    this.filePlaceholder = files[0].name
                    this.$nextTick(() => {
                        // aggiungo la preview
                        this.addPreview()
                    })
                })
            }
        },
        addPreview: function () {
            let reader = new FileReader()
            let src = reader.addEventListener('load', event => {
                this.hasImage = true
                this.imageSrc = reader.result
            })

            reader.readAsDataURL(this.file)
        },
        showModal: function () {
            let modal = this.$refs.addImage
            $(modal).modal('show')
        },
        hideModal: function () {
            $(this.$refs.addImage).modal('hide')
        },
        updateContent: function (json, html) {
            this.content = html
        },
        sendNews: function () {
            let data = new FormData()
            data.append('title', this.title)
            data.append('slug', this.slug)
            data.append('file', this.file)
            data.append('content', this.content)
            data.append('published_at', moment(this.published_at).format('YYYY-MM-DD'))

            this.$http.post('/api/admin/news/create', data).then(response => {
                console.log(response.data);
            })
        },
    },
    created: function () {},
    mounted: function () {

    },
}
</script>

<style lang="scss" scoped>
@import '~styles/shared';

.a-news-panel {
    &__image-container {
        display: flex;
        flex-direction: column;
        align-items: center;
        justify-content: space-between;
        height: 100%;
    }

    &__image-placeholder {
        position: relative;
        border: 2px dashed $gray-400;
        width: 100%;
        height: 100%;
        min-height: 120px;
        @include border-radius($spacer);
        margin-bottom: $spacer;
        overflow: hidden;

        > span {
            position: absolute;
            left: 50%;
            top: 50%;
            transform: translate(-50%, -50%);
            color: $gray-400;
            font-size: $h3-font-size;
            font-weight: bold;
            cursor: pointer;
        }
    }

    &__image-src {
        position: absolute;
        max-width: 100%;
        left: 50%;
        top: 50%;
        transform: translate(-50%, -50%);
    }
}
</style>
