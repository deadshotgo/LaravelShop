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
    if ((['/brands'].includes(config.url) || config.url.match('/brands/[0-9]')) || (['/products'].includes(config.url) || config.url.match('/products/[0-9]')) ) {
      config.headers['Content-Type'] = 'multipart/form-data';
    }
    else if (['/contacts'].includes(config.url) || config.url.match('/contacts/[0-9]')) {
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
