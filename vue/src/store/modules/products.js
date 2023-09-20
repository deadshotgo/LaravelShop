import api from "@/api/api";
import { createFilterObject } from "@/utils/createFilterObject";

const state = {
  products: [],
  product: [],
  featuresProducts: [],
  recentProducts: [],
};
const getters = {
  PRODUCT: (state) => {
    return state.product;
  },
  PRODUCTS: (state) => {
    return state.products;
  },
  FEATURE_PRODUCTS: (state) => {
    return state.featuresProducts;
  },
  RECENT_PRODUCTS: (state) => {
    return state.recentProducts;
  },
};
const mutations = {
  SET_PRODUCT: (state, payload) => {
    state.product = payload;
  },
  SET_PRODUCTS: (state, payload) => {
    state.products = payload;
  },
  SET_FEATURE_PRODUCT: (state, payload) => {
    state.featuresProducts = payload;
  },
  SET_RECENT_PRODUCT: (state, payload) => {
    state.recentProducts = payload;
  },
};
const actions = {
  GET_PRODUCTS: async (context, payload) => {
    const filters = createFilterObject(payload);
    const data = await api.get(`/products?${filters}`);
    await context.commit("SET_PRODUCTS", data.data);
  },
  GET_PRODUCT: async (context, payload) => {
    const data = await api.get(`/products/${payload.id}`);
    console.log(data.data.data);
    await context.commit("SET_PRODUCT", data.data.data);
  },
  GET_FEATURE_PRODUCTS: async (context, payload) => {
    const filters = createFilterObject(payload);
    const data = await api.get(`/products?${filters}`);
    await context.commit("SET_FEATURE_PRODUCT", data.data);
  },
  GET_RECENT_PRODUCTS: async (context, payload) => {
    const filters = createFilterObject(payload);
    const data = await api.get(`/products?${filters}`);
    await context.commit("SET_RECENT_PRODUCT", data.data);
  },
};

export default {
  state,
  getters,
  mutations,
  actions,
};
