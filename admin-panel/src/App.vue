<template>
  <v-theme-provider theme="dark" with-background >
    <component :is="layout">
      <router-view />
    </component>
  </v-theme-provider>
</template>

<script>
import MainLayout from "@/layouts/main-layout/MainLayout.vue";

export default {
  computed: {
    layout() {
      return (this.$route.meta.layout || "main") + "-layout";
    },
  },
  components: {
    MainLayout,
  },
}
</script>
