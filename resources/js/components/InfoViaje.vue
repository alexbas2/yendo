<template>
<div><div class="col-md-5 align-content-center">
    <div id="map"></div>
    </div>
</div>
</template>

<script>
export default {
    name: "info-viaje",
    
  data(){
     return {
              
            }
  },
	mounted(){
      var map = new google.maps.Map(document.getElementById('map'), {
          zoom: 13,
          center: {lat: -38.94014990000001, lng: -68.0573579},
          mapTypeControl: false,// tipo de mapa
          panControl: false, // panel de control
          zoomControl: false, // para ver el simbolo + - 
          streetViewControl: false //para habilitar street view
        });

         var directionsService = new google.maps.DirectionsService;
         var directionsDisplay = new google.maps.DirectionsRenderer;
         directionsDisplay.setMap(map);
         directionsService.route({
            origin: { lat:-38.9301499000000, lng:-68.0501499000000 },//origen
            destination: { lat:-38.94014990000001, lng:-68.0573579 },//fin            
            travelMode: google.maps.TravelMode.WALKING
         }, function (response, status) {
            if (status === google.maps.DirectionsStatus.OK) {
                directionsDisplay.setDirections(response);
            } 
        });
    }
  }

</script>

<style scoped>
 #map {
        height: 300px;
        width: 300px;
      }
</style>