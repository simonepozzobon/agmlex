<template>
<div class="a-user">
    <div class="a-user__image-placeholder">
        <div class="a-user__image">
            <img
                :src="user.img"
                :alt="user.name"
                class="a-user__image-src"
            >
        </div>
    </div>
    <div class="a-user__description">
        <div class="a-user__name">
            {{ user.name }}
        </div>
        <div class="a-user__phone">
            {{ user.phone }}
        </div>
    </div>
    <div
        class="a-user__fields"
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
    <div class="a-user__actions">
        <button class="btn btn-secondary">
            Modifica Professionista
        </button>
        <button
            class="btn btn-outline-danger"
            @click.prevent="deleteProfessional"
        >
            Elimina
        </button>
    </div>
</div>
</template>

<script>
export default {
    name: 'User',
    props: {
        user: {
            type: Object,
            default: function () {
                return {}
            },
        },
    },
    methods: {
        deleteProfessional: function () {
            let url = '/api/admin/professional/' + this.user.id
            this.$http.delete(url).then(response => {
                this.$emit('deleted', this.user.id)
            })
        },
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
}
</style>
