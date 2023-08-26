import api from "@/api/api";
import { createFilterObject } from "@/utils/createFilterObject";

const state = {
  products: [],
  featuresProducts: [],
};
const getters = {
  PRODUCTS: (state) => {
    return state.products;
  },
  FEATURE_PRODUCTS: (state) => {
    return state.featuresProducts;
  },
};
const mutations = {
  SET_PRODUCT: (state, payload) => {
    state.products = payload;
  },
  SET_FEATURE_PRODUCT: (state, payload) => {
    state.featuresProducts = payload;
  },
};
const actions = {
  GET_PRODUCTS: async (context, payload) => {
    const filters = createFilterObject(payload);
    const data = await api.get(`/products?${filters}`);
    await context.commit("SET_PRODUCT", data.data.data);
  },
  GET_FEATURE_PRODUCTS: async (context, payload) => {
    const filters = createFilterObject(payload);
    const data = await api.get(`/products?${filters}`);
    await context.commit("SET_FEATURE_PRODUCT", data.data.data);
  },
};

export default {
  state,
  getters,
  mutations,
  actions,
};
