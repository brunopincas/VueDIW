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

  computed: {
    datosValidos(){
      if(this.email.length<1 || !(/.+@.+\..+/.test(this.email))  || this.password.length < 8){
        return false;
      }else{
        return true;
      }
    }
  },

  
  data: () => ({
    valid: false,
    password: "",
    passwordRules: [
      (v) => !!value || "Required.",
      (v) => v.length >= 8 || "Min 8 characters",
      (v) => `The email and password you entered don't match`,
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
  <v-row class="contenido">
    <v-col lg="5" sm="0" md="0">
      <img class="img_almacen" src="../assets/img/almacen.png" />
    </v-col>

    <v-col class="md-10" lg="6" md="12" sm="12">
      <v-container fluid>
        <h1>¡Bienvenido a Stockage!</h1>
        <h5>Introduce tus datos para iniciar sesión</h5>
        <v-form ref="form" v-model="valid" lazy-validation>
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

          <v-checkbox
            v-model="checkbox"
            :rules="[(v) => !!v || 'You must agree to continue!']"
            label="Mantener sesión iniciada?"
            required
          ></v-checkbox>

          <v-btn id="boton_login" :disabled="!datosValidos"  class="mt-20" @click="validate">
            <RouterLink :to="{ name: 'PaginaPrincipal', params: { email:email} }"><a> Iniciar sesión</a></RouterLink>
            
          </v-btn>

          <p id="txt_sin_cuenta">
            ¿Aun no tienes cuenta?<span id="txt_registro"
              ><RouterLink to="/Register"><a> Registrate</a></RouterLink></span
            >
          </p>
        </v-form>

        <v-row class="btn-redes">
          <v-col cols="4" sm="0" md="0">
            <div class="twitch button">
              <div class="icon"></div>
              <p class="title">Twitch</p>
            </div>
          </v-col>

          <v-col cols="4" sm="0" md="0">
            <div class="facebook button">
              <div class="icon"></div>
              <p class="title">Facebook</p>
            </div>
          </v-col>

          <v-col cols="4" sm="0" md="0">
            <div class="twitter button">
              <div class="icon"></div>
              <p class="title">Twitter</p>
            </div>
          </v-col>
        </v-row>
      </v-container>
    </v-col>
  </v-row>
</template>

<style>
.contenido{
}
.img_almacen {
  height: 100vh;
  width: auto;
  bottom: 0;
}

h1 {
  margin-bottom: 60px;
}
h5 {
  margin-bottom: 20px;
}

a {
  text-decoration: none;
  color: inherit;
}

.btn-redes {
  padding-top: 50px;
}

#boton_login {
  box-shadow: 0px 0px 2px #706c6c;
}

#txt_sin_cuenta {
  margin-top: 50px;
}
#txt_registro {
  font-weight: bold;
}

.button {
  overflow: hidden;
  width: 200px;
  height: 40px;
  border-radius: 10px;
  display: flex;
  justify-content: space-between;
  align-items: center;
  font-size: 16px;
  cursor: pointer;
  -webkit-touch-callout: none;
  -webkit-user-select: none;
  -khtml-user-select: none;
  -moz-user-select: none;
  -ms-user-select: none;
  user-select: none;
  /* Delete */
  margin-bottom: 25px;
}
.button .icon {
  width: 55px;
  height: 55px;
}
.button .title {
  flex: 1;
  text-align: center;
}

/*******/

/*******/

.button.twitch {
  height: 45px;
}

.twitch {
  background: white;
  color: #9146ff;
  overflow: visible;
  box-shadow: 0px 0px 0px #9146ff;
  transition: 0.1s;
}
.twitch:hover {
  transform: translate(-8px, -4px);
  box-shadow: 8px 4px 0px #9146ff;
}
.twitch:active {
  transition: 0.03s;
  transform: translate(-6px, -3px);
  box-shadow: 6px 3px 0px #9146ff;
}

div.twitch div.icon {
  width: 40px;
  height: 40px;
  background-size: cover;
  transform: translate(0px, 7px);
  background-image: url("https://i.ibb.co/ZLshBr7/Twitch.png");
  background-repeat: no-repeat;
  -webkit-filter: drop-shadow(0px 4px 0px rgba(255, 255, 255, 1));
  filter: drop-shadow(0px 4px 0px rgba(255, 255, 255, 1));
}

/*******/

/*******/

.facebook {
  background: white;
  color: #1877f2;
  border-radius: 6px;
  font-size: 12pt;
  transition-duration: 0.3s;
}

.facebook:hover {
  box-shadow: 0px 0px 10px;
}

div.facebook div.icon {
  background-image: url("https://i.ibb.co/nzm1stS/Facebook.png");
  background-repeat: no-repeat;
  background-size: cover;
}

/*******/

.twitter {
  background: white;
  color: #1877f2;
  transition-duration: 0.3s;
}

.twitter:hover {
  border: 1px solid #1877f2;
}

.twitter:active {
  background: #fcfcfc;
}

div.twitter div.icon {
  background-image: url("https://i.ibb.co/3Mpt37S/Twitter.png");
  background-repeat: no-repeat;
  background-size: cover;
}

/*******/
</style>
