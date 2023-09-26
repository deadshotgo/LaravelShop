<script>
import VBreadcrumbs from "@/components/VBreadcrumbs.vue";
import ProductCard from "@/components/ProductCard.vue";
import ProductCarousel from "@/components/ProductCarousel.vue";
import WidgetSearch from "@/components/WidgetSearch.vue";
import WidgetCategories from "@/components/WidgetCategories.vue";
import RecentProducts from "@/components/RecentProducts.vue";
import { Swiper, SwiperSlide } from "swiper/vue";
import { useRoute } from "vue-router";

// Import Swiper styles
import "swiper/css";
import "swiper/css/free-mode";
import "swiper/css/navigation";
import "swiper/css/thumbs";
import { Thumbs } from "swiper/modules";
import { ref } from "vue";
import { EffectFade } from "swiper/modules";
import "swiper/css/effect-fade";
import { mapActions, mapGetters } from "vuex";
export default {
  components: {
    Swiper,
    SwiperSlide,
    ProductCarousel,
    VBreadcrumbs,
    ProductCard,
    WidgetSearch,
    WidgetCategories,
    RecentProducts,
  },
  name: "VProduct",
  data() {
    return {
      quantity: 1,
      descriptionTab: true,
      informationTab: false,
      reviewsTab: false,
    };
  },
  computed: {
    ...mapGetters(["PRODUCT", "FEATURE_PRODUCTS"]),
  },
  methods: {
    increment() {
      if (this.quantity >= this.PRODUCT.qty) return;
      this.quantity++;
    },
    decrement() {
      if (this.quantity === 1) {
        alert("Negative quantity not allowed");
      } else {
        this.quantity--;
      }
    },
    switchModal(action) {
      switch (action) {
        case 1:
          this.descriptionTab = true;
          this.informationTab = false;
          this.reviewsTab = false;
          break;

        case 2:
          this.descriptionTab = false;
          this.informationTab = true;
          this.reviewsTab = false;
          break;

        case 3:
          this.descriptionTab = false;
          this.informationTab = false;
          this.reviewsTab = true;
          break;
      }
    },
    ...mapActions(["GET_PRODUCT", "GET_FEATURE_PRODUCTS"]),
  },
  async created() {
    const route = useRoute();
    await this.GET_PRODUCT({ id: route.params.id });
    await this.GET_FEATURE_PRODUCTS({
      limit: 10,
      is_active: true,
      feature: true,
    });
  },
  setup() {
    const thumbsSwiper = ref(null);
    const setThumbsSwiper = (swiper) => {
      thumbsSwiper.value = swiper;
    };
    return {
      Thumbs,
      thumbsSwiper,
      setThumbsSwiper,
      EffectFade,
    };
  },
};
</script>

