<template>
  <div>
    <!-- shop-pagination start -->
    <ul class="shop-pagination box-shadow text-center ptblr-10-30">
      <li
        v-for="(element, index) in paginate?.links"
        :class="{ active: element?.active }"
        :key="index"
      >
        <a @click="clickLick(element?.url)" v-if="index === 0"
          ><i class="zmdi zmdi-chevron-left"></i
        ></a>

        <a
          v-else-if="index + 1 !== paginate?.links?.length"
          @click="clickLick(element?.url)"
          >{{ index }}</a
        >
        <a v-else @click="clickLick(element?.url)"
          ><i class="zmdi zmdi-chevron-right"></i
        ></a>
      </li>
    </ul>
    <!-- shop-pagination end -->
  </div>
</template>

<script>
export default {
  name: "VPagination",
  props: { paginate: Object },
  methods: {
    clickLick(url) {
      if (url) {
        this.$emit(
          "clickPaginate",
          url.substr(url.indexOf("?") + 1, url.length)
        );
      }
    },
  },
};
</script>

<style scoped lang="scss"></style>
