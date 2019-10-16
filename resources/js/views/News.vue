<template>
<div
    class="container-fluid"
    ref="container"
>
    <div
        class="row pt-5 news"
        v-for="news in $root.news"
        :key="news.id"
    >
        <div class="col-md-4 news__image">
            <img
                :src="news.img"
                :alt="news.title"
            />
        </div>
        <div class="col-md-8 news__description">
            <div class="news__title">
                <h2>
                    {{ news.title }}
                </h2>
            </div>
            <div class="news__divider">
                <hr>
            </div>
            <div class="news__date">
                Pubblicata il {{ news.published_at | publishedDate }}
            </div>
            <div class="news__short-description">
                <html-component :html="news.content | shortDescription" />
            </div>
            <div class="news__actions">
                <a
                    href="#"
                    @click.prevent="openNews(news.id, news.slug)"
                >
                    Leggi di più
                </a>
            </div>
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
        shortDescription: function (description) {
            return clip(description, 200, {
                html: true,
                maxLines: 5
            })
        }
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
        img {
            max-width: 100%;
        }
    }

    &__divider {}

    &__date {
        text-align: right;
        font-size: $font-size-sm;
        color: $gray-600;
    }
}
</style>
