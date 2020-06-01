<template>
    <div class="card-header msg_head">
        <div class="d-flex bd-highlight">
            <div class="img_cont">
                <img :src="contact.image" class="rounded-circle user_img">
                <span class="online_icon"></span>
            </div>
            <div class="user_info">
                <span>{{ contact.name }}</span>
                <p>{{ this.messages.length }} Messages</p>
            </div>
            <div class="video_cam">
                <span><i class="fas fa-video"></i></span>
                <span><i class="fas fa-phone"></i></span>
            </div>
        </div>
        <span id="action_menu_btn" @click="subMenu = !subMenu"><i class="fas fa-ellipsis-v"></i></span>
        <div class="action_menu" v-show="subMenu">
            <ul>
                <li><i class="fas fa-user-circle"></i> View profile</li>
                <li><i class="fas fa-users"></i> Add to close friends</li>
                <li><i class="fas fa-plus"></i> Add to group</li>
                <li><i class="fas fa-ban"></i> Block</li>
            </ul>
        </div>
    </div>
</template>

<script>
    import { mapGetters } from "vuex"
    export default {
        name: "HeaderComponent",
        props: ['user'],
        data() {
            return {
                contact: {}
            }
        },
        computed: {
            ...mapGetters(['conversation', 'messages', 'contactSelected']),
        },
        updated() {
            if ( this.conversation.sender_id == this.user ) {
                this.contact = this.conversation.receiver
            } else {
                this.contact = this.conversation.sender
            }
        }
    }
</script>

<style scoped>

</style>
