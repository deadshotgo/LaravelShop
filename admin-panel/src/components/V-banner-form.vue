<script>
export default {
  name: "V-banner-form",
  props: {
    isFetch: Boolean,
    text: Object,
    typeResponse: Boolean
  }
}
</script>

<template>
 <div v-if="isFetch">
  <v-banner
    lines="one"
    :icon="typeResponse ? 'mdi-lock' : '$error'"
    :color="typeResponse ? 'success' : 'error'"
    class="my-4"
  >
    <v-banner-text>
      {{ text }}
    </v-banner-text>

    <template v-slot:actions>
      <v-btn @click="() => this.$emit('close')">Action</v-btn>
    </template>
  </v-banner>
 </div>
</template>

<style scoped lang="scss">

</style>
