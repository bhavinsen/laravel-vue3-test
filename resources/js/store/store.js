
import Vuex from 'vuex'
import axios from 'axios'
import subject from './subject'
// axios.defaults.baseURL = 'http://127.0.0.1:8000/api'

export default new Vuex.Store({
    state: {
      user: null
    },
  
    mutations: {
      setUserData (state, userData) {
        state.user = userData
        localStorage.setItem('user', JSON.stringify(userData))
      },
  
      clearUserData () {
        localStorage.removeItem('user')
        location.reload()
      }
    },
    created () { this.setup() },
  
   
    actions: {
      login ({ commit }, credentials) {
        return axios
          .post('api/login', credentials)
          .then(({ data }) => {
            commit('setUserData', data)
          })
      },
  
      logout ({ commit }) {
        commit('clearUserData')
      }
    },
  
    getters: {
        isLogged: state => !!state.user
  },
  modules:{
    subject:subject
  },
  })
  
  