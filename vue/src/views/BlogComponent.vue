<script>
import VBreadcrumbs from "@/components/VBreadcrumbs.vue";

export default {
  name: "BlogComponent",
  components: { VBreadcrumbs },
  data() {
    return {
      data: " ",
      activeSmallList: null,
      activeList: null,
      baseData: [
        {
          img: "../assets/img/others/error.jpg",
          blogTitle: "dummy Blog name name",
          text:
            "There are many variations of passages of in psum available,\n" +
            "                    but the majority have sufe ered on in some form...",
        },
        {
          img: "../assets/img/others/error.jpg",
          blogTitle: "dummy Blog name name",
          text:
            "There are many variations of passages of in psum available,\n" +
            "                    but the majority have sufe ered on in some form...",
        },
      ],
      categories: [
        { brandOne: "Brand one", product: { phone: "Phone", tv: "tv" } },
        {
          brandOne: "Brasdcs  nd one",
          product: { phone: "Pwedwehone", tv: "tewdwev" },
        },
      ],
      recentPost: [
        {
          img: "../assets/img/others/404Error.jpg",
          text: "Some text",
        },
        {
          img: "../assets/img/others/404Error.jpg",
          text: "Some text2",
        },
      ],
      tags: { ios: "Ios", phone: "phone", tv: "tv" },
    };
  },
  methods: {
    toggleList(listNumber) {
      if (this.activeList === listNumber) {
        this.activeList = null; // Если список уже активен, закрываем его
      } else {
        this.activeList = listNumber;
      }
    },
    toggleSmallList(listNumber) {
      if (this.activeSmallList === listNumber) {
        this.activeSmallList = null; // Если список уже активен, закрываем его
      } else {
        this.activeSmallList = listNumber;
      }
    },
  },
};
</script>

<template>
  <VBreadcrumbs
    title="Blog"
    images="data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAABccA…xMC0xMlQwNTowODowNi0wNTowMJAbvWcAAAAASUVORK5CYII="
  ></VBreadcrumbs>
  <div class="blog-section mb-50">
    <div class="container">
      <div class="row">
        <!-- blog-option start -->
        <div class="col-md-12">
          <div class="blog-option box-shadow mb-30 clearfix">
            <!-- categories -->
            <div class="dropdown f-left">
              <button class="option-btn" @click="toggleList(1)">
                Categories
                <i v-if="activeList === 1" class="zmdi zmdi-chevron-up"></i>
                <i v-else class="zmdi zmdi-chevron-down"></i>
              </button>
              <div
                class="dropdown-width mt-30 dropdownn opened-menu menu-center"
                :class="{ 'dropdownn-after': activeList === 1 }"
              >
                <aside class="widget widget-categories box-shadow bord">
                  <h6 class="widget-title border-left mb-20">Categories</h6>
                  <div
                    id="cat-treeview"
                    class="product-cat"
                    v-for="category in this.categories"
                    :key="category.brandOne"
                  >
                    <ul>
                      <li class="closed expandable">
                        <div
                          class="hitarea closed-hitarea expandable-hitarea"
                        ></div>
                        <a @click="toggleSmallList(category.brandOne)">{{
                          category.brandOne
                        }}</a>
                        <ul
                          v-for="(productValue, productKey) in category.product"
                          :key="productKey"
                          class="dropdownn"
                          :class="{
                            'dropdownn-after':
                              activeSmallList === category.brandOne,
                          }"
                        >
                          <li>
                            <a href="#">{{ productValue }}</a>
                          </li>
                        </ul>
                      </li>
                    </ul>
                  </div>
                </aside>
              </div>
            </div>
            <!-- recent-product -->
            <div class="dropdown f-left">
              <button class="option-btn" @click="toggleList(2)">
                Recent Post
                <i v-if="activeList === 2" class="zmdi zmdi-chevron-up"></i>
                <i v-else class="zmdi zmdi-chevron-down"></i>
              </button>
              <div
                class="dropdown-width mt-30 dropdownn opened-menu"
                :class="{ 'dropdownn-after': activeList === 2 }"
              >
                <aside class="widget widget-product box-shadow bord">
                  <h6 class="widget-title border-left mb-20">
                    recent products
                  </h6>
                  <!-- product-item start -->
                  <div
                    class="product-item"
                    v-for="(data, i) in this.recentPost"
                    :key="i"
                  >
                    <div class="product-img">
                      <a href="single-product.html">
                        <img src="[`data.img`]" alt="" />
                      </a>
                    </div>
                    <div class="product-info">
                      <h6 class="product-title multi-line mt-10">
                        <a href="single-product.html">{{ data.text }}</a>
                      </h6>
                    </div>
                  </div>
                </aside>
              </div>
            </div>
            <!-- Tags -->
            <div class="dropdown f-left">
              <button class="option-btn" @click="toggleList(3)">
                Tags
                <i v-if="activeList === 3" class="zmdi zmdi-chevron-up"></i>
                <i v-else class="zmdi zmdi-chevron-down"></i>
              </button>
              <div
                class="dropdown-width mt-30 dropdownn opened-menu"
                :class="{ 'dropdownn-after': activeList === 3 }"
              >
                <aside class="widget widget-tags box-shadow bord menu-center">
                  <h6 class="widget-title border-left mb-20">Tags</h6>
                  <ul
                    class="widget-tags-list"
                    v-for="(tag, i) in this.tags"
                    :key="i"
                  >
                    <li>
                      <a href="#">{{ tag }}</a>
                    </li>
                  </ul>
                </aside>
              </div>
            </div>
          </div>
        </div>
        <!-- blog-option end -->
      </div>
      <div class="row">
        <!-- blog-item start -->
        <div
          class="col-sm-6 col-xs-12"
          v-for="(data, i) in this.baseData"
          :key="i"
        >
          <div class="blog-item-2">
            <div class="row">
              <div class="col-md-6 col-xs-12">
                <div class="blog-image">
                  <a href="blog-details.html"
                    ><img :src="`${data.img}`" alt=""
                  /></a>
                </div>
              </div>
              <div class="col-md-6 col-xs-12">
                <div class="blog-desc">
                  <h5 class="blog-title-2">
                    <a href="#">{{ data.blogTitle }}</a>
                  </h5>
                  <p>{{ data.text }}</p>
                  <div class="read-more">
                    <a href="#">Read more</a>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</template>

<style scoped>
.dropdownn {
  max-height: 0px;
  transition: max-height 0.2s ease-in-out;
  overflow: hidden;
}
.dropdownn-after {
  max-height: 700px;
  transition: max-height 0.5s ease-in-out;
}
.opened-menu {
  position: absolute;
  background-color: white;
  z-index: 9999;
}
.bord {
  border: 1px solid rgba(0, 0, 0, 0.15);
}
@media screen and (max-width: 500px) {
  .dropdownn {
    left: 50%;
    margin: 0 0 0 -125px;
  }
}
</style>
