import api from "@/api/api";
import { createFilterObject } from "@/utils/createFilterObject";

const state = {
  products: [],
  product: [],
  total: 0
};
const getters = {
  PRODUCTS: (state) => {
    return state.products;
  },
  PRODUCT: (state) => {
    return state.product;
  },
  TOTAL_PRODUCTS: (state) => {
    return state.total;
  },
};
const mutations = {
  SET_PRODUCTS: (state, payload) => {
    state.products = payload;
  },
  SET_PRODUCT: (state, payload) => {
    payload.is_active = Boolean(payload.is_active)
    payload.feature = Boolean(payload.feature)
    state.product = payload;
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
  GET_PRODUCT: async (context, payload) => {
    const data = await api.get(`/products/${payload.id}`);
    await context.commit("SET_PRODUCT", data.data.data);
    return data.data.data
  },
  DELETE_IMAGES_PRODUCT: async (context, payload) => {
    const data = await api.post(`product-images/destroy`, { id: payload.id });
    return data
  },
  SAVE_IMAGES: async (context, payload) => {
    let formData = new FormData();
    formData.append("product_id", payload.productId);
    formData.append("main", '1');
    for (let i = 0; i < payload.images.length; i++) {
      formData.append('images[]', payload.images[i]);
    }
    const data = await api.post(`product-images/store`, formData);
    return data
  },
  UPDATE_PRODUCT: async (context, payload) => {
    await  api.put(`/products/${payload.id}`, payload);
  },
  CREATE_PRODUCT: async (context, payload) => {
    const data = await api.post(`/products`, payload);
    await context.commit("SET_PRODUCT", data.data.data);
    return data;
  },
};

export default {
  state,
  getters,
  mutations,
  actions,
};
