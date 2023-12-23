import { createRouter, createWebHistory } from 'vue-router';
import axios from 'axios';
import Dashboard from '../components/Dashboard.vue';
import Homepanel from '../components/Homepanel.vue';
import Jenistransaksi from '../components/jenistransaksi.vue';
import Tabungan from '../components/Tabungan.vue';
import Nasabah from '../components/Nasabah.vue';
import Agama from '../components/Agama.vue';
import Register from '../components/Register.vue';
import Login from '../components/Login.vue';
import Landing from '../components/Landing.vue';

const routes = [
    {
    path: '/',
    name: 'Landing',
    component: Landing,
    },
    {
        path: '/register',
        name: 'Register',
        component: Register,
    },
    {
        path: '/login',
        name: 'Login',
        component: Login,
    },
    {
        path: '/dashboard',
        name: 'Dashboard',
        component: Dashboard,
        meta: { requiresAuth: true },
        children:[
            {
                path: '/homepanel',
                name: 'Homepanel',
                component: Homepanel,
            },
            {
                path: '/jenistransaksi',
                name: 'Jenistransaksi',
                component: Jenistransaksi,
            },
            {
                path: '/tabungan',
                name: 'Tabungan',
                component: Tabungan,
            },
            {
                path: '/nasabah',
                name: 'Nasabah',
                component: Nasabah,
            },
            {
                path: '/agama',
                name: 'Agama',
                component: Agama,
            },
        ],
    },
];

const router = createRouter({
  history: createWebHistory(import.meta.env.BASE_URL),
  routes,
});

router.beforeEach((to, from, next) => {
  const isAuthenticated = localStorage.getItem('token');
  console.log('token:', isAuthenticated);

  // Jika pengguna sudah login dan mencoba mengakses halaman login, arahkan ke dashboard
  if (isAuthenticated && to.name === 'Login') {
    console.log('Redirecting to Dashboard because user is already logged in');
    next({ name: 'Dashboard' });
    return;
  }

  // Periksa apakah rute memerlukan otentikasi
  if (to.meta.requiresAuth) {
    if (!isAuthenticated) {
      // Jika tidak ada token, arahkan ke halaman login
      next({ name: 'Login' });
    } else {
      // Jika sudah ada token, arahkan ke halaman yang diminta
      next();
    }
  } else {
    // Jika rute tidak memerlukan otentikasi, lanjutkan navigasi
    next();
  }
});

export default router;
