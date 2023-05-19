<template>
    <div>
      <div>
      <div class="card-header"> <router-link class="btn btn-primary" to="allcategory">All Category</router-link>
      </div>
    </div>
     <br>
     
    <div>
      <div class="card-header">category Insert</div>
      <div class="card-body">
         <h4 class="text-danger" v-if="errors.cat_name">{{errors.cat_name[0]}}
        </h4>

        <form @submit.prevent="categoryInsert" enctype="multipart/form-data">
          <div class="form-group">

            <div class="form-row">
              <div class="col-md-8">
                <label for="exampleInputEmail1">Employee Fullname</label>
         <input type="text" v-model="form.cat_name" class="form-control" aria-describedby="emailHelp" placeholder="Category name">
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

  methods:{
    
    categoryInsert(){
        axios.post('/api/category/',this.form)
      .then(()=>{
        

        this.$router.push({name:'allcategory'})
       

      })
      .catch(error=>{this.errors=error.response.data.errors})
    },

   
   
  
  }

 }
</script>
<style>
  
</style>
