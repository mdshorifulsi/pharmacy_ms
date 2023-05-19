

let dashboard=require('./components/dashboard/dashboard.vue').default

let pos=require('./components/pos/pointofsale.vue').default




let addcustomer=require('./components/customer/create.vue').default
let allcustomer=require('./components/customer/index.vue').default
let editcustomer=require('./components/customer/edit.vue').default

let addemployee=require('./components/employee/create.vue').default
let allemployee=require('./components/employee/index.vue').default
let editemployee=require('./components/employee/edit.vue').default


let addsupplier=require('./components/supplier/create.vue').default
let allsupplier=require('./components/supplier/index.vue').default
let editsupplier=require('./components/supplier/edit.vue').default


let addcategory=require('./components/category/create.vue').default
let allcategory=require('./components/category/index.vue').default
let editcategory=require('./components/category/edit.vue').default

let addbrand=require('./components/brand/create.vue').default
let allbrand=require('./components/brand/index.vue').default
let editbrand=require('./components/brand/edit.vue').default



let addproduct=require('./components/product/create.vue').default
let allproduct=require('./components/product/index.vue').default
let editproduct=require('./components/product/edit.vue').default

let addexpense=require('./components/expense/create.vue').default
let todayexpense=require('./components/expense/today.vue').default
let editexpense=require('./components/expense/edit.vue').default

let allexpense=require('./components/expense/allexpense.vue').default


let order=require('./components/order/order.vue').default
let allorder=require('./components/order/allOrder.vue').default



export const routes = [


  { path: '/dashboard', component: dashboard,name:'dashboard' },


  { path: '/pos', component: pos,name:'pos' },
  
  { path: '/addcustomer', component: addcustomer,name:'addcustomer' },
  { path: '/allcustomer', component: allcustomer,name:'allcustomer' },
  { path: '/customer-edit', component: editcustomer,name:'customer-edit' },

  { path: '/addemployee', component: addemployee,name:'addemployee' },
  { path: '/allemployee', component: allemployee,name:'allemployee' },
  { path: '/employee-edit', component: editemployee,name:'employee-edit' },

  { path: '/addsupplier', component: addsupplier,name:'addsupplier' },
  { path: '/allsupplier', component: allsupplier,name:'allsupplier' },
  { path: '/supplier-edit', component: editsupplier,name:'supplier-edit' },

  { path: '/addcategory', component: addcategory,name:'addcategory' },
  { path: '/allcategory', component: allcategory,name:'allcategory' },
  { path: '/category-edit', component: editcategory,name:'categoryedit' },


  { path: '/addbrand', component: addbrand,name:'addbrand' },
  { path: '/allbrand', component: allbrand,name:'allbrand' },
  { path: '/brand-edit', component: editbrand,name:'brand-edit' },



  { path: '/addproduct', component: addproduct,name:'addproduct' },
  { path: '/allproduct', component: allproduct,name:'allproduct' },
  { path: '/product-edit', component: editproduct,name:'product-edit' },


  { path: '/addexpense', component: addexpense,name:'addexpense' },
  { path: '/todayexpense', component: todayexpense,name:'todayexpense' },
  { path: '/expense-edit', component: editexpense,name:'expense-edit' },
  { path: '/allexpense', component: allexpense,name:'allexpense' },


  { path: '/order', component: order,name:'order' },
  { path: '/allorder', component: allorder,name:'allorder' },

  
]