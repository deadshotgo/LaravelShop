<template>
  <div style="margin: 30px">
    <V-banner-form :isFetch="isFetch" :text="response" :typeResponse="typeResponse" @close="() => this.isFetch = false" />
    <v-tabs
      v-model="tab"
      color="deep-purple-accent-4"
      align-tabs="center"
    >
      <v-tab :value="1">Information</v-tab>
      <v-tab v-if="isSaveImage" :value="2">Media</v-tab>
    </v-tabs>

    <v-window v-model="tab">
      <v-window-item
        :key="1"
        :value="1"
      >
        <ProductForm  @saveEdit="onFinish" :product="product" :isFetch="isFetch"/>
      </v-window-item>
      <v-window-item
        v-if="isSaveImage"
        :key="2"
        :value="2"
      >
        <ProductMedia :product="this.PRODUCT" />
      </v-window-item>
    </v-window>
  </div>
</template>

<script>
import {mapActions, mapGetters} from "vuex";
import ProductForm from "@/views/products/ProductForm.vue";
import VBannerForm from "@/components/V-banner-form.vue";
import ProductMedia from "@/views/products/ProductMedia.vue";
export default {
  name: 'ProductCreate',
  components: {ProductMedia, VBannerForm, ProductForm},
  data: () => ({
    isFetch: false,
    isSaveImage: false,
    tab: 1,
    productCreate: {},
    product: {
      id: null,
      title: '',
      description: '',
      information: '',
      feature: false,
      qty: 0,
      price: 0,
      article: '',
      is_active: true,
      category: null,
      subCategory: null,
      brand: null,
      images: []
    },
  }),

  computed: {
    ...mapGetters(["SUB_CATEGORIES", "CATEGORIES", "BRANDS", "PRODUCT"]),
  },

  methods: {
    ...mapActions(["GET_SUB_CATEGORIES", "GET_CATEGORIES", "GET_BRANDS", "CREATE_PRODUCT", "GET_PRODUCT"]),

    onFinish(data){
      const request = {
        ...data,
        category_id:  data.category,
        sub_category_id: data.subCategory,
        brand_id: data.brand,
      }
      this.CREATE_PRODUCT(request).then(() => {
        this.isSaveImage = true
      })
    },
  },

  async created() {
    await this.GET_SUB_CATEGORIES({
      is_active: true,
    });
    await this.GET_CATEGORIES({
      is_active: true,
    });
    await this.GET_BRANDS({
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
