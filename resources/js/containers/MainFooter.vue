<template>
<footer
    class="container-fluid"
    ref="footer"
>
    <div
        class="footer-divider"
        ref="divider"
    ></div>
    <div class="footer-content">
        <span class="text-primary d-block">
            AGMLEX // Via Giuseppe Palumbo 12, 00195 - Roma // <a href="#">agmlex@pec.it</a>
        </span>
        <div class="social d-flex">
            <div class="social pr-2">
                <img
                    src="/assets/Facebook.svg"
                    class="img-fluid"
                    width="24"
                />
            </div>
            <div class="social">
                <img
                    src="/assets/Twitter.svg"
                    class="img-fluid"
                    width="24"
                />
            </div>
        </div>
    </div>
</footer>
</template>

<script>
export default {
    name: 'MainFooter',
    watch: {
        '$root.footerPosition': function (value) {
            this.$refs.footer.style.position = value
        },
        '$route.name': function (value) {
            if (value == 'home') {
                this.changeBorderTop(0)
            }
            else {
                this.changeBorderTop(1)
            }
        }
    },
    computed: {
        getFooterHeight: function () {
            return this.$refs.footer.offsetHeight || 0
        },
    },
    methods: {
        changeBorderTop: function (size) {
            this.$refs.divider.style.borderTopWidth = size + 'px'
        },

    },
    mounted: function () {
        if (this.$route.name == 'home') {
            this.changeBorderTop()
        }
    }
}
</script>

<style lang="scss">
@import '~styles/functions';
@import '~styles/variables';
@import '~styles/mixins';

footer {
    bottom: 0;
    background-color: $white;

    .footer-divider {
        border-top: 1px solid $primary;
    }

    .footer-content {
        display: flex;
        justify-content: space-between;
        align-items: center;
        padding-top: $spacer;
        padding-bottom: $spacer;
    }
}
</style>
