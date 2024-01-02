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
        <v-checkbox
          label="isActive"
          class="pa-4"
          v-model="isActive"
          @change="filterIsActive"
        ></v-checkbox>
      </div>
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
                    <!--         TEXT FIELD           -->
                    <v-textarea
                      v-if="this.position !== 'image'"
                      v-model="this.value"
                      label="Dessert name"
                    ></v-textarea>
                    <!--         TEXT FIELD END          -->

                    <!--         IMAGE LOADER FIELD           -->
                      <v-file-input
                        v-if="this.position === 'image'"
                        accept="image/png, image/jpeg, image/bmp"
                        placeholder="Pick an avatar"
                        prepend-inner-icon="mdi-camera"
                        prepend-icon=""
                        @change="(e) => {this.image = e.target.files;}"
                        label="Image"
                      ></v-file-input>

                    <!--         IMAGE SHOW          -->
                      <v-img v-if="editedItem.path" width="500" :src="url" />
                    <!--         IMAGE SHOW END          -->

                  <v-checkbox
                      v-if="this.position !== 'image' && this.position !== false"
                      v-model="this.isActiveValue"
                      label="isActive"
                    ></v-checkbox>
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
                @click="(this.type < 0) ? edit(this.value, this.isActiveValue, this.position) : add(this.value, this.isActiveValue, this.position)"
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
        <td @click="this.dialog = !this.dialog; this.type = 1; this.position = 'address'"><v-btn
          color="primary"
          dark
          class="mb-2"
          v-bind="props"
        >
          New Item
        </v-btn></td>
        <td @click="this.dialog = !this.dialog; this.type = 2; this.position = 'gmail'"><v-btn
          color="primary"
          dark
          class="mb-2"
          v-bind="props"
        >
          New Item
        </v-btn></td>
        <td @click="this.dialog = !this.dialog; this.type = 3; this.position = 'phone_number'"><v-btn
          color="primary"
          dark
          class="mb-2"
          v-bind="props"
        >
          New Item
        </v-btn></td>
        <td></td>
        <td></td>
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
                  @click="this.old_value = item_ad.address; this.value = item_ad.address;  this.type=-1; this.position = 'address'; this.isActiveValue = item_ad.active; this.oldIsActiveValue = item_ad.active; this.dialog = true;"
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
                  @click="this.old_value = item_gm.gmail; this.value = item_gm.gmail;  this.type=-2; this.position = 'gmail'; this.isActiveValue = item_gm.active; this.oldIsActiveValue = item_gm.active; this.dialog = true;"
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
                  @click="this.old_value = item_ph.phone_number; this.value = item_ph.phone_number;  this.type=-3; this.position = 'phone_number'; this.isActiveValue = item_ph.active; this.oldIsActiveValue = item_ph.active; this.dialog = true;"
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
                <td>{{ item_ft?.footer_text.toString().slice(0,50) }}...</td>
                <td><v-icon
                  size="small"
                  class="me-2"
                  @click="this.old_value = item_ft.footer_text; this.value = item_ft.footer_text;  this.type=-4; this.position = false; this.dialog = true;"
                >
                  mdi-pencil
                </v-icon></td>
              </tr>
              </template>
          </v-data-table-virtual>
        </td>
        <!--    FOOTER TEXT  END  -->

        <!--  IMAGE  -->
        <td><v-btn
          color="primary"
          @click="() => {imageModal = true; imageActive = this.editedItem.path}"
        >
          Link
        </v-btn></td>
        <td><v-icon
          size="small"
          class="me-2"
          @click="this.dialog = true; this.position='image'; this.type=-5"
        >
          mdi-pencil
        </v-icon></td>
        <!--  IMAGE END -->

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
  name: 'Contact',
  data: () => ({
    old_value: '',
    imageActive: '',
    position: '',
    value: '',
    image: null,
    type: null,
    oldIsActiveValue: false,
    isActiveValue: false,
    imageModal: false,
    isActive: true,
    loading: false,
    dialog: false,
    headers: [
      { title: 'Addresses', key: 'adresses', align: 'center' },
      { title: 'Gmails', key: 'gmails' , align: 'center'},
      { title: 'Phone numbers', key: 'phone_numbers', align: 'center'},
      { title: 'Text', key: 'footer_text', align: 'center' },
      { title: 'Image', key: 'image', align: 'center'},
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
    editedItem: {
      path: '',
      gmail: [],
      address: [],
      phone_number: [],
      footer_text: '',
    },
  }),
  computed: {
    formTitle () {
      return this.type > 0 ? 'New Item' : 'Edit Item'
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
    url() {
      if(typeof this.editedItem.path === "string") {
        return this.editedItem.path
      } else {
        return URL.createObjectURL(this.editedItem.path[0]);
        }
      },
    close() {
      this.dialog = false
      this.type = 0
      this.value = ''
    },
    async filterIsActive() {
      this.loading = true
      if (this.isActive) {
        await this.GET_CONTACTS().then(() => {
          // filtering sub tables
          this.editedItem.address = this.editedItem.address.filter(item => item.active === true);
          this.editedItem.gmail = this.editedItem.gmail.filter(item => item.active === true);
          this.editedItem.phone_number = this.editedItem.phone_number.filter(item => item.active === true);
          this.loading = false
        });
      } else {
        await this.GET_CONTACTS().then(() => {
          this.loading = false
        });
        this.updateCopy()
      }
    },
    async edit(newValue, newStatus, position) {
      // функція для редагування: лого, підтаблиць, тесту з футеру.
      // position - позиція для редагування: image, address, gmail, phone_number.
      // якщо position === null то редагується footer_text
      this.loading = true
      this.dialog = true
      this.updateCopy()
      if (position) {
        if (position === 'image') {
           this.editedItem.path = this.image
        } else {
          if(typeof this.editedItem.path === "string") {
            this.editedItem.path = null
          }
          for (var i = 0; i <= this.editedItem[position].length; i++) {
            if (this.editedItem[position][i][position] === this.old_value) {
              this.editedItem[position][i] = {[position]: newValue, active: newStatus}
              break
            }
          }
        }
      } else {
        if(typeof this.editedItem.path === "string") {
          this.editedItem.path = null
        }
        this.editedItem.footer_text = newValue
      }
      await this.UPDATE_CONTACTS(this.editedItem)
      this.filterIsActive()
      this.updateCopy()
      this.close()
    },
    // function add new item to sub table
    async add(value, isActiveValue, position) {
      this.loading = true
      this.updateCopy()
      this.editedItem[position].unshift({[position]: value, active: isActiveValue})
      if(typeof this.editedItem.path === "string") {
        this.editedItem.path = null
      }
      await this.UPDATE_CONTACTS(this.editedItem)
      this.filterIsActive()
      this.close()
    },
    // Тут робоча копія обновлюється
    updateCopy() {
      this.editedItem = {
        id: 1,
        path: this.CONTACTS[0].path,
        gmail: this.CONTACTS[0].gmail,
        address: this.CONTACTS[0].address,
        phone_number: this.CONTACTS[0].phone_number,
        footer_text: this.CONTACTS[0].footer_text,
      };
    },
  },
  async mounted() {
    this.loading = true
    await this.GET_CONTACTS();
    this.updateCopy()
    this.filterIsActive()
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
