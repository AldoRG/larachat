<template>
    <li>
        <div class="d-flex bd-highlight" @click="openConversation()">
            <div class="img_cont">
                <img :src="contact.image" class="rounded-circle user_img">
                <span class="online_icon"></span>
            </div>
            <div class="user_info">
                <span>{{ contact.name }}</span>
                <p>online</p>
            </div>
        </div>
    </li>
</template>

<script>
    import { mapGetters } from "vuex";
    export default {
        name: "ContactCardUserComponent",
        props: ['user', 'contact'],
        data() {
            return {
                newConversation: {}
            }
        },
        methods: {
            openConversation() {
                this.$store.commit('CLEAR_CONVERSATION')
                this.newConversation.receiver = this.contact
                this.newConversation.user = this.user
                this.newConversation.name = this.contact.name
                this.newConversation.image = this.contact.image
                this.newConversation.receiver_id = this.contact.id
                this.newConversation.sender_id = null
                this.newConversation.sender = null
                this.newConversation.id = 0
                this.$store.commit("SELECT_CONVERSATION", this.newConversation)
                this.$store.commit("GET_CONTACT", this.newConversation)
            }
        },
        computed: {
            ...mapGetters(['contactSelected']),
        },
    }
</script>

<style scoped>
    .badge-height {
        height: 17px;
    }
</style>
