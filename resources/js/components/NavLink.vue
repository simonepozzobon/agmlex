<template>
<li class="nav-item">
    <a
        href="#"
        class="nav-link"
        :class="activeClass"
        @click.prevent="goTo"
    >
        {{ label }}
    </a>
</li>
</template>

<script>
export default {
    name: 'NavLink',
    props: {
        link: {
            type: String,
            default: null,
        },
        label: {
            type: String,
            default: null,
        },
    },
    data: function () {
        return {
            activeClass: null,
        }
    },
    watch: {
        '$route': function (route) {
            this.setActiveClass(route)
        },
    },
    methods: {
        setActiveClass: function (route) {
            if (route.name == this.link) {
                this.activeClass = 'active'
            }
            else {
                this.activeClass = null
            }
        },
        goTo: function () {
            this.$root.goTo(this.link)
        },
    },
    mounted: function () {
        this.$nextTick(() => {
            this.setActiveClass(this.$route)
        })
    },
}
</script>
