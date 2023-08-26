<script>
export default {
  name: "ProductBrand",
  props: { data: Object },
};
</script>

<template>
  <div class="col-xs-12">
    <div class="single-brand-product">
      <a href="#"><img :src="data?.image" alt="" /></a>
      <h3 class="brand-title text-gray">
        <a href="#">{{ data?.name }} </a>
      </h3>
    </div>
  </div>
</template>

<style scoped lang="scss"></style>
