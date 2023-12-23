// // store.js
// import { createStore } from 'vuex';

// export default createStore({
//   state: {
//     isAuthenticated: false,
//     token: null,
//   },
//   mutations: {
//     setAuthentication(state, payload) {
//       state.isAuthenticated = payload.isAuthenticated;
//       state.token = payload.token;
//     },
//   },
//   actions: {
//     login({ commit }, token) {
//       commit('setAuthentication', { isAuthenticated: true, token });
//     },
//     logout({ commit }) {
//       commit('setAuthentication', { isAuthenticated: false, token: null });
//     },
//   },
//   getters: {
//     isAuthenticated: (state) => state.isAuthenticated,
//     getToken: (state) => state.token,
//   },
// });
