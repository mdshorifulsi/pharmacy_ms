<template>
    <div>
     
    <div>
      <div class="card-header"> Product Update
        <router-link class="btn btn-primary  float-right" to="allproduct">all product</router-link>
      </div>
      <div class="card-body">

        <form @submit.prevent="ProductUpdate" enctype="multipart/form-data">

          <div class="form-group">

            <div class="form-row">

              <div class="col-md-6">
                <label for="exampleInputEmail1">medicine name </label>
         		<input type="text" v-model="form.product_name" class="form-control" aria-describedby="emailHelp" placeholder="medicine name">
              </div>

                 <div class="col-md-6">
                <label for="exampleInputEmail1">Generic name</label>
         		<input type="text" v-model="form.product_generic_name" class="form-control" aria-describedby="emailHelp" placeholder="Generic name">
              </div>

              


            </div>


                 <div class="form-row">

              <div class="col-md-6">
                     <label for="exampleInputEmail1">category</label>
              <select class="form-select" v-model="form.category_id"  aria-label="Default select example" >
        
              <option :value="category.id" v-for="category in categorys">
               {{ category.cat_name}}
              </option>
          
            </select>
              </div>

              <div class="col-md-6">
                     <label for="exampleInputEmail1">Brand</label>
              <select class="form-select" v-model="form.brand_id "  aria-label="Default select example" >
        
              <option :value="brand.id" v-for="brand in brands">
               {{ brand.brand_name}}
              </option>
          
            </select>
              </div>

                 

            </div>

             <div class="form-row">

              
              <div class="col-md-6">
                     <label for="exampleInputEmail1">supplier name</label>
              <select class="form-select" v-model="form.supplier_id "  aria-label="Default select example" >
        
              <option :value="supplier.id" v-for="supplier in suppliers">
               {{ supplier.name}}
              </option>
          
            </select>
              </div>

                 <div class="col-md-6">
                <label for="exampleInputEmail1">unit_power </label>
         		<input type="text" v-model="form.unit_power" class="form-control" aria-describedby="emailHelp" placeholder="unit power (mg)">
              </div>

            </div>


            <div class="form-row">

              
       

                 <div class="col-md-6">
                <label for="exampleInputEmail1">Code </label>
         		<input type="text" v-model="form.product_code" class="form-control" aria-describedby="emailHelp" placeholder="Code">
              </div>

                 <div class="col-md-6">
                <label for="exampleInputEmail1">stock quantity</label>
         		<input type="number" v-model="form.stock_quantity" class="form-control" aria-describedby="emailHelp" placeholder="stock quantity">
              </div>

            </div>


	   <div class="form-row">
        <div class="col-md-6">
	        <label for="exampleInputEmail1">Buying price </label>
	 		<input type="text" v-model="form.buying_price" class="form-control" aria-describedby="emailHelp" placeholder="Buying price">
      	</div>

       <div class="col-md-6">
        <label for="exampleInputEmail1">selling price</label>
 		<input type="number" v-model="form.selling_price" class="form-control" aria-describedby="emailHelp" placeholder="selling_price">
      </div>

	</div>


              <div class="form-row">
        <div class="col-md-12">
	        <label for="exampleFormControlTextarea1">Description </label>
    <textarea class="form-control" v-model="form.description" id="exampleFormControlTextarea1" rows="3"></textarea>
      	</div>

      

	</div>
<br>

	<div class="form-row">
      <div class="col-md-6">
         <input type="file" name="image" class="btn btn-info"  @change="onImageChange" accept="image/*"/>
       
      </div>
      <div class="col-md-6">
        <img :src="form.image" style="height:180px ; width: 400px;">
      </div>

     

            </div>



           <br>  
	<div class="form-row">
              <div class="col-md-4">
          <div class="checkbox">
            <label>
               
               <input type="checkbox"  v-model="form.status" id="status" name="status" :value="1">  Status

            </label>
          </div>
      </div>
  </div>
           
            


          </div>


     
      
          <button class="btn btn-primary" type="submit">Save</button>
        </form>
      
      </div>
    </div>
  
    </div>
</template>


<script>

export default{

   

  data(){
    return {
      form:{
        product_name:'',
        product_generic_name:'',
        unit_power:'',
        category_id:'',
        brand_id:'',
        supplier_id:'',
        product_code:'',
        stock_quantity:'',
        buying_price:'',
        selling_price:'',
        image:'',
        description:'',
        status:''

      
       
      },
      errors:{},
      categorys:{},
      suppliers:{},
      brands:{},
    }



  },

  methods:{

  	onImageChange(event){
  		let input =event.target;
      	console.log(input.files);

      if(input.files && input.files[0]){

          let reader=new FileReader();
            reader.onload=(event)=>{

              this.form.image=event.target.result;
              // console.log(event.target.result)



            }
            reader.readAsDataURL(input.files[0])


      }
  	},


 
    ProductUpdate(){

    	let id=this.$route.params.id;
      axios.patch('/api/product/'+id,this.form)
      .then(()=>{

        this.$router.push({name:'allproduct'})
        Notification.success();

      })

 .catch(error=>{this.errors=error.response.data.errors})



    },

   
   
  
  },

    created(){

     axios.get('/api/category/')
     .then(({data})=>(this.categorys=data))

     axios.get('/api/supplier/')
     .then(({data})=>(this.suppliers=data))

      axios.get('/api/brand/')
     .then(({data})=>(this.brands=data))


     let id=this.$route.params.id;
    axios.get('/api/product/'+id)
    .then(({data})=>(this.form=data))
   	.catch(console.log('error'))

  },



 }
</script>
<style>

</style>
