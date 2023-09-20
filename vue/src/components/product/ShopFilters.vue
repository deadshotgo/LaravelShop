<template>
  <div>
    <aside class="widget shop-filter box-shadow mb-30">
      <h6 class="widget-title border-left mb-20">Price</h6>
      <form @submit.prevent="submitRangeSlider" class="price_filter">
        <div
          style="display: flex; justify-content: space-between"
          class="price_slider_amount"
        >
          <div style="width: 45%">
            <input
              v-model="range.minRange"
              type="text"
              id="amount"
              name="price"
              placeholder="0"
            />
          </div>
          <div style="margin-top: 5px">-</div>
          <div style="width: 45%">
            <input
              v-model="range.maxRange"
              type="text"
              id="amount"
              name="price"
              placeholder="100"
            />
          </div>
        </div>
        <div style="display: flex; justify-content: center">
          <button class="submit-btn-1 mt-20 btn-hover-1" type="submit">
            Send
          </button>
        </div>
      </form>
    </aside>
    <!-- widget-color -->
  </div>
</template>
<script>
export default {
  name: "ShopFilters",
  data: () => {
    return {
      range: {
        minRange: "",
        maxRange: "",
      },
    };
  },
  methods: {
    submitRangeSlider() {
      this.$emit("rangeRangePrice", this.range);
    },
  },
};
</script>
<style scoped lang="scss"></style>
