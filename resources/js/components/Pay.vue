<template>
  <div class="container">
    <div class="row">
      <h2>
        Loading...
      </h2>
    </div>
  </div>
</template>

<script>

export default {
    name: 'Pay',
    data(){
      return{
        loading : false,
        sponsorships: [],
        baseUri: 'http://127.0.0.1:8000',
      }
    },
    created(){
      this.getSponsorshipsList();
    },
    mounted(){
      
   
       
    },
    methods:{
       getSponsorshipsList(){
            this.loading=true;
           axios.get(`${this.baseUri}/api/apartments`)
           .then((res)=>{
             console.log(res);
             this.sponsorships=res.data.sponsorships;
             console.log(this.sponsorships);
           })
           .catch((err)=>{
               console.error(err);
           })
           .then(()=>{
               this.loading =false;
           });
       
        }
    }
}
</script>

<style>

</style>