<template>
  <div>
    <div>
      <div class="card-header"> <router-link class="btn btn-primary" to="addbrand">Add Brand</router-link></div> </div>
      <div class="card-body">
        <div class="card mb-3">
          <div class="card-header">
            <i class="fas fa-table"></i>Brand list
          </div>
          <div class="card-body">
            <div class="table-responsive">
              <table class="table table-bordered" width="100%" cellspacing="0">
                <thead>
                  <tr>
                    <th>id</th>
                    <th>Brand Name</th>
                    <th>Action</th>
                  </tr>
                </thead>
                <tbody>
                  <tr v-for="brand,key in brands" :key="brand.id">
                    <td>{{++key}}</td>
                    <td>{{brand.brand_name}}</td>
                    <td>
                      <router-link :to="{name:'brand-edit',params:{id:brand.id}}" class="btn btn-sm btn-success">Edit</router-link>
                      <a @click="deletebrand(brand.id)" class="btn btn-sm btn-danger">Delete</a>
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
      brands:{}
     
    }

  },

  methods:{

    allBrands(){
      axios.get("/api/brand/")
      .then(({data})=>(this.brands=data))
      .catch()
    
    },

    deletebrand(id){
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
              axios.delete("/api/brand/"+id)
              .then(()=>{
                this.brands = this.brands.filter(brand=>{
                  return brand.id !=id;

                })
              
              })
              .catch(()=>{

                  this.$router.push({name:'allbrand'})
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
    this.allBrands();
  }
 
 }
</script>


<style>
  
</style>
