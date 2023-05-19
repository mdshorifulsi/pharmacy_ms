<template>
    <div>
     <div class="card-header"> <router-link class="btn btn-primary" to="addemployee">Add Employee</router-link>
      </div>
    <div>
     <br>
      <div class="card-body">
<div class="card mb-3">
          <div class="card-header">
            <i class="fas fa-table"></i>
            Employee list</div>
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
                    <th>image</th>
                    <th>join_date</th>
                    <th>Action</th>
          
                  </tr>
                </thead>
               
                <tbody>
                  <tr v-for="employee,key in employees" :key="employee.id">
                    <td>{{++key}}</td>
                    <td>{{employee.name}}</td>
                    <td>{{employee.email}}</td>
                    <td>{{employee.address }}</td>
                    <td>{{employee.phone_number}}</td>       
                    <td>{{employee.job_title}}</td>
                    <td>{{employee.salary}}</td>
                    <td><img :src="employee.photo" style="height:120px ; width: 150px;"></td>
    
                    <td>{{employee.join_date}}</td>
                    <td>
                     <router-link :to="{name:'employee-edit',params:{id:employee.id}}" class="btn btn-sm btn-success">Edit</router-link>
                      <a @click="deleteEmployee(employee.id)" class="btn btn-sm btn-danger">Delete</a>
                    </td>
                
                   
                  </tr>
              
                 
                </tbody>


              </table>
            </div>
          </div>
          <div class="card-footer small text-muted">Updated yesterday at 11:59 PM</div>
        </div>
      
      </div>
    </div>
  
    </div>
</template>


<script>

export default{


  data(){
    return {
      employees:{}
     
    }

  },

  methods:{

    allEmployee(){
      axios.get("/api/employee/")
      .then(({data})=>(this.employees=data))
      .catch()
    


    },

    deleteEmployee(id){

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

              axios.delete("/api/employee/"+id)
              .then(()=>{
                this.employees = this.employees.filter(employee=>{
                  return employee.id !=id;

                })
              
              })
              .catch(()=>{

                  this.$router.push({name:'allcategory'})
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
    this.allEmployee();
  }
 
 }
</script>


<style>
  
</style>
