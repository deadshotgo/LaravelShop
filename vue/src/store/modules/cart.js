import store from "@/store";

const state = {
  cart: JSON.parse(localStorage.getItem("cart")) || [],
};

const getters = {
  CART_GET: (state) => {
    return state.cart;
  },
  COUNT_CART: (state) => {
    return state.cart.length;
  },
};

const mutations = {
  SET_CART_DATA: (state, payload) => {
    state.cart = payload;
  },
  SET_CART: (state, payload) => {
    const findItem = state.cart.find((e) => e.id === payload.id);
    if (findItem) {
      findItem.qty += payload.qty;
    } else {
      state.cart.push(payload);
      store.dispatch("GET_CART_PRODUCTS", {
        id: state.cart.map((i) => i.id).join(","),
      });
    }
    localStorage.setItem("cart", JSON.stringify(state.cart));
  },
};

export default {
  state,
  getters,
  mutations,
};
