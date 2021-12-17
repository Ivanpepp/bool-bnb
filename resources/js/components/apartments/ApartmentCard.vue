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
    <div class="col-xs-12 col-sm-6 col-lg-4 mb-2 my-card">
        <div class="img">img</div>
        <h3><a :href="getUri()">{{apartment.title}}</a></h3>
        <p>{{apartment.city}}</p>
    </div>
</template>

<script>
export default {
    name: 'ApartmentCard',
    props:['apartment','baseUri'],

    data(){
        return{

        }
    },
    methods:{
        getUri(){
            return `${this.baseUri}/guest/${this.apartment.id}`
        }
}
 
}
</script>

<style lang="scss" scoped>
    .my-card{
        // height: 200px;
        // width: 200px;

        // border:1px solid black;

        .img{
            height: 200px;
            width:100%;
            background-color:rgb(37, 82, 207);
        }
    }
</style>