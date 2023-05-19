<template>
  <div>
    <div>
      <div class="card-header"> Point of sale </div>

<div class="row">
  <div class="card col-lg-5">
    <div class="card-header">
      <i class="fas fa-chart-area"></i>
      product
    </div>
  <div class="card-body">        
    <table class="table table-sm table-striped" >
        <thead>
          <tr> 
            <th scope="col">name</th>
            <th scope="col">Qty</th>
            <th scope="col">unit</th>
            <th scope="col">Total</th>    
            <th>Action</th>
          </tr>
        </thead>
       
        <tbody>
         <tr v-for="cart in carts" :key="cart.id" >
           <td>{{cart.product_name}}</td>
           <td> <input type="" readonly="" style="width:40px" :value="cart.product_quantity">
            <button @click.prevent="increment(cart.id)" class="btn btn-sm btn-success">+</button>

            <button @click.prevent="decrement(cart.id)" class="btn btn-sm btn-danger" v-if="cart.product_quantity>=2">-</button>
            <button class="btn btn-sm btn-danger" v-else="" disabled="" >-</button>
            </td>
           <td>{{cart.product_price}}</td>
           <td>{{cart.sub_total}}</td>
       
           <td align="center"><a @click="removeItem(cart.id)" class="btn btn-sm btn-danger">X</a></td>
         </tr>
       </tbody>
    </table>
    <hr>
  </div>


  <div class="card-footer">
    <ul class="list-group">
      <li class="list-group-item d-flex justify-content-between align-items-center">Total Quantity:
        <strong> {{qty}} </strong>
      </li>
      <li class="list-group-item d-flex justify-content-between align-items-center">Sub Total:
        <strong> {{subTotal}} Tk</strong>
      </li>
      <li class="list-group-item d-flex justify-content-between align-items-center">vat:
        <strong> {{vats.vat}} %</strong>
      </li>
       <li class="list-group-item d-flex justify-content-between align-items-center">Total:
        <strong> {{subTotal*vats.vat/100+subTotal}} Tk </strong>
      </li>
    </ul>

    <br>
  <form @submit.prevent="orderdone">
    <label>pay</label>
      <input type="" class="form-control" placeholder="pay" required v-model="pay">

    <label>Due</label>
      <input type="" class="form-control" placeholder="Due" required v-model="due">

    <label>Pay by</label>
      <select class="form-control" v-model="payby">
        <option value="handCash">Handcash</option>
        <option value="bkash">Bkash</option>
        <option value="giftCart">GiftCart</option>
      </select>

        <label>Customer Name</label>
      <input type="" class="form-control" placeholder="customer name" v-model="customer_name">

    <br>
    <button type="submit" class="btn btn-success">Submit</button>

  </form>
  </div>
</div>

  <div class="card col-lg-7">    
    <div class="card-header">
      <i class="fas fa-chart-area"></i>
    </div>
  <div class="card-body">
      <div class="table-responsive">
  
 <!-- category product start-->

  <ul class="nav nav-pills mb-3" id="pills-tab" role="tablist">
    <li class="nav-item" role="presentation">
      <button class="nav-link active" id="pills-home-tab" data-bs-toggle="pill" data-bs-target="#pills-home" type="button" role="tab" aria-controls="pills-home" aria-selected="true">All Product
      </button>
    </li>

    <li v-for="category in categorys" :key="category.id" class="nav-item" role="presentation">
      <button class="nav-link" id="pills-profile-tab" data-bs-toggle="pill" data-bs-target="#pills-profile" type="button" role="tab" aria-controls="pills-profile" aria-selected="false" @click="subProduct(category.id)">{{category.cat_name}}</button>
    </li>
  </ul>



  <div class="tab-content" id="pills-tabContent">
    <div class="tab-pane fade show active" id="pills-home" role="tabpanel" aria-labelledby="pills-home-tab" tabindex="0">
     
          <input type="text" placeholder="Search" v-model="searchTerm" class="form-control">

          <div class="row">
            <div class="col-lg-3 col-md-3 col-sm-6 col-6" v-for="product,key in filterSearch" :key="product.id">
              <br>

              <button class="btn btn-sm" @click.prevent="addToCard(product.id)">
                  
                  <div class="card" style="width:9rem; height:180px">
                    <img :src="product.image" class="card-img-top " style="height:100px ; width: 100px;">

                    <div class="card-body">
                    <small class="card-title">{{product.product_name}} {{product.unit_power}} mg</small>
                    <br>
                    <span v-if="product.stock_quantity>=1" class="badge badge-success">Availble ({{product.stock_quantity}})</span>
                    <span v-else="" class="badge badge-danger">Stock out</span>
                  </div>
                  </div>

              </button>
              

            </div>

          </div>


    </div>


