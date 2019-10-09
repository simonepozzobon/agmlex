<template>
<div v-html="this.html"></div>
</template>

<script>
export default {
    name: 'HtmlComponent',
    props: {
        html: {
            type: String,
            default: null
        }
    },
}
</script>

<style lang="scss" scoped>
@import '~styles/shared';
</style>
