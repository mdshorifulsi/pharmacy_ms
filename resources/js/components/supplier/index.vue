<template>
    <div>
      <div class="card-header"> <router-link class="btn btn-primary" to="addsupplier">Add Supplier</router-link>
      </div>
      <br>
    <div>
  
      <div class="card-body">
<div class="card mb-3">
          <div class="card-header">
            <i class="fas fa-table"></i>
            supplier list</div>
          <div class="card-body">
            <div class="table-responsive">
              <table class="table table-bordered" width="100%" cellspacing="0">
                <thead>
                  <tr>
                    <th>id</th>
                    <th>Name</th>
                    <th>email</th>
                    <th>address</th>
                    <th>phone_number</th>
                    <th>job_title</th>
                    <th>Salary</th>
                    <th>join_date</th>
                    <th>image</th>
                    <th>Action</th>
          
                  </tr>
                </thead>
               
                <tbody>
                  <tr v-for="supplier,key in suppliers" :key="supplier.id">
                    <td>{{++key}}</td>
                    <td>{{supplier.name}}</td>
                    <td>{{supplier.email}}</td>
                    <td>{{supplier.address }}</td>
                    <td>{{supplier.phone_number}}</td>       
                    <td>{{supplier.job_title}}</td>
                     <td>{{supplier.salary}}</td>
                    <td>{{supplier.join_date}}</td>
                        <td><img :src="supplier.photo" style="height:120px ; width: 150px;"></td>

                    <td>
                    <router-link :to="{name:'supplier-edit',params:{id:supplier.id}}" class="btn btn-sm btn-success">Edit</router-link>
                      <a @click="deleteSupplier(supplier.id)" class="btn btn-sm btn-danger">Delete</a>
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
      suppliers:{}
     
    }

  },

  methods:{

    allSupplier(){
      axios.get("/api/supplier/")
      .then(({data})=>(this.suppliers=data))
      .catch()
    


    },


    deleteSupplier(id){

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

              axios.delete("/api/supplier/"+id)
              .then(()=>{
                
                this.suppliers=this.suppliers.filter(supplier=>{

                  return supplier.id !=id;
                })

              
              })
              .catch(()=>{

                  this.$router.push({name:'allsupplier'})
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
    this.allSupplier();
  }
 
 }
</script>


<style>
  
</style>
