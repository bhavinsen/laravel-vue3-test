import { createWebHistory, createRouter } from "vue-router";
import Dashboard from "../components/Dashboard.vue";
import Login from "../components/Login.vue";
import Subject from "../components/Subject.vue";

const routes = [
  {
    path: "/dashboard",
    name: "Dashboard",
    component: Dashboard,
    meta:
    {
      requierdauth: true
    }
  },
  {
    path: "/subject",
    name: "Subject",
    component: Subject,
    meta:
    {
      requierdauth: true
    }
  },
  { path: '/', redirect: "/dashboard" },
  {
    path: "/login",
    name: "Login",
    component: Login,
    meta: {
      hideForAuth:true
    }
  },
  {
    path: "/:catchAll(.*)",
    redirect: "/dashboard"
  }
];

const router = createRouter({
  history: createWebHistory(),
  routes,
});

router.beforeEach((to, from, next) => {
  const loggedIn = localStorage.getItem('user')
  if (to.matched.some(record => record.meta.requierdauth) && !loggedIn) {
    next('/login')
    return
  }
  
  if (to.matched.some(record => record.meta.hideForAuth) && loggedIn) {
    next({ path: '/' });
    return
  }
  next();
})

export default router;