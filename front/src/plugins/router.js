import Vue from 'vue'
import VueRouter from 'vue-router'


// WARNING VUEJS ROUTER ne pas oublier de faire les import des composant qui sont utilisés par le router
import Introduction from '../views/Introduction.vue';

Vue.use(VueRouter)

const routes = [
  {
    // IMPORTANT VUEJS ROUTER configuration d'une route
    path: '/',  // configuration de l'url à "match"
    component: Introduction, // composant a appeler (executer) lors que la route est valide
    name: 'introduction', // nom de la route
  },
]

const router = new VueRouter({
  mode: 'history',
  base: process.env.BASE_URL,
  routes
})

export default router