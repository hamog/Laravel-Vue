import VueRouter from 'vue-router';
import Home from './components/views/Home.vue';
import About from './components/views/About.vue';
import Contact from './components/views/Contact.vue';
import Notes from './components/views/Notes.vue';

let routes = [
    { path: '/', component: Home },
    { path: '/about', component: About },
    { path: '/contact', component: Contact },
    { path: '/notes', component: Notes }
];

export default new VueRouter({
    routes,
    linkActiveClass: 'active'
});