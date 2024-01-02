<script>
import {mapActions} from "vuex";

export default {
  name: "ProductMedia",
  props: {
    product: Object
  },
  data: () => {
    return {
      images: [],
      loading: false
    }
  },
  methods: {
    ...mapActions(["DELETE_IMAGES_PRODUCT", "SAVE_IMAGES", "GET_PRODUCT"]),
    deleteImages(id) {
      const isConfirm = confirm("Do you wont delete images");
      if(isConfirm) {
        this.loading = true;
        this.DELETE_IMAGES_PRODUCT({id}).finally(() => {
          this.loading = false;
          this.images = [];
          this.GET_PRODUCT({ id: this.product.id });
        })
      }
    },
    saveImages() {
      this.loading = true;
      this.SAVE_IMAGES({
        productId: this.product.id,
        images: this.images
      }).finally(() => {
          this.loading = false;
          this.images = [];
          this.GET_PRODUCT({ id: this.product.id });
      })
    }
  }
}
</script>

<template>
  <v-container fluid>
      <v-row style="justify-content: center">
        <v-col cols="4" style="display: flex; flex-direction: column; justify-content: center" >
          <v-file-input
            prepend-inner-icon="mdi-camera"
            prepend-icon=""
            accept="image/png, image/jpeg, image/bmp, image/jpg"
            @change="(e) => {images = e.target.files}"
            show-size
            counter
            multiple
            chips
            label="File input"
          ></v-file-input>
          <v-btn
            :loading="loading"
            @click="saveImages()"
          >
            Send
          </v-btn>
        </v-col>
      </v-row>
    <v-row>
      <v-col
        v-for="i in product?.imageProducts"
        :key="i.id"
        class="d-flex child-flex"
        cols="2"
      >
        <v-img
          class="mx-auto"
          @click="deleteImages(i.id)"
          :src="i.path"
          :lazy-src="i.path"
          aspect-ratio="1"
        >
          <template v-slot:placeholder>
            <v-row
              class="fill-height ma-0"
              align="center"
              justify="center"
            >
              <v-progress-circular
                indeterminate
                color="grey-lighten-5"
              ></v-progress-circular>
            </v-row>
          </template>
        </v-img>
      </v-col>
    </v-row>
  </v-container>
</template>

<style scoped lang="scss">

</style>
