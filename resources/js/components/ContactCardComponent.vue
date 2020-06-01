<template>
    <li :class="{ active: selected == conversation.id }">
        <div class="d-flex bd-highlight" @click="openConversation(conversation)">
            <div class="img_cont">
                <img :src="contact.image" class="rounded-circle user_img">
                <span class="online_icon"></span>
            </div>
            <span v-if="conversation.new_messages > 0" class="badge badge-light badge-height">{{ conversation.new_messages }}</span>
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
        name: "ContactCardComponent",
        props: ["conversation", 'user'],
        data() {
            return {
                contact: {}
            }
        },
        methods: {
            openConversation(conversation) {
                if (conversation.new_messages > 0) {
                    conversation.new_messages = 0
                    this.$store.dispatch('CLEAR_MESSAGES', conversation.id)
                }
                this.$store.commit("SELECT_CONVERSATION", conversation)
                this.$store.commit("ACTIVE_CONVERSATION", conversation.id)
                this.$store.dispatch("GET_MESSAGES", conversation.id)
            }
        },
        computed: {
            ...mapGetters(["selected"]),
        },
        mounted() {
            if ( this.conversation.sender_id == this.user ) {
                this.contact = this.conversation.receiver
            } else {
                this.contact = this.conversation.sender
            }
        }
    }
</script>

<style scoped>
    .badge-height {
        height: 17px;
    }
</style>
