<template>
<div
    class="container-fluid"
    ref="container"
>
    <div class="row pt-5">
        News
    </div>
</div>
</template>

<script>
export default {
    name: 'News',
    components: {},
    data: function () {
        return {}
    },
    watch: {
        '$root.containerHeight': function (value) {
            // set te maximum height for the main container
            this.setContainerHeight(value)
        }
    },
    methods: {
        setContainerHeight: function (value) {
            this.$refs.container.style.minHeight = value + 'px'
        }
    },
    mounted: function () {
        this.setContainerHeight(this.$root.containerHeight)
    }
}
</script>

<style lang="css">
</style>
