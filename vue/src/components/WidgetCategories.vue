<template>
  <div>
    <aside class="widget widget-categories box-shadow mb-30">
      <h6 class="widget-title border-left mb-20">Categories</h6>
      <div id="cat-treeview" class="product-cat">
        <ul>
          <li v-for="(category, i) in CATEGORIES" :key="i" class="closed">
            <a class="pointer" @click="currentQ = i">{{ category.name }}</a>
            <ul :class="{ active: currentQ == i, dNone: currentQ != i }">
              <li
                v-for="(subCategory, y) in category.subCategories.data"
                :key="y"
              >
                <a
                  @click="changeCategory(subCategory.id)"
                  class="pointer"
                  :class="{
                    'active-subcategory': active_color === subCategory.id,
                  }"
                  >{{ subCategory.name }}</a
                >
              </li>
            </ul>
          </li>
        </ul>
      </div>
    </aside>
  </div>
</template>

<script>
import { mapActions, mapGetters } from "vuex";

export default {
  name: "WidgetCategories",
  data() {
    return {
      active: "active",
      currentQ: 0,
      active_color: null,
    };
  },
  computed: {
    ...mapGetters(["CATEGORIES"]),
  },
  methods: {
    clickSubCategory(id) {
      (this.active_color = id), this.$emit("clickSubCategory", id);
    },
    changeCategory(id) {
      if (this.active_color == id) {
        this.active_color = null;
        this.GET_PRODUCTS({ is_active: true });
      } else {
        (this.active_color = id), this.$emit("clickSubCategory", id);
      }
    },
    ...mapActions(["GET_CATEGORIES", "GET_PRODUCTS"]),
  },

  created() {
    this.GET_CATEGORIES({
      is_active: true,
    });
  },
};
</script>

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
.active-subcategory {
  color: #ff7f00;
}
</style>
