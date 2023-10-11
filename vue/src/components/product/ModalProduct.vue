<template>
  <!-- Modal -->
  <teleport to="#modal">
    <div v-if="openModal" id="quickview-wrapper" style="position: absolute">
      <!-- Modal -->
      <div
        class="modal fade in"
        id="productModal"
        role="dialog"
        style="display: block; padding-right: 15px"
      >
        <div class="modal-dialog" role="document">
          <div class="modal-content">
            <div class="modal-header">
              <button
                type="button"
                class="close"
                data-dismiss="modal"
                aria-label="Close"
                @click="this.$emit('closeModal', false)"
              >
                <span aria-hidden="true">×</span>
              </button>
            </div>
            <div class="modal-body">
              <div class="modal-product clearfix">
                <div class="product-images">
                  <div class="main-image images">
                    <img alt="" :src="data.imageProducts[0].path" />
                  </div>
                </div>
                <!-- .product-images -->
                <div class="product-info">
                  <h1>{{ data.title }}</h1>
                  <div class="price-box-3">
                    <div class="s-price-box">
                      <span class="new-price"
                        >$ {{ data.price * qty_selected }}</span
                      >
                    </div>
                  </div>
                  <a class="see-all"></a>
                  <router-link
                    :to="{ name: 'product', params: { id: data.id } }"
                    >See all features</router-link
                  >
                  <div class="quick-add-to-cart">
                    <form method="post" class="cart">
                      <div class="numbers-row">
                        <input
                          @click="console.log(qty_selected)"
                          type="number"
                          id="french-hens"
                          v-model="qty_selected"
                          min="1"
                        />
                      </div>
                      <button
                        class="single_add_to_cart_button"
                        @click.prevent="
                          store.commit('SET_CART', {
                            id: data.id,
                            qty: qty_selected,
                          })
                        "
                      >
                        Add to cart
                      </button>
                    </form>
                  </div>
                  <div class="quick-desc">
                    {{ data.description }}
                  </div>
                </div>
                <!-- .product-info -->
              </div>
              <!-- .modal-product -->
            </div>
            <!-- .modal-body -->
          </div>
          <!-- .modal-content -->
        </div>
        <!-- .modal-dialog -->
      </div>
      <!-- END Modal -->
      <div class="modal-backdrop fade in"></div>
    </div>
    <!-- END Modal -->
  </teleport>
</template>
<script>
import store from "@/store";

export default {
  name: "ModalProduct",
  props: {
    openModal: Boolean,
    data: Object,
  },
  computed: {
    store() {
      return store;
    },
  },
  data() {
    return {
      qty_selected: 1,
    };
  },
};
</script>
<style scoped lang="scss"></style>
