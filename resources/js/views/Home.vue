<template>
<div
    ref="container"
    class="d-flex justify-content-center align-items-center"
    style="
            background-image: url('/assets/bg-img.jpg');
            background-size: cover;
            background-repeat: none;
        "
>
</div>
</template>

<script>
export default {
    name: 'Home',
    watch: {
        '$root.containerHeight': function (value) {
            // set te maximum height for the main container
            this.setContainerHeight(value)
        }
    },
    methods: {
        setContainerHeight: function (value) {
            console.log(value);
            this.$refs.container.style.height = value + 'px'
        }
    },
    mounted: function () {
        this.setContainerHeight(this.$root.containerHeight)
        this.$root.footerPosition = 'inherit'
    }
}
</script>

<style lang="scss">
</style>
