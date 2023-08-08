<script>
import VBreadcrumbs from "@/components/VBreadcrumbs.vue";
import WidgetCategories from "@/components/WidgetCategories.vue";
import RecentProducts from "@/components/RecentProducts.vue";

export default {
  name: "BlogComponent",
  components: { RecentProducts, WidgetCategories, VBreadcrumbs },
  data() {
    return {
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
                class="dropdown-width mt-30 dropdownn opened-menu menu-center m-l-3"
                :class="{ 'dropdownn-after': activeList === 1 }"
              >
                <WidgetCategories></WidgetCategories>
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
                <recent-products></recent-products>
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
                <aside
                  class="widget widget-tags box-shadow bord menu-center tags-width"
                >
                  <h6 class="widget-title border-left mb-20">Tags</h6>
                  <ul class="widget-tags-list">
                    <li v-for="(n, i) in 7" :key="i">
                      <a href="#">Symban</a>
                    </li>
                  </ul>
                </aside>
              </div>
            </div>
          </div>
        </div>
      </div>
      <div class="row">
        <div class="col-sm-6 col-xs-12" v-for="(n, i) in 6" :key="i">
          <div class="blog-item-2">
            <div class="row">
              <div class="col-md-6 col-xs-12">
                <div class="blog-image">
                  <a href="blog-details.html"
                    ><img src="../assets/img/blog/4.jpg" alt=""
                  /></a>
                </div>
              </div>
              <div class="col-md-6 col-xs-12">
                <div class="blog-desc">
                  <h5 class="blog-title-2">
                    <a>Dummy Blog Name</a>
                  </h5>
                  <p>
                    There are many variations of passages of in psum available,
                    but the majority have sufe ered on in some form...
                  </p>
                  <div class="read-more">
                    <router-link :to="{ name: 'oneBlog' }"
                      ><a href="#">Read more</a></router-link
                    >
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
@media screen and (max-width: 550px) {
  .dropdownn {
    left: 50%;
    margin: 0 0 0 -125px;
  }
  .tags-width {
    width: 70%;
  }
  .m-l-3 {
    margin-left: 3%;
  }
}
</style>
