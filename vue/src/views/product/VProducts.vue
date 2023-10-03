<template>
  <div>
    <!-- VBreadcrumbs -->
    <VBreadcrumbs
      images="data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAABccA…xMC0xMlQwNTowODowNi0wNTowMJAbvWcAAAAASUVORK5CYII="
      title="Product view"
    />
    <!--VBreadcrumbs  -->
    <div id="page-content" class="page-wrapper">
      <!-- SHOP SECTION START -->
      <div class="shop-section mb-80">
        <div class="container">
          <div class="row">
            <div class="col-md-9 col-md-push-3 col-sm-12">
              <div class="shop-content">
                <!-- shop-option start -->
                <div class="shop-option box-shadow mb-30 clearfix">
                  <!-- Nav tabs -->
                  <ul class="shop-tab f-left" role="tablist">
                    <li class="active">
                      <a href="#grid-view" data-toggle="tab"
                        ><i class="zmdi zmdi-view-module"></i
                      ></a>
                    </li>
                  </ul>
                  <!-- short-by -->
                  <div class="short-by f-left text-center">
                    <span>Sort by :</span>
                    <select
                      v-model="selectedSort"
                      @change="this.orderBySort(selectedSort)"
                    >
                      <option value="1">Price: low -> hight</option>
                      <option value="2">Price: hight -> low</option>
                      <option value="3">Created: old -> new</option>
                      <option value="4">Created: new -> old</option>
                    </select>
                  </div>
                  <!-- showing -->
                  <div class="showing f-right text-right">
                    <span
                      >Showing :
                      {{
                        `${PRODUCTS?.meta?.from} - ${PRODUCTS?.meta?.to} of ${PRODUCTS?.meta?.total}`
                      }}</span
                    >
                  </div>
                </div>
                <!-- shop-option end -->
                <!-- Tab Content start -->
                <div class="tab-content">
                  <!-- grid-view -->
                  <div role="tabpanel" class="tab-pane active" id="grid-view">
                    <div class="row">
                      <!-- product-item start -->
                      <div
                        v-for="(n, i) in PRODUCTS.data"
                        :key="i"
                        class="col-md-4 col-sm-4 col-xs-12"
                      >
                        <ProductCard :data="n" />
                      </div>
                      <!-- product-item end -->
                    </div>
                  </div>
                </div>
                <!-- Tab Content end -->
                <!-- shop-pagination start -->
                <VPagination
                  @clickPaginate="paginate"
                  :paginate="PRODUCTS.meta"
                />
                <!-- shop-pagination enad -->
              </div>
            </div>
            <div class="col-md-3 col-md-pull-9 col-sm-12">
              <!-- widget-search -->
              <WidgetSearch />
              <!-- widget-search -->
              <!-- widget-categories -->
              <WidgetCategories @clickSubCategory="sortSubCategory" />
              <!-- shop-filter -->
              <ShopFilters @rangeRangePrice="rangeRangePrice" />
              <CheckboxFiltersComponent
                @clickTags="sortTags"
              ></CheckboxFiltersComponent>
              <!-- widget-product -->
              <RecentProducts />
            </div>
          </div>
        </div>
      </div>
      <!-- SHOP SECTION END -->
    </div>
  </div>
</template>
<script>
import VBreadcrumbs from "@/components/VBreadcrumbs.vue";
import ProductCard from "@/components/ProductCard.vue";
import VPagination from "@/components/VPagination.vue";
import WidgetSearch from "@/components/WidgetSearch.vue";
import WidgetCategories from "@/components/WidgetCategories.vue";
import ShopFilters from "@/components/product/ShopFilters.vue";
import RecentProducts from "@/components/RecentProducts.vue";
import CheckboxFiltersComponent from "@/components/CheckboxFiltersComponent.vue";
import { mapActions, mapGetters } from "vuex";
export default {
  components: {
    CheckboxFiltersComponent,
    VBreadcrumbs,
    ProductCard,
    VPagination,
    WidgetSearch,
    WidgetCategories,
    ShopFilters,
    RecentProducts,
  },
  name: "VProduct",
  data() {
    return {
      selectedSort: "4",
      filters: {
        limit: 12,
        is_active: true,
        sorted: {
          created_at: true,
        },
      },
    };
  },
  computed: {
    ...mapGetters(["PRODUCTS"]),
  },
  methods: {
    orderBySort(id) {
      delete this.filters.sorted?.created_at;
      switch (id) {
        case "1":
          this.filters.sorted.price = false;
          break;
        case "2":
          this.filters.sorted.price = true;
          break;
        case "3":
          this.filters.sorted.created_at = true;
          break;
        case "4":
          this.filters.sorted.created_at = false;
          break;
      }
      this.GET_PRODUCTS(this.filters);
    },
    paginate(filter) {
      this.GET_PRODUCTS({
        paginate: filter,
      });
    },
    sortTags(filter) {
      this.filters.tagsId = filter.join(",");
      this.GET_PRODUCTS(this.filters);
    },
    rangeRangePrice(range) {
      this.filters.price_between = `${range.minRange},${range.maxRange}`;
      this.GET_PRODUCTS(this.filters);
    },
    sortSubCategory(id) {
      this.filters.sub_category_id = id;
      this.GET_PRODUCTS(this.filters);
    },
    ...mapActions(["GET_PRODUCTS"]),
  },
  created() {
    this.GET_PRODUCTS(this.filters);
  },
};
</script>
<style scoped lang="scss"></style>
