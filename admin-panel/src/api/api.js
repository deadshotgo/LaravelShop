import axios from "axios";
const api = axios.create({
  baseURL: `http://localhost:83/api`,
});

api.interceptors.request.use(
  (config) => {
      console.log(config.url);
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