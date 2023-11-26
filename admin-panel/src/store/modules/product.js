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
  CREATE_PRODUCT: async (context, payload) => {
    let formData = new FormData()
    formData.append("title", payload.title);
    formData.append("description", payload.description);
    formData.append("information", payload.information);
    formData.append("feature", payload.feature);
    formData.append("qty", payload.qty);
    formData.append("price", payload.price);
    formData.append("article", payload.article);
    formData.append("category_id", payload.category);
    formData.append("sub_category_id", payload.sub_category);
    formData.append("brand_id", payload.brand);
    for (let i = 0; i < payload.images.length; i++) {
      formData.append('images[]', payload.images[i]);
    }

    formData.append("is_active", payload.is_active)
    await api.post(`/products`, formData);
  },
};

export default {
  state,
  getters,
  mutations,
  actions,
};
