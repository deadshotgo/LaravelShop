<script>
import HeaderTopBar from "@/components/headers/HeaderTopBar.vue";
import NavbarMenu from "@/components/headers/NavbarMenu.vue";
import ModalCart from "@/components/cart/ModalCart.vue";
import NavbarLogo from "@/components/headers/NavbarLogo.vue";
import MobileMenu from "@/components/headers/MobileMenu.vue";
import { mapActions, mapGetters } from "vuex";
export default {
  name: "MainLayout",
  components: { HeaderTopBar, NavbarMenu, ModalCart, NavbarLogo, MobileMenu },
  computed: {
    ...mapGetters(["VCONTACTS"]),
  },
  methods: {
    ...mapActions(["VGET_CONTACTS"]),
  },
  async mounted() {
    await this.VGET_CONTACTS();
  },
};
</script>

<template>
  <div class="wrapper modal-open">
    <!-- START HEADER AREA -->
    <header class="header-area header-wrapper">
      <!-- header-top-bar -->
      <HeaderTopBar :phoneNumber="this.VCONTACTS.phone_number" />
      <div class="header-middle-area plr-185">
        <div class="container-fluid">
          <div class="full-width-mega-dropdown">
            <div class="row">
              <!-- logo -->
              <NavbarLogo :logo="this.VCONTACTS.path" />
              <!-- primary-menu -->
              <div class="col-md-8 hidden-sm hidden-xs">
                <NavbarMenu type="desktop" />
              </div>
              <div class="col-md-2 col-sm-6 col-xs-12">
                <ModalCart />
              </div>
            </div>
          </div>
        </div>
      </div>
    </header>
    <!-- END HEADER AREA -->
    <MobileMenu />
    <!-- END HEADER AREA -->
    <div id="modal"><!-- HERE OPEN MODAL --></div>
    <router-view />

    <!-- START FOOTER AREA -->
    <footer id="footer" class="footer-area">
      <div class="footer-top">
        <div class="container-fluid">
          <div class="plr-185">
            <div class="footer-top-inner gray-bg">
              <div class="row">
                <div class="col-lg-4 col-md-5 col-sm-4">
                  <div class="single-footer footer-about">
                    <div class="footer-logo">
                      <img src="img/logo/logo.png" alt="" />
                    </div>
                    <div class="footer-brief" v-if="this.VCONTACTS.footer_text">
                      <p>
                        {{ this.VCONTACTS.footer_text }}
                      </p>
                    </div>
                    <ul class="footer-social">
                      <li>
                        <a class="facebook" href="" title="Facebook"
                          ><i class="zmdi zmdi-facebook"></i
                        ></a>
                      </li>
                      <li>
                        <a class="google-plus" href="" title="Google Plus"
                          ><i class="zmdi zmdi-google-plus"></i
                        ></a>
                      </li>
                      <li>
                        <a class="twitter" href="" title="Twitter"
                          ><i class="zmdi zmdi-twitter"></i
                        ></a>
                      </li>
                      <li>
                        <a class="rss" href="" title="RSS"
                          ><i class="zmdi zmdi-rss"></i
                        ></a>
                      </li>
                    </ul>
                  </div>
                </div>
                <div class="col-lg-2 hidden-md hidden-sm">
                  <div class="single-footer">
                    <h4 class="footer-title border-left">Shipping</h4>
                    <ul class="footer-menu">
                      <li>
                        <a href="#"
                          ><i class="zmdi zmdi-circle"></i
                          ><span>New Products</span></a
                        >
                      </li>
                      <li>
                        <a href="#"
                          ><i class="zmdi zmdi-circle"></i
                          ><span>Discount Products</span></a
                        >
                      </li>
                      <li>
                        <a href="#"
                          ><i class="zmdi zmdi-circle"></i
                          ><span>Best Sell Products</span></a
                        >
                      </li>
                      <li>
                        <a href="#"
                          ><i class="zmdi zmdi-circle"></i
                          ><span>Popular Products</span></a
                        >
                      </li>
                      <li>
                        <a href="#"
                          ><i class="zmdi zmdi-circle"></i
                          ><span>Manufactirers</span></a
                        >
                      </li>
                      <li>
                        <a href="#"
                          ><i class="zmdi zmdi-circle"></i
                          ><span>Suppliers</span></a
                        >
                      </li>
                      <li>
                        <a href="#"
                          ><i class="zmdi zmdi-circle"></i
                          ><span>Special Products</span></a
                        >
                      </li>
                    </ul>
                  </div>
                </div>
                <div class="col-lg-2 col-md-3 col-sm-4">
                  <div class="single-footer">
                    <h4 class="footer-title border-left">my account</h4>
                    <ul class="footer-menu">
                      <li>
                        <a href="my-account.html"
                          ><i class="zmdi zmdi-circle"></i
                          ><span>My Account</span></a
                        >
                      </li>
                      <li>
                        <a href="wishlist.html"
                          ><i class="zmdi zmdi-circle"></i
                          ><span>My Wishlist</span></a
                        >
                      </li>
                      <li>
                        <a href="cart.html"
                          ><i class="zmdi zmdi-circle"></i
                          ><span>My Cart</span></a
                        >
                      </li>
                      <li>
                        <a href="login.html"
                          ><i class="zmdi zmdi-circle"></i
                          ><span>Sign In</span></a
                        >
                      </li>
                      <li>
                        <a href="login.html"
                          ><i class="zmdi zmdi-circle"></i
                          ><span>Registration</span></a
                        >
                      </li>
                      <li>
                        <a href="checkout.html"
                          ><i class="zmdi zmdi-circle"></i
                          ><span>Check out</span></a
                        >
                      </li>
                      <li>
                        <a href="order.html"
                          ><i class="zmdi zmdi-circle"></i
                          ><span>Oder Complete</span></a
                        >
                      </li>
                    </ul>
                  </div>
                </div>
                <div class="col-lg-4 col-md-4 col-sm-4">
                  <div class="single-footer">
                    <h4 class="footer-title border-left">Get in touch</h4>
                    <div class="footer-message">
                      <form action="#">
                        <input
                          type="text"
                          name="name"
                          placeholder="Your name here..."
                        />
                        <input
                          type="text"
                          name="email"
                          placeholder="Your email here..."
                        />
                        <textarea
                          class="height-80"
                          name="message"
                          placeholder="Your messege here..."
                        ></textarea>
                        <button
                          class="submit-btn-1 mt-20 btn-hover-1"
                          type="submit"
                        >
                          submit message
                        </button>
                      </form>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
      <div class="footer-bottom black-bg">
        <div class="container-fluid">
          <div class="plr-185">
            <div class="copyright">
              <div class="row">
                <div class="col-sm-6 col-xs-12">
                  <div class="copyright-text">
                    <p>
                      &copy;
                      <a
                        href="https://themeforest.net/user/codecarnival/portfolio"
                        target="_blank"
                        >CodeCarnival</a
                      >
                      2016. All Rights Reserved.
                    </p>
                  </div>
                </div>
                <div class="col-sm-6 col-xs-12">
                  <ul class="footer-payment text-right">
                    <li>
                      <a href="#"><img src="img/payment/1.jpg" alt="" /></a>
                    </li>
                    <li>
                      <a href="#"><img src="img/payment/2.jpg" alt="" /></a>
                    </li>
                    <li>
                      <a href="#"><img src="img/payment/3.jpg" alt="" /></a>
                    </li>
                    <li>
                      <a href="#"><img src="img/payment/4.jpg" alt="" /></a>
                    </li>
                  </ul>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </footer>
    <!-- END FOOTER AREA -->
  </div>
</template>

<style scoped lang="scss"></style>
