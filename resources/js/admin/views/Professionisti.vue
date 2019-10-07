<template>
<div class="a-professionals">
    <div class="row">
        <div
            class="col-md-6"
            v-for="professional in this.professionals"
            :key="professional.id"
        >
            <block>
                <user
                    :user="professional"
                    :fields="fields"
                    @deleted="deletedProfessional"
                />
            </block>
        </div>
        <div class="col-md-6">
            <block>
                <new-user
                    :fields="fields"
                    @added="addedProfessional"
                />
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
    methods: {
        deletedProfessional: function (id) {
            let idx = this.professionals.findIndex(professional => professional.id == id)
            if (idx > -1) {
                this.professionals.splice(idx, 1)
            }
        },
        addedProfessional: function (professional) {
            this.professionals.push(professional)
        },
    },
    created: function () {
        this.$http.get('/api/admin/professionals').then(response => {
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

    .col-md-6 {
        margin-bottom: $spacer * 1.618;
    }
}
</style>
