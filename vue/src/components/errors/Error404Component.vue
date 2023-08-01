<template>
  <div class="breadcrumbs-section plr-200 mb-80">
    <div class="breadcrumbs overlay-bg">
      <div class="container">
        <div class="row">
          <div class="col-xs-12">
            <div class="breadcrumbs-inner">
              <h1 class="breadcrumbs-title"></h1>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
  <div id="page-content" class="page-wrapper">
    <!-- ERROR SECTION START -->
    <div class="error-section mb-80">
      <div class="container">
        <div class="row">
          <div class="col-md-12">
            <div class="error-404 box-shadow">
              <img src="" alt="" />
              <div class="go-to-btn btn-hover-2">
                <a href="index.html">go to home page</a>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
    <!-- ERROR SECTION END -->
  </div>
</template>

<script>
export default {
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
