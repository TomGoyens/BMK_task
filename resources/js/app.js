import './bootstrap';

import { createApp } from 'vue'

import App from './App.vue'

// vue router
import { createWebHistory, createRouter } from 'vue-router'

import HomeView from './views/films/index.vue'
import PeopleView from './views/people.vue'

const routes = [
  { path: '/', component: HomeView },
  { path: '/people', component: PeopleView },
]

const router = createRouter({
  history: createWebHistory(),
  routes,
})

// Vuetify
import 'vuetify/styles'
import '@mdi/font/css/materialdesignicons.css'
import { createVuetify } from 'vuetify'
import * as components from 'vuetify/components'
import * as directives from 'vuetify/directives'
import { aliases, mdi } from 'vuetify/iconsets/mdi'


const vuetify = createVuetify({
  components,
  directives,
  icons: {
    defaultSet: 'mdi',
    aliases,
    sets: {
      mdi,
    },
  },
})


createApp(App)
  .use(vuetify)
  .use(router)
  .mount('#app')