<template>
    <div class="container">
        <Header  :title='title'/>
        <main>
            <ApartmentList />
        </main>
    </div>
</template>

<script>

import Header from './Header.vue';
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
            Header,
            ApartmentList,
        },
    
    }
</script>
