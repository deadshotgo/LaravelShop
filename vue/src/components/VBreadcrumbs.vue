<script>
export default {
  name: "VBreadcrumbs",
  props: {
    title: String,
    images: String,
  },
};
</script>

<template>
  <div>
    <div
      :style="{ backgroundImage: `url(${images})` }"
      class="breadcrumbs-section plr-200 mb-80"
    >
      <div class="breadcrumbs overlay-bg">
        <div class="container">
          <div class="row">
            <div class="col-xs-12">
              <div class="breadcrumbs-inner">
                <h1 class="breadcrumbs-title">{{ title }}</h1>
                <ul class="breadcrumb-list">
                  <li><router-link to="/">Home</router-link></li>
                  <li>{{ title }}</li>
                </ul>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</template>

<style scoped lang="scss"></style>
