<script>
export default {
  name: "NavbarMenu",
  props: {
    type: String,
  },
  data() {
    return {
      menuOpen: false,
      menuOpenProduct: false,
    };
  },
};
</script>

<template>
  <div>
    <nav v-if="type === 'desktop'" id="primary-menu">
      <ul class="main-menu text-center">
        <li>
          <router-link :to="{ name: 'home' }">Home</router-link>
        </li>
        <li>
          <a>Categories</a>
          <ul class="dropdwn">
            <li>
              <router-link :to="{ name: 'products' }">Category 1</router-link>
            </li>
          </ul>
        </li>
        <li>
          <router-link :to="{ name: 'products' }">Products</router-link>
        </li>
        <li>
          <router-link :to="{ name: 'blog' }">Blog</router-link>
        </li>
        <li>
          <router-link :to="{ name: 'aboutUs' }">About us</router-link>
        </li>
        <li>
          <router-link :to="{ name: 'contact' }">Contact</router-link>
        </li>
      </ul>
    </nav>
    <template v-if="type === 'mobile'">
      <a
        href="#nav"
        class="hamburger meanmenu-reveal"
        type="button"
        @click="menuOpen = !menuOpen"
        style="
          right: 0px;
          left: auto;
          text-align: center;
          text-indent: 0px;
          font-size: 18px;
        "
        ><div v-show="menuOpen == false">
          <span></span><span></span><span></span>
        </div>
        <div v-show="menuOpen == true">X</div>
      </a>
      <nav
        class="mean-nav dropdown mb-10"
        :class="{ 'dropdown-after': menuOpen }"
      >
        <ul>
          <li>
            <router-link :to="{ name: 'home' }" @click="menuOpen = !menuOpen"
              >Home</router-link
            >
          </li>
          <li>
            <a @click="menuOpenProduct = !menuOpenProduct">Categories</a>
            <ul
              v-for="(n, i) in 6"
              :key="i"
              class="dropdown-product"
              :class="{ 'dropdown-after-product': menuOpenProduct }"
            >
              <li>
                <router-link
                  :to="{ name: 'products' }"
                  @click="menuOpen = !menuOpen"
                  >Category 1</router-link
                >
              </li>
            </ul>
            <a
              @click="menuOpenProduct = !menuOpenProduct"
              class="mean-expand"
              href="#"
              style="font-size: 18px"
              >+</a
            >
          </li>
          <li>
            <router-link
              :to="{ name: 'products' }"
              @click="menuOpen = !menuOpen"
              >Products</router-link
            >
          </li>
          <li>
            <router-link :to="{ name: 'blog' }" @click="menuOpen = !menuOpen"
              >Blog</router-link
            >
          </li>
          <li>
            <router-link :to="{ name: 'aboutUs' }" @click="menuOpen = !menuOpen"
              >About us</router-link
            >
          </li>
          <li>
            <router-link :to="{ name: 'contact' }" @click="menuOpen = !menuOpen"
              >Contact</router-link
            >
          </li>
        </ul>
      </nav>
    </template>
  </div>
</template>

<style scoped>
.hamburger {
  width: 45px;
  height: 45px;
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
