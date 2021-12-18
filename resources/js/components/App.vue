<template>
    <div>
        <main>
            <ApartmentList />
        </main>
    </div>
</template>

<script>
import ApartmentList from './apartments/ApartmentList.vue'

    export default {
        name: 'App',
        data(){
            return {
                title: 'BoolBnB',
                searchGroup: [],
                uri: 'http://127.0.0.1:8000/api/apartments'
            }
        },
        components:{
            ApartmentList,
        },
    
    }
</script>

<style scoped>

</style>
