<template>
<div class="a-user">
    <div class="a-user__image">
        <img
            :src="user.image"
            :alt="user.name"
        >
    </div>
    <div class="a-user__description">
        <div class="a-user_name">
            {{ user.name }}
        </div>
        <div class="a-user_phone">
            {{ user.phone }}
        </div>
        <div class="a-user_fields">
            {{ user.fields }}
        </div>
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
}
</script>

<style lang="scss" scoped>
@import '~styles/shared';
</style>
