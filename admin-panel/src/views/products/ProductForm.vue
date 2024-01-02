<script>
import {mapActions, mapGetters} from "vuex";

export default {
  name: "ProductForm",
  props: {
    product: Object,
    isFetch: Boolean
  },
  computed: {
    ...mapGetters(["SUB_CATEGORIES", "CATEGORIES", "BRANDS", "PRODUCT"]),
  },
  methods: {
    ...mapActions(["GET_SUB_CATEGORIES", "GET_CATEGORIES", "GET_BRANDS", "CREATE_PRODUCT", "GET_PRODUCT"]),
    onFinish(data) {
      this.$emit("saveEdit", data);
    }
  },

  created() {
    this.GET_SUB_CATEGORIES({
      is_active: true,
    });
    this.GET_CATEGORIES({
      is_active: true,
    });
    this.GET_BRANDS({
      is_active: true,
    });
  }
}
</script>

<template>
    <form  @submit.prevent="this.onFinish(this.product)" class="justify-center align-center mt-5">
      <div class="d-flex justify-center flex-column align-center">
        <v-sheet
          :elevation="24"
          style="width: 100%; padding: 30px"
          border
          rounded
        >
          <div class="d-flex justify-space-around">
            <div><h1>Edit product</h1></div>
            <div>
            <v-btn
              :loading="isFetch"
              flat
              color="success"
              class="me-4"
              type="submit"
            >
              submit
            </v-btn>
            </div>
          </div>
          <v-divider class="border-opacity-50 pb-4"></v-divider>
          <v-row>
          <v-col
            cols="6"
            md="5"
          >
            <v-sheet
              :elevation="24"
              style="width: 100%; padding: 30px"
              border
              rounded
            >
              <v-row>
                  <v-col
                    cols="6"
                    md="6 "
                    >
                    <v-text-field
                      v-model="product.title"
                      :counter="255"
                      label="Title"
                      required
                    ></v-text-field>
                  </v-col>
                <v-col
                  cols="6"
                  md="6"
                >
                <v-text-field
                  v-model="product.price"
                  label="Price"
                  prefix="$"
                ></v-text-field>
                </v-col>
              </v-row>
              <v-row>
                <v-col
                  cols="6"
                  md="6"
                >
                  <v-text-field
                    v-model="product.qty"
                    :counter="255"
                    label="QTY"
                    required
                  ></v-text-field>
                </v-col>
                <v-col
                  cols="6"
                  md="6"
                >
                  <v-text-field
                    v-model="product.article"
                    :counter="255"
                    label="Article"
                    required
                  ></v-text-field>
                </v-col>
                <v-col
                  cols="6"
                  md="6 "
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
                  cols="6"
                  md="6"
                >
                  <v-autocomplete
                    label="Sub categories"
                    :items="SUB_CATEGORIES"
                    item-title="name"
                    item-value="id"
                    v-model="product.subCategory"
                  ></v-autocomplete>
                </v-col>
              </v-row>
              <v-row>
                <v-col
                  cols="12"
                  md="12"
                >
                  <v-autocomplete
                    label="Brands"
                    :items="BRANDS"
                    item-title="name"
                    item-value="id"
                    v-model="product.brand"
                  ></v-autocomplete>
                </v-col>
                <v-col
                  cols="6"
                  md="6"
                >
                  <v-checkbox
                    v-model="product.feature"
                    label="You wont feature product"
                  ></v-checkbox>
                </v-col>
                <v-col
                  cols="6"
                  md="6"
                >
                  <v-checkbox
                    v-model="product.is_active"
                    label="Active"
                  ></v-checkbox>
                </v-col>
               </v-row>
             </v-sheet>
          </v-col>
            <v-col
              cols="6"
              md="6"
            >
              <v-sheet
                :elevation="24"
                style="width: 100%; padding: 30px"
                border
                rounded
              >
                <v-row>
                  <v-col
                    cols="12"
                    md="12"
                  >
                    <v-textarea
                      name="input-7-1"
                      variant="filled"
                      label="Description"
                      v-model="product.description"
                    ></v-textarea>
                  </v-col>
                  <v-col
                    cols="12"
                    md="12"
                  >
                    <v-textarea
                      name="input-7-1"
                      variant="filled"
                      label="Information"
                      v-model="product.information"
                    ></v-textarea>
                  </v-col>
                </v-row>
              </v-sheet>
            </v-col>
          </v-row>
        </v-sheet>
      </div>
    </form>
</template>

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
