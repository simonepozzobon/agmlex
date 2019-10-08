<template>
<news-panel :is-edit="false" />
</template>

<script>
import NewsPanel from '../components/NewsPanel.vue'

export default {
    name: 'NewsCreate',
    components: {
        NewsPanel,
    },
}
</script>

<style lang="scss" scoped>
@import '~styles/shared';
</style>
