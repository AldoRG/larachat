let getters = {
    conversations: state => {
        return state.conversations
    },
    conversation: state => {
        return state.conversation
    },
    selected: state => {
        return state.selected
    },
    messages: state => {
        return state.messages
    },
    user: state => {
        return state.user
    },
    userId: state => {
        return state.userId
    },
    contacts: state => {
        return state.contacts
    },
    contactSelected: state => {
        return state.contact
    }
}
export default getters
