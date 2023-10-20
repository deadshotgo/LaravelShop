<template>
  <div style=" height:  100vh">
    <v-form
      v-model="form"
      @submit.prevent="onSubmit"
    >
    <v-card
      class="mx-auto pa-12 pb-8"
      elevation="8"
      max-width="448"
      rounded="lg"
    >
      <v-text-field
        v-model="email"
        density="compact"
        placeholder="Email address"
        prepend-inner-icon="mdi-email-outline"
        variant="outlined"
        label="Email"
        class="mb-5"
        :error="catchError"
        :readonly="loading"
        :rules="[required]"
      ></v-text-field>
      <v-text-field
        v-model="password"
        :append-inner-icon="visible ? 'mdi-eye-off' : 'mdi-eye'"
        :type="visible ? 'text' : 'password'"
        density="compact"
        placeholder="Enter your password"
        prepend-inner-icon="mdi-lock-outline"
        variant="outlined"
        label="Password"
        class="mb-5"
        :error="catchError"
        :readonly="loading"
        :rules="[required]"
        @click:append-inner="visible = !visible"
      ></v-text-field>

      <v-card
        class="mb-12"
        color="surface-variant"
        variant="tonal"
      >
        <v-card-text class="text-medium-emphasis text-caption">
          Warning: After 3 consecutive failed login attempts, you account will be temporarily locked for three hours. If you must login now, you can also click "Forgot login password?" below to reset the login password.
        </v-card-text>
      </v-card>

      <v-btn
        block
        class="mb-8"
        color="blue"
        size="large"
        variant="tonal"
        type="submit"
        :disabled="!form"
        :loading="loading"
      >
        Log In
      </v-btn>
    </v-card>
    </v-form>
  </div>
</template>
<script>
import {mapActions} from "vuex";
import router from "@/router";

export default {
  data: () => ({
    visible: false,
    form: false,
    email: null,
    password: null,
    loading: false,
    catchError: false,
  }),
  methods: {
    ...mapActions(["GET_LOGIN"]),
    onSubmit () {
      if (!this.form) return
      this.loading = true
      this.GET_LOGIN({email: this.email, password: this.password}).then(()=> {
        router.push('/')
      }).catch(() => {
        this.catchError = true
      }).finally(() => {
        this.loading = false
        this.form = true
      })
    },
    required (v) {
      return !!v || 'Field is required'
    },
  },
}
</script>
<style scoped lang="scss">

</style>
