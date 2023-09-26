<script>
import { mapActions, mapGetters, mapMutations } from "vuex";

export default {
  name: "ShopingCart",
  data() {
    return {
      quantity: 1,
    };
  },
  computed: {
    ...mapGetters(["CART_PRODUCTS", "CART_GET"]),
  },

  methods: {
    cartCount(id, type) {
      this.CART_GET.filter((i) => i.id === id).map((e) => {
        if (type === "increment") {
          e.qty++;
        } else if (type === "decrement") {
          if (e.qty <= 1) return;
          e.qty--;
        } else {
          return;
        }
        localStorage.setItem("cart", JSON.stringify(this.CART_GET));
      });
    },
    sumProduct(id, price) {
      const cart = this.CART_GET.filter((a) => a.id === id);
      if (!cart.length) return;
      return price * cart?.[0]?.qty;
    },
    getAllSumPrice() {
      let allPrice = 0;
      this.CART_PRODUCTS.forEach((e) => {
        const cart = this.CART_GET.filter((a) => a.id === e.id);
        console.log(cart);
        allPrice += e.price * cart?.[0]?.qty;
      });
      return allPrice;
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
};
</script>

<template>
  <div>
    <div class="shopping-cart-content">
      <form action="#">
        <div class="table-content table-responsive mb-50">
          <table class="text-center">
            <thead>
              <tr>
                <th class="product-thumbnail">product</th>
                <th class="product-price">price</th>
                <th class="product-quantity">Quantity</th>
                <th class="product-subtotal">total</th>
                <th class="product-remove">remove</th>
              </tr>
            </thead>
            <tbody>
              <!-- tr -->
              <tr v-for="(product, i) in CART_PRODUCTS" :key="i">
                <td class="product-thumbnail">
                  <div class="pro-thumbnail-img">
                    <img
                      style="max-width: 120px"
                      :src="product?.imageProducts?.[0]?.path"
                      alt="Cart Product"
                    />
                  </div>
                  <div class="pro-thumbnail-info text-left">
                    <h6 class="product-title-2">
                      <a href="#">{{ product.title }}</a>
                    </h6>
                    <p>Brand: Brand Name</p>
                    <p>Model: Grand s2</p>
                    <p>Color: Black, White</p>
                  </div>
                </td>
                <td class="product-price">$ {{ product.price }}</td>
                <td class="product-quantity">
                  <div class="cart-plus-minus f-left">
                    <button @click.prevent="cartCount(product.id, 'decrement')">
                      &mdash;
                    </button>
                    <input
                      type="text"
                      class="cart-plus-minus-box"
                      :value="
                        this.CART_GET.filter((e) => e.id === product.id)?.[0]
                          ?.qty
                      "
                      readonly
                    />
                    <button @click.prevent="cartCount(product.id, 'increment')">
                      &#xff0b;
                    </button>
                  </div>
                </td>
                <td class="product-subtotal">
                  $ {{ sumProduct(product.id, product.price) }}
                </td>
                <td class="product-remove">
                  <a @click.prevent="cartItemDelete(product.id)"
                    ><i class="zmdi zmdi-close"></i
                  ></a>
                </td>
              </tr>
            </tbody>
          </table>
        </div>
        <div class="row">
          <div class="col-md-6">
            <div class="payment-details box-shadow p-30 mb-50">
              <h6 class="widget-title border-left mb-20">payment details</h6>
              <table>
                <tr>
                  <td class="td-title-1">Cart Subtotal</td>
                  <td class="td-title-2">$ {{ getAllSumPrice() }}</td>
                </tr>
                <tr>
                  <td class="order-total">Order Total</td>
                  <td class="order-total-price">$ {{ getAllSumPrice() }}</td>
                </tr>
              </table>
            </div>
          </div>
        </div>
      </form>
    </div>
  </div>
</template>

<style scoped lang="scss"></style>
