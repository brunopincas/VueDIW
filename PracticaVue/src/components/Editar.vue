<template>
  <link
    href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css"
    rel="stylesheet"
    integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD"
    crossorigin="anonymous"
  />
  <img class="logo" height="100" src="./img/logo.png" />
  <p class="subtext">Introduce un producto a la base de datos.</p>

  <form @submit.prevent="modificar">

    <v-text-field
      v-model="id"
      type="number"
      label="Id del producto"

    ></v-text-field>
    <v-text-field
      v-model="nombre"
      type="text"
      label="Nombre del producto"
    ></v-text-field>
    <v-text-field v-model="precio" type="number" label="Precio"></v-text-field>
    <v-btn @click="snackbar = true" class="me-4" type="submit"
      >Modificar producto</v-btn
    >

    <v-snackbar v-model="snackbar">
      {{ text }}

      <template v-slot:actions>
        <v-btn color="pink" variant="text" @click="snackbar = false">
          Close
        </v-btn>
      </template>
    </v-snackbar>

    <RouterLink to="/Listar"
      ><a
        ><button type="button" class="btn btn-light">
          <v-icon icon="mdi-undo-variant" color="black"></v-icon></button></a
    ></RouterLink>
  </form>

  <!--<form @submit.prevent="addProduct">
      <input type="text" v-model="nombre" placeholder="Nombre" />
      <input type="number" v-model="precio" placeholder="Precio" />
      <button type="submit">Agregar Producto</button>
    </form>-->
</template>
<script>
export default {
  data() {
    return {
      id: 0,
      nombre: "",
      precio: 0,
      snackbar: false,
      text: `Producto modificado en la base de datos`,
    };
  },
  created() {
  const producto = JSON.parse(this.$route.params.producto);
  this.id = producto.id;
  this.nombre = producto.nombre;
  this.precio = producto.precio;
},


  methods: {
    modificar() {
      console.log(this.id);
      console.log(this.nombre);
      console.log(this.precio);
      fetch("http://localhost/Vue/PracticaVue/editar.php", {
        method: "POST",
        headers: {
          "Content-Type": "application/json",
        },

        body: JSON.stringify({
          id: this.id,
          nombre: this.nombre,
          precio: this.precio,
        }),
      })
        .then((response) => {
          if (response.ok) {
            //text='Producto introducido en la base de datos';
            return response.json();
          } else {
            throw new Error("Error al modificar producto");
          }
        })
        .then((data) => {
          console.log(data);
        })
        .catch((error) => {
          //console.error(error);
        });
    },
  },
};
</script>

<style>
form {
  margin-left: 10%;
  margin-right: 10%;
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
