<template>
  <aside class="widget operating-system box-shadow mb-30">
    <h6 class="widget-title border-left mb-20">operating system</h6>
    <div v-for="(value, i) in TAGS" :key="i">
      <label
        ><input
          @change="clickTags"
          type="checkbox"
          :value="value.id"
          v-model="selectedTags"
          name="tags"
        />{{ value.name }}</label
      ><br />
    </div>
  </aside>
</template>

<script>
import { mapActions, mapGetters } from "vuex";

export default {
  name: "CheckboxFiltersComponent",
  data: () => {
    return {
      selectedTags: [],
    };
  },
  computed: {
    ...mapGetters(["TAGS"]),
  },
  methods: {
    clickTags() {
      this.$emit("clickTags", this.selectedTags);
    },
    ...mapActions(["GET_TAGS"]),
  },

  created() {
    this.GET_TAGS({
      is_active: true,
    });
  },
};
</script>

<style scoped></style>
