<template>
    <div>
     <div class="card-header"> <router-link class="btn btn-primary" to="addexpense">Add expense</router-link>
      </div>
    <div>
      <div class="card-header"> All expense </div>
      <div class="card-body">
<div class="card mb-3">
          <div class="card-header">
            <i class="fas fa-table"></i>
            All expense list</div>
          <div class="card-body">
            <div class="table-responsive">
              <table class="table table-bordered" width="100%" cellspacing="0">
                <thead>
                  <tr>
                    <th>id</th>
                    <th>expense Amount</th>
                    <th>expense details</th>
                    <th>expense Date</th>
                  
               
          
                  </tr>
                </thead>
               
                <tbody>
                  <tr v-for="expense,key in expenses" :key="expense.id">
                    <td>{{++key}}</td>
                    <td>{{expense.Amount}} tk</td>
                    <td>{{expense.details}}</td>
                    <td>{{expense.expense_date}}</td>
               

                    <td>
                    
                      
                      
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

    allexpense(){
      axios.get("/api/allexpense/")
      .then(({data})=>(this.expenses=data))
      .catch()
    


    },




  },
  created(){
    this.allexpense();
  }
 
 }
</script>


<style>
  
</style>
