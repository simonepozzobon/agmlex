<template>
<div
    class="a-user"
    ref="user"
>
    <div class="a-user__image-placeholder animated-container">
        <div class="a-user__image animated-field">
            <img
                :src="user.img"
                :alt="user.name"
                class="a-user__image-src"
            >
        </div>
    </div>
    <div class="a-user__description animated-container">
        <div class="a-user__name animated-field">
            {{ user.name }}
        </div>
        <div class="a-user__phone animated-field">
            {{ user.phone }}
        </div>
        <div class="a-user__phone animated-field">
            {{ user.email }}
        </div>
    </div>
    <div
        class="a-user__fields animated-field animated-container"
        v-if="user.fields.length > 0"
    >
        <ul>
            <li
                v-for="field in user.fields"
                :key="field.id"
            >
                {{ field.name }}
            </li>
        </ul>
    </div>
    <div class="a-user__actions animated-container">
        <button
            class="btn btn-secondary animated-field"
            @click.prevent="editProfessional"
        >
            Modifica Professionista
        </button>
        <button
            class="btn btn-outline-danger animated-field"
            @click.prevent="deleteProfessional"
        >
            Elimina
        </button>
    </div>

    <new-user
        ref="newUser"
        class="a-user__new-user"
        :is-edit="true"
        :fields="fields"
        :initial="this.user"
        @undo="undoEdits"
        @update="updateProfessional"
    />
</div>
</template>

<script>
import NewUser from './NewUser.vue'
import {
    TweenMax
}
from 'gsap'

export default {
    name: 'User',
    components: {
        NewUser,
    },
    props: {
        user: {
            type: Object,
            default: function () {
                return {}
            },
        },
        fields: {
            type: Array,
            default: function () {
                return []
            }
        }
    },
    data: function () {
        return {
            master: null,
        }
    },
    methods: {
        initAnim: function () {
            let container = this.$refs.user
            let fields = container.getElementsByClassName('animated-field')
            let containers = container.getElementsByClassName('animated-container')
            let panel = container.getElementsByClassName('a-user__new-user')


            this.master = new TimelineMax({
                paused: true,
                yoyo: true,
            })

            this.master.addLabel('start', '+=0')

            this.master.fromTo(fields, .3, {
                overflow: 'auto',
                height: 'auto',
                autoAlpha: 1,
            }, {
                overflow: 'hidden',
                height: 0,
                autoAlpha: 0,
                ease: Power4.easeInOut,
            }, 'start')

            this.master.addLabel('hideContainers', '+=0')

            this.master.fromTo(containers, .3, {
                autoAlpha: 1,
                display: 'inherit',
            }, {
                autoAlpha: 0,
                display: 'none',
                ease: Power4.easeInOut
            }, 'hideContainers')

            this.master.addLabel('showPanel', '+=0')

            this.master.fromTo(panel, .3, {
                display: 'none',
                overflow: 'hidden',
                height: 0,
                autoAlpha: 0,
            }, {
                display: 'flex',
                overflow: 'auto',
                height: 'auto',
                autoAlpha: 1,
                ease: Power4.easeInOut
            }, 'showPanel')

            this.master.progress(1).progress(0)
            this.master.play()
        },
        undoEdits: function () {
            if (this.master) {
                let container = this.$refs.user
                let fields = container.getElementsByClassName('animated-field')
                let containers = container.getElementsByClassName('animated-container')
                let panel = container.getElementsByClassName('a-user__new-user')

                this.master.eventCallback('onReverseComplete', () => {
                    TweenMax.set([fields, containers, panel], {
                        clearProps: 'all',
                        onComplete: () => {
                            this.master.kill()
                        }
                    })
                })
                this.master.reverse()
            }
        },
        editProfessional: function () {
            this.$refs.newUser.setInitials()
            this.initAnim()
        },
        deleteProfessional: function () {
            let url = '/api/admin/professional/' + this.user.id
            this.$http.delete(url).then(response => {
                this.$emit('deleted', this.user.id)
            })
        },
        updateProfessional: function (professional) {
            this.$emit('update', professional)
            this.undoEdits()
        }
    },
}
</script>

<style lang="scss" scoped>
@import '~styles/shared';

.a-user {
    display: flex;
    flex-wrap: wrap;

    &__image-placeholder {
        max-width: 35%;
        flex: 1 1 35%;
    }

    &__image {
        width: 128px;
        height: 128px;
        overflow: hidden;
        position: relative;
    }

    &__image-src {
        max-width: 100%;
        position: absolute;
        left: 50%;
        top: 50%;
        transform: translate(-50%, -50%);
        @include border-radius(50%);
    }

    &__description {
        max-width: 65%;
        flex: 1 1 65%;
    }

    &__name {
        font-size: $h4-font-size;
        font-weight: bold;
        margin-bottom: $spacer / 1.618;
    }

    &__fields {
        margin-top: $spacer;
        flex: 1 1 100%;
        max-width: 100%;
    }

    &__actions {
        margin-top: $spacer;
        flex: 1 1 100%;
        max-width: 100%;
    }

    &__new-user {
        display: none;
        overflow: hidden;
        visibility: hidden;
        opacity: 0;
    }
}
</style>
