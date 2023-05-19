<template>
    <div>
     
    <div>
      <div class="card-header"> Supplier Insert</div>
      <div class="card-body">
           <h4 class="text-danger" v-if="errors.customer_name">{{errors.customer_name[0]}}
        </h4>
        <h4 class="text-danger" v-if="errors.phone_number">{{errors.phone_number[0]}}
        </h4>


        <form @submit.prevent="customerUpdate" enctype="multipart/form-data">
          <div class="form-group">

            <div class="form-row">
              <div class="col-md-6">
                <label for="exampleInputEmail1">Customer name</label>
         <input type="text" v-model="form.customer_name" class="form-control" aria-describedby="emailHelp" placeholder="Fullname">
              </div>

               <div class="col-md-6">
                <label for="exampleInputEmail1">phone number</label>
         <input type="number" v-model="form.phone_number" class="form-control" aria-describedby="emailHelp" placeholder="Enter phone number">
              </div>
          
            </div>

            <div class="form-row">
              <div class="col-md-6">
                <label for="exampleInputEmail1">Address (optional)</label>
         <input type="text" v-model="form.address" class="form-control" aria-describedby="emailHelp" placeholder="Enter address">
              </div>
             
    
              <div class="col-md-6">
                <label for="exampleInputEmail1">Email Address(optional)</label>
         <input type="email" v-model="form.email" class="form-control" aria-describedby="emailHelp" placeholder="Enter email (optional)">
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
        customer_name:'',
        email:'',
        address:'',
        phone_number:'',

       
      },
      errors:{},
    }

  },

  created(){

  	let id=this.$route.params.id
  		axios.get('/api/customer/'+id)
  		.then(({data})=>(this.form=data))
  		.catch(console.log('error'))

  },

  methods:{
   
    customerUpdate(){
    	let id=this.$route.params.id;
    	  axios.patch('/api/customer/'+id,this.form)
      .then(()=>{
        this.$router.push({name:'allcustomer'})
        Notification.success();

      })
      .catch(error=>{this.errors=error.response.data.errors})
    },

   
   
  
  }

 }
</script>
<style>
  
</style>
