<template>
  <link
    href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css"
    rel="stylesheet"
    integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD"
    crossorigin="anonymous"
  />

  <v-card>
    <v-layout>
      <v-navigation-drawer expand-on-hover rail>
        <v-list>
          <v-list-item
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
        <div>
          <img class="logo" height="100" src="./img/logo.png" />
          <p class="subtext">Interactua como quieras con tus productos.</p>
          <table class="table table-striped table-hover">
            <thead>
              <tr>
                <th>ID</th>
                <th>Nombre</th>
                <th>Precio</th>
                <th>
                  <RouterLink to="/Almacen"
                    ><a>
                      <button type="button" class="btn btn-light">
                        <v-icon
                          icon="mdi-account-multiple-plus"
                          color="black"
                        ></v-icon></button></a
                  ></RouterLink>
                </th>
              </tr>
            </thead>
            <tbody>
              <tr v-for="(product, index) in products" :key="index">
                <td>{{ product.id }}</td>
                <td>{{ product.nombre }}</td>
                <td>{{ product.precio }} €</td>
                <td>                  <RouterLink :to="{ name: 'Editar', params: { producto:JSON.stringify(product) } }">


                    <button class="iconoaccion" @click="editProduct(product)"><v-icon icon="mdi-account-edit" color="black"></v-icon></button>
                  </RouterLink>
                  <button
                    class="iconoaccion"
                    @click="deleteProduct(product.id)"
                  >
                    <v-icon icon="mdi-delete-empty" color="black"></v-icon>
                  </button>
                </td>
              </tr>
            </tbody>
          </table>
        </div>
      </v-main>
    </v-layout>
  </v-card>
</template>

<script>
import { onUpdated } from "vue";

export default {
  data() {
    return {
      products: [],
    };
  },
  watch: {
    products: function () {},
  },
  mounted() {
    this.getProducts();
  },
  methods: {
    getProducts() {
      fetch("http://localhost/Vue/PracticaVue/listar.php")
        .then((response) => response.json())
        .then((data) => {
          this.products = data;
        });
    },
    editProduct(product) {
      this.$emit("edit-product", product);
    },
    deleteProduct(id) {
      fetch(`http://localhost/Vue/PracticaVue/eliminar.php?id=${id}`)
        .then((response) => response.json())
        .then((data) => {
          this.getProducts();
        });

      alert("Usuario eliminado");
      location.reload();
      //onUpdated
    },
  },
};
</script>

<style>
.iconoaccion {
  margin-right: 10px;
}
table {
  text-align: center;
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

.main {
  height: 100vh;
  background-color: white;
}
.logout {
  bottom: 0;
  position: fixed;
}
</style>
