<template>
<div class="a-professionals">
    <div class="row">
        <div class="col-md-6">
            <block>
                <user />
            </block>
        </div>
        <div class="col-md-6">
            <block>
                <new-user :fields="fields" />
            </block>
        </div>
    </div>
</div>
</template>

<script>
import Block from '../components/Block.vue'
import User from '../components/User.vue'
import NewUser from '../components/NewUser.vue'

export default {
    name: 'Professionisti',
    components: {
        Block,
        User,
        NewUser,
    },
    data: function () {
        return {
            professionals: [],
            fields: [],
        }
    },
    created: function () {
        this.$http.get('/api/admin/professionals').then(response => {
            console.log(response.data);
            this.professionals = response.data.professionals
            this.fields = response.data.fields
        })
    },
}
</script>

<style lang="scss" scoped>
@import '~styles/shared';

.a-professionals {
    padding: $spacer * 2;
}
</style>
