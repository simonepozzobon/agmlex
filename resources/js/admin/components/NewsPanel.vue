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
            </block>
        </div>
        <div class="col-md-5">
            <block class="h-100">
                <div class="a-news-panel__image-container">
                    <div class="a-news-panel__image-placeholder">
                        <span>+</span>
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
                <button class="btn btn-primary">
                    Crea News
                </button>
            </block>
        </div>
    </div>
</div>
</template>

<script>
import Block from '../components/Block.vue'
import TextEditor from '../components/TextEditor.vue'
const debounce = require('lodash.debounce')
import {
    slugify
}
from '../../Utilities'

export default {
    name: 'NewsPanel',
    components: {
        Block,
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
        }
    },
    watch: {
        title: function (title) {
            this.slug = slugify(title)
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
        showModal: function () {

        },
        updateContent: function (json, html) {
            this.content = html
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
}
</style>
