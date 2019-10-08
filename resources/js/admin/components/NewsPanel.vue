<template>
<div class="a-news-panel container">
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
                        name="slug"
                        v-model="slug"
                    />
                    <small>Indirizzo della news...</small>
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
                    <label for="content">Descrizione</label>
                    <textarea
                        name="content"
                        class="form-control"
                        v-model="content"
                    ></textarea>
                </div>
            </block>
        </div>
    </div>
</div>
</template>

<script>
import Block from '../components/Block.vue'

export default {
    name: 'NewsPanel',
    components: {
        Block,
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
        }
    },
    methods: {
        showModal: function () {

        },
    },
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
