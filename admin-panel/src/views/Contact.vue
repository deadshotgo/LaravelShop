<template>
  <v-data-table
    :headers="headers"
    :items="BRANDS"
    :search="search"
    class="elevation-2"
    :loading="loading"
    loading-text="Loading... Please wait"
  >
    <template v-slot:top>
      <div style="display: flex; align-items: center;">
        <v-text-field
          v-model="search"
          label="Search"
          class="pa-5"
          append-icon="mdi-magnify"
        ></v-text-field>
        <v-checkbox
          label="isActive"
          class="pa-4"
          v-model="isActive"
          @change="filterIsActive"
        ></v-checkbox>
      </div>
      <v-toolbar
        flat
      >
        <v-toolbar-title>Contacts</v-toolbar-title>

        <v-divider
          class="mx-4"
          inset
          vertical
        ></v-divider>
        <v-spacer></v-spacer>
        <v-dialog
          v-model="dialog"
          max-width="500px"
        >
          <template v-slot:activator="{ props }">
            <v-btn
              color="primary"
              dark
              class="mb-2"
              v-bind="props"
            >
              New Item
            </v-btn>
          </template>

          <v-card>
            <v-card-title>
              <span class="text-h5">{{ formTitle }}</span>
            </v-card-title>

            <v-card-text>
              <v-container>
                <v-row>
                  <v-col
                    cols="12"
                    sm="12"
                    md="12"
                  >
                    <v-text-field
                      v-model="editedItem.name"
                      label="Dessert name"
                    ></v-text-field>
                  </v-col>
                  <v-col
                    cols="12"
                    sm="12"
                    md="12"
                  >
                    <v-file-input
                      accept="image/png, image/jpeg, image/bmp"
                      placeholder="Pick an avatar"
                      prepend-inner-icon="mdi-camera"
                      prepend-icon=""
                      @change="(e) => {this.editedItem.image = e.target.files}"
                      label="Image"
                    ></v-file-input>
                  </v-col>
                  <v-col v-if="editedItem.image"
                         cols="12"
                         sm="12"
                         md="12"
                  >
                    <v-img width="500" :src="url" />
                  </v-col>
                  <v-col
                    cols="12"
                    sm="12"
                    md="12"
                  >
                    <v-checkbox
                      v-model="editedItem.is_active"
                      label="isActive"
                    ></v-checkbox>
                  </v-col>

                </v-row>
              </v-container>
            </v-card-text>

            <v-card-actions>
              <v-spacer></v-spacer>
              <v-btn
                color="blue-darken-1"
                variant="text"
                @click="close"
              >
                Cancel
              </v-btn>
              <v-btn
                color="blue-darken-1"
                variant="text"
                @click="save"
              >
                Save
              </v-btn>
            </v-card-actions>
          </v-card>
        </v-dialog>
      </v-toolbar>
    </template>
    <template v-slot:item="{ item }">
      <tr>
        <td>{{ item.id }}</td>
        <td>{{ item.name }}</td>
        <td><v-btn
          color="primary"
          @click="() => {imageModal = true; imageActive = item.image}"
        >
          Link
        </v-btn></td>
        <td>{{ item.is_active ? 'Active' : 'Disable' }}</td>
        <td>{{ item.createdAt }}</td>
        <td>{{ item.updatedAt }}</td>
        <td><v-icon
          size="small"
          class="me-2"
          @click="editItem(item)"
        >
          mdi-pencil
        </v-icon></td>
      </tr>
    </template>
    <template v-slot:no-data>
      <v-btn
        color="primary"
      >
        Reset
      </v-btn>
    </template>
  </v-data-table>
  <v-dialog
    v-model="imageModal"
    width="auto"
  >
    <v-card>
      <v-card-text>
        <v-img
          width="500"
          :aspect-ratio="1"
          :src="imageActive"
        ></v-img>
      </v-card-text>
      <v-card-actions>
        <v-btn color="primary" block @click="imageModal = false">Close Dialog</v-btn>
      </v-card-actions>
    </v-card>
  </v-dialog>
</template>

<script>
import { mapActions, mapGetters } from "vuex";

export default {
  // eslint-disable-next-line vue/multi-word-component-names
  name: 'Brand',
  data: () => ({
    search: '',
    imageActive: '',
    isActive: true,
    dialog: false,
    loading: false,
    imageModal: false,
    rules: [
      value => {
        return !value || !value.length
      },
    ],
    headers: [
      {
        title: '#Id',
        align: 'start',
        sortable: true,
        key: 'id',
      },
      { title: 'Name', key: 'name' },
      { title: 'Image', key: 'image'},
      { title: 'IsActive', key: 'is_active' },
      { title: 'CreatedAt', key: 'createdAt' },
      { title: 'UpdatedAt', key: 'updatedAt' },
      { title: 'Actions', key: 'actions', sortable: false },
    ],
    editedIndex: -1,
    editedItem: {
      name: '',
      image: '',
      is_active: true,
    },
    defaultItem: {
      name: '',
      image: '',
      is_active: true,
    }
  }),
  computed: {
    url() {
      if(typeof this.editedItem.image === "string") {
        console.log(this.editedItem.image);
        return this.editedItem.image
      } else {
        return URL.createObjectURL(this.editedItem.image[0]);
      }
    },
    formTitle () {
      return this.editedIndex === -1 ? 'New Item' : 'Edit Item'
    },
    ...mapGetters(["BRANDS"]),
  },

  watch: {
    dialog (val) {
      val || this.close()
    },
  },

  methods: {
    ...mapActions(["GET_BRANDS", "UPDATE_BRAND", "CREATE_BRAND"]),
    editItem (item) {
      this.editedIndex = item.id
      this.editedItem = { name: item.name, image: item.image, is_active: Boolean(item.is_active) };
      this.dialog = true
    },

    close () {
      this.dialog = false
      this.$nextTick(() => {
        this.editedItem = Object.assign({}, this.defaultItem)
        this.editedIndex = -1
      })
    },
    async filterIsActive() {
      this.loading = true
      if(this.isActive) {
        this.GET_BRANDS({ is_active: true }).then(() => {
          this.loading = false
        });
      } else {
        this.GET_BRANDS().then(() => {
          this.loading = false
        });
      }
    },
    async save () {
      if (this.editedIndex > -1) {
        this.editedItem.id = this.editedIndex;
        if(typeof this.editedItem.image === "string") {
          this.editedItem.image = null
        }
        await this.UPDATE_BRAND(this.editedItem)
      } else {
        await this.CREATE_BRAND(this.editedItem)
      }
      await this.GET_BRANDS({
        is_active: true,
      });
      this.close()
    }
  },
  async created() {
    await this.GET_BRANDS({
      is_active: true,
    });
  },

}
</script>

<style scoped lang="scss">

</style>
