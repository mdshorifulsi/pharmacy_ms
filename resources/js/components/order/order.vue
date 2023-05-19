<template>
    <div>
     
    <div>
      <div class="card-header"> Today Order</div>
      <div class="card-body">
<div class="card mb-3">
         
          <div class="card-body">
            <div class="table-responsive">
              <table class="table table-bordered" width="100%" cellspacing="0">
                <thead>
                  <tr>
                    <th>id</th>
                    <th>Customer Name</th>
                    <th>Total Amount</th>
                    <th>Pay</th>
                    <th>Due</th>
                    <th>PayBy</th>
                  
                    <th>Action</th>
          
                  </tr>
                </thead>
               
                <tbody>
                  <tr v-for="order,key in orders" :key="order.id">
                    <td>{{++key}}</td>
                    <td>{{order.customer_name}}</td>
                    <td>{{order.total}} Tk</td>
                    <td>{{order.pay}} Tk</td>
                    <td>{{order.due}} Tk</td>
                    <td>{{order.payby}}</td>
                   
               

                    <td>
                      <a href="" class="btn btn-sm btn-success">Edit</a>
                      <a @click="deleteorder(order.id)" class="btn btn-sm btn-danger">Delete</a>
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
      orders:{}
     
    }

  },

  methods:{

    todayOrder(){
      axios.get("/api/order/")
      .then(({data})=>(this.orders=data))
      .catch()
    


    },


    deleteorder(id){

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
               axios.get("/api/delete/order/"+id)
            
              .then(()=>{
                this.orders = this.orders.filter(order=>{
                  return order.id !=id;

                })
              
              })
              .catch(()=>{

                  this.$router.push({name:'order'})
              })

              Swal.fire(
                'Deleted!',
                'Your file has been deleted.',
                'success'
              )
            }
          })


    },

   


  },
  created(){
    this.todayOrder();
  }
 
 }
</script>


<style>
  
</style>
