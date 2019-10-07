<template>
<div class="form-check">
    <input
        type="checkbox"
        class="form-check-input"
        :id="'field-' + field.id"
        v-model="value"
    >
    <label
        :for="'field-' +field.id"
        class="form-check-label"
    >
        {{ field.name }}
    </label>
</div>
</template>

<script>
export default {
    name: 'FieldSelector',
    props: {
        field: {
            type: Object,
            default: function () {
                return {}
            },
        },
    },
    data: function () {
        return {
            value: false,
        }
    },
    watch: {
        value: function (value) {
            this.$emit('update', value, this.field.id)
        }
    },
}
</script>

<style lang="scss" scoped>
@import '~styles/shared';

.form-check {
    display: flex;
    align-items: flex-start;
}

.form-check-input {
    margin-top: 2px;
    display: inline-block;
}

.form-check-label {
    margin-left: $spacer * 1.618;
    font-size: $font-size-sm;
    display: inline-block;
    color: $gray-800;
}
</style>
