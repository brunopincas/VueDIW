<script>
export default {
  name: 'App',
  data: () => ({
    drawer: false,
    group: null,
  }
  ),

  methods:{
    goTORegister: function(){
      this.$router.push("/register"); 
    }
  }
};
</script>

<template>
    
      <v-app-bar app color="white" dark>
        <v-app-bar-nav-icon @click="drawer = true"> </v-app-bar-nav-icon>
        <v-toolbar-title>STOCKAGE</v-toolbar-title>
      </v-app-bar>
      <v-navigation-drawer v-model="drawer" absolute temporary>
        <v-list nav dense>
          <v-list-item-group
            v-model="group"
            active-class="deep-purple--text text--accent-4"
          >
            <v-list-item>
              <v-list-item-title>Inicio sesion</v-list-item-title>
            </v-list-item>
            <v-list-item>
              <v-list-item-title @click="goTORegister">Registro</v-list-item-title>
            </v-list-item>

          </v-list-item-group>
        </v-list>
      </v-navigation-drawer>

















      
    
  </template>