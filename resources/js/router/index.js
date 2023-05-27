import Vue from 'vue'
import Router from 'vue-router'
import Index from '../pages/Index'

/* Route module */
import SignInRoute from './routes/signin.js'
import PageNotFoundRoute from './routes/page-not-found.js'
import StoriesRoute from './routes/stories.js'
import PhotosRoute from './routes/photos.js'
import BannersRoute from "./routes/banners.js"
import AdminsRoute from "./routes/admins.js"

Vue.use(Router)

const router = new Router({
  mode: 'history',
  routes: [
    SignInRoute,
    {
      path: '/cms',
      name: 'Index',
      component: Index,
      redirect: '/cms/signin',
      children: [
        PageNotFoundRoute,
        ...StoriesRoute,
        ...PhotosRoute,
        ...BannersRoute,
        ...AdminsRoute
      ],
    },
  ],
})

export default router
