import Vue from 'vue'
import VueRouter from 'vue-router'


// WARNING VUEJS ROUTER ne pas oublier de faire les import des composant qui sont utilisés par le router
import Introduction from '../views/Introduction.vue';
import ProjectList from '../views/ProjectList.vue';
import MusicList from '../views/MusicList.vue';
import ProjectPage from '../views/ProjectPage.vue';
import InformationsPage from '../views/InformationsPage.vue';

Vue.use(VueRouter)

const routes = [
  {
    // IMPORTANT VUEJS ROUTER configuration d'une route
    path: '/',  // configuration de l'url à "match"
    component: Introduction, // composant a appeler (executer) lors que la route est valide
    name: 'Accueil', // nom de la route
  },
  {
    path: '/projets',
    component: ProjectList,
    name: 'Liste des projets',
  },
  {
    path: '/projet/:slug',
    component: ProjectPage,
    name: 'Projet',
  },
  {
    path: '/infos',
    component: InformationsPage,
    name: 'Informations',
  },
  {
    path: '/musiques',
    component: MusicList,
    name: 'Musiques',
  },
]

const router = new VueRouter({
  mode: 'history',
  base: process.env.BASE_URL,
  routes
})

router.beforeEach((to, from, next) => {
  console.log(to);
  document.title = `${process.env.VUE_APP_TITLE} - ${to.name}`
  next();
})

export default router