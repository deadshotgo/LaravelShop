<script>
import { mapActions, mapGetters } from "vuex";

export default {
  name: "RecentProducts",
  computed: {
    ...mapGetters(["RECENT_PRODUCTS"]),
  },
  methods: {
    ...mapActions(["GET_RECENT_PRODUCTS"]),
  },
  async created() {
    await this.GET_RECENT_PRODUCTS({
      limit: 3,
      is_active: true,
      feature: true,
    });
  },
};
</script>

<template>
  <div>
    <aside class="widget widget-product box-shadow">
      <h6 class="widget-title border-left mb-20">recent products</h6>
      <!-- product-item start -->
      <div
        v-for="(product, i) in RECENT_PRODUCTS.data"
        :key="i"
        class="product-item"
      >
        <div class="product-img">
          <a href="single-product.html">
            <img :src="product.imageProducts?.[0]?.path" alt="" />
          </a>
        </div>
        <div class="product-info">
          <h6 class="product-title">
            <a href="single-product.html">{{ product.title }}</a>
          </h6>
          <h3 class="pro-price">$ {{ product.price }}</h3>
        </div>
      </div>
      <!-- product-item end -->
    </aside>
  </div>
</template>

<style scoped lang="scss"></style>
