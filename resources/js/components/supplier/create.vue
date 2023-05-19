<template>
    <div>
      <div class="card-header"> <router-link class="btn btn-primary" to="allsupplier">All Supplier</router-link>
      </div>
      <br>
    <div>
      <div class="card-header"> Supplier Insert</div>
      <div class="card-body">

        <form @submit.prevent="supplierInsert" enctype="multipart/form-data">
          <div class="form-group">

            <div class="form-row">
              <div class="col-md-6">
                <label for="exampleInputEmail1">Employee Fullname</label>
         <input type="text" v-model="form.name" class="form-control" aria-describedby="emailHelp" placeholder="Fullname">
              </div>
              <div class="col-md-6">
                <label for="exampleInputEmail1">Email Address</label>
         <input type="email" v-model="form.email" class="form-control" aria-describedby="emailHelp" placeholder="Enter email">
              </div>
            </div>

            <div class="form-row">
              <div class="col-md-6">
                <label for="exampleInputEmail1">Address</label>
         <input type="text" v-model="form.address" class="form-control" aria-describedby="emailHelp" placeholder="Enter address">
              </div>
              <div class="col-md-6">
                <label for="exampleInputEmail1">phone number</label>
         <input type="number" v-model="form.phone_number" class="form-control" aria-describedby="emailHelp" placeholder="Enter phone number">
              </div>

            </div>

            <div class="form-row">
              <div class="col-md-6">
                <label for="exampleInputEmail1">Salary</label>
         <input type="number" v-model="form.salary" class="form-control" aria-describedby="emailHelp" placeholder="Salary">
              </div><div

               class="col-md-6">
                <label for="exampleInputEmail1">job title</label>
         <input type="text" v-model="form.job_title" class="form-control" aria-describedby="emailHelp" placeholder="job title">
              </div>
              

            </div>
<br>
        <div class="form-row">
              <div class="col-md-4">
                 <input type="file" class="btn btn-info" @change="onfileSelected">
               
              </div>
              <div class="col-md-4">
                <img :src="form.photo" style="height:120px ; width: 150px;">
              </div>

              <div class="col-md-4">
                <label for="exampleInputEmail1">join date</label>
         <input type="date" v-model="form.join_date" class="form-control" aria-describedby="emailHelp" placeholder="Enter join date">
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
        name:'',
        email:'',
        address:'',
        phone_number:'',
        salary:'',
        job_title:'',
        photo:'',
        join_date:'',
       
      },

        errors:{},
    }

  },

  methods:{
  	onfileSelected(event){
      let files=event.target.files[0];
      if(files.size>1048770){
        Notification.image_validation()
      }else{
        let reader = new FileReader();
        reader.onload = event=>{
          this.form.photo=event.target.result;
          console.log(event.target.result)
        };
        reader.readAsDataURL(files);
      }
    },     
    supplierInsert(){
    	  axios.post('/api/supplier/',this.form)
      .then(()=>{
        this.$router.push({name:'allsupplier'})
        Notification.success();

      })
    .catch(error=>{this.errors=error.response.data.errors})
    },

   
   
  
  }

 }
</script>
<style>
  
</style>
