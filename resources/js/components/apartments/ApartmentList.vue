<template>
    <section class="my-3 p-2">
            
                <div class="input-group">
                    <input  @keyup.enter="filterNames" v-model='search' id="input-search" type="text" class="form-control mb-4" placeholder="Cerca " aria-label="Username" aria-describedby="basic-addon1">
                    <button type="submit" class="btn btn-primary mb-4">Cerca</button>
                </div>
          
        <h2 class="mb-4">Lista Appartamenti:</h2>
       
        <div v-if="isLoading" class="loader">
           
            <div class="spinner-border text-white" role="status" >
               
            </div>
             <span class="text-white loading">Loading...</span>
            
        </div>
        <div v-else class="d-flex flex-wrap " >
            <div class="form-check" v-for="(feature, index) in features" :key='feature.id' >
                <input type="checkbox" class="form-check-input " :value="feature.id" :id="'feature' + index" >
                <label class="form-check-label" :for="'feature' + index">{{feature.title}}</label>
            </div>
            <div class="col-10">
                <ApartmentCard   v-for="apartment in filterNames" :key="apartment.id"  :apartment='apartment' :baseUri='baseUri'/>
            </div>
        </div>
        
        
         
       
        <nav aria-label="Page navigation example">
            <ul class="pagination pagination-lg">
                <li v-if="currentPage > 1" class="page-item"><button class="page-link" @click='getApartmentList(currentPage - 1)' >Precedente</button></li>
                <li v-for="n in lastPage" :key='n' class="page-item" :class="{active : n === currentPage}"><button  class="page-link" @click="getApartmentList(n)">{{n}}</button></li>
                <li v-if="currentPage < lastPage" class="page-item"><button class="page-link" @click='getApartmentList(currentPage + 1)' >Successivo</button></li>
            </ul>
        </nav>
    </section>
</template>

<script>
import ApartmentCard from './ApartmentCard.vue'

export default {
    name: 'ApartmentList',
    components:{
        ApartmentCard,
    },
    data(){
        return{
            apartments: [],
            searchApartments: [],
            features: [],
            featuresIds: [],
            baseUri: 'http://127.0.0.1:8000',
            isLoading : false,
            currentPage: null,
            lastPage: null,
            search: '',
            selected: {
                features: [],
            }
        }
    },
    
    methods:{
        getApartmentList(){

            this.isLoading=true;
           axios.get(`${this.baseUri}/api/apartments`)
           .then((res)=>{
               console.log(res);    
               this.apartments=res.data.data;
                console.log( this.apartments);
               this.features= res.data.feature;
                console.log(this.features);
                
               
           })
           .catch((err)=>{
               console.error(err);
           })
           .then(()=>{
               this.isLoading =false;
           });
       
        },
        
       
         
    },
    created(){
        this.getApartmentList();
    },
    computed: {
        filterNames: function(){
            return this.apartments.filter((element)=>{
                return element.title.toLowerCase().match(this.search.toLowerCase());
            });

        },
        filterFeatures: function(){
            return this.features.filter((element)=>{
                return element.title.toLowerCase().match(this.search.toLowerCase());
            });

        }
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
</style>