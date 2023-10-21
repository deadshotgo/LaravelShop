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
  data () {
    return {
      drawer: true,
      rail: true,
      items: [
        {icon: 'mdi-home-city', title:'Home', route:'/'},
        {icon: 'mdi-account', title:'Category', route:'/categories'},
        {icon: 'mdi-account', title:'Sub category', route:'/sub-categories'},
        {icon: 'mdi-account', title:'Brands', route:'/brands'},
        {icon: 'mdi-account', title:'Tags', route:'/tags'},
        {icon: 'mdi-account', title:'Colors', route:'/colors'},
      ],
    }
  },
}
</script>
