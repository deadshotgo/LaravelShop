<template>
  <v-data-table-virtual
    :headers="headers"
    :items="[this.editedItem]"
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
      </div>edit
      <v-toolbar
        flatfalse
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
                      v-model="this.value"
                      label="Dessert name"
                    ></v-text-field>
                  </v-col>
                  <v-col
                    cols="12"
                    sm="6"
                    md="4"
                  >
                    <v-checkbox
                      v-model="this.isActiveValue"
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
                @click="(this.type < 0) ? edit(this.value, this.isActiveValue) : add(this.value, this.isActiveValue)"
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
        <td @click="this.dialog = !this.dialog; this.type = 1">New<v-icon icon="mdi-plus" size="large"></v-icon></td>
        <td @click="this.dialog = !this.dialog; this.type = 2">New<v-icon icon="mdi-plus" size="large"></v-icon></td>
        <td @click="this.dialog = !this.dialog; this.type = 3">New<v-icon icon="mdi-plus" size="large"></v-icon></td>
      </tr>
      <tr>

        <!--    ADDRESS TABLE    -->
        <td>
          <v-data-table-virtual :items="item.address" :headers="address_headers" class="brdr">
            <template v-slot:item="{ item: item_ad }">
              <tr>
                <td>{{ item_ad?.address }}</td>
                <td>{{ item_ad?.active }}</td>
                <td><v-icon
                  size="small"
                  class="me-2"
                  @click="this.old_value = item_ad.address; this.value = item_ad.address;  this.type=-1; this.isActiveValue = item_ad.active; this.oldIsActiveValue = item_ad.active; this.dialog = true;"
                >
                  mdi-pencil
                </v-icon></td>
              </tr>
            </template>
          </v-data-table-virtual>
        </td>
        <!--    ADDRESS TABLE  END  -->

        <!--    GMAIL TABLE    -->
        <td>
          <v-data-table-virtual :items="item.gmail" :headers="gmails_headers" class="brdr">
            <template v-slot:item="{ item: item_gm }">
              <tr>
                <td>{{ item_gm?.gmail }}</td>
                <td>{{ item_gm?.active }}</td>
                <td><v-icon
                  size="small"
                  class="me-2"
                  @click="this.old_value = item_gm.gmail; this.value = item_gm.gmail;  this.type=-2; this.isActiveValue = item_gm.active; this.oldIsActiveValue = item_gm.active; this.dialog = true;"
                >
                  mdi-pencil
                </v-icon></td>
              </tr>
            </template>
          </v-data-table-virtual>
        </td>
        <!--    GMAIL TABLE  END  -->

        <!--    PHONE NUMBER TABLE    -->
        <td>
          <v-data-table-virtual :items="item.phone_number" :headers="p_h_headers" class="brdr">
            <template v-slot:item="{ item: item_ph }">
              <tr>
                <td>{{ item_ph?.phone_number }}</td>
                <td>{{ item_ph?.active }}</td>
                <td><v-icon
                  size="small"
                  class="me-2"
                  @click="this.old_value = item_ph.phone_number; this.value = item_ph.phone_number;  this.type=-3; this.isActiveValue = item_ph.active; this.oldIsActiveValue = item_ph.active; this.dialog = true;"
                >
                  mdi-pencil
                </v-icon></td>
              </tr>
            </template>
          </v-data-table-virtual>
        </td>
        <!--    PHONE NUMBER  END  -->

        <!--    FOOTER TEXT TABLE    -->
        <td>
            <v-data-table-virtual :items="CONTACTS" :headers="foo_text_headers" class="brdr">
              <template v-slot:item="{ item: item_ft }">
              <tr>
                <td>{{ item_ft?.footer_text }}</td>
                <td><v-icon
                  size="small"
                  class="me-2"
                  @click="this.old_value = item_ft.footer_text; this.value = item_ft.footer_text;  this.type=-4; this.dialog = true;"
                >
                  mdi-pencil
                </v-icon></td>
              </tr>
              </template>
          </v-data-table-virtual>
        </td>
        <!--    FOOTER TEXT  END  -->

        <td>image</td>


      </tr>
    </template>

    <template v-slot:no-data>
      <v-btn
        color="primary"
      >
        Reset
      </v-btn>
    </template>
  </v-data-table-virtual>
</template>

<script>
import { mapActions, mapGetters } from "vuex";

