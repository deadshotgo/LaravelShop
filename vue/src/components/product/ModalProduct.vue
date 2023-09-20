<template>
  <!-- Modal -->
  <div v-if="openModal" id="quickview-wrapper">
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
                    <span class="new-price">$ {{ data.price }}</span>
                  </div>
                </div>
                <a class="see-all"></a>
                <router-link :to="{ name: 'product', params: { id: data.id } }"
                  >See all features</router-link
                >
                <div class="quick-add-to-cart">
                  <form method="post" class="cart">
                    <div class="numbers-row">
                      <input type="number" id="french-hens" value="3" />
                    </div>
                    <button class="single_add_to_cart_button" type="submit">
                      Add to cart
                    </button>
                  </form>
                </div>
                <div class="quick-desc">
                  {{ data.description }}
                </div>
                <div class="social-sharing">
                  <div class="widget widget_socialsharing_widget">
                    <h3 class="widget-title-modal">Share this product</h3>
                    <ul class="social-icons clearfix">
                      <li>
                        <a
                          class="facebook"
                          href="#"
                          target="_blank"
                          title="Facebook"
                        >
                          <i class="zmdi zmdi-facebook"></i>
                        </a>
                      </li>
                      <li>
                        <a
                          class="google-plus"
                          href="#"
                          target="_blank"
                          title="Google +"
                        >
                          <i class="zmdi zmdi-google-plus"></i>
                        </a>
                      </li>
                      <li>
                        <a
                          class="twitter"
                          href="#"
                          target="_blank"
                          title="Twitter"
                        >
                          <i class="zmdi zmdi-twitter"></i>
                        </a>
                      </li>
                      <li>
                        <a
                          class="pinterest"
                          href="#"
                          target="_blank"
                          title="Pinterest"
                        >
                          <i class="zmdi zmdi-pinterest"></i>
                        </a>
                      </li>
                      <li>
                        <a class="rss" href="#" target="_blank" title="RSS">
                          <i class="zmdi zmdi-rss"></i>
                        </a>
                      </li>
                    </ul>
                  </div>
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
</template>
<script>
export default {
  name: "ModalProduct",
  props: {
    openModal: Boolean,
    data: Object,
  },
};
</script>
<style scoped lang="scss"></style>
