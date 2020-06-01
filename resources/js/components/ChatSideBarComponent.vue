<template>
    <div class="col-md-4 col-xl-3 chat">
        <div class="card mb-sm-3 mb-md-0 contacts_card">
            <chat-search :user="user"></chat-search>
            <div class="card-body contacts_body">
                <ul class="contacts">
                    <contact-card-user v-for="contact in contacts" :contact="contact" :key="contact.id" :user="user"></contact-card-user>
                    <contact-card v-for="conversation in conversations" :conversation="conversation" :key="conversation.id" :user="user"></contact-card>
                </ul>
            </div>
            <div class="card-footer"></div>
        </div>
    </div>
</template>

<script>
    import { mapGetters } from "vuex";
    import chatSearch from "../components/ChatSearchComponent.vue";
    import contactCard from "../components/ContactCardComponent.vue";
    import contactUserCard from "../components/ContactCardUserComponent.vue";
    export default {
        name: "ChatSideBarComponent",
        components: {
            chatSearch,
            contactCard,
            contactUserCard
        },
        props: ['user'],
        mounted() {
            this.$store.dispatch("GET_CONVERSATIONS", this.user);
        },
        computed: {
            ...mapGetters(["conversations", 'contacts']),
        }
    }
</script>

<style scoped>

</style>
