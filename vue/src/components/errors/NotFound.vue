<template>
  <div>
    <VBreadcrumbs
      images="data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAABccA…xMC0xMlQwNTowODowNi0wNTowMJAbvWcAAAAASUVORK5CYII="
      title="404"
    />
    <div id="page-content" class="page-wrapper">
      <!-- ERROR SECTION START -->
      <div class="error-section mb-80">
        <div class="container">
          <div class="row">
            <div class="col-md-12">
              <div class="error-404 box-shadow">
                <img src="../../assets/img/others/error.jpg" alt="" />
                <div class="go-to-btn btn-hover-2">
                  <router-link :to="{ name: 'home' }"
                    >go to home page</router-link
                  >
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
      <!-- ERROR SECTION END -->
    </div>
  </div>
</template>

<script>
import VBreadcrumbs from "@/components/VBreadcrumbs.vue";
export default {
  components: { VBreadcrumbs },
  name: "Error404Component",
};
</script>

<style scoped>
.breadcrumbs {
  background: #f6f6f6 url("../../assets/img/others/404Error.jpg") no-repeat
    scroll center center;
  height: 400px;
}
</style>
