import api from "@/api/api";
import { createFilterObject } from "@/utils/createFilterObject";

const state = {
  colors: [],
};
const getters = {
  COLORS: (state) => {
    return state.colors;
  },
};
const mutations = {
  SET_COLOR: (state, payload) => {
    state.colors = payload
  },
};
const actions = {
  GET_COLORS: async (context, payload) => {
    const filters = createFilterObject(payload);
    const data = await api.get(`/colors?${filters}`);
    await context.commit("SET_COLOR", data.data.data);
  },
  CREATE_COLOR: async (context, payload) => {
    await api.post(`/colors`, payload);
  },
  UPDATE_COLOR: async (context, payload) => {
    await api.put(`/colors/${payload.id}`, payload);
  },
};

export default {
  state,
  getters,
  mutations,
  actions,
};
