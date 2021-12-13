<template>
    <div>
        <h1>Vue 3 TomTom Maps Demo</h1> 
        <input type="text" id="query" value="">
        <button @click="search()"> Search </button>
        <div id='map' ></div> 
    </div>
</template>

<script>

export default {
    name: 'Map',
    Data(){
        return {
        }
    },
    mounted(){
            let tt = window.tt;
            var speedyPizzaCoordinates = [15.67154, 38.24017]
            let map = tt.map({ 
            key: '9Mme267oYMyvrQjdDAIQMRHH59kZXGnI', 
            container: 'map', 
            style: 'tomtom://vector/1/basic-main',
            center: speedyPizzaCoordinates,
            zoom: 15,
        });
        
        // var marker = new tt.Marker().setLngLat(speedyPizzaCoordinates).addTo(map);
        // // addMarker(map);
        // var popupOffsets = {
        //     top: [0, 0],
        //     bottom: [0, -70],
        //     'bottom-right': [0, -70],
        //     'bottom-left': [0, -70],
        //     left: [25, -35],
        //     right: [-25, -35]
        // }

        // var popup = new tt.Popup({offset: popupOffsets}).setHTML("your company name, your company address");
        // marker.setPopup(popup).togglePopup();

        // var popup = new tt.Popup({offset: popupOffsets}).setHTML("<b>Speedy's pizza</b><br/>100 Century Center Ct 210, San Jose, CA 95112, USA");
    },
    methods:{
        handleResults(result){
            console.log(result);
        },
        search(){
            tt.services.fuzzySearch({
                key: '9Mme267oYMyvrQjdDAIQMRHH59kZXGnI',
                query: document.getElementById("query").value,

            }).go().then(this.handleResults);
        },
        // addMarker(map) { 
        //   const tt = window.tt; 
        //     let location = [-121.91595, 37.36729]; 
        //     let popupOffset = 25; 
 
        //     let marker = new tt.Marker().setLngLat(location).addTo(map); 
        //     let popup = new tt.Popup({ offset: popupOffset }); 
        //     reverseGeocoding(marker, popup); 
        //     marker.setPopup(popup).togglePopup();
        // },
        // reverseGeocoding(marker, popup) { 
        //     const tt = window.tt; 
        //     tt.services.reverseGeocode({ 
        //         key: '9Mme267oYMyvrQjdDAIQMRHH59kZXGnI', 
        //         position: marker.getLngLat() 
        //     }).go().then( function( result ){ 
        //         console.log(result.addresses[0].address.freeformAddress); 
        //         popup.setHTML(result.addresses[0].address.freeformAddress); 
        //     }) 
        // } 
    },
}
</script>
    
<style>
    #map { 
    height: 50vh; 
    width: 50vw; 
} 
</style>