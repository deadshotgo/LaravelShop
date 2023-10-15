import api from "@/api/api";
import { createFilterObject } from "@/utils/createFilterObject";

const state = {
  brands: [],
};
const getters = {
  BRANDS: (state) => {
    return state.brands;
  },
};
const mutations = {
  SET_BRANDS: (state, payload) => {
    state.brands = payload
  },
};
const actions = {
  GET_BRANDS: async (context, payload) => {
    const filters = createFilterObject(payload);
    const data = await api.get(`/brands?${filters}`);
    await context.commit("SET_BRANDS", data.data.data);
  },
  CREATE_BRAND: async (context, payload) => {
    let formData = new FormData()
    formData.append("image", payload.image[0])
    formData.append("name", payload.name)
    formData.append("is_active", payload.is_active)
   await api.post(`/brands`, formData);
  },
  UPDATE_BRAND: async (context, payload) => {
    let formData = new FormData()
    formData.append("image", payload.image ? payload.image[0] : null)
    formData.append("name", payload.name)
    formData.append("is_active", payload.is_active)
   await api.post(`/brands/${payload.id}?_method=PUT`, formData);
  },
};

export default {
  state,
  getters,
  mutations,
  actions,
};
