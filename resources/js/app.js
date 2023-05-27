import './bootstrap'

import Vue from 'vue'
import router from './router'
import store from './store'

window.Vue = Vue

import App from './App.vue'

// Import ElementUI
import ElementUI from 'element-ui'
import enLocale from 'element-ui/lib/locale/lang/en'
import { Cookie } from './util/cookie'

//VeeValidate
import { ValidationProvider, ValidationObserver, extend } from 'vee-validate';

//cai lenguages
import vi from 'vee-validate/dist/locale/vi';

//cai pipe
import * as rules from 'vee-validate/dist/rules';

for (let rule in rules) {
    extend(rule, {
        ...rules[rule], // add the rule
        message: vi.messages[rule] // add its message
    });
}

Vue.component('ValidationProvider', ValidationProvider);
Vue.component('ValidationObserver', ValidationObserver);

Vue.use(ElementUI, { locale: enLocale })
// End ElementUI

Vue.config.productionTip = false
Vue.component('App', App)

// This callback runs before every route change, including on page load.
router.beforeEach((to, from, next) => {
    // This goes through the matched routes from last to first, finding the closest route with a title.
    // eg. if we have /some/deep/nested/route and /some, /deep, and /nested have titles, nested's will be chosen.
    const nearestWithTitle = to.matched.slice().reverse().find(r => r.meta && r.meta.title)
    // If a route with a title was found, set the document (page) title to that value.
    if (nearestWithTitle) document.title = nearestWithTitle.meta.title

    if (to.matched.some(record => record.meta.requiredAuth)) {
        // this route requires auth, check if logged in
        // if not, redirect to login page.
        if (Cookie.findByName('access_token')) {
            // Exist cookie
            if (Object.keys(store.getters['auth/currentUser']).length > 0) {
                next()
            }

            if (from.path !== '/cms/signin') {
                store.dispatch('auth/checkAuth').then(
                  (res) => { next() },
                  (error) => {
                      Cookie.removeCookie('access_token')
                      next('/cms/signin')
                  }
                )
            }
        } else {
            // Not exist cookie access_token
            window.location.href = window.location.origin + '/cms/signin'
        }
    } else {
        if (to.name === 'SignIn' && Cookie.findByName('access_token')) {
            next({ name: 'Stories' })
        } else {
            next()
        }
    }
})

const app = new Vue({
    el: '#app',
    router,
    store,
})
