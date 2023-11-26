<template>
  <v-sheet width="800" class="mx-auto bg-center">
  <form  @submit.prevent="this.onFinish()" class="justify-center align-center mt-5">
    <div class="d-flex justify-center flex-column align-center">
      <h1>New product</h1>
    <v-col
      cols="12"
      md="9"
    >
      <v-text-field
        v-model="product.title"
        :counter="255"
        label="Title"
        required
      ></v-text-field>
    </v-col>
    <v-col
      cols="12"
      md="9"
    >
      <v-text-field
        v-model="product.price"
        label="Price"
        prefix="$"
      ></v-text-field>
    </v-col>
    <v-col
      cols="12"
      md="9"
    >
      <v-text-field
        v-model="product.qty"
        :counter="255"
        label="QTY"
        required
      ></v-text-field>
    </v-col>
    <v-col
      cols="12"
      md="9"
    >
      <v-text-field
        v-model="product.article"
        :counter="255"
        label="Article"
        required
      ></v-text-field>
    </v-col>
      <v-col
        cols="12"
        md="9"
      >
        <v-autocomplete
          label="Category"
          :items="CATEGORIES"
          item-title="name"
          item-value="id"
          v-model="product.category"
        ></v-autocomplete>
      </v-col>
      <v-col
        cols="12"
        md="9"
      >
        <v-autocomplete
          label="Sub categories"
          :items="SUB_CATEGORIES"
          item-title="name"
          item-value="id"
          v-model="product.sub_category"
        ></v-autocomplete>
      </v-col>
      <v-col
        cols="12"
        md="9"
      >
        <v-autocomplete
          label="Sub categories"
          :items="BRANDS"
          item-title="name"
          item-value="id"
          v-model="product.brand"
        ></v-autocomplete>
      </v-col>
      <v-col
        cols="12"
        md="9"
      >
        <v-file-input
          prepend-inner-icon="mdi-camera"
          prepend-icon=""
          accept="image/png, image/jpeg, image/bmp, image/jpg"
          @change="(e) => {product.images = e.target.files}"
          show-size
          counter
          multiple
          chips
          label="File input"
        ></v-file-input>
      </v-col>
    <v-col
      cols="12"
      md="9"
      id="sample"
    >
      <v-container fluid>
      <v-textarea
        name="input-7-1"
        variant="filled"
        label="Label"
        v-model="product.description"
      ></v-textarea>
      </v-container>
    </v-col>
      <v-col
        cols="12"
        md="9"
        id="sample"
      >
        <v-container fluid>
        <v-textarea
          name="input-7-1"
          variant="filled"
          label="Label"
          v-model="product.information"
        ></v-textarea>
        </v-container>
      </v-col>
    <v-checkbox
      v-model="product.feature"
      label="You wont feature product"
      required
    ></v-checkbox>
      <v-checkbox
        v-model="product.is_active"
        label="Active"
        required
      ></v-checkbox>
    <v-btn
      class="me-4"
      type="submit"
    >
      submit
    </v-btn>
    </div>
  </form>
  </v-sheet>
</template>

<script>
import {mapActions, mapGetters} from "vuex";
export default {
  name: 'ProductCreate',
  data: () => ({
    product: {
      title: '',
      description: '',
      information: '',
      feature: false,
      qty: 0,
      price: 0,
      article: '',
      is_active: true,
      category: null,
      sub_category: null,
      brand: null,
      images: []
    },
  }),

  computed: {
    ...mapGetters(["SUB_CATEGORIES", "CATEGORIES", "BRANDS"]),
  },

  methods: {
    ...mapActions(["GET_SUB_CATEGORIES", "GET_CATEGORIES", "GET_BRANDS", "CREATE_PRODUCT"]),

    onFinish(){
        this.CREATE_PRODUCT(this.product)
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
