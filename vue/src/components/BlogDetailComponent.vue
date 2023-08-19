<template>
  <div class="blog-section mb-50">
    <div class="container">
      <div class="row">
        <div class="col-md-9 col-xs-12">
          <div class="blog-details-area">
            <!-- blog-details-photo -->
            <div class="blog-details-photo bg-img-1 p-20 mb-30">
              <img src="../assets/img/blog/10.jpg" alt="" />
              <div class="today-date bg-img-1">
                <span class="meta-date">30</span>
                <span class="meta-month">June</span>
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
            <h3 class="blog-details-title mb-30">Dumm`y single blog name</h3>
            <!-- blog-description -->
            <div class="blog-description mb-60">
              <p>
                On the other hand, we denounce with righteous indignation and
                dislike men who are so beguiled and demoralized by the charms of
                plea sure of the moment, so blinded by desire, that they cannot
                foresee the pain and trouble that are bound to ensue; and equal
                blame belon gs to those who fail in their duty through weakness
                of will, which is the same as saying through shrink ing from
                toil and pain. These cases are perfectly simple and easy to
                distinguish. In a free hour.
              </p>

              <div class="quote-author pl-30">
                <p class="quote-border pl-30">
                  On the other hand, we denounce with righteous indignation and
                  dislike men who are so beguiled and demoralized by the charm
                  of pleas ure of the moment, so blinded by desire, that they
                  cannot foresee the pain and trouble that are bound to ensue;
                  and equal blame belongs to those who fail in their duty
                  through weakness of will
                </p>
              </div>

              <p>
                Which is the same as saying through shrink ing from toil and
                pain. These cases are perfectly simple and easy to distinguish.
                In a free hour. One the other hand, we denounce with righteous
                indignation and dislike men who are so beguiled and demoralized
                by the charms of plea sure of the moment, so blinded by desire,
                that they cannot foresee the pain and trouble that are bound to
                ensue; and equal blame belong to those who fail in their duty
                through weakness of will, which is the same as saying through
                shrink ing from toil and pain. These cases are perfectly simple
                and easy to distinguish.
              </p>

              <p>
                On the other hand, we denounce with righteous indignation and
                dislike men who are so beguiled and demoralized by the charms of
                plea sure of the moment, so blinded by desire, that they cannot
                foresee the pain and trouble that are bound to ensue; and equal
                blame belon gs to those who fail in their duty through weakness
                of will, which is the same as saying through shrink ing from
                toil and pain. These cases are perfectly simple and easy to
                distinguish. In a free hour.
              </p>
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
                <ul class="blog-tags-list f-left">
                  <li><a href="#">Mobile</a></li>
                  <li><a href="#">IOS</a></li>
                  <li><a href="#">Windows</a></li>
                  <li><a href="#">Tab</a></li>
                </ul>
              </div>
            </div>
            <!-- author-post -->
            <div class="media author-post box-shadow mb-60">
              <div class="media-left pr-20">
                <a href="#">
                  <img
                    class="media-object"
                    src="../assets/img/author/1.jpg"
                    alt="#"
                  />
                </a>
              </div>
              <div class="media-body">
                <h6 class="media-heading">
                  <a href="#">Subash Chandra Das</a>
                </h6>
                <p class="mb-0">
                  No one rejects, dislikes, or avoids pleasure itself, because
                  it is pleasure, but because those who do not know how to pursu
                  pleasure rationally encounter conseques ences that are
                  extremely painful.
                </p>
              </div>
            </div>
            <!-- comments on t this post -->
            <CommentsComponent></CommentsComponent>
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

export default {
  name: "BlogDetailComponent",
  components: {
    CommentsComponent,
    WidgetSearch,
    CheckboxFiltersComponent,
    RecentProducts,
    WidgetCategories,
  },
};
</script>

<style scoped></style>
