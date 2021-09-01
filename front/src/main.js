import Vue from 'vue'
import App from './App.vue'


// TIPS import du fichier global de style
import './assets/scss/main.scss'

import router from './plugins/router.js'




// IMPORTANT accès a une variable d'environnement
console.log('%cDémarrage du front sur ' + process.env.VUE_APP_FRONT_URL, 'color: #fff; font-size: 3rem; background-color:#f0f');


Vue.config.productionTip = false


new Vue({
  router,
  render: h => h(App)
}).$mount('#app')