import { defineStore } from 'pinia'

export const useUserStore = defineStore('user', {
  state: () => {
    return {
        user_data:{
            id:0,
            area_id:0,
            name: '',
            sex: '',
            description: '',
            subscription: '',
            password: '',
            password_confirmation: '',
            roles_user: []
        }
    }
  },
  mutations: {
    // doLogin(state, user_name) {
    //   state.isAuth = true;
    //   state.user_name = user_name;
    // },
    // doLogout(state) {
    //   state.isAuth = false;
    //   state.user_name = null;
    // }
  },
  actions: {
    // doLogin({ commit }, user_name) {
    //   commit("doLogin", user_name);
    // },
    // doLogout({ commit }) {
    //   commit("doLogout");
    // }
  },
})