<template>
  <div>
    <VBreadcrumbs
      images="data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAABccA…xMC0xMlQwNTowODowNi0wNTowMJAbvWcAAAAASUVORK5CYII="
      title="Product"
    />

    <!-- Start page content -->
    <section id="page-content" class="page-wrapper">
      <!-- SHOP SECTION START -->
      <div class="shop-section mb-80">
        <div class="container">
          <div class="row">
            <div class="col-md-9 col-xs-12">
              <!-- single-product-area start -->
              <div class="single-product-area mb-80">
                <div class="row">
                  <!-- imgs-zoom-area start -->
                  <div class="col-md-5 col-sm-5 col-xs-12">
                    <div class="imgs-zoom-area">
                      <swiper
                        :loop="true"
                        :spaceBetween="10"
                        :thumbs="{ swiper: thumbsSwiper }"
                        :modules="[Thumbs, EffectFade]"
                        effect="fade"
                        class="mySwiper2"
                      >
                        <swiper-slide
                          v-for="(img, i) in PRODUCT?.imageProducts"
                          :key="i"
                          ><img :src="img?.path"
                        /></swiper-slide>
                      </swiper>
                      <swiper
                        @swiper="setThumbsSwiper"
                        :loop="true"
                        :spaceBetween="10"
                        :slidesPerView="4"
                        :freeMode="true"
                        watch-slides-progress
                        :modules="[Thumbs]"
                        class="mySwiper"
                      >
                        <swiper-slide
                          v-for="(img, i) in PRODUCT?.imageProducts"
                          :key="i"
                          ><img :src="img?.path"
                        /></swiper-slide>
                      </swiper>
                    </div>
                  </div>
                  <!-- imgs-zoom-area end -->
                  <!-- single-product-info start -->
                  <div class="col-md-7 col-sm-7 col-xs-12">
                    <div class="single-product-info">
                      <h3 class="text-black-1">{{ PRODUCT.title }}</h3>
                      <h6 class="brand-name-2">{{ PRODUCT?.brand?.name }}</h6>
                      <!-- hr -->
                      <hr />
                      <!-- single-product-tab -->
                      <div class="single-product-tab">
                        <ul class="reviews-tab mb-20">
                          <li :class="{ active: descriptionTab }">
                            <a @click="switchModal(1)" data-toggle="tab"
                              >description</a
                            >
                          </li>
                          <li :class="{ active: informationTab }">
                            <a @click="switchModal(2)" data-toggle="tab"
                              >information</a
                            >
                          </li>
                          <li :class="{ active: reviewsTab }">
                            <a @click="switchModal(3)" data-toggle="tab"
                              >reviews</a
                            >
                          </li>
                        </ul>
                        <div class="tab-content">
                          <div
                            role="tabpanel"
                            class="tab-pane"
                            :class="{ active: descriptionTab }"
                            id="description"
                          >
                            <p>{{ PRODUCT.description }}</p>
                          </div>
                          <div
                            role="tabpanel"
                            class="tab-pane"
                            :class="{ active: informationTab }"
                            id="information"
                          >
                            <p>{{ PRODUCT.information }}</p>
                          </div>
                          <div
                            role="tabpanel"
                            class="tab-pane"
                            :class="{ active: reviewsTab }"
                            id="reviews"
                          >
                            <!-- reviews-tab-desc -->
                            <div class="reviews-tab-desc">
                              <!-- single comments -->
                              <div class="media mt-30">
                                <div class="media-left">
                                  <a href="#"
                                    ><img
                                      class="media-object"
                                      src="../../assets/img/author/1.jpg"
                                      alt="#"
                                  /></a>
                                </div>
                                <div class="media-body">
                                  <div class="clearfix">
                                    <div class="name-commenter pull-left">
                                      <h6 class="media-heading">
                                        <a href="#">Gerald Barnes</a>
                                      </h6>
                                      <p class="mb-10">
                                        27 Jun, 2016 at 2:30pm
                                      </p>
                                    </div>
                                    <div class="pull-right">
                                      <ul class="reply-delate">
                                        <li><a href="#">Reply</a></li>
                                        <li>/</li>
                                        <li><a href="#">Delate</a></li>
                                      </ul>
                                    </div>
                                  </div>
                                  <p class="mb-0">
                                    Lorem ipsum dolor sit amet, consectetur
                                    adipiscing elit. Integer accumsan egestas .
                                  </p>
                                </div>
                              </div>
                              <!-- single comments -->
                              <div class="media mt-30">
                                <div class="media-left">
                                  <a href="#"
                                    ><img
                                      class="media-object"
                                      src="../../assets/img/author/2.jpg"
                                      alt="#"
                                  /></a>
                                </div>
                                <div class="media-body">
                                  <div class="clearfix">
                                    <div class="name-commenter pull-left">
                                      <h6 class="media-heading">
                                        <a href="#">Gerald Barnes</a>
                                      </h6>
                                      <p class="mb-10">
                                        27 Jun, 2016 at 2:30pm
                                      </p>
                                    </div>
                                    <div class="pull-right">
                                      <ul class="reply-delate">
                                        <li><a href="#">Reply</a></li>
                                        <li>/</li>
                                        <li><a href="#">Delate</a></li>
                                      </ul>
                                    </div>
                                  </div>
                                  <p class="mb-0">
                                    Lorem ipsum dolor sit amet, consectetur
                                    adipiscing elit. Integer accumsan egestas .
                                  </p>
                                </div>
                              </div>
                            </div>
                          </div>
                        </div>
                      </div>
                      <!--  hr -->
                      <hr />
                      <!-- single-pro-color-rating -->
                      <div class="single-pro-color-rating clearfix">
                        <div class="sin-pro-color f-left">
                          <p class="color-title f-left">Color</p>
                          <div class="widget-color f-left">
                            <ul>
                              <li
                                v-for="(color, i) in PRODUCT?.colors?.data"
                                :key="i"
                                class="color-1"
                              >
                                <a href="#"></a>
                              </li>
                            </ul>
                          </div>
                        </div>
                        <div class="pro-rating sin-pro-rating f-right">
                          <a href="#" tabindex="0"
                            ><i class="zmdi zmdi-star"></i
                          ></a>
                          <a href="#" tabindex="0"
                            ><i class="zmdi zmdi-star"></i
                          ></a>
                          <a href="#" tabindex="0"
                            ><i class="zmdi zmdi-star"></i
                          ></a>
                          <a href="#" tabindex="0"
                            ><i class="zmdi zmdi-star-half"></i
                          ></a>
                          <a href="#" tabindex="0"
                            ><i class="zmdi zmdi-star-outline"></i
                          ></a>
                          <span class="text-black-5">( 27 Rating )</span>
                        </div>
                      </div>
                      <!-- hr -->
                      <hr />
                      <!-- plus-minus-pro-action -->
                      <div class="plus-minus-pro-action">
                        <div class="sin-plus-minus f-left clearfix">
                          <p class="color-title f-left">Qty</p>
                          <div class="quantity-toggle">
                            <button @click="decrement()">&mdash;</button>
                            <input type="text" :value="quantity" readonly />
                            <button @click="increment()">&#xff0b;</button>
                          </div>
                        </div>
                        <div class="sin-pro-action f-right">
                          <ul class="action-button">
                            <li>
                              <a href="#" title="Wishlist" tabindex="0"
                                ><i class="zmdi zmdi-favorite"></i
                              ></a>
                            </li>
                            <li>
                              <a href="#" title="Compare" tabindex="0"
                                ><i class="zmdi zmdi-refresh"></i
                              ></a>
                            </li>
                            <li>
                              <a href="#" title="Add to cart" tabindex="0"
                                ><i class="zmdi zmdi-shopping-cart-plus"></i
                              ></a>
                            </li>
                          </ul>
                        </div>
                      </div>
                    </div>
                  </div>
                  <!-- single-product-info end -->
                </div>
              </div>
              <!-- single-product-area end -->
              <div class="related-product-area">
                <div class="row">
                  <div class="col-md-12">
                    <div class="section-title text-left mb-40">
                      <h2 class="uppercase">related product</h2>
                      <h6>
                        There are many variations of passages of brands
                        available,
                      </h6>
                    </div>
                  </div>
                </div>
                <div class="row">
                  <div class="active-related-product">
                    <!-- product-item start -->
                    <div class="col-xs-12">
                      <ProductCarousel
                        :bigSizeCount="3"
                        :averageSizeCount="2.5"
                        :smallSizeCount="1"
                        :data="this.FEATURE_PRODUCTS.data"
                        type="product"
                      >
                        <ProductCard />
                      </ProductCarousel>
                    </div>
                    <!-- product-item end -->
                  </div>
                </div>
              </div>
            </div>
            <div class="col-md-3 col-xs-12">
              <!-- widget-search -->
              <!-- widget-search -->
              <WidgetSearch />
              <!-- widget-search -->
              <!-- widget-categories -->
              <WidgetCategories />
              <!-- operating-system -->
              <!-- widget-product -->
              <RecentProducts />
            </div>
          </div>
        </div>
      </div>
      <!-- SHOP SECTION END -->
    </section>
  </div>
