<template>
    <div class="container">
        <Header :title='title'/>
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
                title: 'BoolBnB'
            }
        },
        components:{
            Header,
            ApartmentList,
        }
    }
</script>
