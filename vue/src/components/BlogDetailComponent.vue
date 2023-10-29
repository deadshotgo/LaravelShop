<template>
  <div class="blog-section mb-50">
    <div class="container">
      <!-- spinner -->
      <div v-show="!this.IS_LOAD" style="text-align: center">
        <pulse-loader color="#ff7f00"></pulse-loader>
      </div>
      <!-- spinner -->
      <div v-show="this.IS_LOAD" class="row">
        <div class="col-md-9 col-xs-12">
          <div class="blog-details-area">
            <!-- blog-details-photo -->
            <div class="blog-details-photo bg-img-1 p-20 mb-30">
              <img
                :src="BLOG?.img"
                alt=""
                width="830"
                height="390"
                @click="f"
              />
              <div class="today-date bg-img-1">
                <span class="meta-date">{{ this.BLOG.day }}</span>
                <span class="meta-month">{{ this.BLOG.month }}</span>
              </div>
            </div>
            <!-- blog-like-share -->
            <ul class="blog-like-share mb-20">
              <li>
                <a href="#"><i class="zmdi zmdi-favorite"></i>89 Like</a>
              </li>
              <li>
                <a href="#"><i class="zmdi zmdi-comments"></i>59 Comments</a>
              </li>
              <li>
                <a href="#"><i class="zmdi zmdi-share"></i>29 Share</a>
              </li>
            </ul>
            <!-- blog-details-title -->
            <h3 class="blog-details-title mb-30">{{ BLOG?.title }}</h3>
            <!-- blog-description -->
            <div class="blog-description mb-60">
              <p>{{ BLOG?.text }}</p>
            </div>
            <!-- blog-share-tags -->
            <div class="blog-share-tags box-shadow clearfix mb-60">
              <div class="blog-share f-left">
                <p class="share-tags-title f-left">share</p>
                <ul class="footer-social f-left">
                  <li>
                    <a class="facebook" href="" title="Facebook"
                      ><i class="zmdi zmdi-facebook"></i
                    ></a>
                  </li>
                  <li>
                    <a class="google-plus" href="" title="Google Plus"
                      ><i class="zmdi zmdi-google-plus"></i
                    ></a>
                  </li>
                  <li>
                    <a class="twitter" href="" title="Twitter"
                      ><i class="zmdi zmdi-twitter"></i
                    ></a>
                  </li>
                  <li>
                    <a class="rss" href="" title="RSS"
                      ><i class="zmdi zmdi-rss"></i
                    ></a>
                  </li>
                </ul>
              </div>
              <div class="blog-tags f-right">
                <p class="share-tags-title f-left">Tags</p>
                <ul
                  class="blog-tags-list f-left"
                  v-for="(tag, i) in BLOG.tags"
                  :key="i"
                >
                  <li>
                    <a>{{ tag.name }}</a>
                  </li>
                </ul>
              </div>
            </div>
            <!-- comments blog -->
            <CommentsComponent :comments="BLOG.comments"></CommentsComponent>
            <!--  -->
          </div>
        </div>
        <div class="col-md-3 col-xs-12">
          <!-- widget-search -->
          <WidgetSearch></WidgetSearch>
          <!-- widget-categories -->
          <WidgetCategories></WidgetCategories>
          <!-- widget-product -->
          <RecentProducts></RecentProducts>
          <!-- operating-system -->
          <CheckboxFiltersComponent></CheckboxFiltersComponent>
        </div>
      </div>
    </div>
  </div>
</template>

<script>
import WidgetCategories from "@/components/WidgetCategories.vue";
import RecentProducts from "@/components/RecentProducts.vue";
import CheckboxFiltersComponent from "@/components/CheckboxFiltersComponent.vue";
import WidgetSearch from "@/components/WidgetSearch.vue";
import CommentsComponent from "@/components/CommentsComponent.vue";
import PulseLoader from "vue-spinner/src/PulseLoader.vue";
import { useRoute } from "vue-router";
import { mapActions, mapGetters } from "vuex";

export default {
  name: "BlogDetailComponent",
  components: {
    CommentsComponent,
    WidgetSearch,
    CheckboxFiltersComponent,
    RecentProducts,
    WidgetCategories,
    PulseLoader,
  },
  data() {
    return {
      day: null,
      month: null,
    };
  },
  computed: {
    ...mapGetters(["BLOG", "IS_LOAD"]),
  },
  methods: {
    ...mapActions(["GET_BLOG"]),

    f() {
      return new Date(this.BLOG.createdAt);
    },
  },
  async created() {
    const route = useRoute();
    await this.GET_BLOG({ id: route.params.id });
  },
};
</script>

<style scoped></style>
