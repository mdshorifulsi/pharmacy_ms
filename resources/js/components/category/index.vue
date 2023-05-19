<template>
    <div>
          <div>
      <div class="card-header"> <router-link class="btn btn-primary" to="addcategory">Add Category</router-link>
      </div>
    </div>
     <br>
     
    <div>
    
      <div class="card-body">
<div class="card mb-3">
          <div class="card-header">
            <i class="fas fa-table"></i>
            Category list</div>
          <div class="card-body">
            <div class="table-responsive">
              <label>Search</label>
              <input type="text" v-model="searchTerm" class="form-control" style="width:200px">
              <br>
              <table class="table table-bordered" width="100%" cellspacing="0">
                <thead>
                  <tr>
                    <th>id</th>
                    <th>Name</th>
                    <th>Action</th>
          
                  </tr>
                </thead>
               
          <tbody>
            <tr v-for="category,key in filterSearch" :key="category.id">
              <td>{{++key}}</td>
              <td>{{category.cat_name}}</td>
              
              <td>
                <router-link :to="{name:'categoryedit',params:{id:category.id}}" class="btn btn-sm btn-success">Edit</router-link>



                <a @click="deleteCategory(category.id)" class="btn btn-sm btn-danger">Delete</a>
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
      categorys:[],
      searchTerm:''
     
    }

  },

  computed:{
    filterSearch(){

      return this.categorys.filter(category=>{

        return category.cat_name.match(this.searchTerm)

      }) 

    }


  },
  methods:{

    allCategory(){
      axios.get("/api/category/")
      .then(({data})=>(this.categorys=data))
      .catch()
    


    },

    deleteCategory(id){


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

              axios.delete("/api/category/"+id)
              .then(()=>{
                this.categorys=this.categorys.filter(category=>{
                  return category.id !=id;

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
    this.allCategory();
  }
 
 }
</script>


<style>
  
</style>
