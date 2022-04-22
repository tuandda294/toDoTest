import Vue from 'vue'
import Router from 'vue-router'
import toDos from '@/components/toDos'

Vue.use(Router)

export default new Router({
  routes: [
    {
      path: '/',
      name: 'toDos',
      component: toDos
    }
  ]
})
