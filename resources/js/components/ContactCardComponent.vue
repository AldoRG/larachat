<template>
    <li :class="{ active: selected == conversation.id }">
        <div class="d-flex bd-highlight" @click="openConversation(conversation)">
            <div class="img_cont">
                <img :src="contact.image" class="rounded-circle user_img">
                <span class="online_icon"></span>
            </div>
            <span v-if="conversation.pivot.new_messages > 0" class="badge badge-light badge-height">{{ conversation.pivot.new_messages }}</span>
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
                if (conversation.pivot.new_messages > 0) {
                    conversation.pivot.new_messages = 0
                    this.$store.dispatch('CLEAR_MESSAGES', { conversationId: conversation.id, userId: this.user})
                }
                this.$store.commit("SELECT_CONVERSATION", conversation)
                this.$store.commit("GET_CONTACT", conversation)
                this.$store.commit("ACTIVE_CONVERSATION", conversation.id)
                this.$store.dispatch("GET_MESSAGES", conversation.id)
            }
        },
        computed: {
            ...mapGetters(["selected"]),
        },
        mounted() {
            this.contact = this.conversation
        }
    }
</script>

<style scoped>
    .badge-height {
        height: 17px;
    }
</style>
