<template>
  <div class="product-item">
    <div class="product-img">
      <router-link :to="{ name: 'product', params: { id: data.id } }">
        <img :src="data?.imageProducts[0]?.path" alt="" />
      </router-link>
    </div>
    <div class="product-info">
      <h6 class="product-title">
        <router-link :to="{ name: 'product', params: { id: data.id } }">{{
          data.title
        }}</router-link>
      </h6>
      <div class="pro-rating">
        <a href="#"><i class="zmdi zmdi-star"></i></a>
        <a href="#"><i class="zmdi zmdi-star"></i></a>
        <a href="#"><i class="zmdi zmdi-star"></i></a>
        <a href="#"><i class="zmdi zmdi-star-half"></i></a>
        <a href="#"><i class="zmdi zmdi-star-outline"></i></a>
      </div>
      <h3 class="pro-price">$ {{ data.price }}</h3>
      <ul class="action-button">
        <li>
          <a href="#" title="Wishlist"><i class="zmdi zmdi-favorite"></i></a>
        </li>
        <li>
          <a
            @click="openModal = true"
            data-toggle="modal"
            data-target="#productModal"
            title="Quickview"
            ><i class="zmdi zmdi-zoom-in"></i
          ></a>
        </li>
        <li>
          <a href="#" title="Compare"><i class="zmdi zmdi-refresh"></i></a>
        </li>
        <li>
          <a
            @click.prevent="store.commit('SET_CART', { id: data.id, qty: 1 })"
            title="Add to cart"
            ><i class="zmdi zmdi-shopping-cart-plus"></i
          ></a>
        </li>
      </ul>
    </div>
    <ModalProduct
      @closeModal="this.openModal = false"
      :data="data"
      :openModal="openModal"
    />
  </div>
</template>
<script>
import ModalProduct from "@/components/product/ModalProduct.vue";
import store, { commit } from "@/store";

export default {
  name: "ProductCard",
  computed: {
    store() {
      return store;
    },
  },
  components: { ModalProduct },
  props: {
    data: Object,
  },
  data: () => {
    return {
      openModal: false,
    };
  },
  methods: {
    commit() {
      return commit;
    },
  },
};
</script>

<style scoped lang="scss">
.action-button > li > a {
  cursor: pointer;
}
</style>
