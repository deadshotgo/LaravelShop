<script>
export default {
  name: "NavbarLogo",
  props: {
    logo: Object,
  },
};
</script>

<template>
  <div class="col-md-2 col-sm-6 col-xs-12">
    <div class="logo">
      <a>
        <img :src="this.logo" alt="main logo" @click="console.log(this.logo)" />
      </a>
    </div>
  </div>
</template>

<style scoped lang="scss"></style>
