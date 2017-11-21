import Vue from 'vue'
import VueRouter from 'vue-router'

import ShowBiu from '../components/ShowBiu';
import BiuAdmin from '../components/BiuAdmin';
import IndexSign from '../components/IndexSign';

Vue.use(VueRouter)
const routes=[{
	path:'/',

	component:ShowBiu,
	meta:{
		title:'main'
	}
},
{
	path:'/adminTable',
	component:BiuAdmin,
	meta:{
		title:'admin'
	}
},{
	path:'/sign',
	component:IndexSign,
	meta:{
		title:'sign'
	}
}
]
export default new VueRouter({
		
	    base: __dirname,
		routes
})