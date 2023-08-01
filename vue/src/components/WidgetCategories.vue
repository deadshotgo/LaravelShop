<script>
export default {
  name: "WidgetCategories",
};
</script>

<template>
  <div>
    <aside class="widget widget-categories box-shadow mb-30">
      <h6 class="widget-title border-left mb-20">Categories</h6>
      <div id="cat-treeview" class="product-cat">
        <ul>
          <li class="closed">
            <a href="#">Brand One</a>
            <ul>
              <li><a href="#">Mobile</a></li>
              <li><a href="#">Tab</a></li>
              <li><a href="#">Watch</a></li>
              <li><a href="#">Head Phone</a></li>
              <li><a href="#">Memory</a></li>
            </ul>
          </li>
          <li class="open">
            <a href="#">Brand Two</a>
            <ul>
              <li><a href="#">Mobile</a></li>
            </ul>
          </li>
          <li class="closed">
            <a href="#">Accessories</a>
            <ul>
              <li><a href="#">Footwear</a></li>
            </ul>
          </li>
          <li class="closed">
            <a href="#">Top Brands</a>
            <ul>
              <li><a href="#">Mobile</a></li>
            </ul>
          </li>
          <li class="closed">
            <a href="#">Jewelry</a>
            <ul>
              <li><a href="#">Footwear</a></li>
            </ul>
          </li>
        </ul>
      </div>
    </aside>
  </div>
</template>

<style scoped lang="scss"></style>
