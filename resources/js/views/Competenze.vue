<template lang="html">
    <div class="container-fluid" ref="container">
        <div class="row pt-5">
            <competenze-item
                v-for="(item, index) in this.competenze"
                :key="index"
                :title="item.title"
            />
        </div>
    </div>
</template>

<script>
import CompetenzeItem from '../components/CompetenzeItem.vue'
import competenze from '../dummies/competenze'

export default {
    name: 'Competenze',
    components: {
        CompetenzeItem,
    },
    watch: {
        '$root.containerHeight': function(value) {
            // set te maximum height for the main container
            this.setContainerHeight(value)
        }
    },
    data: function() {
        return {
            competenze: competenze,
        }
    },
    methods: {
        setContainerHeight: function(value) {
            this.$refs.container.style.minHeight = value + 'px'
        }
    },
    mounted: function() {
        this.setContainerHeight(this.$root.containerHeight)
    }
}
</script>

<style lang="css">
</style>
