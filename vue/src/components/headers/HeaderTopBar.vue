<script>
export default {
  name: "HeaderTopBar",
};
</script>

<template>
  <div class="header-top-bar plr-185">
    <div class="container-fluid">
      <div class="row">
        <div class="col-sm-6 hidden-xs">
          <div class="call-us">
            <p class="mb-0 roboto">(+88) 01234-567890</p>
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
