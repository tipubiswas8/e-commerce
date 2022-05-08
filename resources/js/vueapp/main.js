
import { createApp } from 'vue'
import {createRouter, createWebHistory} from 'vue-router'
import { createStore } from 'vuex'
import MainPage from './main.vue'
import HomePage from './Pages/home.vue'
import AboutPage from './Pages/about.vue'
import ProductPage from './Pages/products.vue'
import CategoryPage from './Pages/category.vue'
import CheckoutPage from './Pages/checkout.vue'
import CheckoutSuccessPage from './Pages/checkout-success.vue'
import CheckoutFailurePage from './Pages/checkout-failure.vue'
import Axios from 'axios';



const vuexStore = createStore({
  state: {
    products: [],
    cktData:{}
  },
  actions:{
      async loadDataFromMySql({ commit }){
        const myResponse =  await Axios.get("/api/products-list");
        let mySqlData = myResponse.data;
        commit('SET_MY_PRODUCTS',mySqlData);
      },
      async setDataForCheckoutPage({ commit }, myCktData){    
        commit('SET_MY_CKT_DATA',myCktData);
      }
  },
  getters:{
    getMyProducts(state){
      return state.products;
    },
    getMyCheckoutData(state){
        return state.cktData;
    }
},

mutations:{
  SET_MY_PRODUCTS(state, myCommitSqlData){
    state.products = myCommitSqlData;
  },
  SET_MY_CKT_DATA(state, myCheckOutData){
    state.cktData = myCheckOutData;
  }
}
});




const routes = [
    { 
            name:'home-page',
            path: '/', 
            component: HomePage
        },
        { 
          name:'about-page',
          path: '/about', 
          component: AboutPage
        },
        { 
          name:'product-page',
          path: '/products/:mySlug', 
          component: ProductPage
        },
        { 
          name:'category-page',
          path: '/category/:model-6', 
          component: CategoryPage
        },
        { 
          name:'checkout-page',
          path: '/checkout', 
          component: CheckoutPage
        },
        { 
          name:'checkout-success-page',
          path: '/checkout-succ', 
          component: CheckoutSuccessPage
        },
        { 
          name:'checkout-failure-page',
          path: '/checkout-fail', 
          component: CheckoutFailurePage
        }
      ]

      const uvwx = createRouter({
        history: createWebHistory(),
        routes,
      })

      const mnop = createApp(MainPage);
      mnop.use(uvwx);
      mnop.mount('#abcd');
      mnop.use(vuexStore);
      // use vuexStore
