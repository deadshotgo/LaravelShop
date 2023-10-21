import api from "@/api/api";
import { createFilterObject } from "@/utils/createFilterObject";

const state = {
  products: [],
  total: 0
};
const getters = {
  PRODUCTS: (state) => {
    return state.products;
  },
  TOTAL_PRODUCTS: (state) => {
    return state.total;
  },
};
const mutations = {
  SET_PRODUCTS: (state, payload) => {
    state.products = payload;
  },
  SET_TOTAL_PRODUCTS: (state, payload) => {
    state.total = payload;
},
};
const actions = {
  GET_PRODUCTS: async (context, payload) => {
    const filters = createFilterObject(payload);
    const data = await api.get(`/products?${filters}`);
    await context.commit("SET_PRODUCTS", data.data.data);
    await context.commit("SET_TOTAL_PRODUCTS", data.data.meta.total)
  },
};

export default {
  state,
  getters,
  mutations,
  actions,
};
