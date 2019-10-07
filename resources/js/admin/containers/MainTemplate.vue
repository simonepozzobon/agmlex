<template>
<div class="a-main-template">
    <main-nav />
    <router-view />
</div>
</template>

<script>
import MainNav from './MainNav.vue'
export default {
    name: 'MainTemplate',
    components: {
        MainNav,
    },
}
</script>

<style lang="scss" scoped>
@import '~styles/shared';
.a-main-template {
    @include gradient-directional(#E1BB9C, #52638D, 45deg);
    min-height: 100vh;
}
</style>
