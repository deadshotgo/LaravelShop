<template>
  <div style="margin: 30px">
    <V-banner-form :isFetch="isFetch" :text="response" :typeResponse="typeResponse" @close="() => this.isFetch = false" />
    <v-skeleton-loader  v-if="this.loading" :elevation="2" type="paragraph"></v-skeleton-loader>
    <div v-else>
      <v-tabs
        v-model="tab"
        color="deep-purple-accent-4"
        align-tabs="center"
      >
        <v-tab :value="1">Information</v-tab>
        <v-tab :value="2">Media</v-tab>
      </v-tabs>

      <v-window v-model="tab">
        <v-window-item
          :key="1"
          :value="1"
        >
          <ProductForm  @saveEdit="onFinish" :product="this.PRODUCT" :isFetch="isFetch"/>
        </v-window-item>
        <v-window-item
          :key="2"
          :value="2"
        >
          <ProductMedia :product="this.PRODUCT" />
        </v-window-item>
      </v-window>
    </div>
  </div>
</template>

<script>
import {mapActions, mapGetters} from "vuex";
import {useRoute} from "vue-router";
import ProductForm from "@/views/products/ProductForm.vue";
import ProductMedia from "@/views/products/ProductMedia.vue";
import VBannerForm from "@/components/V-banner-form.vue";
export default {
  name: 'ProductEdit',
  components: {VBannerForm, ProductMedia, ProductForm},
  data: () => ({
    loading: true,
    tab: 1,
    isFetch: false,
    response: '',
    typeResponse: true,
  }),

  computed: {
    ...mapGetters(["SUB_CATEGORIES", "CATEGORIES", "BRANDS", "PRODUCT"]),
  },

  methods: {
    ...mapActions(["GET_SUB_CATEGORIES", "GET_CATEGORIES", "GET_BRANDS", "CREATE_PRODUCT", "GET_PRODUCT", "UPDATE_PRODUCT"]),
   async onFinish(data){
     const request = {
       ...data,
       category_id:  data.category.id,
       sub_category_id: data.subCategory.id,
       brand_id: data.brand.id,
     }
    await this.UPDATE_PRODUCT(request).then(() => {
      this.response = 'Product is success update';
      this.isFetch = true;
    }).catch((e) => {
      this.response = e.response.data.message;
      this.isFetch = true;
      this.typeResponse = false;
    })
    },
  },

  async created() {
    const route = useRoute();
    try {
     await this.GET_PRODUCT({ id: route.params.id });
    } catch (error) {
      console.error('Error fetching product:', error);
    }
    this.loading = false
    this.GET_SUB_CATEGORIES({
      is_active: true,
    });
    this.GET_CATEGORIES({
      is_active: true,
    });
    this.GET_BRANDS({
      is_active: true,
    });
  },
}

</script>

<style scoped lang="scss">
@media (min-width: 1024px) {
  #sample {
    display: flex;
    flex-direction: column;
    place-items: center;
    width: 100%;
  }
}
#my-strictly-unique-vue-upload-multiple-image {
  font-family: 'Avenir', Helvetica, Arial, sans-serif;
  -webkit-font-smoothing: antialiased;
  -moz-osx-font-smoothing: grayscale;
  text-align: center;
  color: #2c3e50;
  margin-top: 60px;
}

h1, h2 {
  font-weight: normal;
}

ul {
  list-style-type: none;
  padding: 0;
}

li {
  display: inline-block;
  margin: 0 10px;
}

a {
  color: #42b983;
}
</style>
