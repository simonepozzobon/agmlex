<template>
<div class="a-news container">
    <crea-news-top-bar />
    <div
        class="row"
        v-for="item in news"
        :key="news.id"
    >
        <div class="col-12">
            <block>
            </block>
        </div>
    </div>
    <crea-news-top-bar />
</div>
</template>

<script>
import CreaNewsTopBar from '../components/CreaNewsTopBar.vue'
import Block from '../components/Block.vue'

export default {
    name: 'News',
    components: {
        CreaNewsTopBar,
        Block,
    },
    data: function () {
        return {
            news: []
        }
    },
    created: function () {
        this.$http.get('/api/admin/news').then(response => {
            this.news = response.data.news
        })
    },
}
</script>

<style lang="scss" scoped>
@import '~styles/shared';
</style>
