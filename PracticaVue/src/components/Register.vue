<script>
export default {
  data() {
    return {
      show1: false,
      show2: true,
      show3: false,
      show4: false,
      password: "Password",
    };
  },
  data: () => ({
    valid: true,
    name: "",
    passwordRules: [
      (v) => !!value || "Required.",
      (v) => v.length >= 8 || "Min 8 characters",
      (v) => `The email and password you entered don't match`,
    ],
    nameRules: [
      (v) => !!v || "Name is required",
      (v) => (v && v.length <= 10) || "Name must be less than 10 characters",
    ],
    email: "",
    emailRules: [
      (v) => !!v || "E-mail is required",
      (v) => /.+@.+\..+/.test(v) || "E-mail must be valid",
    ],
    select: null,
    items: ["Item 1", "Item 2", "Item 3", "Item 4"],
    checkbox: false,
  }),

  methods: {
    validate() {
      this.$refs.form.validate();
    },
    reset() {
      this.$refs.form.reset();
    },
    resetValidation() {
      this.$refs.form.resetValidation();
    },
  },
};
</script>
<template>
   <v-row>

    <v-col lg="5" sm="0" md="0">
      <img class="img_almacen" src="../assets/img/almacen.png" />
    </v-col>

    <v-col class="md-10" lg="6" md="12" sm="12">
  
  <v-container class="container">
    <h1>Introduce tus datos para registrarte</h1>
    

    <v-form ref="form" v-model="valid" lazy-validation>

      <v-text-field
        v-model="name"
        label="Introduce tu nombre completo"
        variant="solo"
        clearable
        required
      ></v-text-field>

      <v-text-field
        v-model="email"
        :rules="emailRules"
        label="Introduce tu correo electronico"
        variant="solo"
        clearable
        required
      ></v-text-field>

      <v-text-field
        v-model="password"
        :append-icon="show1 ? 'mdi-eye' : 'mdi-eye-off'"
        :rules="passwordRules"
        :type="show1 ? 'text' : 'password'"
        name="input-10-1"
        label="Introduce tu contraseña"
        hint=""
        variant="solo"
        clearable
        @click:append="show1 = !show1"
        required
      ></v-text-field>

      <v-text-field
        v-model="password2"
        :append-icon="show1 ? 'mdi-eye' : 'mdi-eye-off'"
        :rules="passwordRules"
        :type="show1 ? 'text' : 'password'"
        name="input-10-1"
        label="Comprueba tu contraseña"
        hint=""
        variant="solo"
        clearable
        @click:append="show1 = !show1"
        required
      ></v-text-field>

      <v-checkbox
        v-model="checkbox"
        :rules="[(v) => !!v || 'You must agree to continue!']"
        label="Mantener sesión iniciada?"
        required
      ></v-checkbox>

      <v-btn id="boton_login" class="mt-20" @click="validate">
        <RouterLink to="/PaginaPrincipal"><a> Regístrate</a></RouterLink>
      </v-btn>

    </v-form>
  </v-container>
</v-col>
</v-row>
</template>

<style>
.img_almacen {
  height: 100vh;
  width: auto;
  bottom: 0;
}
</style>
