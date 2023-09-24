import api from "@/api/api";
import { createFilterObject } from "@/utils/createFilterObject";

const state = {
  blogs: [],
  blog: [],
};
const getters = {
  BLOG: (state) => {
    return state.blog;
  },
  BLOGS: (state) => {
    return state.blogs;
  },
};
const mutations = {
  SET_BLOG: (state, payload) => {
    state.blog = payload;
  },
  SET_BLOGS: (state, payload) => {
    state.blogs = payload;
  },
};
const actions = {
  GET_BLOGS: async (context, payload) => {
    const filters = createFilterObject(payload);
    const data = await api.get(`/blogs?${filters}`);
    await context.commit("SET_BLOGS", data.data);
  },
  GET_BLOG: async (context, payload) => {
    const data = await api.get(`/blogs/${payload.id}`);
    await context.commit("SET_BLOG", data.data.data);
  },
};

export default {
  state,
  getters,
  mutations,
  actions,
};
