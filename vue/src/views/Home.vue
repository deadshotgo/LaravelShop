<template>
  <div>
    <div
      class="slider-area youtube-bg bg-opacity-black-60 dotted-overlay ptb-150 mb-80 mb_YTPlayer isMuted"
      id="YTP_1690710410000"
      style="position: relative"
    >
      <span
        id="controlBar_YTP_1690710410000"
        class="mb_YTPBar inlinePlayer compact"
        style="
          white-space: nowrap;
          position: absolute;
          z-index: 1000;
          display: none;
        "
        ><div class="buttonBar">
          <span class="mb_YTPPlaypause ytpicon">P</span
          ><span class="mb_YTPMuteUnmute ytpicon">A</span>
          <div
            class="mb_YTPVolumeBar simpleSlider muted"
            style="display: inline-block; cursor: auto"
          >
            <div class="level horizontal" style="width: 0%"></div>
          </div>
          <span class="mb_YTPTime">-- : -- / -- : --</span
          ><span class="mb_YTPUrl ytpicon" title="view on YouTube">Y</span
          ><span class="mb_OnlyYT ytpicon">O</span>
        </div>
        <div class="mb_YTPProgress" style="position: absolute">
          <div
            class="mb_YTPLoaded"
            style="position: absolute; left: 0px; width: 0%"
          ></div>
          <div
            class="mb_YTPseekbar"
            style="position: absolute; left: 0px"
          ></div></div
      ></span>
      <div
        class="mbYTP_wrapper"
        id="wrapper_mbYTP_YTP_1690710410000"
        style="
          position: absolute;
          z-index: 0;
          min-width: 100%;
          min-height: 100%;
          left: 0px;
          top: 0px;
          overflow: hidden;
          opacity: 0;
        "
      >
        <iframe
          id="mbYTP_YTP_1690710410000"
          class="playerBox"
          style="
            position: absolute;
            z-index: 0;
            width: 1001px;
            height: 564px;
            top: 0px;
            left: 0px;
            overflow: hidden;
            opacity: 1;
            user-select: none;
            margin-top: -54px;
            margin-left: 0px;
          "
          frameborder="0"
          allowfullscreen="1"
          allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share"
          title="YouTube video player"
          width="640"
          height="360"
          src="https://www.youtube.com/embed/_OA2oggXehk?modestbranding=1&amp;autoplay=0&amp;controls=0&amp;showinfo=0&amp;rel=0&amp;enablejsapi=1&amp;version=3&amp;playerapiid=mbYTP_YTP_1690710410000&amp;origin=*&amp;allowfullscreen=true&amp;wmode=transparent&amp;iv_load_policy=3&amp;html5=1&amp;widgetid=1"
          unselectable="on"
        ></iframe>
        <div
          class="YTPOverlay"
          style="
            position: absolute;
            top: 0px;
            left: 0px;
            width: 100%;
            height: 100%;
          "
        ></div>
      </div>
      <div class="container" style="position: relative">
        <div class="row">
          <div class="col-md-12">
            <div class="slider-desc-3 slider-desc-4 text-center">
              <Transition>
                <div class="wow fadeInUp">
                  <h1 class="slider1-title-4 h1-t">new smart phone</h1>
                </div>
              </Transition>
              <Transition>
                <div class="wow fadeInUp">
                  <h2 class="slider2-title-3 h1-p">Samsung grand 6</h2>
                </div>
              </Transition>
              <Transition>
                <div class="slider-button wow fadeInUp">
                  <a href="#" class="button small button-white">
                    <span class="text-uppercase">Buy now</span>
                  </a>
                </div>
              </Transition>
            </div>
          </div>
        </div>
      </div>
    </div>
    <section id="page-content" class="page-wrapper">
      <!-- PRODUCT TAB SECTION START -->
      <div class="product-tab-section mb-50">
        <div class="container">
          <div class="row">
            <div class="col-md-6 col-sm-12 col-xs-12">
              <div class="section-title text-left mb-40">
                <h2 class="uppercase">product list</h2>
                <h6>
                  There are many variations of passages of brands available,
                </h6>
              </div>
            </div>
            <div class="col-md-6 col-sm-12 col-xs-12">
              <div class="pro-tab-menu">
                <!-- Nav tabs -->
                <ul>
                  <li :class="{ active: popularProduct }">
                    <a @click="tabs(1)" data-toggle="tab">Popular Products </a>
                  </li>
                  <li :class="{ active: arrivalProduct }">
                    <a @click="tabs(2)" data-toggle="tab">New Arrival</a>
                  </li>
                  <li :class="{ active: recommendProduct }">
                    <a @click="tabs(3)" data-toggle="tab">Recommendation</a>
                  </li>
                </ul>
              </div>
            </div>
          </div>
          <div class="product-tab">
            <!-- Tab panes -->
            <div class="tab-content">
              <!-- popular-product start -->
              <div class="tab-pane active" id="popular-product">
                <div class="row">
                  <div
                    v-for="(product, i) in PRODUCTS.data"
                    :key="i"
                    class="col-md-3 col-sm-4 col-xs-12"
                  >
                    <ProductCard
                      @openModal="handleModal"
                      type="product"
                      :data="product"
                    />
                  </div>
                </div>
              </div>
              <!-- special-offer end -->
            </div>
          </div>
        </div>
      </div>
      <!-- PRODUCT TAB SECTION END -->

      <!-- FEATURED PRODUCT  SECTION START -->
      <div class="featured-product-section mb-50">
        <div class="container">
          <div class="row">
            <div class="col-md-12">
              <div class="section-title text-left mb-40">
                <h2 class="uppercase">Featured product</h2>
                <h6>
                  There are many variations of passages of brands available,
                </h6>
              </div>
            </div>
          </div>
          <div class="featured-product">
            <ProductCarousel
              :bigSizeCount="4"
              :averageSizeCount="2.5"
              :smallSizeCount="1"
              :data="FEATURE_PRODUCTS.data"
              type="product"
            >
            </ProductCarousel>
          </div>
        </div>
      </div>
      <!-- FEATURED PRODUCT SECTION END -->

      <!-- UP COMMING PRODUCT SECTION START -->
      <div class="up-comming-product-section mb-80">
        <div class="container">
          <div class="row">
            <!-- up-comming-pro -->
            <div class="col-md-8 col-sm-12 col-xs-12">
              <div class="up-comming-pro gray-bg clearfix">
                <div class="up-comming-pro-img f-left">
                  <a href="#">
                    <img src="../assets/img/up-comming/1.jpg" alt="" />
                  </a>
                </div>
                <div class="up-comming-pro-info f-left">
                  <h3><a href="#">Dummy Product Name</a></h3>
                  <p>
                    Lorem ipsum dolor sit amet, consectetur adipisicing elitest,
                    sed do eiusmod tempor incididunt ut labore et dolores top
                    magna aliqua. Ut enim ad minim veniam, quis nostrud exer
                    citation ullamco laboris nisi ut aliquip ex ea commodo
                    consequat. laborum.
                  </p>
                  <div class="up-comming-time">
                    <div data-countdown="2017/01/15">
                      <span class="cdown days"
                        ><span class="time-count">0</span>
                        <p>Days</p></span
                      >
                      <span class="cdown hour"
                        ><span class="time-count">0</span>
                        <p>Hour</p></span
                      >
                      <span class="cdown minutes"
                        ><span class="time-count">00</span>
                        <p>Mint</p></span
                      >
                      <span class="cdown second">
                        <span
                          ><span class="time-count">00</span>
                          <p>Sec</p></span
                        ></span
                      >
                    </div>
                  </div>
                </div>
              </div>
            </div>
            <div class="col-md-4 hidden-sm col-xs-12">
              <div class="banner-item banner-1">
                <div class="ribbon-price">
                  <span>$ 896.00</span>
                </div>
                <div class="banner-img">
                  <a href="#"
                    ><img src="../assets/img/banner/1.jpg" alt=""
                  /></a>
                </div>
                <div class="banner-info">
                  <h3><a href="#">Product Name</a></h3>
                  <ul class="banner-featured-list">
                    <li>
                      <i class="zmdi zmdi-check"></i
                      ><span>Lorem ipsum dolor</span>
                    </li>
                    <li>
                      <i class="zmdi zmdi-check"></i
                      ><span>amet, consectetur</span>
                    </li>
                    <li>
                      <i class="zmdi zmdi-check"></i
                      ><span>adipisicing elitest,</span>
                    </li>
                    <li>
                      <i class="zmdi zmdi-check"></i><span>eiusmod tempor</span>
                    </li>
                    <li>
                      <i class="zmdi zmdi-check"></i
                      ><span>labore et dolore.</span>
                    </li>
                  </ul>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
      <!-- UP COMMING PRODUCT SECTION END -->

      <!-- BY BRAND SECTION START-->
      <div class="by-brand-section mb-80">
        <div class="container">
          <div class="row">
            <div class="col-md-12">
              <div class="section-title text-left mb-40">
                <h2 class="uppercase">By Brands</h2>
                <h6>
                  There are many variations of passages of brands available,
                </h6>
              </div>
            </div>
          </div>
          <div class="by-brand-product">
            <div class="row">
              <!-- single-brand-product start -->
              <ProductCarousel
                :bigSizeCount="4"
                :averageSizeCount="2.5"
                :smallSizeCount="1"
                :data="BRANDS"
                type="brand"
              />
              <!-- single-brand-product end -->
            </div>
          </div>
        </div>
      </div>
      <!-- BY BRAND SECTION END -->

      <!-- BLOG SECTION START -->
      <div class="blog-section mb-50">
        <div class="container">
          <div class="row">
            <div class="col-md-12">
              <div class="section-title text-left mb-40">
                <h2 class="uppercase">Latest blog</h2>
                <h6>
                  There are many variations of passages of brands available,
                </h6>
              </div>
            </div>
          </div>
          <div class="blog">
            <div class="row active-blog">
              <!-- blog-item start -->
              <ProductCarousel
                :bigSizeCount="3"
                :averageSizeCount="1.5"
                :smallSizeCount="1"
                :data="BLOGS.data"
                type="blog"
              >
              </ProductCarousel>
              <!-- blog-item end -->
            </div>
          </div>
        </div>
      </div>
      <!-- BLOG SECTION END -->
    </section>
    <!-- End page content -->
  </div>
