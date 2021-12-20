<template>
<section>
    <div>
        <div>
            <Map />
        </div>       
    </div>
                <div class="my-search-card d-flex align-content-center">
                <!-- <div class="input-group">
                    <input  @keyup.enter="filterCity" v-model='search' id="input-search" type="text" class="form-control mb-4" placeholder="Cerca per città o indirizzo " aria-label="Username" aria-describedby="basic-addon1">
                </div>
                <div class="inpu-group d-flex">
                    <input  @keyup.enter="filterCity" v-model='minMq' id="input-search" type="text" class="form-control mb-4" placeholder="Cerca per minimo di metri quadri " aria-label="Username" aria-describedby="basic-addon1">
                    <input  @keyup.enter="filterCity" v-model='minGuest' id="input-search" type="text" class="form-control mb-4" placeholder="Cerca per minimo ospiti " aria-label="Username" aria-describedby="basic-addon1">
                    <input  @keyup.enter="filterCity" v-model='minRoom' id="input-search" type="text" class="form-control mb-4" placeholder="Cerca per minimo stanze da letto " aria-label="Username" aria-describedby="basic-addon1">
                    <input  @keyup.enter="filterCity" v-model='minBath' id="input-search" type="text" class="form-control mb-4" placeholder="Cerca per minimo bagni " aria-label="Username" aria-describedby="basic-addon1">
                </div> -->
                    <div class="container">
                        <div class="search-bar p-5 d-flex">
                            <div class="dropdown show">
                                <a class="btn btn-md dropdown-toggle text-white my-bg-blue mr-2" href="#" role="button" id="dropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                    Avanzata
                                </a>

                                <div class="dropdown-menu p-2" aria-labelledby="dropdownMenuLink">
                                    <input  @keyup.enter="filterCity" v-model='minMq' id="input-search" type="text" class="dropdown-item form-control mb-2" placeholder="N° m²" aria-label="Username" aria-describedby="basic-addon1">
                                    <input  @keyup.enter="filterCity" v-model='minGuest' id="input-search" type="text" class="dropdown-item form-control mb-2" placeholder="N° ospiti" aria-label="Username" aria-describedby="basic-addon1">
                                    <input  @keyup.enter="filterCity" v-model='minRoom' id="input-search" type="text" class="dropdown-item form-control mb-2" placeholder="N° stanze" aria-label="Username" aria-describedby="basic-addon1">
                                    <input  @keyup.enter="filterCity" v-model='minBath' id="input-search" type="text" class="dropdown-item form-control" placeholder="N° bagni" aria-label="Username" aria-describedby="basic-addon1">
                                </div>
                            </div>
                            <div class="input-group">
                                <input  @keyup.enter="filterCity" v-model='search' id="input-search" type="text" class="form-control" placeholder="Cerca per indirizzo n° e/o città" aria-label="Username" aria-describedby="basic-addon1">
                            </div>
                        </div>

                    </div>
                </div> 
    <div class="container pt-4">
        <div class="row">
                <ApartmentCard   v-for="apartment in filterCity" :key="apartment.id" :photos='photos' :apartment='apartment' :baseUri='baseUri'/>
            
        </div>
        <nav aria-label="Page navigation example">
            <ul class="pagination pagination-lg">
                <li v-if="currentPage > 1" class="page-item"><button class="page-link" @click='getApartmentList(currentPage - 1)' >Precedente</button></li>
                <li v-for="n in lastPage" :key='n' class="page-item" :class="{active : n === currentPage}"><button  class="page-link" @click="getApartmentList(n)">{{n}}</button></li>
                <li v-if="currentPage < lastPage" class="page-item"><button class="page-link" @click='getApartmentList(currentPage + 1)' >Successivo</button></li>
            </ul>
        </nav>
    </div>

</section>
</template>

<script>
import ApartmentCard from './ApartmentCard.vue';
import Map from './Map.vue';

export default {
    name: 'ApartmentList',
    components:{
        ApartmentCard,
        Map,
    },
    data(){
        return{
            apartments: [],
            baseUri: 'http://127.0.0.1:8000',
            isLoading : false,
            currentPage: null,
            lastPage: null,
            search: '',  
            minGuest: '',
            minRoom: '',
            minBath: '',
            minMq: '',
            photos: [],
        }
    },
    
    methods:{
        getApartmentList(){
            this.isLoading=true;
           axios.get(`${this.baseUri}/api/apartments`)
           .then((res)=>{
               this.apartments=res.data.data;
               this.photos=res.data.photos;
               console.log(this.photos);
           })
           .catch((err)=>{
               console.error(err);
           })
           .then(()=>{
               this.isLoading =false;
           });
       
        }, 

      /*   kmCoverter(lat1,lon1){


             // generally used geo measurement function
                let R = 6378.137; // Radius of earth in KM
                let dLat = lat1 * Math.PI / 180;
                let dLon = lon1 * Math.PI / 180;
                let a = Math.sin(dLat/2) * Math.sin(dLat/2) + Math.cos(lat1 * Math.PI / 180)  * Math.sin(dLon/2) * Math.sin(dLon/2);
                let c = 2 * Math.atan2(Math.sqrt(a), Math.sqrt(1-a));
                let d = R * c;
                return d * 1000; // meters
            
        } */
        
       
         
    },
    created(){
        this.getApartmentList();
       
    },
    computed: {
        filterCity: function(){
            return this.apartments.filter((element)=>{
                return( 
                   ( element.city.toLowerCase().match(this.search.toLowerCase()) || element.address.toLowerCase().match(this.search.toLowerCase()))
                    &&( this.minGuest <= element.total_guest)
                    &&( this.minRoom <= element.total_room)
                    &&( this.minBath <= element.total_bathroom)
                    &&( this.minMq <= element.mq));
            });
        },
    }
}
</script>

<style lang="scss" scoped>
    .loader{
        position: fixed;
        top:0;
        left:0;
        right: 0;
        bottom: 0;
        background-color: rgba(37, 37, 37, 0.911);
        display: flex;
        justify-content: center;
        align-items: center;
        z-index: 9;
    
    }
    .spinner-border{
        width: 250px;
        height: 250px;
    }
    .loading{
        position: fixed;
        top:0;
        left:0;
        right: 0;
        bottom: 0;
        display: flex;
        justify-content: center;
        align-items: center;
        font-size: 2rem;
    }

    .my-search-card{
        background-image:
        linear-gradient(to bottom, rgba(40, 41, 51, 0.52), rgba(40, 41, 51, 0.52)),
        url('/images/search-background.jpg');
        background-position: center;
        background-size: cover;
}
</style>