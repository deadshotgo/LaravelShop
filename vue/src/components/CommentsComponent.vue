<template>
  <div class="post-comments mb-60">
    <h4 class="blog-section-title border-left mb-30">
      comments on this product
    </h4>
    <!-- single-comments -->
    <div class="media mt-30">
      <div class="media-left pr-30">
        <a href="#"
          ><img class="media-object" src="../assets/img/author/2.jpg" alt="#"
        /></a>
      </div>
      <div class="media-body">
        <div class="clearfix">
          <div class="name-commenter f-left">
            <h6 class="media-heading">
              <a href="#">Gerald Barnes</a>
            </h6>
            <p class="mb-10">27 Jun, 2016 at 2:30pm</p>
          </div>
          <ul class="reply-delate f-right">
            <li><a href="#">Reply</a></li>
            <li>/</li>
            <li><a href="#">Delate</a></li>
          </ul>
        </div>
        <p class="mb-0">
          Lorem ipsum dolor sit amet, consectetur adipiscing elit. Integer
          accumsan egestas elese ifend. Phasellus a felis atestese bibendum
          feugiat ut eget eni Praesent messages in con sectetur posuere dolor
          non.
        </p>
      </div>
    </div>
    <!-- single-comments -->
    <div class="media mt-30">
      <div class="media-left pr-30">
        <a href="#"
          ><img class="media-object" src="../assets/img/author/3.jpg" alt="#"
        /></a>
      </div>
      <div class="media-body">
        <div class="clearfix">
          <div class="name-commenter f-left">
            <h6 class="media-heading">
              <a href="#">Gerald Barnes</a>
            </h6>
            <p class="mb-10">27 Jun, 2016 at 2:30pm</p>
          </div>
          <ul class="reply-delate f-right">
            <li><a href="#">Reply</a></li>
            <li>/</li>
            <li><a href="#">Delate</a></li>
          </ul>
        </div>
        <p class="mb-0">
          Lorem ipsum dolor sit amet, consectetur adipiscing elit. Integer
          accumsan egestas elese ifend. Phasellus a felis atestese bibendum
          feugiat ut eget eni Praesent messages in con sectetur posuere dolor
          non.
        </p>
      </div>
    </div>
  </div>
  <!-- leave your comment -->
  <div class="leave-comment">
    <h4 class="blog-section-title border-left mb-30">leave your comment</h4>
    <div class="row">
      <div class="col-md-6">
        <input type="text" name="name" placeholder="Subash Chandra Das" />
      </div>
      <div class="col-md-6">
        <input type="text" name="email" placeholder="Email address here..." />
      </div>
      <div class="col-md-12">
        <input type="text" name="subject" placeholder="Subject here..." />
      </div>
      <div class="col-md-12">
        <textarea
          class="custom-textarea"
          placeholder="Your comment here..."
        ></textarea>
      </div>
    </div>
    <button class="submit-btn-1 black-bg mt-30 btn-hover-2" type="submit">
      submit comment
    </button>
  </div>
</template>

<script>
export default {
  name: "CommentsComponent",
};
</script>

<style scoped></style>
