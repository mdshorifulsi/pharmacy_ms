<template>
    <div>
     
    <div>
      <div class="card-header"> Edit Category</div>
      <div class="card-body">

        <form @submit.prevent="categoryUpdate" enctype="multipart/form-data">
          <div class="form-group">

            <div class="form-row">
              <div class="col-md-8">
                <label for="exampleInputEmail1">Employee Fullname</label>
         <input type="text" v-model="form.cat_name" class="form-control" aria-describedby="emailHelp" placeholder="Fullname">
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
        cat_name:'',
     
       
      },


      errors:{},
    }

  },

  created(){
  	let id=this.$route.params.id
  	axios.get('/api/category/'+id)
  	.then(({data})=>(this.form=data))
  	.catch(console.log('error'))

  },

  methods:{
    
    categoryUpdate(){
    	let id=this.$route.params.id
        axios.patch('/api/category/'+id,this.form)
      .then(()=>{
        

        this.$router.push({name:'allcategory'})
         Notification.success();

      })
      .catch(error=>{this.errors=error.response.data.errors})
    },

   
   
  
  }

 }
</script>
<style>
  
</style>
