<template>
<news-panel
    v-if="initial"
    :is-edit="true"
    :initial="this.initial"
/>
</template>

<script>
import NewsPanel from '../components/NewsPanel.vue'

export default {
    name: 'NewsCreate',
    components: {
        NewsPanel,
    },
    data: function () {
        return {
            initial: null,
        }
    },
    methods: {
        getNews: function () {
            this.$http.get('/api/admin/news/' + this.$route.params.id).then(response => {
                console.log(response);
                this.initial = response.data.news
            })
        },
    },
    created: function () {
        this.getNews()
    },
}
</script>

<style lang="scss" scoped>
@import '~styles/shared';
</style>
