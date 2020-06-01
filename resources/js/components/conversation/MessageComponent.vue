<template>
    <div class="d-flex mb-4" :class="[ message.sender_id == user ? 'justify-content-end' : 'justify-content-start']">
        <div class="img_cont_msg" v-if="message.sender_id != user">
            <img :src="getUserImage(message.sender_id)" class="rounded-circle user_img_msg">
        </div>
        <div :class="[ message.sender_id == user ? 'msg_cotainer_send' : 'msg_cotainer']">
            {{ message.message }}
            <span class="msg_time">{{ message.created }}</span>
        </div>
        <div class="img_cont_msg" v-if="message.sender_id == user">
            <img :src="getUserImage(user)" class="rounded-circle user_img_msg">
        </div>
    </div>
</template>

<script>
    export default {
        name: "MessageComponent",
        props: ['message', 'user'],
        methods: {
            getUserImage(id) {
                return 'https://api.adorable.io/avatars/285/abott@'+id+'.png'
            }
        }
    }
</script>

<style scoped>

</style>
