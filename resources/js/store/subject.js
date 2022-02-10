import axios from 'axios'

const state = {
    userDetal:''
}

const getters= {
    getUser(state) {
        const user = localStorage.getItem("user");
        if (user) {
            return state.userDetal = JSON.parse(user);
        }
    }
}

const actions = {
    
    addsubject({ getters }, credentials) {
    axios.defaults.headers.common.Authorization = `${getters.getUser.token}`
        return axios
            .post('api/subject', credentials)
            .then(({ data }) => {
                return data
            })
    },
    getsubject({ getters }, credentials) {
    axios.defaults.headers.common.Authorization = `${getters.getUser.token}`
        return axios
            .get('api/subject/'+ getters.getUser.user_id)
            .then(({ data }) => {
                return data
        })
    },
};
// })
  
export default {
    namespaced: true,
    actions,
    state,
    getters
  };