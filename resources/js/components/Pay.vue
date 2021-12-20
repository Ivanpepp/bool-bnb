<template>
<div class="pay-fix">
  <div class="container pt-4 mb-4">
    <div class="row">
      <div class="col-12">
        <div class="text-center">
            <h2 class="p-4">Attiva un modello di sponsorship per "<span class="my-text-blue">{{apartment.title}} </span>"</h2>
        </div>
        <div class="card-body p-4 shadow">
          <h2 v-if="loading" class="text-center">
            Loading...
          </h2>
          <div v-else> 
            <div class="">
                <Sponsor class="mx-3" v-for="sponsorship in sponsorships" :key='sponsorship.id' :sponsorship="sponsorship" />
            </div>
          </div>
        </div>
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
        baseUri: 'http://127.0.0.1:8000',
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
.pay-fix{
  height: calc(100% - 271px);
}
</style>