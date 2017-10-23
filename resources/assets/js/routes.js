import Overview from './components/Overview.vue';
import LoginForm from './components/LoginForm.vue';
import MinifigsTable from './components/Minifigs/Table.vue';
import MinifigCreateForm from './components/Minifigs/CreateForm.vue';
import MinifigEditForm from './components/Minifigs/EditForm.vue';
import SetsTable from './components/Sets/Table.vue';
import Minifig from './components/Minifigs/Minifig.vue';
import Set from './components/Sets/Set.vue';
import SetCreateForm from './components/Sets/CreateForm.vue';
import SetEditForm from './components/Sets/EditForm.vue';
import auth from './auth.js';

const routes = [
    { path: '/', component: Overview },
    {
        path: '/login',
        component: LoginForm,
        beforeEnter: (to, from, next) => {
            if (auth.isLoggedIn()) {
                next('/');
            }
            next('/login');
        },
    },
    { path: '/minifigs', component: MinifigsTable },
    {
        path: '/minifigs/create',
        component: MinifigCreateForm,
        beforeEnter: (to, from, next) => {
            if (auth.isLoggedIn()) {
                next();
            }
            next('/login');
        },
    },
    { path: '/minifigs/:id', component: Minifig },
    { path: '/minifigs/:id/edit', component: MinifigEditForm },
    { path: '/sets', component: SetsTable },
    { path: '/sets/create', component: SetCreateForm },
    { path: '/sets/:id', component: Set },
    { path: '/sets/:id/edit', component: SetEditForm },
];

export default routes;
