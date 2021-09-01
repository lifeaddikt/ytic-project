<template>
  <div id="app">

      <main>
          <!-- IMPORTANT VUEJS Router affichage de la "view" correspondant à l'url demandée //-->
          <!-- WARNING VUEJS ROUTER utiliser :key="$route.fullPath" pour spécifier à vuejs qu'il faut surveiller toute l'url et non juste le composant chargé" //-->
          <router-view
            :key="$route.fullPath"
          />
      </main>


  </div>
</template>

<script>
// import Header from './components/Header.vue';
// import Footer from './components/Footer.vue';
// import OCookingRecipeList from './components/OCookingRecipeList.vue';
export default {
  props: {
  },
  name: 'App',
  components: {
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
#app {
  font-family: Avenir, Helvetica, Arial, sans-serif;
  -webkit-font-smoothing: antialiased;
  -moz-osx-font-smoothing: grayscale;
  text-align: center;
  color: #2c3e50;
  margin-top: 0;
  min-height: 100vh;
}
</style>