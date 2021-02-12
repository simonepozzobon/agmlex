<template>
    <div class="a-home">
        <div class="container">
            <div class="row mt-5 justify-content-center">
                <div class="col-md-6 text-center">
                    <a href="/admin/news" class="btn btn-primary bg-white">
                        Vai alle news
                    </a>
                    <a
                        href="/admin/professionisti"
                        class="btn btn-primary bg-white ml-3"
                    >
                        Vai ai professionisti
                    </a>
                </div>
            </div>
        </div>
    </div>
</template>

<script>
export default {
    name: "Home"
};
</script>

<style lang="scss" scoped>
@import "~styles/shared";

.back-home {
    background-color: $primary;
}
</style>
