<template lang="html">
    <nav class="navbar navbar-dark navbar-expand-md bg-bg" ref="nav">
        <router-link :to="{ name: 'home' }" class="navbar-brand">
            <svg width="168px" height="29px" class="d-inline-block align-top" viewBox="0 0 168 29" version="1.1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink">
                <g id="logo" stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                    <path d="M12.624,0.2775 L15.552,0.2775 L28.177,28.1785 L24.813,28.1785 L21.568,20.8565 L6.489,20.8565 L3.205,28.1785 L0,28.1785 L12.624,0.2775 Z M20.341,18.0075 L14.048,3.9185 L7.716,18.0075 L20.341,18.0075 Z M30.7872,14.406 L30.7872,14.327 C30.7872,6.728 36.3672,0 44.6782,0 C49.3472,0 52.2372,1.346 55.0072,3.681 L52.9892,6.055 C50.8512,4.196 48.4772,2.889 44.5592,2.889 C38.4252,2.889 34.0322,8.074 34.0322,14.248 L34.0322,14.327 C34.0322,20.936 38.2672,25.843 44.9942,25.843 C48.1602,25.843 51.0892,24.617 52.9892,23.073 L52.9892,16.186 L44.5592,16.186 L44.5592,13.377 L55.9962,13.377 L55.9962,24.418 C53.4242,26.714 49.5452,28.653 44.8762,28.653 C36.1692,28.653 30.7872,22.321 30.7872,14.406 Z M63.0381,0.4755 L66.2041,0.4755 L76.2961,15.5935 L86.3871,0.4755 L89.5541,0.4755 L89.5541,28.1785 L86.4271,28.1785 L86.4271,5.7395 L76.3351,20.5795 L76.1771,20.5795 L66.0851,5.7785 L66.0851,28.1785 L63.0381,28.1785 L63.0381,0.4755 Z M97.5846,0.4755 L98.4546,0.4755 L98.4546,27.3865 L115.4726,27.3865 L115.4726,28.1785 L97.5846,28.1785 L97.5846,0.4755 Z M120.6944,0.4755 L140.0474,0.4755 L140.0474,1.2665 L121.5644,1.2665 L121.5644,13.8515 L138.3454,13.8515 L138.3454,14.6435 L121.5644,14.6435 L121.5644,27.3865 L140.2454,27.3865 L140.2454,28.1785 L120.6944,28.1785 L120.6944,0.4755 Z M155.5177,14.0891 L144.5957,0.4751 L145.6237,0.4751 L156.0327,13.4961 L166.4017,0.4751 L167.4697,0.4751 L156.5467,14.0891 L167.8647,28.1781 L166.8357,28.1781 L156.0327,14.6441 L145.2677,28.1781 L144.1997,28.1781 L155.5177,14.0891 Z" fill="#FFFFFE"></path>
                </g>
            </svg>
        </router-link>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarText" aria-controls="navbarText" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarText">
            <ul class="navbar-nav ml-auto">
                <li class="nav-item">
                    <router-link :to="{ name: 'home' }" active-class="active" class="nav-link">Homepage</router-link>
                </li>
                <li class="nav-item">
                    <router-link :to="{ name: 'professionisti' }" active-class="active" class="nav-link">Professionisti</router-link>
                </li>
                <li class="nav-item">
                    <router-link :to="{ name: 'competenze' }" active-class="active" class="nav-link">Competenze</router-link>
                </li>
            </ul>
        </div>
    </nav>
</template>

<script>
export default {
    name: 'MainNav',
    computed: {
        getNavHeight: function() {
            return this.$refs.nav.offsetHeight || 0
        },
    },
}
</script>

<style lang="css">
</style>
