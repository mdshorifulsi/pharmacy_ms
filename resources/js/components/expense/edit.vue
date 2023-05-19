<template>
    <div>
     
    <div>
      <div class="card-header"> Expense Insert</div>
      <div class="card-body">

        <form @submit.prevent="expenseUpdate" enctype="multipart/form-data">

          <div class="form-group">
            <div class="form-row">
              <div class="col-md-8">
                <label for="exampleInputEmail1">Expense Amount </label>
         		<input type="number" v-model="form.Amount" class="form-control" aria-describedby="emailHelp" placeholder="Expense Amount">
              </div>            
            </div>
          </div>

		<div class="form-row">
			<div class="col-md-8">
			<label for="exampleFormControlTextarea1">Expense details </label>
			<textarea class="form-control" v-model="form.details" id="exampleFormControlTextarea1" rows="3"></textarea>
			</div>
		</div>

      <br>
      <br>
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
        Amount:'',
        details:'',
      
      
       
      },
      errors:{},
     
    }



  },

  created(){

  	  let id=this.$route.params.id;
    axios.get('/api/expense/'+id)
    .then(({data})=>(this.form=data))

  },

  methods:{


 
    expenseUpdate(){
    	 let id=this.$route.params.id;
      axios.patch('/api/expense/'+id,this.form)
      .then(()=>{

        this.$router.push({name:'todayexpense'})
        Notification.success();

      })

  .catch(error=>{this.errors=error.response.data.errors})


    },

   
   
  
  },

 


 }
</script>
<style>

</style>
