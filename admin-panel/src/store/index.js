import { createStore } from "vuex";
import category from "@/store/modules/category";
import subCategory from "@/store/modules/subCategory";
import brand from "@/store/modules/brand";
export default createStore({
  state: {},
  getters: {},
  mutations: {},
  actions: {},
  modules: {
    category,
    subCategory,
    brand
  },
});
