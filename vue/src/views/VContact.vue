<script>
import VBreadcrumbs from "../components/VBreadcrumbs.vue";
import { mapActions, mapGetters } from "vuex";
export default {
  components: { VBreadcrumbs },
  name: "vContact",
  computed: {
    ...mapGetters(["VCONTACTS"]),
  },
  methods: {
    ...mapActions(["VGET_CONTACTS"]),
  },
  async mounted() {
    await this.VGET_CONTACTS();
  },
};
</script>

<template>
  <div>
    <!-- BREADCRUMBS SECTION START -->
    <VBreadcrumbs
      images="data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAABccA…xMC0xMlQwNTowODowNi0wNTowMJAbvWcAAAAASUVORK5CYII="
      title="Contact"
    />
    <!-- BREADCRUMBS SECTION END -->
    <section id="page-content" class="page-wrapper">
      <!-- ADDRESS SECTION START -->
      <div class="address-section mb-80">
        <div class="container">
          <div class="row">
            <div class="col-sm-4 col-xs-12">
              <div
                class="contact-address box-shadow"
                v-if="this.VCONTACTS.address"
              >
                <i class="zmdi zmdi-pin"></i>
                <div
                  v-for="(item, key) in JSON.parse(this.VCONTACTS.address)"
                  :key="key"
                >
                  {{ item.active ? item.address : null }}
                </div>
              </div>
            </div>
            <div class="col-sm-4 col-xs-12">
              <div
                class="contact-address box-shadow"
                v-if="this.VCONTACTS.phone_number"
              >
                <i class="zmdi zmdi-phone"></i>
                <div
                  v-for="(item, key) in JSON.parse(this.VCONTACTS.phone_number)"
                  :key="key"
                >
                  {{ item.active ? item.phone_number : null }}
                </div>
              </div>
            </div>
            <div class="col-sm-4 col-xs-12">
              <div
                class="contact-address box-shadow"
                v-if="this.VCONTACTS.address"
              >
                <i class="zmdi zmdi-email"></i>
                <div
                  v-for="(item, key) in JSON.parse(this.VCONTACTS.gmail)"
                  :key="key"
                >
                  {{ item.active ? item.gmail : null }}
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
      <!-- ADDRESS SECTION END -->

      <!-- MESSAGE BOX SECTION START -->
      <div class="message-box-section mt-50 mb-80">
        <div class="container">
          <div class="row">
            <div class="col-md-12">
              <div class="message-box box-shadow white-bg">
                <form id="contact-form">
                  <div class="row">
                    <div class="col-md-12">
                      <h4 class="blog-section-title border-left mb-30">
                        get in touch
                      </h4>
                    </div>
                    <div class="col-md-6">
                      <input
                        type="text"
                        name="name"
                        placeholder="Your name here"
                      />
                    </div>
                    <div class="col-md-6">
                      <input
                        type="text"
                        name="email"
                        placeholder="Your email here"
                      />
                    </div>
                    <div class="col-md-6">
                      <input
                        type="text"
                        name="subject"
                        placeholder="Subject here"
                      />
                    </div>
                    <div class="col-md-6">
                      <input
                        type="text"
                        name="phone"
                        placeholder="Your phone here"
                      />
                    </div>
                    <div class="col-md-12">
                      <textarea
                        class="custom-textarea"
                        name="message"
                        placeholder="Message"
                      ></textarea>
                      <button
                        class="submit-btn-1 mt-30 btn-hover-1"
                        type="submit"
                      >
                        submit message
                      </button>
                    </div>
                  </div>
                </form>
                <p class="form-messege"></p>
              </div>
            </div>
          </div>
        </div>
      </div>
      <!-- MESSAGE BOX SECTION END -->
    </section>
    <!-- End page content -->
  </div>
</template>

<style scoped lang="scss"></style>
