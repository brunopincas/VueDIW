<script>
export default {
  //
  created() {
  const email = this.$route.params.email;
  this.correoRecogido = email;
},
};
</script>

<template>
  <v-card>
    <v-layout>
      <v-navigation-drawer expand-on-hover rail>
        <v-list>
          <v-list-item
          v-model="correoRecogido"
            title="Bruno Pincas"
            subtitle="bpincas@gmail.com"
          ></v-list-item>
        </v-list>

        <v-divider></v-divider>

        <v-list density="compact" nav>
          <RouterLink to="/PaginaPrincipal">
            <v-list-item prepend-icon="mdi-home" title="Inicio" value="myfiles">
            </v-list-item>
          </RouterLink>

          <RouterLink to="/Perfil">
            <v-list-item
              prepend-icon="mdi-account"
              title="Perfil"
              value="myfiles"
            ></v-list-item
          ></RouterLink>

          <RouterLink to="/Estadisticas">
            <v-list-item
              prepend-icon="mdi-chart-line"
              title="Estadisticas"
              value="shared"
            ></v-list-item
          ></RouterLink>

          <RouterLink to="/Listar">
            <v-list-item
              prepend-icon="mdi-table-account"
              title="Lista de usuarios"
              value="starred"
            ></v-list-item
          ></RouterLink>
        </v-list>
        <v-list density="compact" nav class="logout">
          <RouterLink to="/Login">
            <v-list-item
              prepend-icon="mdi-logout-variant"
              title="Cerrar sesión"
              value="starred"
              class="logout"
            ></v-list-item
          ></RouterLink>
        </v-list>
      </v-navigation-drawer>

      <v-main class="main">
        <img class="logo" height="100" src="./img/logo.png" />
        <p class="subtext">
          ¡Bienvenido a tu almacen online donde podrás gestionar tus productos!
        </p>

        <!--...............................................................................................................-->

        <v-container>
          <v-row>
            <v-col>
              <v-card max-width="400">
                <v-img
                  class="align-end text-white"
                  height="200"
                  src="https://images.unsplash.com/photo-1551288049-bebda4e38f71?ixlib=rb-4.0.3&ixid=MnwxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8&auto=format&fit=crop&w=1170&q=80"
                  cover
                >
                  <v-card-title>Estadísticas</v-card-title>
                </v-img>

                <v-card-subtitle class="pt-4">
                  Consulta tus estadísticas
                </v-card-subtitle>

                <v-card-text>
                  <div>
                    Mira la evolución de interacciones con tu base de datos
                  </div>
                </v-card-text>

                <v-card-actions>
                  <v-btn color="red">
                    <RouterLink to="/Estadisticas"
                      ><a> Consultar</a></RouterLink
                    >
                  </v-btn>
                </v-card-actions>
              </v-card>
            </v-col>

            <!--...............................................................................................................-->
            <v-col>
              <v-card max-width="400">
                <v-img
                  class="align-end text-white"
                  height="200"
                  src="https://images.unsplash.com/photo-1534723452862-4c874018d66d?ixlib=rb-4.0.3&ixid=MnwxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8&auto=format&fit=crop&w=1170&q=80"
                  cover
                >
                  <v-card-title>Mis productos</v-card-title>
                </v-img>

                <v-card-subtitle class="pt-4">
                  Mira los productos que hay en tu almacen
                </v-card-subtitle>

                <v-card-text>
                  <div>
                    Consulta tu lista de productos e interacciona con ellos
                  </div>
                </v-card-text>

                <v-card-actions>
                  <v-btn color="red">
                    <RouterLink to="/Listar"><a> Consultar</a></RouterLink>
                  </v-btn>
                </v-card-actions>
              </v-card>
            </v-col>
            <!--...............................................................................................................-->
            <v-col>
              <v-card max-width="400">
                <v-img
                  class="align-end text-white"
                  height="200"
                  src="https://images.unsplash.com/photo-1585250003309-694ff34512d7?ixlib=rb-4.0.3&ixid=MnwxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8&auto=format&fit=crop&w=1170&q=80"
                  cover
                >
                  <v-card-title>Perfil</v-card-title>
                </v-img>

                <v-card-subtitle class="pt-4"> Mira tu perfil </v-card-subtitle>

                <v-card-text>
                  <div>Mira tus datos introducidos en el login.</div>
                </v-card-text>

                <v-card-actions>
                  <v-btn color="red">
                    <RouterLink to="/Perfil"><a> Consultar</a></RouterLink>
                  </v-btn>
                </v-card-actions>
              </v-card>
            </v-col>
          </v-row>
        </v-container>
      </v-main>
    </v-layout>
  </v-card>
</template>

<style>
.main {
  height: 100vh;
  background-color: white;
}
.logout {
  bottom: 0;
  position: fixed;
}
.logo {
  align-self: center;
  display: block;
  margin: 0 auto;
  margin-bottom: 50px;
}
.subtext {
  text-align: center;
  margin-bottom: 100px;
}
</style>
