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
    let formData = new FormData()
    formData.append("path", payload.path ? payload.path[0] : null)
    formData.append("footer_text", payload.footer_text);
    formData.append("address", Array.isArray(payload.address) && payload.address.length > 0 ? JSON.stringify(payload.address) : '[]');
    formData.append("gmail", Array.isArray(payload.gmail) && payload.gmail.length > 0 ? JSON.stringify(payload.gmail) : '[]');
    formData.append("phone_number", Array.isArray(payload.phone_number) && payload.phone_number.length > 0 ? JSON.stringify(payload.phone_number) : '[]');
    await api.post(`/contacts/${payload.id}?_method=PUT`, formData);
  },
};

export default {
  state,
  getters,
  mutations,
  actions,
};
