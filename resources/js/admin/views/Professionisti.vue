<template>
<div class="a-users">
    <div class="row">
        <div class="col-md-6">
            <block>
                <user />
            </block>
        </div>
    </div>
</div>
</template>

<script>
import Block from '../components/Block.vue'
import User from '../components/User.vue'

export default {
    name: 'Professionisti',
    components: {
        Block,
        User,
    },
    data: function () {
        return {
            users: []
        }
    },
    created: function () {
        this.$http.get('/api/admin/users').then(response => {
            console.log(response.data);
            this.users = response.data.users
        })
    },
}
</script>

<style lang="scss" scoped>
@import '~styles/shared';

.a-users {
    padding: $spacer * 2;
}
</style>
