import { defineStore } from 'pinia'
import axios from '@/axios-auth';

export const useLoginStore = defineStore('login', {
  state: () => ({
    token: '',
    username: '',
    id: '',
    usertype: '',
    loggedIn: false,
  
  }),
  getters: {
    requestusername: (state) => state.username,
    jwtToken: (state) => state.token,
    requestuserid: (state) => state.id,
    requestusertype: (state) => state.usertype,
    isLoggedIn: (state) => state.loggedIn
  },
  actions: {
    requestLogin( username, password) {
      return new Promise((resolve, reject) => {
        axios.post('/users/login', {
          username: username,
          password: password,
      })
      .then((res)=>{ 
          console.log(res.data);
          axios.defaults.headers.common['Authorization'] = "Bearer " + res.data.jwt;
          this.username = res.data.username;
          this.token = res.data.jwt;
          this.id = res.data.id;
          this.usertype = res.data.usertype;
          this.loggedIn = true;
          alert(res.data.usertype);
          resolve()
      })
      .catch((error) => reject(error));
      },
    )},
  },
})