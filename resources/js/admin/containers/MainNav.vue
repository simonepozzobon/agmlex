<template>
<nav class="navbar navbar-light navbar-expand-md navigation-clean bg-light">
    <div class="container-fluid">
        <a
            href="#"
            class="navbar-brand"
        >
            Pannello Amministrazione
        </a>
        <button
            data-toggle="collapse"
            data-target="#navcol-1"
            class="navbar-toggler"
        >
            <span class="sr-only">Toggle navigation</span><span class="navbar-toggler-icon"></span>
        </button>
        <div
            class="collapse navbar-collapse"
            id="navcol-1"
        >
            <ul class="nav navbar-nav ml-auto">
                <li
                    role="presentation"
                    class="nav-item"
                >
                    <a
                        href="#"
                        class="nav-link active"
                        @click.prevent="$root.goTo('news')"
                    >
                        News
                    </a>
                </li>
                <li
                    role="presentation"
                    class="nav-item"
                >
                    <a
                        href="#"
                        class="nav-link"
                        @click.prevent="$root.goTo('professionisti')"
                    >
                        Professionisti
                    </a>
                </li>
            </ul>
        </div>
    </div>
</nav>
</template>

<script>
export default {
    name: 'MainNav',
}
</script>

<style lang="scss" scoped>
@import '~styles/shared';
</style>
