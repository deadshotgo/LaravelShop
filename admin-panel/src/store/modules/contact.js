import api from "@/api/api";
import { createFilterObject } from "@/utils/createFilterObject";

const state = {
  contacts: [],
};
const getters = {
  CONTACTS: (state) => {
    return state.contacts;
  },
};
const mutations = {
  SET_CONTACTS: (state, payload) => {
    state.contacts = payload
  },
};
const actions = {
  GET_CONTACTS: async (context, payload) => {
    const filters = createFilterObject(payload);
    const data = await  api.get(`/contacts?${filters}`);
    await context.commit("SET_CONTACTS", data.data.data);
  },
  CREATE_CONTACTS: async (context, payload) => {
    await api.post(`/contacts`, payload);
  },
  UPDATE_CONTACTS: async (context, payload) => {
    await api.put(`/contacts/${payload.id}`, payload);
  },
};

export default {
  state,
  getters,
  mutations,
  actions,
};
