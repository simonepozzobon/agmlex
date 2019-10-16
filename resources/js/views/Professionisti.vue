<template>
<div
    class="container-fluid"
    ref="container"
>
    <div class="row pt-5">
        <professionisti-item
            v-for="(item, index) in this.$root.professionals"
            :key="index"
            :img="item.img"
            :name="item.name"
            :mail="item.email"
            :phone="item.phone"
            :fields="item.fields"
        />
    </div>
</div>
</template>

<script>
import ProfessionistiItem from '../components/ProfessionistiItem.vue'

export default {
    name: 'Professionisti',
    components: {
        ProfessionistiItem,
    },
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
