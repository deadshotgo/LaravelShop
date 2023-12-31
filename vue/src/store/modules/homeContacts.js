import api from "@/api/api";

const state = {
  contacts: [],
};
const getters = {
  VCONTACTS: (state) => {
    return state.contacts;
  },
};
const mutations = {
  VSET_CONTACTS: (state, payload) => {
    state.contacts = payload;
  },
};
const actions = {
  VGET_CONTACTS: async (context) => {
    const data = await api.get(`/contacts`);
    await context.commit("VSET_CONTACTS", data.data.data[0]);
  },
};

export default {
  state,
  getters,
  mutations,
  actions,
};
