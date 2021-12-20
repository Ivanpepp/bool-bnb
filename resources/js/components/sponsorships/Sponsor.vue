<template>
<div>
    <div class="pb-4" >
        <div  class="card shadow " style="100%">
            <div class="card-body">
                <h5 class="card-title"><strong>Sponsorizzazione: </strong>{{sponsorship.type}}</h5>
                <p class="card-text"><strong>Durata Sponsorizzazione: </strong> {{sponsorship.period}} ore</p>
                <p class="card-text"><strong>Prezzo </strong> {{sponsorship.price}}€</p>
                <a   @click='onCheckout(sponsorship.id)' href="#" class="btn my-btn-vue">Acquista</a>
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

<style lang="scss" scooped>
.my-btn-vue{
    color: white;
    border: 2px solid transparent;
    background-color: rgb(37, 82, 207);
    transition: 0.3s cubic-bezier(0.175, 0.885, 0.32, 1.275) all;
    &:hover{
        background-color: white !important;
        color: rgb(37, 82, 207);
        border:2px solid rgb(37, 82, 207);
    }
}
</style>