<script>
import "vue3-carousel/dist/carousel.css";
import { Carousel, Slide, Navigation } from "vue3-carousel";
import ProductBrand from "@/components/ProductBrand.vue";
import ProductBlog from "@/components/ProductBlog.vue";
import ProductCard from "@/components/ProductCard.vue";
export default {
  name: "ProductCarousel",
  props: {
    bigSizeCount: Number,
    averageSizeCount: Number,
    smallSizeCount: Number,
    data: Object,
    type: String,
  },
  components: {
    ProductCard,
    ProductBlog,
    ProductBrand,
    Carousel,
    Slide,
    Navigation,
  },
  data: () => ({
    small: false,
    onlySmall: false,
  }),
  created() {
    window.addEventListener("resize", this.onResize);
    this.onResize();
  },
  unmounted() {
    window.removeEventListener("resize", this.onResize);
  },
  methods: {
    onResize() {
      this.small = window.innerWidth <= 1200;
      this.onlySmall = window.innerWidth <= 768;
    },
  },
};
</script>

<template>
  <carousel
    :items-to-show="
      small ? (onlySmall ? smallSizeCount : averageSizeCount) : bigSizeCount
    "
    :wrapAround="true"
  >
    <slide v-for="slide in data" :key="slide">
      <ProductBrand v-if="type === 'brand'" :data="slide" />
      <ProductBlog v-if="type === 'blog'" :data="slide" />
      <ProductCard v-if="type === 'product'" :data="slide" />
    </slide>

    <template #addons>
      <Navigation />
    </template>
  </carousel>
</template>

<style scoped lang="scss"></style>
