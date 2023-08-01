<script>
import "vue3-carousel/dist/carousel.css";
import { Carousel, Slide, Navigation } from "vue3-carousel";
export default {
  name: "ProductCarousel",
  props: {
    bigSizeCount: Number,
    averageSizeCount: Number,
    smallSizeCount: Number,
  },
  components: {
    Carousel,
    Slide,
    Navigation,
  },
  data: () => ({
    small: false,
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
    <slide v-for="slide in 8" :key="slide">
      <slot></slot>
    </slide>
    <template #addons>
      <Navigation />
    </template>
  </carousel>
</template>

<style scoped lang="scss"></style>
