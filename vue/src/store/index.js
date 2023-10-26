import { createStore } from "vuex";
import homeBrands from "@/store/modules/homeBrands";
import homeBlogs from "@/store/modules/homeBlogs";
import products from "@/store/modules/products";
import category from "@/store/modules/category";
import tags from "@/store/modules/tags";
import cart from "@/store/modules/cart";
import spinner from "@/store/modules/spinner";

export default createStore({
  state: {},
  getters: {},
  mutations: {},
  actions: {},
  modules: {
    homeBrands,
    homeBlogs,
    products,
    category,
    spinner,
    tags,
    cart,
  },
});
