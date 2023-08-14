<script>
export default {
  name: "ShopFilters",
};
</script>

<template>
  <div>
    <aside class="widget shop-filter box-shadow mb-30">
      <h6 class="widget-title border-left mb-20">Price</h6>
      <div class="price_filter">
        <div class="price_slider_amount">
          <input type="submit" value="You range :" />
          <input
            type="text"
            id="amount"
            name="price"
            placeholder="Add Your Price"
          />
        </div>
        <div id="slider-range"></div>
      </div>
    </aside>
    <!-- widget-color -->
    <aside class="widget widget-color box-shadow mb-30">
      <h6 class="widget-title border-left mb-20">color</h6>
      <ul>
        <li class="color-1"><a href="#">LightSalmon</a></li>
        <li class="color-2"><a href="#">Dark Salmon</a></li>
        <li class="color-3"><a href="#">Tomato</a></li>
        <li class="color-4"><a href="#">Deep Sky Blue</a></li>
        <li class="color-5"><a href="#">Electric Purple</a></li>
        <li class="color-6"><a href="#">Atlantis</a></li>
      </ul>
    </aside>
  </div>
</template>

<style scoped lang="scss"></style>
