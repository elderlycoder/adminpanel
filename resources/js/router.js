import Vue from 'vue'
import VueRouter from 'vue-router';
import PostComponent from './components/PostComponent'
import CardComponent from './components/CardComponent'

//в объект Vue промещаем VueRouter
Vue.use(VueRouter)


export default new VueRouter({ 
    mode: 'history',

    routes: [
        {path: '/posts',  component: PostComponent},
        {path: '/cards',  component: CardComponent},
    ]
})
