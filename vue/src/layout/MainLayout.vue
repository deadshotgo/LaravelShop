<script>
import ModalCart from "@/components/cart/ModalCart.vue";

export default {
  components: { ModalCart },
  name: "MainLayout",
};
</script>

<template>
  <div class="wrapper">
    <!-- START HEADER AREA -->
    <header class="header-area header-wrapper">
      <!-- header-top-bar -->
      <div class="header-top-bar plr-185">
        <div class="container-fluid">
          <div class="row">
            <div class="col-sm-6 hidden-xs">
              <div class="call-us">
                <p class="mb-0 roboto">(+88) 01234-567890</p>
              </div>
            </div>
            <div class="col-sm-6 col-xs-12">
              <div class="top-link clearfix">
                <ul class="link f-right">
                  <li>
                    <a href="my-account.html">
                      <i class="zmdi zmdi-account"></i>
                      My Account
                    </a>
                  </li>
                  <li>
                    <a href="wishlist.html">
                      <i class="zmdi zmdi-favorite"></i>
                      Wish List (0)
                    </a>
                  </li>
                  <li>
                    <a href="login.html">
                      <i class="zmdi zmdi-lock"></i>
                      Login
                    </a>
                  </li>
                </ul>
              </div>
            </div>
          </div>
        </div>
      </div>
      <!-- header-middle-area -->
      <div class="header-middle-area plr-185">
        <div class="container-fluid">
          <div class="full-width-mega-dropdown">
            <div class="row">
              <!-- logo -->
              <div class="col-md-2 col-sm-6 col-xs-12">
                <div class="logo">
                  <a href="index.html">
                    <img src="../assets/img/logo/logo.png" alt="main logo" />
                  </a>
                </div>
              </div>
              <!-- primary-menu -->
              <div class="col-md-8 hidden-sm hidden-xs">
                <nav id="primary-menu">
                  <ul class="main-menu text-center">
                    <li>
                      <router-link to="/">Home</router-link>
                    </li>
                    <li class="mega-parent">
                      <a href="#">Products</a>
                      <div class="mega-menu-area clearfix">
                        <div class="mega-menu-link f-left">
                          <ul class="single-mega-item">
                            <li class="menu-title">Smart Phone</li>
                            <li>
                              <a href="#">All Mobile Phones</a>
                            </li>
                            <li>
                              <a href="#">Smart phones</a>
                            </li>
                            <li>
                              <a href="#">Android Mobiles</a>
                            </li>
                            <li>
                              <a href="#">Windows Mobiles</a>
                            </li>
                            <li>
                              <a href="#">Refurbished Mobiles</a>
                            </li>
                            <li>
                              <a href="#">All Mobile Accessories</a>
                            </li>
                            <li>
                              <a href="#">Cases & Covers</a>
                            </li>
                          </ul>
                          <ul class="single-mega-item">
                            <li class="menu-title">Note Book</li>
                            <li>
                              <a href="">All Note Books</a>
                            </li>
                            <li>
                              <a href="">Smart notebooks</a>
                            </li>
                            <li>
                              <a href="">Android Note Book</a>
                            </li>
                            <li>
                              <a href="">Windows Note Books</a>
                            </li>
                            <li>
                              <a href="">Refurbished Note Books</a>
                            </li>
                            <li>
                              <a href="">Note Books Accessories</a>
                            </li>
                            <li>
                              <a href="">Cases & Covers</a>
                            </li>
                          </ul>
                          <ul class="single-mega-item">
                            <li class="menu-title">Tablets</li>
                            <li>
                              <a href="">All Tablets</a>
                            </li>
                            <li>
                              <a href="">Smart tablets</a>
                            </li>
                            <li>
                              <a href="">Android Tablets</a>
                            </li>
                            <li>
                              <a href="">Windows Tablets</a>
                            </li>
                            <li>
                              <a href="">Refurbished Tablets</a>
                            </li>
                            <li>
                              <a href="">Tablets Accessories</a>
                            </li>
                            <li>
                              <a href="">Cases & Covers</a>
                            </li>
                          </ul>
                        </div>
                        <div class="mega-menu-photo f-left">
                          <a href="#">
                            <img
                              src="../assets/img/mega-menu/1.jpg"
                              alt="mega menu image"
                            />
                          </a>
                        </div>
                      </div>
                    </li>
                    <li>
                      <a href="blog.html">Blog</a>
                      <ul class="dropdwn">
                        <li>
                          <a href="blog.html">Blog</a>
                        </li>
                        <li>
                          <a href="blog-left-sidebar.html">Blog Left Sidebar</a>
                        </li>
                        <li>
                          <a href="blog-right-sidebar.html"
                            >Blog Right Sidebar</a
                          >
                        </li>
                        <li>
                          <a href="blog-2.html">Blog style 2</a>
                        </li>
                        <li>
                          <a href="blog-2-left-sidebar.html"
                            >Blog 2 Left Sidebar</a
                          >
                        </li>
                        <li>
                          <a href="blog-2-right-sidebar.html"
                            >Blog 2 Right Sidebar</a
                          >
                        </li>
                        <li>
                          <a href="blog-details.html">Blog Details</a>
                        </li>
                      </ul>
                    </li>
                    <li>
                      <a href="about.html">About us</a>
                    </li>
                    <li>
                      <a href="contact.html">Contact</a>
                    </li>
                  </ul>
                </nav>
              </div>
              <!-- header-search & total-cart -->
              <div class="col-md-2 col-sm-6 col-xs-12">
                <div class="search-top-cart f-right">
                  <!-- header-search -->
                  <div class="header-search f-left">
                    <div class="header-search-inner">
                      <button class="search-toggle">
                        <i class="zmdi zmdi-search"></i>
                      </button>
                      <form action="#">
                        <div class="top-search-box">
                          <input
                            type="text"
                            placeholder="Search here your product..."
                          />
                          <button type="submit">
                            <i class="zmdi zmdi-search"></i>
                          </button>
                        </div>
                      </form>
                    </div>
                  </div>
                  <!-- total-cart -->
                  <ModalCart />
                  <!-- total-cart -->
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </header>
    <!-- END HEADER AREA -->

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
                    <div class="footer-brief">
                      <p>
                        Lorem Ipsum is simply dummy text of the printing and
                        typesetting industry. Lorem Ipsum has been the subas
                        industry's standard dummy text ever since the 1500s,
                      </p>
                      <p>
                        When an unknown printer took a galley of type and If you
                        are going to use a passage of Lorem Ipsum scrambled it
                        to make.
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
