<script>
import { mapActions, mapGetters, mapMutations } from "vuex";

export default {
  name: "ModalCart",
  computed: {
    ...mapGetters(["COUNT_CART", "CART_PRODUCTS", "CART_GET"]),
  },
  methods: {
    totalSum(cartProduct) {
      let total = 0;
      cartProduct.map((product) => {
        const cart = this.CART_GET.filter((a) => a.id === product.id);
        if (cart.length) {
          product.allPrice = product.price * cart[0].qty;
          total += product.allPrice;
        }
      });
      return total;
    },
    cartItemDelete(id) {
      const refCart = this.CART_GET.filter((e) => e.id !== id);
      localStorage.setItem("cart", JSON.stringify(refCart));
      this.SET_CART_DATA(refCart || []);
      if (refCart) {
        this.GET_CART_PRODUCTS({ id: refCart.map((i) => i.id).join(",") });
      }
    },
    ...mapMutations(["SET_CART_DATA"]),
    ...mapActions(["GET_CART_PRODUCTS"]),
  },
  created() {
    this.CART_GET
      ? this.GET_CART_PRODUCTS({ id: this.CART_GET.map((i) => i.id).join(",") })
      : "";
  },
};
</script>

<template>
  <div class="search-top-cart f-right">
    <div class="header-search f-left">
      <div class="header-search-inner">
        <button class="search-toggle">
          <i class="zmdi zmdi-search"></i>
        </button>
        <form action="#">
          <div class="top-search-box">
            <input type="text" placeholder="Search here your product..." />
            <button type="submit">
              <i class="zmdi zmdi-search"></i>
            </button>
          </div>
        </form>
      </div>
    </div>
    <div class="total-cart f-left">
      <div class="total-cart-in">
        <div class="cart-toggler">
          <a href="#">
            <span class="cart-quantity">{{ COUNT_CART }}</span
            ><br />
            <span class="cart-icon">
              <i class="zmdi zmdi-shopping-cart-plus"></i>
            </span>
          </a>
        </div>
        <ul style="padding: 0px">
          <li>
            <div class="top-cart-inner your-cart">
              <h5 class="text-capitalize">Your Cart</h5>
            </div>
          </li>
          <li>
            <div class="total-cart-pro">
              <!-- single-cart -->
              <div
                v-for="(product, i) in CART_PRODUCTS"
                :key="i"
                class="single-cart clearfix"
              >
                <div class="cart-img f-left">
                  <a href="#">
                    <img
                      style="max-width: 120px"
                      :src="product?.imageProducts?.[0]?.path"
                      alt="Cart Product"
                    />
                  </a>
                  <div class="del-icon">
                    <a @click.prevent="cartItemDelete(product?.id)">
                      <i class="zmdi zmdi-close"></i>
                    </a>
                  </div>
                </div>
                <div class="cart-info f-left">
                  <h6 class="text-capitalize">
                    <a href="#">{{ product?.title }}</a>
                  </h6>
                  <p>
                    <span>Brand <strong>:</strong></span
                    >Brand Name
                  </p>
                  <p>
                    <span>Model <strong>:</strong></span
                    >Grand s2
                  </p>
                  <p>
                    <span>Color <strong>:</strong></span
                    >Black, White
                  </p>
                </div>
              </div>
            </div>
          </li>
          <li>
            <div class="top-cart-inner subtotal">
              <h4 class="text-uppercase g-font-2">
                Total =
                <span>$ {{ totalSum(CART_PRODUCTS) }}</span>
              </h4>
            </div>
          </li>
          <li>
            <div class="top-cart-inner view-cart">
              <h4 class="text-uppercase">
                <router-link to="/cart">View cart</router-link>
              </h4>
            </div>
          </li>
          <li>
            <div class="top-cart-inner check-out">
              <h4 class="text-uppercase">
                <router-link to="/cart">Checkout</router-link>
              </h4>
            </div>
          </li>
        </ul>
      </div>
    </div>
  </div>
</template>

<style scoped lang="scss"></style>
