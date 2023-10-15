<template>
  <v-data-table
    :headers="headers"
    :items="SUB_CATEGORIES"
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
        <v-toolbar-title>Sub categories</v-toolbar-title>

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
                  <v-autocomplete
                    v-model="editedItem.category_id"
                    :items="CATEGORIES"
                    item-title="name"
                    item-value="id"
                    label="Category"
                  ></v-autocomplete>
                  </v-col>
                  <v-col
                    cols="12"
                    sm="6"
                    md="4"
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
        <td>{{ item.category.name }}</td>
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
</template>

<script>
import { mapActions, mapGetters } from "vuex";

export default {
  // eslint-disable-next-line vue/multi-word-component-names
  name: 'SubCategory',
  data: () => ({
    search: '',
    isActive: true,
    dialog: false,
    loading: false,
    categoryValue: '',
    headers: [
      {
        title: '#Id',
        align: 'start',
        sortable: true,
        key: 'id',
      },
      { title: 'Name', key: 'name' },
      { title: 'Category', key: 'category'},
      { title: 'IsActive', key: 'isActive' },
      { title: 'CreatedAt', key: 'createdAt' },
      { title: 'UpdatedAt', key: 'updatedAt', sortable: false },
      { title: 'Actions', key: 'actions', sortable: false },
    ],
    editedIndex: -1,
    editedItem: {
      name: '',
      category_id: '',
      is_active: true,
    },
    defaultItem: {
      name: '',
      category_id: '',
      is_active: true,
    }
  }),
  computed: {
    formTitle () {
      return this.editedIndex === -1 ? 'New Item' : 'Edit Item'
    },
    ...mapGetters(["SUB_CATEGORIES", "CATEGORIES"]),
  },

  watch: {
   async dialog (val) {
      if(val){
      await this.GET_CATEGORIES({
         is_active: true,
       })
      }
      val || this.close()
    },
  },

  methods: {
    ...mapActions(["GET_SUB_CATEGORIES", "CREATE_SUB_CATEGORY", "UPDATE_SUB_CATEGORY", "GET_CATEGORIES"]),
    editItem (item) {
      this.editedIndex = item.id
      this.editedItem = { name: item.name, category_id: {name: item.category.name, id: item.category.id},  is_active: Boolean(item.is_active) };
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
         this.GET_SUB_CATEGORIES({ is_active: true }).then(() => {
           this.loading = false
         });
     } else {
       this.GET_SUB_CATEGORIES().then(() => {
         this.loading = false
       });
     }
    },
   async save () {
      if (this.editedIndex > -1) {
       this.editedItem.id = this.editedIndex;
       await this.UPDATE_SUB_CATEGORY({...this.editedItem, category_id: this.editedItem.category_id.id})
      } else {
        await this.CREATE_SUB_CATEGORY(this.editedItem)
      }
      await this.GET_SUB_CATEGORIES({
        is_active: true,
      });
      this.close()
    }
  },
  async created() {
   await this.GET_SUB_CATEGORIES({
      is_active: true,
    });
  },

}
</script>

<style scoped lang="scss">

</style>
