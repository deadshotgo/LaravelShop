<template>
  <v-theme-provider theme="dark" with-background >
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

        <v-list density="compact">
          <router-link :to="{ name: 'Home' }"><v-list-item prepend-icon="mdi-home-city" title="Home" value="home"></v-list-item></router-link>
          <router-link :to="{ name: 'Category' }"><v-list-item prepend-icon="mdi-account" title="Category" value="account"></v-list-item></router-link>
        </v-list>
      </v-navigation-drawer>
      <v-main style="height: 100vh">
        <router-view/>
      </v-main>
    </v-layout>
  </v-card>
  </v-theme-provider>
</template>

<script>
export default {
  data () {
    return {
      drawer: true,
      rail: true,
    }
  },
}
</script>
