import { createStore } from "vuex";
import category from "@/store/modules/category";
import subCategory from "@/store/modules/subCategory";
import brand from "@/store/modules/brand";
import tag from "@/store/modules/tag";
import color from "@/store/modules/color";
import login from "@/store/modules/login";
import product from "@/store/modules/product";
import contact from "@/store/modules/contact";
export default createStore({
  state: {},
  getters: {},
  mutations: {},
  actions: {},
  modules: {
    subCategory,
    category,
    product,
    contact,
    login,
    brand,
    color,
    tag,
  },
});