</template>

<script>
import ProductCard from "@/components/ProductCard.vue";
import ProductCarousel from "@/components/ProductCarousel.vue";
import { mapActions, mapGetters } from "vuex";

export default {
  name: "HomeView",
  components: { ProductCarousel, ProductCard },
  data() {
    return {
      productData: {},
      popularProduct: true,
      arrivalProduct: false,
      recommendProduct: false,
    };
  },
  computed: {
    ...mapGetters(["BRANDS", "BLOGS", "PRODUCTS", "FEATURE_PRODUCTS"]),
  },
  methods: {
    handleModal(data) {
      this.openModal = true;
      this.productData = data;
    },
    tabs(id) {
      switch (id) {
        case 1:
          (this.popularProduct = true), (this.arrivalProduct = false);
          this.recommendProduct = false;
          this.GET_PRODUCTS({
            limit: 12,
            is_active: true,
            sorted: {
              like: true,
            },
          });
          break;
        case 2:
          (this.popularProduct = false), (this.arrivalProduct = true);
          this.recommendProduct = false;
          this.GET_PRODUCTS({
            limit: 12,
            is_active: true,
            sorted: {
              created_at: true,
            },
          });
          break;
        case 3:
          (this.popularProduct = false), (this.arrivalProduct = false);
          this.recommendProduct = true;
          this.GET_PRODUCTS({
            limit: 12,
            is_active: true,
            feature: true,
          });
          break;
      }
    },
    ...mapActions([
      "GET_BRANDS",
      "GET_BLOGS",
      "GET_PRODUCTS",
      "GET_FEATURE_PRODUCTS",
    ]),
  },

  created() {
    this.GET_BRANDS();
    this.GET_BLOGS();
    this.GET_FEATURE_PRODUCTS({
      limit: 10,
      is_active: true,
      feature: true,
    });
    this.GET_PRODUCTS({
      limit: 12,
      is_active: true,
      sorted: {
        like: true,
      },
    });
  },
};
</script>
<style scoped lang="scss">
.modal-backdrop {
  /* position: fixed; */
  top: 0;
  right: 0;
  bottom: 0;
  left: 0;
  z-index: 1040;
  background-color: #000;
}
.modal {
  top: 0;
  right: 0;
  bottom: 0;
  left: 0;
  z-index: 1050;
  display: none;
  overflow: hidden;
  -webkit-overflow-scrolling: touch;
  outline: 0;
}
.h1-t {
  font-size: 40px;
  color: #fff;
}
.h1-p {
  font-size: 24px;
}
.pro-tab-menu > ul > li > a {
  cursor: pointer;
}
@media screen and (max-width: 500px) {
  .h1-t {
    font-size: 22px;
  }
  .h1-p {
    font-size: 12px;
  }
}
</style>
