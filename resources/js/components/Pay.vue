<template>
  <div class="container">
    <div class="row">
      <h2 v-if="loading" class="text-center">
        Loading...
      </h2>
      <div v-else> 
        <h1>Sponsorizza il tuo appartmento con ID n. #{{apartment.id}}</h1>
       <div class="">
          <Sponsor class="mx-3" v-for="sponsorship in sponsorships" :key='sponsorship.id' :sponsorship="sponsorship" />
       </div>
      </div>
      
    </div>
    
  </div>
</template>

<script>
import Sponsor from './sponsorships/Sponsor.vue';
export default {
  
    name: 'Pay',
    data(){
      return{
        loading : false,
        sponsorships: [],
        apartmentId : '',
        apartment: [],
        baseUri: 'http://127.0.0.1:8001',
      }
    },
    components:{
      Sponsor,
    },
    created(){
      let apartment = document.getElementById('apartment').value;
      this.apartmentId = apartment;
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
             /* this.apartments=res.data.data; */
             console.log(this.sponsorships);
             /* console.log(this.apartments); */
           })
           .catch((err)=>{
               console.error(err);
           })
           .then(()=>{
               this.loading =false;
           });
          axios.get(`${this.baseUri}/api/apartments/${this.apartmentId}`)
           .then((res)=>{
             console.log(res);
             
             this.apartment=res.data.apartment;
             
             console.log(this.apartment);
           })
           .catch((err)=>{
               console.error(err);
           })
        },
        

    }
}
</script>

<style>

</style>