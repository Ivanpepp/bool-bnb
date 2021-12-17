<template>
<div>
    <div class="pt-5 " >
        <div  class="card shadow " style="width: 18rem;">
            <div class="card-body">
                <h5 class="card-title"><strong>Sponsorizzazione: </strong>{{sponsorship.type}}</h5>
                <p class="card-text"><strong>Durata Sponsorizzazione: </strong> {{sponsorship.period}} ore</p>
                <p class="card-text"><strong>Prezzo </strong> {{sponsorship.price}}€</p>
                <a   @click='onCheckout(sponsorship.id)' href="#" class="btn btn-primary">Aquista</a>
            </div>
        </div>
       
</div>
 <div v-if="visible" class="text-center col-12" >
            <Checkouts  :sponsorId='sponsorId' />
        </div>
</div>
</template>

<script>
import Checkouts from './Checkouts.vue';
export default {
    
    name: 'Sponsor',
    props: ['sponsorship'],

    data(){
        return{
            visible : false,
            sponsorId : '',
        }
    },
    components:{
        Checkouts,
    },
    mounted(){
        
    },
    methods:{
        onCheckout(id){
            this.sponsorId = id;
            this.visible = true
        }
    }
}
</script>

<style>

</style>