let actions = {
    SEND_MESSAGE({commit}, message) {
        axios.post('/api/conversations/message', message)
            .then(res => {
                if (res.data === "sent")
                    console.log('ok')
            }).catch(err => {
                console.log(err)
            })
    },
    GET_CONVERSATIONS({commit}, userId) {
        axios.get('/api/conversations/'+userId)
            .then(res => {
                commit('GET_CONVERSATIONS', res.data)
            })
            .catch(err => {
                console.log(err)
            }
        )
    },
    GET_MESSAGES({commit}, conversationId) {
        axios.get(`/api/conversations/${conversationId}/messages`)
            .then(res => {
                commit('GET_MESSAGES', res.data)
            })
            .catch(err => {
                    console.log(err)
                }
            )
    },
    CLEAR_MESSAGES({commit}, data) {
        axios.get(`/api/conversations/${data.conversationId}/clear-messages/${data.userId}`)
            .then(res => {
                commit('GET_MESSAGES', res.data)
            })
            .catch(err => {
                    console.log(err)
                }
            )
    },
    FIND_CONTACTS({commit}, name) {
        axios.post(`/api/contacts`, name)
            .then(res => {
                commit('GET_CONTACTS', res.data)
            })
            .catch(err => {
                    console.log(err)
                }
            )
    }
}
export default actions
