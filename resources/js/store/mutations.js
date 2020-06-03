let mutations = {
    ADD_MESSAGE(state, message) {
        state.messages.push(message)
    },
    ADD_COMMING_MESSAGE(state, message) {
        state.messages.unshift(message)
    },
    GET_CONVERSATIONS(state, conversations) {
        state.conversations = conversations
    },
    CLEAR_CONVERSATIONS(state) {
        state.conversations = {}
    },
    UPDATE_CONVERSATIONS(state, message) {
        let index = state.conversations.findIndex(el => el.id == message.conversation_id);
        state.conversations[index].pivot.new_messages++;
    },
    SELECT_CONVERSATION(state, conversation) {
        state.conversation = conversation
    },
    CLEAR_CONVERSATION(state) {
        state.conversation = {}
    },
    ACTIVE_CONVERSATION(state, conversationId) {
        state.selected = conversationId
    },
    DEACTIVE_CONVERSATION(state) {
        state.selected = null
    },
    GET_MESSAGES(state, messages) {
        state.messages = messages
    },
    GET_CONTACTS(state, contacts) {
        state.contacts = contacts
    },
    GET_CONTACT(state, contact) {
        state.contact = contact
    },
    CLEAR_CONTACTS(state) {
        state.contacts = {}
    },
}
export default mutations
