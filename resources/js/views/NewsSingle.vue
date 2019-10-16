<template>
<div
    class="container-fluid"
    ref="container"
>
    <div
        class="row pt-5 news"
        v-if="news"
    >
        <div class="col-12 news__title">
            <h1>{{ this.news.title }}</h1>
        </div>
        <div class="col-12">
            <hr>
        </div>
        <div class="col-12 news__date">
            Pubblicata il {{ this.news.published_at | publishedDate }}
        </div>
        <div class="col-12 news__image">
            <img
                :src="this.news.img"
                :alt="this.news.title"
            >
        </div>
        <div class="col-12 news_content">
            <html-component :html="this.news.content" />
        </div>
    </div>
</div>
</template>

<script>
import HtmlComponent from '../components/HtmlComponent.vue'
import moment from 'moment'
const clip = require('text-clipper')

export default {
    name: 'News',
    components: {
        HtmlComponent,
    },
    data: function () {
        return {
            news: null
        }
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
        },
        getNews: function () {
            let url = '/api/news/' + this.$route.params.slug
            this.$http.get(url).then(response => {
                this.news = response.data.news
            })
        },
        openNews: function (id, slug) {
            this.$root.goToWithParams('news-single', {
                slug: slug
            })
        }
    },
    filters: {
        publishedDate: function (date) {
            return moment(date).format('DD-MM-YYYY')
        },
    },
    created: function () {
        this.getNews()
    },
    mounted: function () {
        this.setContainerHeight(this.$root.containerHeight)
    }
}
</script>

<style lang="scss" scoped>
@import '~styles/shared';

.news {
    padding: $spacer;

    &__image {
        margin-bottom: $spacer * 1.618;
        img {
            min-width: 100%;
            max-width: 100%;
        }
    }

    &__divider {}

    &__date {
        text-align: right;
        font-size: $font-size-sm;
        color: $gray-600;
        margin-bottom: $spacer * 1.618;
    }
}
</style>
