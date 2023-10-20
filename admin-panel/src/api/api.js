import axios from "axios";
import store from "@/store";
const api = axios.create({
  baseURL: `http://localhost:83/api`,
});
api.interceptors.request.use(
  (config) => {
    if (store.getters.TOKEN) {
      config.headers['Authorization'] = 'Bearer ' + store.getters.TOKEN;
    }
    if (['/brands'].includes(config.url) || config.url.match('/brands/[0-9]')) {
      config.headers['Content-Type'] = 'multipart/form-data';
    } else {
      config.headers['Content-Type'] = 'application/json';
    }
    config.headers["Accept"] = "application/json";
    return config;
  },
  (error) => {
    Promise.reject(error);
  }
);

export default api;
