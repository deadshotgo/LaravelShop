FROM node:16 as build-stage-admin
WORKDIR /admin
COPY package*.json ./
RUN npm install
COPY ./ .
RUN npm run build
CMD [ "npm", "run", "serve"]

FROM nginx as production-stage-admin
EXPOSE 8001
RUN mkdir /admin
COPY nginx.conf /etc/nginx/conf.d/default.conf
COPY --from=build-stage-admin /admin/dist /admin