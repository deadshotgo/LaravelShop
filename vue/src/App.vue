<template>
  <div id="app">
    <component :is="layout">
      <router-view />
    </component>
  </div>
</template>
<script>
import MainLayout from "@/layout/MainLayout.vue";
import AuthLayout from "@/layout/AuthLayout.vue";
export default {
  computed: {
    layout() {
      return (this.$route.meta.layout || "main") + "-layout";
    },
  },
  components: {
    MainLayout,
    AuthLayout,
  },
};
</script>
<style lang="scss">
@import "~bootstrap/dist/css/bootstrap.css";
@import "assets/lib/css/nivo-slider.css";
@import "assets/css/core.css";
@import "assets/css/plugins/textanimate.css";
@import "assets/css/shortcode/shortcodes.css";
@import "assets/style.css";
@import "assets/css/responsive.css";
@import "assets/css/color/color-core.css";
@import "assets/css/custom.css";
</style>
