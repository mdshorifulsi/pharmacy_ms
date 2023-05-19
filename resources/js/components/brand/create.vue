<template>
  <div>
    <div>
      <div class="card-header"> <router-link class="btn btn-primary" to="allbrand">All Brand</router-link>
      </div>
    </div>
     <br>

    <div>
      <div class="card-header"> Brand Insert</div>
      <div class="card-body">
        <h4 class="text-danger" v-if="errors.brand_name">{{errors.brand_name[0]}}
        </h4>
        <form @submit.prevent="brandInsert" enctype="multipart/form-data">
          <div class="form-group">
            <div class="form-row">
              <div class="col-md-8">
                <label for="exampleInputEmail1">Brand name</label>
                <input type="text" v-model="form.brand_name" class="form-control" aria-describedby="emailHelp" placeholder="Brand name">
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
        brand_name:'',
      },

      errors:{},
     }
  },

  methods:{
    
    brandInsert(){
      axios.post('/api/brand/',this.form)
        .then(()=>{
          this.$router.push({name:'allbrand'})
        })
        .catch(error=>{this.errors=error.response.data.errors})
      },
  }

 }
</script>
<style>
  
</style>
