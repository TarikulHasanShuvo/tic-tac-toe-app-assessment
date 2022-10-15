import {createRouter, createWebHistory} from 'vue-router'

import Home from "../pages/Home.vue";
import TicTacToe from "../pages/TicTacToe.vue";

const routes = [
    {
    path: '/',
    name: 'Home',
    component: Home,
},
    {
    path: '/tic-tac-toe',
    name: 'TicTacToe',
    component: TicTacToe,
},


]

const router = createRouter({
    history: createWebHistory(import.meta.env.APP_URL), routes,
})

export default router
