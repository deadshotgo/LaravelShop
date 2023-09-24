<script>
import VBreadcrumbs from "@/components/VBreadcrumbs.vue";
import RecentProducts from "@/components/RecentProducts.vue";
import { mapActions, mapGetters } from "vuex";
import VPagination from "@/components/VPagination.vue";

export default {
  name: "BlogComponent",
  components: { VPagination, RecentProducts, VBreadcrumbs },
  data() {
    return {
      activeList: null,
      selectedTags: [],
      selectedSort: null,
      filters: {
        limit: 8,
        is_active: true,
        sorted: {
          created_at: true,
        },
      },
    };
  },
  computed: {
    ...mapGetters(["BLOGS", "TAGS"]),
  },
  methods: {
    toggleList(listNumber) {
      if (this.activeList === listNumber) {
        this.activeList = null; // Если список уже активен, закрываем его
      } else {
        this.activeList = listNumber;
      }
    },
    paginate(filter) {
      this.GET_BLOGS({
        paginate: filter,
      });
    },
    getFilteredData() {
      this.GET_BLOGS({
        limit: 8,
        is_active: true,
        tagsId: this.selectedTags,
      });
    },
    orderBySort(id) {
      delete this.filters.sorted?.created_at;
      switch (id) {
        case "1":
          this.filters.sorted.created_at = true;
          break;
        case "2":
          this.filters.sorted.created_at = false;
          break;
      }
      this.GET_BLOGS(this.filters);
    },
    ...mapActions(["GET_BLOGS", "GET_TAGS"]),
  },
  created() {
    this.GET_TAGS();
    this.GET_BLOGS({
      limit: 4,
      is_active: true,
    });
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
                  <ul class="widget-tags-list" style="text-align: center">
                    <li v-for="(tag, i) in TAGS" :key="i">
                      <label
                        ><input
                          style="margin-right: 2px"
                          @change="getFilteredData"
                          type="checkbox"
                          :value="tag.id"
                          v-model="selectedTags"
                          name="tags"
                        />{{ tag?.name }}</label
                      >
                    </li>
                  </ul>
                </aside>
              </div>
            </div>
            <div>
              <div class="short-by f-left text-center">
                <span>Sort by :</span>
                <select
                  v-model="selectedSort"
                  @change="this.orderBySort(selectedSort)"
                >
                  <option value="1">Created: old -> new</option>
                  <option value="2">Created: new -> old</option>
                </select>
              </div>
            </div>
          </div>
        </div>
      </div>
      <div class="row">
        <div
          class="col-sm-6 col-xs-12"
          v-for="(blog, i) in BLOGS.data"
          :key="i"
        >
          <div class="blog-item-2">
            <div class="row">
              <div class="col-md-6 col-xs-12">
                <div class="blog-image">
                  <a href="blog-details.html"
                    ><img :src="blog?.preview" alt="" width="370" height="300"
                  /></a>
                </div>
              </div>
              <div class="col-md-6 col-xs-12">
                <div class="blog-desc">
                  <h5 class="blog-title-2">
                    <a>{{ blog?.title }}</a>
                  </h5>
                  <p>
                    {{ blog?.previewText }}
                  </p>
                  <div class="read-more">
                    <router-link
                      :to="{ name: 'oneBlog', params: { id: blog.id } }"
                      ><a>Read more</a></router-link
                    >
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
      <VPagination @clickPaginate="paginate" :paginate="BLOGS.meta" />
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
