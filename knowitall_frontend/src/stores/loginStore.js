import { defineStore } from 'pinia'
import axios from '@/axios-auth';

export const useLoginStore = defineStore('login', {
  state: () => ({
    token: '',
    username: '',
    userId: '',
    usertype: '',
    loggedIn: false,
    name: '',
  
  }),
  getters: {
    requestusername: (state) => state.username,
    jwtToken: (state) => state.token,
    requestuserid: (state) => state.userId,
    requestusertype: (state) => state.usertype,
    isLoggedIn: (state) => state.loggedIn,
    requestName: (state) => state.name
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
          this.userId = res.data.id;
          this.name = res.data.name;
          this.usertype = res.data.usertype;

          this.loggedIn = true;
          resolve()
      })
      .catch((error) => reject(error));
      },
    )},
  },
})