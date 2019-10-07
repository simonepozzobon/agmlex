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
    props: {
        professionalsJson: {
            type: String,
            default: null,
        },
    },
    data: function () {
        return {
            height: 0
        }
    },
    watch: {
        professionals: function (professionals) {
            this.$root.professionals = professionals
        }
    },
    computed: {
        professionals: function () {},
    },
    methods: {
        getItemsHeight: function () {
            let height = this.height = this.$refs.nav.getNavHeight + this.$refs.footer.getFooterHeight
            return height
        }
    },
    mounted: function () {
        this.$root.professionals = JSON.parse(this.professionalsJson)
    },
}
</script>

<style lang="scss">
</style>
