<template>
    <div>
     
    <div>
      <div class="card-header"> product List</div>
      <div class="card-body">
<div class="card mb-3">
          <div class="card-header">
            
            <router-link class="btn btn-primary" to="addproduct">Add product</router-link></div>
          <div class="card-body">
            <div class="table-responsive">
                <label>Search</label>
              <input type="text" v-model="searchTerm" class="form-control" style="width:200px">
              <br>

              <table class="table table-bordered" width="100%" cellspacing="0">
                <thead>
                  <tr>
                    <th>id</th>
                    <th>Name</th>
                    <th>Generic</th>
                    <th>Brand</th>
        
                    <th>buying_price</th>
                    <th>selling_price</th>
                    <th>stock</th>
                    <th>supplier</th>
                    <th>image</th>
                    <th>Action</th>
          
                  </tr>
                </thead>
               
                <tbody>
                  <tr v-for="product,key in filterSearch" :key="product.id">
                    <td>{{++key}}</td>
                    <td> {{product.product_name}} {{product.unit_power}}mg </td>
                   
                    <td> {{product.cat_name}} 
                    || {{product.product_generic_name}}</td>

                    <td>{{product.brand_name}}</td>
                    
                    <td>{{product.buying_price}}tk</td>
                    <td>{{product.selling_price}}tk</td>
                    <td>{{product.stock_quantity  }}</td>
                    <td>{{product.name}}</td>
                    <td><img :src="product.image" style="height:120px ; width: 150px;"></td>
                 

                  
                    
                    <td>
                         <router-link :to="{name:'product-edit',params:{id:product.id}}" class="btn btn-sm btn-success">Edit</router-link>

                        <a @click="deleteproduct(product.id)" class="btn btn-sm btn-danger">Delete</a>
                    </td>
                
                   
                  </tr>
              
                 
                </tbody>


              </table>
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
      searchTerm:''
     
    }

  },

  computed:{
    filterSearch(){

      return this.products.filter(product=>{
       return  product.product_name.match(this.searchTerm);

      })
    }

  },

  methods:{

    allproduct(){
      axios.get("/api/product/")
      .then(({data})=>(this.products=data))
      .catch()
    


    },


        deleteproduct(id){

      Swal.fire({
            title: 'Are you sure?',
            text: "You won't be able to revert this!",
            icon: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#3085d6',
            cancelButtonColor: '#d33',
            confirmButtonText: 'Yes, delete it!'
          }).then((result) => {
            if (result.isConfirmed) {

              axios.delete("/api/product/"+id)
              .then(()=>{
                
                this.products=this.products.filter(product=>{

                  return product.id !=id;
                })

              
              })
              .catch(()=>{

                  this.$router.push({name:'allproduct'})
              })

              Swal.fire(
                'Successfullt!',
                'Data insert sccessfully.',
                'success'
              )
            }
          })



    },





  },
  created(){
    this.allproduct();
  }
 
 }
</script>


<style>
  
</style>