<!-- category wise -->
  <div class="tab-pane fade" id="pills-profile" role="tabpanel" aria-labelledby="pills-profile-tab" tabindex="0">




      <input type="text" placeholder="Search" v-model="getsearchTerm" class="form-control">

          <div class="row">
            <div class="col-lg-3 col-md-3 col-sm-6 col-6" v-for="getproduct in getfilterSearch" :key="getproduct.id">
              <br>

              <button class="btn btn-sm" @click.prevent="addToCard(getproduct.id)">
                  
                  <div class="card" style="width:9rem; height:180px">
                    <img :src="getproduct.image" class="card-img-top " style="height:100px ; width: 100px;">

                    <div class="card-body">
                    <small class="card-title">{{getproduct.product_name}} {{getproduct.unit_power}} mg </small>
                    <br>
                    <span v-if="getproduct.stock_quantity>=1" class="badge badge-success">Availble ({{getproduct.stock_quantity}})</span>
                    <span v-else="" class="badge badge-danger">Stock out</span>
                  </div>
                  </div>

              </button>
              

            </div>

          </div>





 
    


  <!-- category wise -->



</div>
           

            <!-- category product end-->


            </div>
          </div>

         


         
       
        </div>




      </div>
      </div>

    </div>
  
    </div>
</template>


<script>

export default{


  data(){
    return {
      products:[],
      searchTerm:'',
      getsearchTerm:'',
      categorys:'',
      getproducts:[],
      carts:'',
      vats:'',
      customer_name:'',
      pay:'',
      due:'',
      payby:'',


     
    }

  },

  computed:{
    filterSearch(){

      return this.products.filter(product=>{
       return  product.product_name.match(this.searchTerm);
      
    

      })
    },

       getfilterSearch(){

      return this.getproducts.filter(getproduct=>{
       return  getproduct.product_name.match(this.getsearchTerm);
      
    

      })
    },

    qty(){

      let sum=0;

      for(let i=0;i<this.carts.length;i++){

        sum+=(parseFloat(this.carts[i].product_quantity));
      }

      return sum;
    },


  subTotal(){

      let sum=0;

      for(let i=0;i<this.carts.length;i++){

        sum+=(parseFloat(this.carts[i].product_quantity)*(parseFloat(this.carts[i].product_price)));
      }

      return sum;
    },


  },

  methods:{

    allproduct(){
      axios.get("/api/product/")
      .then(({data})=>(this.products=data))
      .catch()
    


    },

 
    allCategory(){
      axios.get("/api/category/")
      .then(({data})=>(this.categorys=data))
      .catch()
    


    },



    subProduct(id){

        axios.get("/api/getting/product/"+id)
      .then(({data})=>(this.getproducts=data))
      .catch()

        },

    addToCard(id){

      axios.get("/api/addtocard/"+id)
      .then(()=>{
        Reload.$emit('afterAdd')
        Notification.cart_success();
      })
      .catch()


        },

        cartProduct(){

      axios.get("/api/cart/product/")
      .then(({data})=>(this.carts=data))
      .catch()


        },


    removeItem(id){

    axios.get("/api/remove/cart/"+id)
      .then(()=>{

        Reload.$emit('afterAdd')
        Notification.remove();
      })
      .catch()

        },


        increment(id){

          axios.get("/api/increment/"+id)
            .then(()=>{
              Reload.$emit('afterAdd')
              Notification.success();
            })
            .catch()

        },

        decrement(id){

          axios.get("/api/decrement/"+id)
              .then(()=>{
                Reload.$emit('afterAdd')
                Notification.success();
              })
              .catch()

        },


        vat(){
          axios.get("/api/vat/")
            .then(({data})=>(this.vats=data))
            .catch()


        },


      orderdone(){

        let total=this.subTotal*this.vats.vat/100+this.subTotal;
        let data={qty:this.qty,subTotal:this.subTotal,customer_name:this.customer_name,pay:this.pay,due:this.due,payby:this.payby,vat:this.vat,total:total}

        axios.post("/api/orderdone/",data)
            .then(()=>{
                  Notification.success();

                  this.$router.push({name:'dashboard'})
            })
            .catch()


        },



  },
  created(){
    this.allproduct();
    this.allCategory();
    this.subProduct();
    this.cartProduct();
    this.vat();

      Reload.$on('afterAdd',()=>{

        this.cartProduct();
      })
  }
 
 }

</script>


<style>
  
</style>
