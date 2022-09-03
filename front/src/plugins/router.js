import Vue from 'vue'
import VueRouter from 'vue-router'


// WARNING VUEJS ROUTER ne pas oublier de faire les import des composant qui sont utilisés par le router
import Introduction from '../views/Introduction.vue';
import ProjectList from '../views/ProjectList.vue';
import MusicList from '../views/MusicList.vue';
import ProjectPage from '../views/ProjectPage.vue';
import InformationsPage from '../views/InformationsPage.vue';
import NotFound from '../views/NotFound.vue';

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
    name: 'Projets',
  },
  {
    path: '/collaborations',
    component: ProjectList,
    name: 'Collaborations',
  },
  {
    path: '/projet/:slug',
    component: ProjectPage,
    name: 'Projet',
  },
  {
    path: '/collaboration/:slug',
    component: ProjectPage,
    name: 'Collaboration',
  },
  {
    path: '/infos',
    component: InformationsPage,
    name: 'Informations',
  },
  {
    path: '/musique',
    component: MusicList,
    name: 'Musique',
  },
  {
    path: '/404',
    component: NotFound,
    name: 'Error 404',
   },  
  {
    path: '*',
    redirect: '/404'
   },  
]

const router = new VueRouter({
  mode: 'history',
  base: process.env.BASE_URL,
  routes,
  scrollBehavior () {
    return { x: 0, y: 0 }
  }
})

router.beforeEach((to, from, next) => {
  document.title = `${process.env.VUE_APP_TITLE} - ${to.name}`
  next();
})

export default router