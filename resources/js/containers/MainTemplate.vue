<template>
<div class="main-template">
    <main-nav ref="nav" />
    <router-view />
    <main-footer ref="footer" />
</div>
</template>

<script>
import MainFooter from './MainFooter.vue'
import MainNav from './MainNav.vue'
export default {
    name: 'MainTemplate',
    components: {
        MainNav,
        MainFooter,
    },
    data: function () {
        return {
            height: 0
        }
    },
    methods: {
        getItemsHeight: function () {
            let height = this.height = this.$refs.nav.getNavHeight + this.$refs.footer.getFooterHeight
            return height
        }
    },
}
</script>

<style lang="scss">
</style>
