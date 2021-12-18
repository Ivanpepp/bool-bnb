<template>
  <div>
    <!-- <input type="text" id="query" value="" />
    <button class="btn-sm btn-danger" @click="searchMap()">Search</button> -->
    <div id="map"></div>
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
            var defaultCenter = [12.49427, 41.89056]
            let map = tt.map({ 
            key: '9Mme267oYMyvrQjdDAIQMRHH59kZXGnI', 
            container: 'map', 
            style: 'tomtom://vector/1/basic-main',
            center: defaultCenter,
            zoom: 5,
            });
            map.addControl(new tt.FullscreenControl());
            map.addControl(new tt.NavigationControl());

            // var HQ = { lat: 9.0548, lng: 7.4856 }
            // var map = tt.map({
            //     key: '<your-api-key>'
            //     container: 'map',
            //     center: HQ,
            //     zoom: 15
            // });
            map.scrollZoom.disable();

            var apartmentAssets = [
                { lat: 41.89056, lng: 12.49427 },
                { lat: 45.46362, lng: 9.18812 },
                { lat: 38.11463, lng: 15.6502 },
                { lat: 42.3507, lng: 13.39993 },
                { lat: 42.44227, lng: 11.22066},
                { lat: 45.43461, lng: 12.33891},
                { lat: 40.92251, lng: 9.48685},
            ];
            apartmentAssets.forEach(function (child) {
                new tt.Marker().setLngLat(child).addTo(map);
            })
            
        // var marker = new tt.Marker().setLngLat(defaultCenter).addTo(map);
        // var popup = new tt.Popup({ anchor: 'top' }).setText('HeadQuarters')
        // marker.setPopup(popup).togglePopup()
        // // var marker = new tt.Marker().setLngLat(defaultCenter).addTo(map);
        // // addMarker(map);
        // // var popupOffsets = {
        // //     top: [0, 0],
        // //     bottom: [0, -70],
        // //     'bottom-right': [0, -70],
        // //     'bottom-left': [0, -70],
        // //     left: [25, -35],
        // //     right: [-25, -35]
        // // }

        // // var popup = new tt.Popup({offset: popupOffsets}).setHTML("your company name, your company address");
        // // marker.setPopup(popup).togglePopup();

        // // var popup = new tt.Popup({offset: popupOffsets}).setHTML("<b>Speedy's pizza</b><br/>100 Century Center Ct 210, San Jose, CA 95112, USA");
    },
    methods:{
        updateMap(lnglat){
            console.log(map);
            
            let map = tt.map ({
                key: '9Mme267oYMyvrQjdDAIQMRHH59kZXGnI',
                container: 'map',
                style: 'tomtom://vector/1/basic-main',
                center: lnglat,
                zoom: 15,  
                            
                })

            var marker = new tt.Marker().setLngLat(lnglat).addTo(map);
            var popupOffsets = {
            top: [0, 0],
            bottom: [0, -30],
            'bottom-right': [0, -30],
            'bottom-left': [0, -30],
            left: [25, -35],
            right: [-25, -35]
                }

            var popup = new tt.Popup({offset: popupOffsets}).setHTML("<b>INSANE</b><br/>Relativamente molto gangsta!");
            marker.setPopup(popup).togglePopup();
            map.addControl(new tt.FullscreenControl());
            map.addControl(new tt.NavigationControl());

            },
        handleResults(result){
            console.log(result);
            console.log('latitudine: '+ result.results[0].position.lat);
            console.log('longitudine: '+ result.results[0].position.lng);
            this.updateMap(result.results[0].position);
            
        },
        searchMap(){
            tt.services.fuzzySearch({
                key: '9Mme267oYMyvrQjdDAIQMRHH59kZXGnI',
                query: document.getElementById("query").value,

            }).go().then(this.handleResults);
        },
        // addMarker(map) { 
        //   const tt = window.tt; 
        //     let location = lnglat; 
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
  height: 650px;
  width: 100%;
}
</style>