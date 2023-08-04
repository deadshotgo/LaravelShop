<template>
  <div class="breadcrumbs-section plr-200 mb-80">
    <div class="breadcrumbs overlay-bg">
      <div class="container">
        <div class="row">
          <div class="col-xs-12">
            <div class="breadcrumbs-inner">
              <h1 class="breadcrumbs-title">Blog style 2</h1>
              <ul class="breadcrumb-list">
                <li><a href="index.html">Home</a></li>
                <li>Blog Style - 2</li>
              </ul>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
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
                <aside
                  class="widget widget-categories box-shadow"
                  style="
                    border: 1px solid rgba(0, 0, 0, 0.15);
                    margin-right: auto;
                  "
                >
                  <h6 class="widget-title border-left mb-20">Categories</h6>
                  <div id="cat-treeview" class="product-cat">
                    <ul>
                      <li class="closed expandable">
                        <div
                          class="hitarea closed-hitarea expandable-hitarea"
                        ></div>
                        <a @click="toggleSmallList(1)">Brand One</a>
                        <ul
                          class="dropdownn"
                          :class="{ 'dropdownn-after': activeSmallList === 1 }"
                        >
                          <li><a href="#">Mobile</a></li>
                          <li><a href="#">Tab</a></li>
                          <li><a href="#">Watch</a></li>
                          <li><a href="#">Head Phone</a></li>
                          <li class="last"><a href="#">Memory</a></li>
                        </ul>
                      </li>
                      <li class="open expandable">
                        <div
                          class="hitarea open-hitarea expandable-hitarea"
                        ></div>
                        <a @click="toggleSmallList(2)">Brand Two</a>
                        <ul
                          class="dropdownn"
                          :class="{ 'dropdownn-after': activeSmallList === 2 }"
                        >
                          <li><a href="#">Mobile</a></li>
                          <li><a href="#">Tab</a></li>
                          <li><a href="#">Watch</a></li>
                          <li><a href="#">Head Phone</a></li>
                          <li class="last"><a href="#">Memory</a></li>
                        </ul>
                      </li>
                      <li class="closed expandable">
                        <div
                          class="hitarea closed-hitarea expandable-hitarea"
                        ></div>
                        <a @click="toggleSmallList(3)">Accessories</a>
                        <ul
                          class="dropdownn"
                          :class="{ 'dropdownn-after': activeSmallList === 3 }"
                        >
                          <li><a href="#">Footwear</a></li>
                          <li><a href="#">Sunglasses</a></li>
                          <li><a href="#">Watches</a></li>
                          <li class="last"><a href="#">Utilities</a></li>
                        </ul>
                      </li>
                      <li class="closed expandable">
                        <div class="hitarea expandable-hitarea"></div>
                        <a @click="toggleSmallList(4)">Top Brands</a>
                        <ul
                          class="dropdownn"
                          :class="{ 'dropdownn-after': activeSmallList === 4 }"
                        >
                          <li><a href="#">Mobile</a></li>
                          <li><a href="#">Tab</a></li>
                          <li><a href="#">Watch</a></li>
                          <li><a href="#">Head Phone</a></li>
                          <li class="last"><a href="#">Memory</a></li>
                        </ul>
                      </li>
                      <li class="closed expandable lastExpandable">
                        <div
                          class="hitarea closed-hitarea expandable-hitarea lastExpandable-hitarea"
                        ></div>
                        <a @click="toggleSmallList(5)">Jewelry</a>
                        <ul
                          class="dropdownn"
                          :class="{ 'dropdownn-after': activeSmallList === 5 }"
                        >
                          <li><a href="#">Footwear</a></li>
                          <li><a href="#">Sunglasses</a></li>
                          <li><a href="#">Watches</a></li>
                          <li class="last"><a href="#">Utilities</a></li>
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
                  <div class="product-item">
                    <div class="product-img">
                      <a href="single-product.html">
                        <img
                          src="../../assets/img/others/404Error.jpg"
                          alt=""
                        />
                      </a>
                    </div>
                    <div class="product-info">
                      <h6 class="product-title multi-line mt-10">
                        <a href="single-product.html">Dummy Blog Name</a>
                      </h6>
                    </div>
                  </div>
                  <!-- product-item end -->
                  <!-- product-item start -->
                  <div class="product-item">
                    <div class="product-img">
                      <a href="single-product.html">
                        <img
                          src="../../assets/img/others/404Error.jpg"
                          alt=""
                        />
                      </a>
                    </div>
                    <div class="product-info">
                      <h6 class="product-title multi-line mt-10">
                        <a href="single-product.html">Dummy Blog Name</a>
                      </h6>
                    </div>
                  </div>
                  <!-- product-item end -->
                  <!-- product-item start -->
                  <div class="product-item">
                    <div class="product-img">
                      <a href="single-product.html">
                        <img
                          src="../../assets/img/others/404Error.jpg"
                          alt=""
                        />
                      </a>
                    </div>
                    <div class="product-info">
                      <h6 class="product-title multi-line mt-10">
                        <a href="single-product.html">Dummy Blog Name</a>
                      </h6>
                    </div>
                  </div>
                  <!-- product-item end -->
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
                  <ul class="widget-tags-list">
                    <li><a href="#">Bleckgerry ios</a></li>
                    <li><a href="#">Symban</a></li>
                    <li><a href="#">IOS</a></li>
                    <li><a href="#">Bleckgerry</a></li>
                    <li><a href="#">Windows Phone</a></li>
                    <li><a href="#">Windows Phone</a></li>
                    <li><a href="#">Androids</a></li>
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
        <div class="col-sm-6 col-xs-12">
          <div class="blog-item-2">
            <div class="row">
              <div class="col-md-6 col-xs-12">
                <div class="blog-image">
                  <a href="blog-details.html"
                    ><img src="img/blog/4.jpg" alt=""
                  /></a>
                </div>
              </div>
              <div class="col-md-6 col-xs-12">
                <div class="blog-desc">
                  <h5 class="blog-title-2"><a href="#">dummy Blog name</a></h5>
                  <p>
                    There are many variations of passages of in psum available,
                    but the majority have sufe ered on in some form...
                  </p>
                  <div class="read-more">
                    <a href="#">Read more</a>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
        <!-- blog-item end -->
        <!-- blog-item start -->
        <div class="col-sm-6 col-xs-12">
          <div class="blog-item-2">
            <div class="row">
              <div class="col-md-6 col-xs-12">
                <div class="blog-image">
                  <a href="blog-details.html"
                    ><img src="img/blog/5.jpg" alt=""
                  /></a>
                </div>
              </div>
              <div class="col-md-6 col-xs-12">
                <div class="blog-desc">
                  <h5 class="blog-title-2"><a href="#">dummy Blog name</a></h5>
                  <p>
                    There are many variations of passages of in psum available,
                    but the majority have sufe ered on in some form...
                  </p>
                  <div class="read-more">
                    <a href="#">Read more</a>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
        <!-- blog-item end -->
        <!-- blog-item start -->
        <div class="col-sm-6 col-xs-12">
          <div class="blog-item-2">
            <div class="row">
              <div class="col-md-6 col-xs-12">
                <div class="blog-image">
                  <a href="blog-details.html"
                    ><img src="img/blog/4.jpg" alt=""
                  /></a>
                </div>
              </div>
              <div class="col-md-6 col-xs-12">
                <div class="blog-desc">
                  <h5 class="blog-title-2"><a href="#">dummy Blog name</a></h5>
                  <p>
                    There are many variations of passages of in psum available,
                    but the majority have sufe ered on in some form...
                  </p>
                  <div class="read-more">
                    <a href="#">Read more</a>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
        <!-- blog-item end -->
        <!-- blog-item start -->
        <div class="col-sm-6 col-xs-12">
          <div class="blog-item-2">
            <div class="row">
              <div class="col-md-6 col-xs-12">
                <div class="blog-image">
                  <a href="blog-details.html"
                    ><img src="img/blog/4.jpg" alt=""
                  /></a>
                </div>
              </div>
              <div class="col-md-6 col-xs-12">
                <div class="blog-desc">
                  <h5 class="blog-title-2"><a href="#">dummy Blog name</a></h5>
                  <p>
                    There are many variations of passages of in psum available,
                    but the majority have sufe ered on in some form...
                  </p>
                  <div class="read-more">
                    <a href="#">Read more</a>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
        <!-- blog-item end -->
        <!-- blog-item start -->
        <div class="col-sm-6 col-xs-12">
          <div class="blog-item-2">
            <div class="row">
              <div class="col-md-6 col-xs-12">
                <div class="blog-image">
                  <a href="blog-details.html"
                    ><img src="img/blog/5.jpg" alt=""
                  /></a>
                </div>
              </div>
              <div class="col-md-6 col-xs-12">
                <div class="blog-desc">
                  <h5 class="blog-title-2"><a href="#">dummy Blog name</a></h5>
                  <p>
                    There are many variations of passages of in psum available,
                    but the majority have sufe ered on in some form...
                  </p>
                  <div class="read-more">
                    <a href="#">Read more</a>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
        <!-- blog-item end -->
        <!-- blog-item start -->
        <div class="col-sm-6 col-xs-12">
          <div class="blog-item-2">
            <div class="row">
              <div class="col-md-6 col-xs-12">
                <div class="blog-image">
                  <a href="blog-details.html"
                    ><img src="img/blog/4.jpg" alt=""
                  /></a>
                </div>
              </div>
              <div class="col-md-6 col-xs-12">
                <div class="blog-desc">
                  <h5 class="blog-title-2"><a href="#">dummy Blog name</a></h5>
                  <p>
                    There are many variations of passages of in psum available,
                    but the majority have sufe ered on in some form...
                  </p>
                  <div class="read-more">
                    <a href="#">Read more</a>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
        <!-- blog-item end -->
      </div>
    </div>
  </div>
</template>

<script>
export default {
  name: "BlogComponent",
  data() {
    return {
      activeSmallList: null,
      activeList: null,
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
