<template>
    <div>
      <div class="search-container">
      </div>
    <input class="pl-2" placeholder=" Cerca sulla mappa"  type="text" id="query" value="" v-on:keyup.enter="searchMap()"/>
    <div id="map"></div>
    <!-- <button class="btn-sm btn-danger" @click="searchMap()">Search</button> -->
    </div>
</template>

<script>

export default {
    name: 'Map',
    props:['apartments'],
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
            let apartmentAssets = [
                /* { lat: 41.89056, lng: 12.49427 },
                { lat: 45.46362, lng: 9.18812 },
                { lat: 38.11463, lng: 15.6502 },
                { lat: 42.3507, lng: 13.39993 },
                { lat: 42.44227, lng: 11.22066},
                { lat: 45.43461, lng: 12.33891},
                { lat: 40.92251, lng: 9.48685}, */
            ];
            this.apartments.forEach(element => {
                apartmentAssets.push({ lat: element.latitude, lng: element.longitude });
                /* apartmentAssets.lng = element.longitude; */

            });
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
                zoom: 13,  
                            
                });
                   let apartmentAssets = [
                /* { lat: 41.89056, lng: 12.49427 },
                { lat: 45.46362, lng: 9.18812 },
                { lat: 38.11463, lng: 15.6502 },
                { lat: 42.3507, lng: 13.39993 },
                { lat: 42.44227, lng: 11.22066},
                { lat: 45.43461, lng: 12.33891},
                { lat: 40.92251, lng: 9.48685}, */
            ];
            this.apartments.forEach(element => {
                apartmentAssets.push({ lat: element.latitude, lng: element.longitude });
                /* apartmentAssets.lng = element.longitude; */

            });
            let marker;
            apartmentAssets.forEach(function (child) {
                 marker = new tt.Marker().setLngLat(child).addTo(map);
            })

           /*  var marker = new tt.Marker().setLngLat(lnglat).addTo(map); */
             
            var popupOffsets = {
            top: [0, 0],
            bottom: [0, -30],
            'bottom-right': [0, -30],
            'bottom-left': [0, -30],
            left: [25, -35],
            right: [-25, -35]
                }
            map.scrollZoom.disable();

            var popup = new tt.Popup({offset: popupOffsets});
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

.search-container{
    position: relative;
}
#query{
    position: absolute;
    top: 100px;
    left: 40px;
    z-index: 99;
    border: none;
}

#query:focus{
    outline: none !important;
    box-shadow: 0 0 10px #719ECE;
}
</style>