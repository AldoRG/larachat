<template>
    <div class="card-footer">
        <div class="input-group">
            <div class="input-group-append">
                <span class="input-group-text attach_btn"><i class="fas fa-paperclip"></i></span>
            </div>
            <textarea v-model="message" class="form-control type_msg" placeholder="Type your message..." v-on:keyup.enter="sendMessage()"></textarea>
            <div class="input-group-append">
                <span @click="sendMessage()" class="input-group-text send_btn"><i class="fas fa-location-arrow"></i></span>
            </div>
        </div>
    </div>
</template>

<script>
    import { mapGetters } from "vuex"
    export default {
        name: "FooterComponent",
        props: ['user'],
        data() {
            return {
                message: null,
                receiverId: null
            }
        },
        methods: {
            sendMessage() {
                let receiverId = this.conversation.receiver_id
                if (this.conversation.receiver_id == this.user) {
                    receiverId = this.conversation.sender_id
                }
                this.$store.dispatch("SEND_MESSAGE", {
                    'conversation_id': this.conversation.id,
                    'message': this.message,
                    'user_id': this.user,
                    'receiver_id': receiverId
                });
                this.$store.commit('ADD_MESSAGE', {
                    'user_id': this.user,
                    'message': this.message
                })
                this.message = null
            }
        },
        computed: {
            ...mapGetters(["messages", 'conversation']),
        }
    }
</script>

<style scoped>

</style>
