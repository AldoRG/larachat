<template>
    <div class="row justify-content-center h-100">
        <chat-sidebar :user="user"></chat-sidebar>
        <chat-conversation :user="user"></chat-conversation>
    </div>
</template>

<script>
    import chatSideBar from "../components/ChatSideBarComponent.vue";
    import chatConversation from "../components/ChatConversationComponent.vue";
    import { mapGetters } from "vuex";
    export default {
        components: {
            chatSideBar,
            chatConversation
        },
        name: "ChatAppComponent",
        data() {
            return {
                conversationId: null
            }
        },
        props: ['user'],
        mounted() {
            window.Echo.channel("newMessage.User."+this.user).listen(".new-message", e => {
                if (this.conversation && e.message.conversation_id == this.conversation.id) {
                    this.$store.commit("ADD_MESSAGE", e.message)
                } else {
                    this.$store.commit("UPDATE_CONVERSATIONS", e.message)
                    let audio = new Audio('../../../../audio/when.mp3')
                    audio.play()
                }
            });
        },
        computed: {
            ...mapGetters(["conversation"])
        }
    }
</script>

<style scoped>

</style>
