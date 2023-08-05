<script>
export default {
  name: "WidgetCategories",
  data() {
    return {
      active: "active",
      currentQ: 0,
    };
  },
};
</script>

<template>
  <div>
    <aside class="widget widget-categories box-shadow mb-30">
      <h6 class="widget-title border-left mb-20">Categories</h6>
      <div id="cat-treeview" class="product-cat">
        <ul>
          <li v-for="(n, i) in 5" :key="i" class="closed">
            <a class="pointer" @click="currentQ = i">Brand One</a>
            <ul :class="{ active: currentQ == i, dNone: currentQ != i }">
              <li><a href="#">Mobile</a></li>
              <li><a href="#">Tab</a></li>
              <li><a href="#">Watch</a></li>
              <li><a href="#">Head Phone</a></li>
              <li><a href="#">Memory</a></li>
            </ul>
          </li>
        </ul>
      </div>
    </aside>
  </div>
</template>

<style scoped lang="scss">
.active {
  display: block;
}
.dNone {
  display: none;
}
.pointer {
  cursor: pointer;
}
</style>