export default {
  // eslint-disable-next-line vue/multi-word-component-names
  name: 'Contact',
  data: () => ({
    dt: '',
    search: '',
    value: '',
    old_value: '',
    deleteItem: '',
    type: null,
    isActiveValue: false,
    oldIsActiveValue: false,
    isActive: true,
    dialog: false,
    loading: false,
    headers: [
      { title: 'Addresses', key: 'adresses', align: 'center' },
      { title: 'Gmails', key: 'gmails' , align: 'center'},
      { title: 'Phone numbers', key: 'phone_numbers', align: 'center'},
      { title: 'Image', key: 'image', align: 'center'},
      { title: 'Text', key: 'footer_text' },
    ],
    address_headers: [
      { title: 'Address', key: 'address', align: 'left'},
      { title: 'isActive', key: 'isActive', align: 'left'},
      { title: 'Actions', key: 'actions', align: 'left'},
    ],
    gmails_headers: [
      { title: 'Gmail', key: 'gmail', align: 'left' },
      { title: 'isActive', key: 'isActive', align: 'left'},
      { title: 'Actions', key: 'actions', align: 'left'},
    ],
    p_h_headers: [
      { title: 'Number', key: 'phone_number', align: 'left' },
      { title: 'isActive', key: 'isActive', align: 'left'},
      { title: 'Actions', key: 'actions', align: 'left'},
    ],
    foo_text_headers: [
      { title: 'Footer text', key: 'footer_text', align: 'left' },
      { title: 'Actions', key: 'actions', align: 'left'},
    ],
    desserts: [],
    editedIndex: -1,
    editedItem: {
      path: 'path',
        gmail:
            [],
        address:
            [],
        phone_number:
            [],
      footer_text: 'asx',
      is_active: true,
    },
    defaultItem: {
      path: 'path',
        gmail:
          [],
        address:
          [],
        phone_number:
          [],
      footer_text: 'asx',
      is_active: true,
    }
  }),
  computed: {
    formTitle () {
      return this.editedIndex === -1 ? 'New Item' : 'Edit Item'
    },
    ...mapGetters(["CONTACTS"]),
  },

  watch: {
    dialog (val) {
      val || this.close()
    },
  },

  methods: {
    ...mapActions(["GET_CONTACTS", "CREATE_CONTACTS", "UPDATE_CONTACTS"]),
    editItem () {
      this.updateCopy()
      this.dialog = true
    },

    close () {
      this.dialog = false
      this.type = 0
      this.value = ''
    },
    async filterIsActive() {
      this.loading = true
      if(this.isActive) {
        this.GET_CONTACTS({ is_active: true }).then(() => {
          // filtering sub tables
          this.editedItem.address = this.editedItem.address.filter(item => item.active === true);
          this.editedItem.gmail = this.editedItem.gmail.filter(item => item.active === true);
          this.editedItem.phone_number = this.editedItem.phone_number.filter(item => item.active === true);
          this.loading = false
        });
      } else {
        this.GET_CONTACTS().then(() => {
          this.loading = false
        });
      }
      this.updateCopy()
    },
    async edit(new_value, new_active) {
      this.editItem()
      this.editedItem.id = 1
      switch (this.type) {
        case -1:
          for (var i = 0; i <= this.editedItem.address.length; i++) {
            if (this.editedItem.address[i].address === this.old_value) {
              this.editedItem.address[i] = {address: new_value, active: new_active}
              break;
              }
          }
          await this.UPDATE_CONTACTS(this.editedItem)
          break
        case -2:
          for (var i = 0; i <= this.editedItem.gmail.length; i++) {
            if (this.editedItem.gmail[i].gmail === this.old_value) {
              this.editedItem.gmail[i] = {gmail: new_value, active: new_active}
              break;
            }
          }
          await this.UPDATE_CONTACTS(this.editedItem)
          break
        case -3:
          for (var i = 0; i <= this.editedItem.phone_number.length; i++) {
            if (this.editedItem.phone_number[i].phone_number === this.old_value) {
              this.editedItem.phone_number[i] = {phone_number: new_value, active: new_active}
              break;
            }
          }
          await this.UPDATE_CONTACTS(this.editedItem)
          break
        case -4:
          this.editedItem.footer_text = new_value
          await this.UPDATE_CONTACTS(this.editedItem)
          break
      }
      await this.GET_CONTACTS({
        is_active: true,
      });
      this.close()
    },
    // function add new item to table
    async add(value, isActiveValue) {
      this.editItem(value)
      this.editedItem.id = 1
      switch (this.type) {
        case 1:
          this.editedItem.address.push({address: value, active: isActiveValue})
          await this.UPDATE_CONTACTS(this.editedItem)
          break
        case 2:
          this.editedItem.gmail.push({gmail: value, active: isActiveValue})
          await this.UPDATE_CONTACTS(this.editedItem)
          break
        case 3:
          this.editedItem.phone_number.push({phone_number: value, active: isActiveValue})
          await this.UPDATE_CONTACTS(this.editedItem)
          break
      }
      await this.GET_CONTACTS({
        is_active: true,
      });
      this.close()
    },
    updateCopy() {
      this.editedItem = {
        path: this.CONTACTS[0].path,
        gmail: JSON.parse(this.CONTACTS[0].gmail),
        address: JSON.parse(this.CONTACTS[0].address),
        phone_number: JSON.parse(this.CONTACTS[0].phone_number),
        footer_text: this.CONTACTS[0].footer_text,
        is_active: Boolean(this.CONTACTS[0].is_active) };
    }
  },
  async mounted() {
    this.loading = true
    await this.GET_CONTACTS({
      is_active: true,
    });
    this.updateCopy()
    this.filterIsActive()
    this.loading = false
    },
}
</script>

<style scoped lang="scss">
.brdr {
  border:solid #2C3333;
  border-width:0px 0.1em 0px 0.1em;
  padding:5%
}
</style>
