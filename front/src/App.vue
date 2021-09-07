<template>
  <div id="app">

          <!-- <Menu /> -->
          <!-- IMPORTANT VUEJS Router affichage de la "view" correspondant à l'url demandée //-->
          <!-- WARNING VUEJS ROUTER utiliser :key="$route.fullPath" pour spécifier à vuejs qu'il faut surveiller toute l'url et non juste le composant chargé" //-->
          <router-view
            :key="$route.fullPath"
          />


  </div>
</template>

<script>
// import Menu from './components/Menu.vue';

export default {
  props: {
  },
  name: 'App',
  components: {
    // Menu,
    // NOTICE VUJS l'ordre de déclaration des composants utilisable par l'application n'a pas d'importance
  },
  data() {
    return {
      
    }
  },
  methods: {
    }
  }
</script>

<style scoped lang="scss">
@use "./assets/scss/variable.scss";

#app {
  text-align: center;
  min-height: 100vh;
}
</style>