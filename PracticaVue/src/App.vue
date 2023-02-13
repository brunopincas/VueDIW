<script>
import Footer from "./components/Footer.vue";
import Login from "./components/Login.vue";
import { RouterLink, RouterView } from "vue-router";

// Components

export default {
  components: {
    Footer,
    Login,
  },
};
</script>

<template>
  <v-app>
    <!--<Login></Login>-->
    <RouterView />
  </v-app>

  <!--<Footer id="footer"></Footer>-->
</template>

<style>
#footer {
  position: absolute;
  bottom: 0;
  width: 100%;
  padding: 20px;
}
.formulario {
  margin-top: 200px;
}
</style>
