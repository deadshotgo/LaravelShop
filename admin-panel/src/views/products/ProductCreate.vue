<template>
  <v-sheet width="800" class="mx-auto bg-center">
  <form class="justify-center align-center mt-5">
    <div class="d-flex justify-center flex-column align-center">
    <v-col
      cols="12"
      md="9"
    >
      <v-text-field
        v-model="name"
        :counter="10"
        label="Title"
        required
      ></v-text-field>
    </v-col>

    <v-col
      cols="12"
      md="9"
    >
    </v-col>
    <v-checkbox
      v-model="checkbox"
      label="Do you agree?"
      required
    ></v-checkbox>

    <v-btn
      class="me-4"
    >
      submit
    </v-btn>
    </div>
  </form>
  </v-sheet>
</template>

<script>
export default {
  name: 'ProductCreate',
  data: () => ({
    name: '',
    email: '',
    select: null,
    checkbox: null,
  }),
}

</script>

<style scoped lang="scss">

</style>
