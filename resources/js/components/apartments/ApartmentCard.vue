<template>
    <!-- <div class="card mb-5 shadow-lg">
      <form action="{{}}">
            <div class="card-header ">
                <h3><a :href="getUri()">{{apartment.title}}</a></h3>
            </div>
            <div class="card-body">
                <blockquote class="blockquote mb-0"> -->
                    <!-- <img src= '`../../../storage/public/apartments/images/${apartment.image_thumb}`' alt=""> -->
                    <!-- <p>
                        {{apartment.description}}
                    </p>
                    <footer class="b1lockquote-footer">
                        <address><strong>Citta:</strong>  {{apartment.city}}</address>
                        <address><strong>Indirizzo: </strong> {{apartment.address}}</address>
                    </footer>
                </blockquote>
            </div>
        </form>
    </div> -->
    <div class="col-xs-12 col-sm-6 col-lg-4 mb-2 my-card ivan-card">
        
        <img  class="img-fluid" :src="'http://127.0.0.1:8000/storage/apartments/images/'+photoIds[0]" alt="">
        
        <h3><a :href="getUri()">{{apartment.title}}</a></h3>
        <p>{{apartment.city}}</p>
        <p>{{photoIds[0]}}</p>
    </div>
</template>

<script>
export default {
    name: 'ApartmentCard',
    props:['apartment','baseUri', 'photos'],

    data(){
        return{
            photoIds : [],
        }
    },
    created(){
        this.imageSelector;
   
        
    },
    methods:{
        getUri(){
            return `${this.baseUri}/guest/${this.apartment.id}`
        },
         
    },
    computed:{
         imageSelector(){
            this.photos.forEach(element => {
                if(element.apartment_id === this.apartment.id ){
                this.photoIds.push(element.image_thumb);
                }
            });
           
            return this.photoIds;
    }
    }
  
 
}
</script>

<style lang="scss" scoped>
    .my-card{
        padding:10px;
        border-radius:10px;

        
        img{
            width: 90%;
            height: 90%;
            border-radius: 15px;
         
            
        }
    
    

    }
</style>