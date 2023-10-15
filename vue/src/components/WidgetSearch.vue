<script>
export default {
  name: "WidgetSearch",
  props: {
    fun: Function,
  },
  data: () => {
    return {
      keyWords: "",
    };
  },
  methods: {
    getSearchProduct() {
      this.fun({ title: this.keyWords });
    },
  },
};
</script>

<template>
  <aside class="widget-search mb-30">
    <input
      @change="getSearchProduct"
      v-model="keyWords"
      type="text"
      placeholder="Search here..."
    />
    <button>
      <i class="zmdi zmdi-search"></i>
    </button>
  </aside>
</template>

<style scoped lang="scss"></style>