</template>

<style scoped lang="scss">
.swiper {
  width: 100%;
  height: 100%;
}

.swiper-slide {
  text-align: center;
  font-size: 18px;
  background: #fff;

  /* Center slide text vertically */
  display: flex;
  justify-content: center;
  align-items: center;
}

.swiper-slide img {
  display: block;
  width: 100%;
  height: 100%;
  object-fit: cover;
}

.swiper {
  width: 100%;
  height: 300px;
  margin-left: auto;
  margin-right: auto;
}

.swiper-slide {
  background-size: cover;
  background-position: center;
}

.mySwiper2 {
  height: 80%;
  width: 100%;
}

.mySwiper {
  height: 20%;
  box-sizing: border-box;
  padding: 10px 0;
}

.mySwiper .swiper-slide {
  width: 25%;
  height: 100%;
  opacity: 0.4;
}

.mySwiper .swiper-slide-thumb-active {
  opacity: 1;
}

.swiper-slide img {
  display: block;
  width: 100%;
  height: 100%;
  object-fit: cover;
}
$border: 2px solid #ddd;

.quantity-toggle {
  display: flex;

  input {
    height: 38px;
    border: 0;
    border-top: $border;
    border-bottom: $border;
    width: 4rem;
    text-align: center;
    padding: 0 0.5rem;
  }

  button {
    height: 100%;
    border: $border;
    padding: 0.5rem;
    background: #f5f5f5;
    color: #888;
    font-size: 1.3rem;
    cursor: pointer;
  }
}
.reviews-tab > li {
  cursor: pointer;
  margin-right: 18px;
}
.reviews-tab {
  display: flex;
  padding-left: 0px;
}
</style>
