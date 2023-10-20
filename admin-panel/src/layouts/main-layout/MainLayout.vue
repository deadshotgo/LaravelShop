<template>
  <v-card>
    <v-layout>
      <v-navigation-drawer
        v-model="drawer"
        :rail="rail"
        @click="rail = false"
      >
        <v-list-item
          prepend-avatar="https://randomuser.me/api/portraits/men/85.jpg"
          title="John Leider"
        >
          <template v-slot:append>
            <v-btn
              variant="text"
              icon="mdi-chevron-left"
              @click.stop="rail = !rail"
            ></v-btn>
          </template>
        </v-list-item>

        <v-divider></v-divider>

        <v-list v-for="(item, i) in items" :key="i" density="compact">
          <v-list-item :to="item.route" :prepend-icon="item.icon" :title="item.title" :value="item.title"></v-list-item>
        </v-list>
      </v-navigation-drawer>
      <v-main style="height: 100vh">
        <router-view/>
      </v-main>
    </v-layout>
  </v-card>
</template>

<script>
export default {
  name: 'MainLayout',
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

<style scoped lang="scss">

</style>
