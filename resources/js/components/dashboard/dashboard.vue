<template>
  <div>
      <div class="row" >
          <div class="col-xl-3 col-sm-6 mb-3">
            <div class="card text-white bg-primary o-hidden h-100">
              <div class="card-body">
                <div class="card-body-icon">
                  <i class="fas fa-fw fa-comments"></i>
                </div>
                <div class="mr-5"><strong> Today Sell</strong></div>
              </div>
              <a class="card-footer text-white clearfix small z-1" href="#">
                <span class="float-left"><strong>{{todaySell}} Tk </strong> </span>
                
              </a>
            </div>
          </div>
          <div class="col-xl-3 col-sm-6 mb-3">
            <div class="card text-white bg-warning o-hidden h-100">
              <div class="card-body">
                <div class="card-body-icon">
                  <i class="fas fa-fw fa-list"></i>
                </div>
                <div class="mr-5"><strong> Today income</strong> </div>
              </div>
              <a class="card-footer text-white clearfix small z-1" href="#">
                <span class="float-left"><strong>{{todayincome}} Tk</strong></span>
                <span class="float-right">
                  <i class="fas fa-angle-right"></i>
                </span>
              </a>
            </div>
          </div>
          <div class="col-xl-3 col-sm-6 mb-3">
            <div class="card text-white bg-success o-hidden h-100">
              <div class="card-body">
                <div class="card-body-icon">
                  <i class="fas fa-fw fa-shopping-cart"></i>
                </div>
                <div class="mr-5"> <strong>Today due</strong></div>
              </div>
              <a class="card-footer text-white clearfix small z-1" href="#">
                <span class="float-left"><strong>{{todaydue}} Tk </strong></span>
                <span class="float-right">
                  <i class="fas fa-angle-right"></i>
                </span>
              </a>
            </div>
          </div>
          <div class="col-xl-3 col-sm-6 mb-3">
            <div class="card text-white bg-danger o-hidden h-100">
              <div class="card-body">
                <div class="card-body-icon">
                  <i class="fas fa-fw fa-life-ring"></i>
                </div>
                <div class="mr-5"><strong>Today Expense</strong></div>
              </div>
              <a class="card-footer text-white clearfix small z-1" href="#">
                <span class="float-left"><strong> {{todayexpense}}  Tk</strong></span>
                <span class="float-right">
                  <i class="fas fa-angle-right"></i>
                </span>
              </a>
            </div>
          </div>
        </div>
  </div>
</template>


<script>

export default{


  data(){
    return {
     todaySell:'',
     todayincome:'',
     todaydue:'',
     todayexpense:'',
     
    }

  },

  methods:{

   TodaySell(){
      axios.get("/api/todaysell/")
      .then(({data})=>(this.todaySell=data))
      .catch()
    
    },

     Todayincome(){
      axios.get("/api/todayincome/")
      .then(({data})=>(this.todayincome=data))
      .catch()
    
    },

     Todaydue(){
      axios.get("/api/todaydue/")
      .then(({data})=>(this.todaydue=data))
      .catch()
    
    },

  Todayexpense(){
      axios.get("/api/todayexpense/")
      .then(({data})=>(this.todayexpense=data))
      .catch()
    
    },



  },
  created(){
    this.TodaySell();
    this.Todayincome();
    this.Todaydue();
    this.Todayexpense();
  }
 
 }
</script>


<style>
  
</style>
