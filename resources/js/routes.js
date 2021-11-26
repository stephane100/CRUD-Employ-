import AllEmployes from './components/AllEmployes.vue';
import CreateEmploye from './components/CreateEmploye.vue';
import UpdateEmploye from './components/UpdateEmploye.vue';


 
export const routes = [
    {
        name: 'home',
        path: '/',
        component: AllEmployes
    },
    {
        path: '/employes/create',
        component: CreateEmploye,
        name: "CreateEmploye"
    },
    {
        path: '/employes/edit',
        component: UpdateEmploye,
        name: "UpdateEmploye"
    }
    
    
];