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
                <a @click="clickSubCategory(subCategory.id)" class="pointer">{{
                  subCategory.name
                }}</a>
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
    };
  },
  computed: {
    ...mapGetters(["CATEGORIES"]),
  },
  methods: {
    clickSubCategory(id) {
      this.$emit("clickSubCategory", id);
    },
    ...mapActions(["GET_CATEGORIES"]),
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
</style>
