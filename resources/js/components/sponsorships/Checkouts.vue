<template>
  <div class="text-center">
     
      <div v-if="isVisible" class="col-12 p-3">
             <v-braintree 
            locale='it_IT'
            authorization="eyJ2ZXJzaW9uIjoyLCJhdXRob3JpemF0aW9uRmluZ2VycHJpbnQiOiJleUowZVhBaU9pSktWMVFpTENKaGJHY2lPaUpGVXpJMU5pSXNJbXRwWkNJNklqSXdNVGd3TkRJMk1UWXRjMkZ1WkdKdmVDSXNJbWx6Y3lJNkltaDBkSEJ6T2k4dllYQnBMbk5oYm1SaWIzZ3VZbkpoYVc1MGNtVmxaMkYwWlhkaGVTNWpiMjBpZlEuZXlKbGVIQWlPakUyTkRBd056YzRORFVzSW1wMGFTSTZJalJsT0ROaU9HTTVMV0l6TnpJdE5EVmtaUzA1TWpFMUxUTmtObU0xWTJJelltUm1aU0lzSW5OMVlpSTZJamsxYUhGbVkzaHhjelZtY0c1NU5IZ2lMQ0pwYzNNaU9pSm9kSFJ3Y3pvdkwyRndhUzV6WVc1a1ltOTRMbUp5WVdsdWRISmxaV2RoZEdWM1lYa3VZMjl0SWl3aWJXVnlZMmhoYm5RaU9uc2ljSFZpYkdsalgybGtJam9pT1RWb2NXWmplSEZ6Tldad2JuazBlQ0lzSW5abGNtbG1lVjlqWVhKa1gySjVYMlJsWm1GMWJIUWlPbVpoYkhObGZTd2ljbWxuYUhSeklqcGJJbTFoYm1GblpWOTJZWFZzZENKZExDSnpZMjl3WlNJNld5SkNjbUZwYm5SeVpXVTZWbUYxYkhRaVhTd2liM0IwYVc5dWN5STZlMzE5Lkc1UWkxeGY4NVVfMkJzNE5uMWZSemNCd3JjV1Z2MjNkb1NGQTNBbW5uckF6VTVGZkJwMFF4OFJzS1YzYVlkMFpNSkUwYUpEYlRMMU1jVnlIb29FUTRRIiwiY29uZmlnVXJsIjoiaHR0cHM6Ly9hcGkuc2FuZGJveC5icmFpbnRyZWVnYXRld2F5LmNvbTo0NDMvbWVyY2hhbnRzLzk1aHFmY3hxczVmcG55NHgvY2xpZW50X2FwaS92MS9jb25maWd1cmF0aW9uIiwiZ3JhcGhRTCI6eyJ1cmwiOiJodHRwczovL3BheW1lbnRzLnNhbmRib3guYnJhaW50cmVlLWFwaS5jb20vZ3JhcGhxbCIsImRhdGUiOiIyMDE4LTA1LTA4IiwiZmVhdHVyZXMiOlsidG9rZW5pemVfY3JlZGl0X2NhcmRzIl19LCJjbGllbnRBcGlVcmwiOiJodHRwczovL2FwaS5zYW5kYm94LmJyYWludHJlZWdhdGV3YXkuY29tOjQ0My9tZXJjaGFudHMvOTVocWZjeHFzNWZwbnk0eC9jbGllbnRfYXBpIiwiZW52aXJvbm1lbnQiOiJzYW5kYm94IiwibWVyY2hhbnRJZCI6Ijk1aHFmY3hxczVmcG55NHgiLCJhc3NldHNVcmwiOiJodHRwczovL2Fzc2V0cy5icmFpbnRyZWVnYXRld2F5LmNvbSIsImF1dGhVcmwiOiJodHRwczovL2F1dGgudmVubW8uc2FuZGJveC5icmFpbnRyZWVnYXRld2F5LmNvbSIsInZlbm1vIjoib2ZmIiwiY2hhbGxlbmdlcyI6W10sInRocmVlRFNlY3VyZUVuYWJsZWQiOnRydWUsImFuYWx5dGljcyI6eyJ1cmwiOiJodHRwczovL29yaWdpbi1hbmFseXRpY3Mtc2FuZC5zYW5kYm94LmJyYWludHJlZS1hcGkuY29tLzk1aHFmY3hxczVmcG55NHgifSwicGF5cGFsRW5hYmxlZCI6dHJ1ZSwicGF5cGFsIjp7ImJpbGxpbmdBZ3JlZW1lbnRzRW5hYmxlZCI6dHJ1ZSwiZW52aXJvbm1lbnROb05ldHdvcmsiOnRydWUsInVudmV0dGVkTWVyY2hhbnQiOmZhbHNlLCJhbGxvd0h0dHAiOnRydWUsImRpc3BsYXlOYW1lIjoiQm9vbGVhbiIsImNsaWVudElkIjpudWxsLCJwcml2YWN5VXJsIjoiaHR0cDovL2V4YW1wbGUuY29tL3BwIiwidXNlckFncmVlbWVudFVybCI6Imh0dHA6Ly9leGFtcGxlLmNvbS90b3MiLCJiYXNlVXJsIjoiaHR0cHM6Ly9hc3NldHMuYnJhaW50cmVlZ2F0ZXdheS5jb20iLCJhc3NldHNVcmwiOiJodHRwczovL2NoZWNrb3V0LnBheXBhbC5jb20iLCJkaXJlY3RCYXNlVXJsIjpudWxsLCJlbnZpcm9ubWVudCI6Im9mZmxpbmUiLCJicmFpbnRyZWVDbGllbnRJZCI6Im1hc3RlcmNsaWVudDMiLCJtZXJjaGFudEFjY291bnRJZCI6ImJvb2xlYW4iLCJjdXJyZW5jeUlzb0NvZGUiOiJFVVIifX0"
            @success="onSuccess"
            @error="onError"></v-braintree>
      </div>
      <div v-else>
        <a href="http://127.0.0.1:8000/host/apartments" class="btn my-btn-vue">Torna alla lista degli appartamenti</a>
      </div>
  </div>
  
</template>

<script>
import Payment from './Payment.vue'
export default { 
    name : 'Checkouts',
    props:['sponsorId'],
    components:{
        Payment,
    },
    data(){
        return{
                disableBuyButton : false,
                loadingPayment : false,
                tokenApi: '',
                baseUri: 'http://127.0.0.1:8000',
                form: {
                    token : '',
                    sponsor: '' ,
                },
                isVisible : true,
               
        }
    },
    created(){
        
    },
    mounted(){
       /* this.form.sponsor = this.sponsorId; */
    },
    methods:{
        onSuccess(payload){
            /* this.form.token = 'fake-valid-nonce'; */
            this.buy(this.sponsorId);
        },
        onError(error){

        },
       
         buy(id){

            this.isVisible = true;
              axios.post('http://127.0.0.1:8000/api/orders/make/payment', {
                  token: 'fake-valid-nonce',
                  sponsor: id,

            }).then(function (response) {
                
                alert(response.data.message);
                /*  let completed = true;
                 this.$emit('onPayment', completed); */
                 
            }).catch(function (error) {
                console.log(error);
            }).then(
                this.isVisible = false
            );
         
        },
    
    }
}
</script>

<style lang="scss" scooped>
.my-btn-vue{
        color: white;
    border: 2px solid transparent;
    transition: 0.3s cubic-bezier(0.175, 0.885, 0.32, 1.275) all;
    &:hover{
        background-color: white !important;
        color: rgb(37, 82, 207);
        border:2px solid rgb(37, 82, 207);
    }
}
</style>