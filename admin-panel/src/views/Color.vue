<template>
  <v-data-table
      :headers="headers"
      :items="COLORS"
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
        <v-toolbar-title>Colors</v-toolbar-title>

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
                        disabled
                        v-model="editedItem.name"
                        label="Color name"
                    ></v-text-field>
                  </v-col>
                  <v-col
                      cols="12"
                      sm="6"
                      md="4"
                  >
                    <v-text-field
                        disabled
                        v-model="editedItem.color"
                        label="Color"
                    ></v-text-field>
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
                  <div class="d-flex justify-space-around"
                       style="display: block; margin-left: auto; margin-right: auto">
                    <v-color-picker
                      @click="changeColorFormat(editedItem.color)"
                      class="ma-2"
                      show-swatches
                      :swatches="swatches"
                      swatches-max-height="400px"
                      hide-inputs v-model="editedItem.color"
                    ></v-color-picker>
                  </div>
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
        <td :style="{ background: item.color }">{{ item.color }}</td>
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

import {GetColorName} from "hex-color-to-color-name";

export default {
  // eslint-disable-next-line vue/multi-word-component-names
  name: 'Category',
  data: () => ({
    search: '',
    isActive: true,
    dialog: false,
    loading: false,
    swatches: [
      ['#FF0000', '#AA0000', '#550000'],
      ['#FFFF00', '#AAAA00', '#555500'],
      ['#00FF00', '#00AA00', '#005500'],
      ['#00FFFF', '#00AAAA', '#005555'],
      ['#0000FF', '#0000AA', '#000055'],
    ],
    headers: [
      {
        title: '#Id',
        align: 'start',
        sortable: true,
        key: 'id',
      },
      { title: 'Name', key: 'name' },
      { title: 'Color', key: 'color' },
      { title: 'IsActive', key: 'is_active' },
      { title: 'CreatedAt', key: 'createdAt' },
      { title: 'UpdatedAt', key: 'updatedAt', sortable: false },
      { title: 'Actions', key: 'actions', sortable: false },
    ],
    desserts: [],
    editedIndex: -1,
    editedItem: {
      name: '',
      color: '',
      is_active: true,
    },
    defaultItem: {
      name: '',
      color: '',
      is_active: true,
    }
  }),
  computed: {
    formTitle () {
      return this.editedIndex === -1 ? 'New Item' : 'Edit Item'
    },
    ...mapGetters(["COLORS"]),
  },

  watch: {
    dialog (val) {
      val || this.close()
    },
  },

  methods: {
    ...mapActions(["GET_COLORS", "CREATE_COLOR", "UPDATE_COLOR"]),
    editItem (item) {
      this.editedIndex = item.id
      this.editedItem = { name: item.name, color: item.color, is_active: Boolean(item.is_active) };
      this.dialog = true
    },
    changeColorFormat(hexColor) {
      this.editedItem.name = GetColorName(hexColor.slice(0, 7));
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
        this.GET_COLORS({ is_active: true }).then(() => {
          this.loading = false
        });
      } else {
        this.GET_COLORS().then(() => {
          this.loading = false
        });
      }
    },
    async save () {
      if (this.editedIndex > -1) {
        this.editedItem.id = this.editedIndex;
        await this.UPDATE_COLOR(this.editedItem)
      } else {
        await  this.CREATE_COLOR(this.editedItem)
        this.desserts.push(this.editedItem)
      }
      await this.GET_COLORS({
        is_active: true,
      });
      this.close()
    }
  },
  async created() {
    await this.GET_COLORS({
      is_active: true,
    });
  },

}
</script>

<style scoped lang="scss">

</style>
