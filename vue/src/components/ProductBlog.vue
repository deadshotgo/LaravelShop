<script>
export default {
  name: "ProductBlog",
  props: { data: Object },
};
</script>

<template>
  <div class="col-xs-12">
    <div class="blog-item">
      <img :src="data?.preview" alt="" height="400" />
      <div class="blog-desc">
        <h5 class="blog-title">
          <a>{{ data.title }}</a>
        </h5>
        <p>
          {{ data?.previewText }}
        </p>
        <div class="read-more">
          <router-link :to="{ name: 'oneBlog', params: { id: data.id } }"
            ><a>Read more</a></router-link
          >
        </div>
        <ul class="blog-meta">
          <li>
            <a href="#"><i class="zmdi zmdi-favorite"></i>89 Like</a>
          </li>
          <li>
            <a
              ><i class="zmdi zmdi-comments"></i
              >{{ `${data?.comments?.length} Comments` }}</a
            >
          </li>
        </ul>
      </div>
    </div>
  </div>
</template>

<style scoped lang="scss"></style>
