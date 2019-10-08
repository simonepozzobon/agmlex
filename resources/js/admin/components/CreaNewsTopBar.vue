<template>
<div class="row mt-3">
    <div class="col-12">
        <block>
            <button
                class="btn btn-primary"
                @click.prevent="$root.goTo('news-nuova')"
            >
                Crea News
            </button>
        </block>
    </div>
</div>
</template>

<script>
import Block from './Block.vue'
export default {
    name: 'CreaNewsTopBar',
    components: {
        Block,
    },
}
</script>

<style lang="scss" scoped>
@import '~styles/shared';
</style>
