<template>
<div class="a-news container">
    <crea-news-top-bar />
    <div
        class="row mt-3"
        v-for="item in news"
        :key="news.id"
    >
        <div class="col-12">
            <block>
                <div class="a-news-single">
                    <div class="a-news-single__published">
                        {{ item.published_at | publishedData }}
                    </div>
                    <div class="a-news-single__image">
                        <img
                            :src="item.img"
                            :alt="item.title"
                        >
                    </div>
                    <div class="a-news-single__title">
                        {{ item.title }}
                    </div>
                    <div class="a-news-single__actions">
                        <button class="btn btn-secondary">
                            Modifica
                        </button>
                        <button class="btn btn-danger">
                            Elimina
                        </button>
                    </div>
                </div>
            </block>
        </div>
    </div>
    <crea-news-top-bar />
</div>
</template>

<script>
import CreaNewsTopBar from '../components/CreaNewsTopBar.vue'
import Block from '../components/Block.vue'
import moment from 'moment'

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
    filters: {
        publishedData: function (date) {
            return moment(date).format('DD-MM-YYYY')
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

.a-news-single {
    display: flex;

    &__published {
        min-width: 20%;
        flex: 1 1 20%;
        padding-right: $spacer;
    }

    &__image {
        min-width: 20%;
        flex: 1 1 20%;
        padding-left: $spacer;
        padding-right: $spacer;

        img {
            max-width: 100%;
        }
    }

    &__title {
        min-width: 40%;
        flex: 1 1 40%;
        padding-left: $spacer;
        padding-right: $spacer;
    }
}
</style>
