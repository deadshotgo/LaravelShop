<template>
  <v-data-table
    :headers="headers"
    :items="CATEGORIES"
    class="elevation-2"
  >
    <template v-slot:top>
      <v-toolbar
        flat
      >
        <v-toolbar-title>Categories</v-toolbar-title>
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
                    sm="6"
                    md="4"
                  >
                    <v-text-field
                      v-model="editedItem.name"
                      label="Dessert name"
                    ></v-text-field>
                  </v-col>
                  <v-col
                    cols="12"
                    sm="6"
                    md="4"
                  >
                    <v-checkbox
                      v-model="editedItem.isActive"
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
    <template v-slot:[`item.actions`]="{ item }">
      <v-icon
        size="small"
        class="me-2"
        @click="editItem(item)"
      >
        mdi-pencil
      </v-icon>
    </template>
    <template v-slot:no-data>
      <v-btn
        color="primary"
      >
        Reset
      </v-btn>
    </template>
  </v-data-table>
</template>

<script>
import { mapActions, mapGetters } from "vuex";

export default {
  // eslint-disable-next-line vue/multi-word-component-names
  name: 'Category',
  data: () => ({
    dialog: false,
    headers: [
      {
        title: '#Id',
        align: 'start',
        sortable: true,
        key: 'id',
      },
      { title: 'Name', key: 'name' },
      { title: 'SubCategories', key: 'subCategories'},
      { title: 'IsActive', key: 'isActive' },
      { title: 'CreatedAt', key: 'createdAt' },
      { title: 'UpdatedAt', key: 'updatedAt', sortable: false },
      { title: 'Actions', key: 'actions', sortable: false },
    ],
    desserts: [],
    editedIndex: -1,
    editedItem: {
      name: '',
      isActive: true,
    },
    defaultItem: {
      name: '',
      isActive: true,
    }
  }),
  computed: {
    formTitle () {
      return this.editedIndex === -1 ? 'New Item' : 'Edit Item'
    },
    ...mapGetters(["CATEGORIES"]),
  },

  watch: {
    dialog (val) {
      val || this.close()
    },
  },

  methods: {
    ...mapActions(["GET_CATEGORIES", "CREATE_CATEGORY", "UPDATE_CATEGORY"]),
    editItem (item) {
      this.editedIndex = item.id
      this.editedItem = { name: item.name, isActive: Boolean(item.isActive) };
      this.dialog = true
    },

    close () {
      this.dialog = false
      this.$nextTick(() => {
        this.editedItem = Object.assign({}, this.defaultItem)
        this.editedIndex = -1
      })
    },

   async save () {
      if (this.editedIndex > -1) {
       this.editedItem.id = this.editedIndex;
       await this.UPDATE_CATEGORY(this.editedItem)
      } else {
      await  this.CREATE_CATEGORY(this.editedItem)
        this.desserts.push(this.editedItem)
      }
      await this.GET_CATEGORIES({
        is_active: true,
      });
      this.close()
    }
  },
  async created() {
   await this.GET_CATEGORIES({
      is_active: true,
    });
  },

}
</script>

<style scoped lang="scss">

</style>
