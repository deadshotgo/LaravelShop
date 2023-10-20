import api from "@/api/api";

const state = {
  token: localStorage.getItem('token'),
  role: localStorage.getItem('role')
};
const getters = {
  TOKEN: (state) => {
    return state.token;
  },
  ROLE: (state) => {
    return state.role;
  },
};
const mutations = {
  SET_LOGIN: (state, payload) => {
    localStorage.setItem('token', payload.token)
    localStorage.setItem('role', payload.role)
    state.token = payload.token
    state.role = payload.role
  },
};
const actions = {
  GET_LOGIN: async (context, payload) => {
    const data = await api.post(`/login`, payload);
    await context.commit("SET_LOGIN", data.data);
  },
};

export default {
  state,
  getters,
  mutations,
  actions,
};
