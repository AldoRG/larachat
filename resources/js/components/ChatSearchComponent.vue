<template>
    <div class="card-header">
        <div class="input-group">
            <input v-on:keyup.enter="findContacts()" v-model="text.name" type="text" placeholder="Search..." class="form-control search">
            <div class="input-group-prepend">
                <span @click="findContacts()" class="input-group-text search_btn"><i class="fas fa-search"></i></span>
            </div>
        </div>
    </div>
</template>

<script>
    import { mapGetters } from "vuex"
    export default {
        name: "ChatSearchComponent",
        data () {
            return {
                text: {}
            }
        },
        props: ['user'],
        methods: {
            findContacts() {
                if ( typeof this.text.name !== 'undefined' && this.text.name !== '' ) {
                    this.$store.commit('CLEAR_CONVERSATIONS')
                    this.$store.commit('CLEAR_CONTACTS')
                    this.$store.dispatch('FIND_CONTACTS', this.text)
                    this.$store.commit('GET_CONVERSATIONS', this.contacts)
                } else {
                    this.$store.commit("CLEAR_CONTACTS")
                    this.$store.dispatch("GET_CONVERSATIONS", this.user)
                }
            }
        },
        computed: {
            ...mapGetters(['contacts'])
        }
    }
</script>

<style scoped>

</style>
