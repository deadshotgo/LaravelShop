<template>
  <div class="mobile-menu-area hidden-lg hidden-md">
    <div class="container mean-container">
      <div class="mean-bar">
        <NavbarMenu type="mobile" />
      </div>
    </div>
  </div>
</template>

<script>
import NavbarMenu from "@/components/headers/NavbarMenu.vue";
export default {
  components: { NavbarMenu },
  name: "HeaderMobile",
};
</script>

<style scoped>
.hamburger {
  width: 45px;
  height: 45px;
  background-color: black;
  border-radius: 4px;
}

.dropdown {
  height: 0px;
  background-color: lightgreen;
  transition: height 0.2s ease;
  display: flex;
  align-items: center;
  justify-content: center;
  overflow: hidden;
}

.dropdown-product {
  height: 0px;
  transition: height 0.2s ease;
  display: block;
  align-items: center;
  justify-content: center;
  overflow: hidden;
}

.dropdown-after {
  display: block;
  height: auto;
  transition: height 0.5s ease;
}

.dropdown-after-product {
  height: auto;
  transition: height 0.5s ease;
}

.navlistitem a {
  color: #ffffff;
}
</style>
