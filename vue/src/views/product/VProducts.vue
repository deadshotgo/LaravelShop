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
                    <select>
                      <option value="volvo">Newest items</option>
                      <option value="saab">Saab</option>
                      <option value="mercedes">Mercedes</option>
                      <option value="audi">Audi</option>
                    </select>
                  </div>
                  <!-- showing -->
                  <div class="showing f-right text-right">
                    <span>Showing : 01-09 of 17.</span>
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
                        v-for="(n, i) in 5"
                        :key="i"
                        class="col-md-4 col-sm-4 col-xs-12"
                      >
                        <ProductCard />
                      </div>
                      <!-- product-item end -->
                    </div>
                  </div>
                </div>
                <!-- Tab Content end -->
                <!-- shop-pagination start -->
                <VPagination />
                <!-- shop-pagination enad -->
              </div>
            </div>
            <div class="col-md-3 col-md-pull-9 col-sm-12">
              <!-- widget-search -->
              <WidgetSearch />
              <!-- widget-search -->
              <!-- widget-categories -->
              <WidgetCategories />
              <!-- shop-filter -->
              <ShopFilters />
              <CheckboxFiltersComponent></CheckboxFiltersComponent>
              <!-- widget-product -->
              <RecentProducts />
            </div>
          </div>
        </div>
      </div>
      <!-- SHOP SECTION END -->
    </div>
    <!-- End page content -->
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
};
</script>
<style scoped lang="scss"></style>
