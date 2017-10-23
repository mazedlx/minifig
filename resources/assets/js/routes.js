import Overview from './components/Overview.vue';
import LoginForm from './components/LoginForm.vue';
import MinifigsTable from './components/Minifigs/Table.vue';
import MinifigCreateForm from './components/Minifigs/CreateForm.vue';
import SetsTable from './components/Sets/Table.vue';
import Minifig from './components/Minifigs/Minifig.vue';
import Set from './components/Sets/Set.vue';
import SetCreateForm from './components/Sets/CreateForm.vue';

const routes = [
    { path: '/', component: Overview },
    { path: '/login', component: LoginForm },
    { path: '/minifigs', component: MinifigsTable },
    { path: '/minifigs/create', component: MinifigCreateForm },
    { path: '/minifigs/:id', component: Minifig },
    { path: '/sets', component: SetsTable },
    { path: '/sets/create', component: SetCreateForm },
    { path: '/sets/:id', component: Set },
];

export default routes;
