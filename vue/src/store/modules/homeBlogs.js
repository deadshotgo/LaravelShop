import api from "@/api/api";
import { createFilterObject } from "@/utils/createFilterObject";
import moment from "moment";

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
    state.blog.day = moment(new Date(payload.createdAt)).format("Do");
    state.blog.month = moment(new Date(payload.createdAt)).format("MMM");
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
    context.commit("SET_LOAD_STATUS", true);
  },
  GET_BLOG: async (context, payload) => {
    const data = await api.get(`/blogs/${payload.id}`);
    await context.commit("SET_BLOG", data.data.data);
    context.commit("SET_LOAD_STATUS", true);
  },
};

export default {
  state,
  getters,
  mutations,
  actions,
};
