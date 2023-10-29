const state = {
  isLoad: false,
};
const getters = {
  IS_LOAD: (state) => {
    return state.isLoad;
  },
};
const mutations = {
  SET_LOAD_STATUS: (state, payload) => {
    state.isLoad = payload;
  },
};

export default {
  state,
  getters,
  mutations,
};
