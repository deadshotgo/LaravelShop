<script>
import VBreadcrumbs from "@/components/VBreadcrumbs.vue";
import ShopingCart from "@/components/cart/ShopingCart.vue";
import CheckoutCart from "@/components/cart/CheckoutCart.vue";
import OrderCart from "@/components/cart/OrderCart.vue";
export default {
  components: { VBreadcrumbs, ShopingCart, CheckoutCart, OrderCart },
  name: "vCart",
  data: () => ({
    shopping: true,
    checkout: false,
    order: false,
  }),
  methods: {
    switchModal(action) {
      switch (action) {
        case 1:
          this.checkout = false;
          this.order = false;
          this.shopping = true;
          break;

        case 2:
          this.shopping = false;
          this.order = false;
          this.checkout = true;
          break;

        case 3:
          this.shopping = false;
          this.checkout = false;
          this.order = true;
          break;
      }
    },
  },
};
</script>

<template>
  <div>
    <VBreadcrumbs
      images="data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAABccA…xMC0xMlQwNTowODowNi0wNTowMJAbvWcAAAAASUVORK5CYII="
      title="Cart"
    />
    <!-- Start page content -->
    <section id="page-content" class="page-wrapper">
      <!-- SHOP SECTION START -->
      <div class="shop-section mb-80">
        <div class="container">
          <div class="row">
            <div class="col-md-2 col-sm-12">
              <ul class="cart-tab">
                <li>
                  <a
                    :class="shopping ? 'active' : ''"
                    @click="switchModal(1)"
                    data-toggle="tab"
                  >
                    <span>01</span>
                    Shopping cart
                  </a>
                </li>
                <li>
                  <a
                    data-toggle="tab"
                    :class="checkout ? 'active' : ''"
                    @click="switchModal(2)"
                  >
                    <span>02</span>
                    Checkout
                  </a>
                </li>
                <li>
                  <a
                    data-toggle="tab"
                    :class="order ? 'active' : ''"
                    @click="switchModal(3)"
                  >
                    <span>03</span>
                    Order complete
                  </a>
                </li>
              </ul>
            </div>
            <div class="col-md-10 col-sm-12">
              <!-- Tab panes -->
              <div class="tab-content">
                <!-- shopping-cart start -->
                <ShopingCart v-if="shopping" />
                <!-- shopping-cart end -->
                <!-- checkout start -->
                <CheckoutCart v-if="checkout" />
                <!-- checkout end -->
                <!-- order-complete start -->
                <OrderCart v-if="order" />
                <!-- order-complete end -->
              </div>
            </div>
          </div>
        </div>
      </div>
      <!-- SHOP SECTION END -->
    </section>
    <!-- End page content -->
  </div>
</template>

<style scoped lang="scss"></style>
