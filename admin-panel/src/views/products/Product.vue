<template>
    <v-data-table-server
      v-model:items-per-page="itemsPerPage"
      :search="search"
      :headers="headers"
      :items-length="TOTAL_PRODUCTS"
      :items="PRODUCTS"
      :loading="loading"
      item-value="name"
      @update:options="loadItems"
    >
      <template v-slot:item="{ item }">
          <tr>
              <td>{{ item.id }}</td>
              <td>{{ item.title }}</td>
              <td>{{ item.category.name }}</td>
              <td>{{ item.subCategory.name }}</td>
              <td>{{ item.brand.name }}</td>
              <td>{{ `${item.qty} count` }}</td>
              <td>{{ `$ ${item.price}` }}</td>
              <td>{{ `# ${item.article}` }}</td>
              <td>{{ item.is_active ? 'Active' : 'Disable' }}</td>
              <td>{{ item.like }}</td>
              <td>{{ item.feature ? 'True' : 'False' }}</td>
              <td>{{ item.tags.data.map((e) => e.name).join(', ') || '-' }}</td>
              <td>{{ item.colors.data.map((e) => e.name).join(', ') || '-' }}</td>
              <td>{{ item.createdAt }}</td>
              <td>{{ item.updatedAt }}</td>
            <td><router-link :to="{ name: 'product', params: { id: item.id } }">
              <v-icon
                size="small"
                class="me-2"
              >
                mdi-pencil
              </v-icon>
            </router-link></td>
          </tr>
      </template>
      <template v-slot:top>
        <tr style="display: flex; justify-content: space-between">
          <div>
            <td style="width: 200px">
                  <v-text-field
                          v-model="id"
                          hide-details
                          placeholder="Search id"
                          type="number"
                          class="ma-2"
                          density="compact"
                  ></v-text-field>
            </td>
            <td style="width: 300px">
              <v-text-field v-model="title" hide-details placeholder="Search title..." class="ma-2" density="compact"></v-text-field>
            </td>
            <td style="width: 300px">
                <v-text-field v-model="article" hide-details placeholder="Search article..." class="ma-2" density="compact"></v-text-field>
            </td>
          </div>
          <div>
            <v-btn :to="{name: 'ProductsCreate'}" color="primary" dark class="ma-4">
              New Item
            </v-btn>
          </div>
        </tr>
      </template>
    </v-data-table-server>
</template>

<script>
import { mapActions, mapGetters } from "vuex";
export default {
  data: () => ({
    itemsPerPage: 10,
    headers: [
      {
        title: '# ID',
        align: 'start',
        key: 'id',
      },
      { title: 'Title', key: 'title', align: 'start' },
      { title: 'Category', key: 'category',sortable: false, align: 'start' },
      { title: 'Subcategory', key: 'subCategory',sortable: false, align: 'start' },
      { title: 'Brand', key: 'brand', sortable: false, align: 'start' },
      { title: 'QTY', key: 'qty', align: 'start' },
      { title: 'Price', key: 'price', align: 'start' },
      { title: 'Article', key: 'article', align: 'start' },
      { title: 'Active', key: 'is_active', align: 'start' },
      { title: 'Like', key: 'like', align: 'start' },
      { title: 'Feature', key: 'feature', align: 'start' },
      { title: 'Tags', key: 'tags', sortable: false, align: 'start' },
      { title: 'Colors', key: 'colors', sortable: false, align: 'start' },
      { title: 'CreatedAt', key: 'createdAt', sortable: false, },
      { title: 'UpdatedAt', key: 'updatedAt', sortable: false, },
      { title: 'Action', key: 'action', sortable: false, },
    ],
    loading: true,
    totalItems: 0,
    title: '',
    article: '',
    id: '',
    search: '',

  }),
  computed:{
     ...mapGetters(["PRODUCTS", "TOTAL_PRODUCTS"])
   },
  watch: {
    title () {
      setTimeout(() => {
          this.search = String(Date.now())
      }, 500)
    },
    id () {
        setTimeout(() => {
            this.search = String(Date.now())
        }, 500)
    },
    article () {
      setTimeout(() => {
          this.search = String(Date.now())
      }, 500)
    },
  },
  methods: {
    ...mapActions(["GET_PRODUCTS"]),
   loadItems ({ page, itemsPerPage, sortBy }) {
       let sort = {}
       sortBy.map((e) => {
           sort[e.key] = e.order === 'asc' ? true : false
       })
      this.loading = true
      this.GET_PRODUCTS({ is_active: true,
          sorted: sort,
          page: page,
          limit: itemsPerPage,
          title: this.title,
          article: this.article,
          id: this.id,
          includes: ['brand', 'category', 'subCategory', 'colors', 'tags'],
          }).finally(() => {
          this.loading = false
      })
    },
  },
}
</script>

<style scoped lang="scss">

</style>
