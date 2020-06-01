<template>
    <div class="col-md-8 col-xl-6 chat">
        <div class="card">
            <conversation-header v-if="conversation" :user="user"></conversation-header>
            <conversation-body v-if="conversation" :user="user"></conversation-body>
            <conversation-footer v-if="conversation" :user="user"></conversation-footer>
        </div>
    </div>

</template>

<script>
    import conversationHeader from "../components/conversation/HeaderComponent"
    import conversationBody from "../components/conversation/BodyComponent"
    import conversationFooter from "../components/conversation/FooterComponent"
    import { mapGetters } from "vuex"
    export default {
        components: {
            conversationHeader,
            conversationBody,
            conversationFooter
        },
        props: ['user'],
        name: "ChatConversationComponent",
        computed: {
            ...mapGetters(["conversation"]),
        }
    }
</script>

<style scoped>

</style>
