<template>
<div class="a-block">
    <slot></slot>
</div>
</template>

<script>
export default {
    name: 'Block',
}
</script>

<style lang="scss" scoped>
@import '~styles/shared';

.a-block {
    @include border-radius($spacer / 2);
    background-color: $gray-200;
    padding: $spacer * 2;
}
</style>
