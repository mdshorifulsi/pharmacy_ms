<template>
    <div>
      <div class="card-header"> <router-link class="btn btn-primary" to="addexpense">Add expense</router-link>
      </div>
    <div>
      <div class="card-header"> Today expense </div>
      <div class="card-body">
<div class="card mb-3">
          <div class="card-header">
            <i class="fas fa-table"></i>
          Today  All expense list</div>
          <div class="card-body">
            <div class="table-responsive">
              <table class="table table-bordered" width="100%" cellspacing="0">
                <thead>
                  <tr>
                    <th>id</th>
                    <th>expense Amount</th>
                    <th>expense details</th>
                    <th>expense Date</th>
                  
                    <th>Action</th>
          
                  </tr>
                </thead>
               
                <tbody>
                  <tr v-for="expense,key in expenses" :key="expense.id">
                    <td>{{++key}}</td>
                    <td>{{expense.Amount}} tk</td>
                    <td>{{expense.details}}</td>
                    <td>{{expense.expense_date}}</td>
               

                    <td>
                      <router-link :to="{name:'expense-edit',params:{id:expense.id}}" class="btn btn-sm btn-success">Edit</router-link>
                      
                      <a @click="deleteExpenses(expense.id)" class="btn btn-sm btn-danger">Delete</a>
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
      expenses:{}
     
    }

  },

  methods:{

    allExpense(){
      axios.get("/api/expense/")
      .then(({data})=>(this.expenses=data))
      .catch()
    


    },

    deleteExpenses(id){

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

              axios.delete("/api/expense/"+id)
              .then(()=>{
                this.expenses = this.expenses.filter(expense=>{
                  return expense.id !=id;

                })
              
              })
              .catch(()=>{

                  this.$router.push({name:'todayexpense'})
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
    this.allExpense();
  }
 
 }
</script>


<style>
  
</style>
