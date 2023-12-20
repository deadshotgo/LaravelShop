<script>
export default {
  name: "HeaderTopBar",
  props: {
    phoneNumber: Object,
  },
};
</script>

<template>
  <div class="header-top-bar plr-185">
    <div class="container-fluid">
      <div class="row">
        <div class="col-sm-6 hidden-xs">
          <div class="call-us" v-if="phoneNumber">
            <div v-for="(item, key) in JSON.parse(phoneNumber)" :key="key">
              <snap class="mb-0 roboto">
                {{ item.active ? item.phone_number : null }}
              </snap>
            </div>
          </div>
        </div>
        <div class="col-sm-6 col-xs-12">
          <div class="top-link clearfix">
            <ul class="link f-right">
              <li>
                <router-link :to="{ name: 'myAccount' }">
                  <i class="zmdi zmdi-account"></i>
                  My Account
                </router-link>
              </li>
              <li>
                <a href="#">
                  <i class="zmdi zmdi-favorite"></i>
                  Wish List (0)
                </a>
              </li>
              <li>
                <router-link :to="{ name: 'login' }">
                  <i class="zmdi zmdi-lock"></i>
                  Login
                </router-link>
              </li>
            </ul>
          </div>
        </div>
      </div>
    </div>
  </div>
</template>

<style scoped lang="scss"></style>
