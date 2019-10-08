<template>
<div class="a-new-user">
    <div class="a-new-user__image">
        <div
            class="a-new-user__image-placeholder"
            @click.prevent="showModal"
        >
            <span v-if="!hasImage">+</span>
            <img
                v-else
                :src="imageSrc"
                class="a-new-user__image-src"
            >
        </div>
        <button
            class="btn btn-primary a-new-user__add-photo"
            @click.prevent="showModal"
        >
            {{ addImageBtn }}
        </button>
    </div>
    <div class="a-new-user__description">
        <div class="a-new-user_name">
            <div class="form-group">
                <label for="name">Nome e Cognome</label>
                <input
                    type="text"
                    name="name"
                    v-model="name"
                    class="form-control"
                >
            </div>
        </div>
        <div class="a-new-user__phone">
            <div class="form-group">
                <label for="phone">Telefono</label>
                <input
                    type="text"
                    name="phone"
                    v-model="phone"
                    class="form-control"
                >
            </div>
        </div>
        <div class="a-new-user__email">
            <div class="form-group">
                <label for="email">Email</label>
                <input
                    type="text"
                    name="email"
                    v-model="email"
                    class="form-control"
                >
            </div>
        </div>
    </div>
    <div class="a-new-user__fields">
        <div class="form-group">
            <label for="title">Competenze</label>
            <div
                class="a-new-user__field"
                v-for="field in fields"
                :key="field.id"
            >
                <field-selector
                    ref="fieldSelector"
                    :field="field"
                    @update="updateFields"
                />
            </div>
        </div>
    </div>
    <div class="a-new-user__actions">
        <button
            class="btn btn-primary"
            @click.prevent="createProfessional"
        >
            {{ saveBtn }}
        </button>
        <button
            class="btn btn-secondary"
            v-if="this.isEdit"
            @click.prevent="undoEdits"
        >
            Annulla
        </button>
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
import $ from 'jquery'
import FieldSelector from './FieldSelector.vue'

export default {
    name: 'User',
    components: {
        FieldSelector,
    },
    props: {
        fields: {
            type: Array,
            default: function () {
                return []
            },
        },
        isEdit: {
            type: Boolean,
            default: false
        },
        initial: {
            type: Object,
            default: function () {
                return {}
            },
        },
    },
    data: function () {
        return {
            name: null,
            phone: null,
            email: null,
            file: null,
            filePlaceholder: 'Scegli File',
            image: null,
            hasImage: false,
            professionalFields: [],
        }
    },
    watch: {
        initial: function () {
            this.setInitials()
            console.log('set initials');
        },
    },
    computed: {
        addImageBtn: function () {
            if (this.file) {
                return 'Modifica Foto'
            }
            else {
                return 'Aggiungi Foto'
            }
        },
        saveBtn: function () {
            if (this.isEdit) {
                return 'Salva Modifiche'
            }
            else {
                return 'Aggiungi Professionista'
            }
        },
    },
    methods: {
        setInitials: function () {
            if (this.isEdit) {
                this.name = this.initial.name
                this.phone = this.initial.phone
                this.email = this.initial.email

                // set initial values of fieldSelectors
                if (this.initial.fields.length > 0) {
                    let fieldSelectors = this.$refs.fieldSelector
                    for (let i = 0; i < this.initial.fields.length; i++) {
                        let fieldID = this.initial.fields[i].id

                        let idx = fieldSelectors.findIndex(selector => selector.field.id == fieldID)

                        if (idx > -1) {
                            fieldSelectors[idx].value = true
                        }
                    }
                }

                this.hasImage = true
                this.imageSrc = this.initial.img
            }
        },
        showModal: function () {
            let modal = this.$refs.addImage
            $(modal).modal('show')
        },
        hideModal: function () {
            $(this.$refs.addImage).modal('hide')
        },
        updateFields: function (value, id) {
            this.professionalFields[id] = value
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
        resetForm: function () {
            return new Promise((resolve, reject) => {
                this.name = null
                this.phone = null
                this.hasImage = false
                this.file = null
                resolve()
            })
        },
        undoEdits: function () {
            this.resetForm().then(() => {
                this.$emit('undo')
            })
        },
        createProfessional: function () {
            let data = new FormData()

            data.append('name', this.name)
            data.append('phone', this.phone)
            data.append('email', this.email)
            data.append('file', this.file)
            data.append('fields', JSON.stringify(this.professionalFields))

            if (this.isEdit == true) {
                data.append('id', this.initial.id)

                this.$http.post('/api/admin/edit-professional', data).then(response => {
                    if (response.data.success) {
                        this.resetForm().then(() => {
                            this.$emit('update', response.data.professional)
                        })
                    }
                })
            }
            else {
                this.$http.post('/api/admin/new-professional', data).then(response => {
                    if (response.data.success) {
                        this.resetForm().then(() => {
                            this.$emit('added', response.data.professional)
                        })
                    }
                })
            }
        },
    },
    mounted: function () {
        this.setInitials()
    },
}
</script>

<style lang="scss" scoped>
@import '~styles/shared';

.a-new-user {
    display: flex;
    flex-wrap: wrap;

    &__image {
        min-width: 40%;
        flex: 1 1 40%;
        display: flex;
        flex-direction: column;
        justify-content: space-between;
        align-items: flex-start;
    }

    &__image-placeholder {
        position: relative;
        overflow: hidden;
        width: 128px;
        height: 128px;
        @include border-radius(50%);
        border: 2px dashed $gray-400;
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

    &__image-src {
        position: absolute;
        left: 50%;
        top: 50%;
        max-width: 100%;
        transform: translate(-50%, -50%);
    }

    &__add-photo {
        margin-bottom: $spacer;
    }

    &__description {
        min-width: 60%;
        flex: 1 1 60%;
    }

    &__fields {
        min-width: 100%;
        flex: 1 1 100%;
        margin-bottom: $spacer;
    }

    &__actions {
        min-width: 100%;
        flex: 1 1 100%;
    }

    .modal-dialog {
        background-color: $light;
    }
}
</style>
