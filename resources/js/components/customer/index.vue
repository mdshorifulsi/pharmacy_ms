<template>
    <div>
      <div class="card-header"> <router-link class="btn btn-primary" to="addcustomer">Add customer</router-link>
      </div>
    <div>
   
      <div class="card-body">
<div class="card mb-3">
          <div class="card-header">
            <i class="fas fa-table"></i>
            customer list</div>
          <div class="card-body">
            <div class="table-responsive">
              <table class="table table-bordered" width="100%" cellspacing="0">
                <thead>
                  <tr>
                    <th>id</th>
                    <th>Name</th>
                     <th>phone_number</th>
                    <th>email</th>
                    <th>address</th>
                   
             
                    <th>Action</th>
          
                  </tr>
                </thead>
               
                <tbody>
                  <tr v-for="customer,key in customers" :key="customer.id">
                    <td>{{++key}}</td>
                    <td>{{customer.customer_name}}</td>
                     <td>{{customer.phone_number}}</td> 
                    <td>{{customer.email}}</td>
                    <td>{{customer.address }}</td>
                       
                  

                    <td>
      <router-link :to="{name:'customer-edit',params:{id:customer.id}}" class="btn btn-sm btn-success">Edit</router-link>


                      <a @click="deletecustomer(customer.id)" class="btn btn-sm btn-danger">Delete</a>
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
      customers:{}
     
    }

  },

  methods:{

    allCustomers(){
      axios.get("/api/customer/")
      .then(({data})=>(this.customers=data))
      .catch()
    


    },


    deletecustomer(id){

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

              axios.delete("/api/customer/"+id)
              .then(()=>{
                
                this.customers=this.customers.filter(customer=>{

                  return customer.id !=id;
                })

              
              })
              .catch(()=>{

                  this.$router.push({name:'allcustomer'})
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
    this.allCustomers();
  }
 
 }
</script>


<style>
  
</style>
