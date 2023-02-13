<script>
  export default {
    data: () => ({
      icons: [
        'mdi-facebook',
        'mdi-twitter',
        'mdi-linkedin',
        'mdi-instagram',
      ],
    }),
  }
</script>

<template>

<div
    class="bg-indigo-lighten-1 text-center d-flex flex-column">
    <div>
      <v-btn
        v-for="icon in icons"
        :key="icon"
        class="mx-4"
        :icon="icon"
        variant="text"
      ></v-btn>
    </div>

    <div class="pt-0 text-center">
      Se trata de un Login y un Crud hecho con Vue que permite a un usuario gestionar un stock de productos.  
    </div>

    <v-divider></v-divider>

    <div class="align-end">
      {{ new Date().getFullYear() }} — <strong>Bruno Pincas</strong>
    </div>
  </div>
</template>

<style>
</style>
