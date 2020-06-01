<template>
    <div id="conver-body" class="card-body msg_card_body" v-if="messages.length > 0">
        <message-bubble v-for="message in messages" :message="message" :key="message.id" :user="user"></message-bubble>
    </div>
    <div class="card-body msg_card_body user_info" v-else>
        <span>No messages in this conversation yet</span>
    </div>
</template>

<script>
    import messageBubble from "../conversation/MessageComponent"
    import { mapGetters } from "vuex"
    export default {
        components: {
            messageBubble
        },
        props: ['user'],
        name: "BodyComponent",
        updated() {
            //let container = this.$el.querySelector("#conver-body");
            //container.scrollTop = container.scrollHeight;
        },
        computed: {
            ...mapGetters(["messages"]),
        }
    }
</script>

<style scoped>

</style>
