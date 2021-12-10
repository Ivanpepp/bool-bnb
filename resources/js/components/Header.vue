<template>
    <div>
        <h1 class="text-center fw-bold mt-5 pt-5">{{title}}</h1>

    </div>
    
</template>

<script>
export default {
    name: 'Header',
    props:{
        'title': String,
    },
      data: function(){
        return{
            
        }
    },
    computed:{
       
    },
    
}
</script>

<style>

</style>