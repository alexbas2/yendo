<template>
<div>
    <vue-google-autocomplete
            ref="address"
            id="mapa"
            classname="form-control"
            placeholder="origen"
            v-on:placechanged="getAddressData"
            country="ar"
        ></vue-google-autocomplete>
    <br>
    <div id="map"></div>
</div>
</template>

<script>
import VueGoogleAutocomplete from 'vue-google-autocomplete'
export default {
    name: "autocompletemap",
    components: { VueGoogleAutocomplete },
  data(){
     return {
              address: ''
            }
  },
	mounted(){
     this.$refs.address.focus();
     var  map= this.initMap();
  },
  methods:{
    initMap(){
    //inicializamos y personalizamos el mapa
    var map = new google.maps.Map(document.getElementById('map'), {
          zoom: 13,
          center: {lat: -38.94014990000001, lng: -68.0573579},
          mapTypeControl: false,// tipo de mapa
          panControl: false, // panel de control
          zoomControl: false, // para ver el simbolo + - 
          streetViewControl: false //para habilitar street view
        });
      return map ;
    },
    
    //para limpiar el mapa
    clearMarkers() {
    var markers = [];
        for (var i = 0; i < markers.length; i++) {
          if (markers[i]) {
            markers[i].setMap(null);
          }
        }
        markers = [];
      },
     getAddressData: function (addressData, placeResultData, id) {
                this.address = addressData;
                this.$emit('direccion',this.address);
        var map= this.initMap();
         var directionsService = new google.maps.DirectionsService;
         var directionsDisplay = new google.maps.DirectionsRenderer;
         directionsDisplay.setMap(map);
         directionsService.route({
            origin: { lat:this.address.latitude, lng:this.address.longitude },//origen
            destination: { lat:-38.94014990000001, lng:-68.0573579 },//fin            
            travelMode: google.maps.TravelMode.WALKING
         }, function (response, status) {
            if (status === google.maps.DirectionsStatus.OK) {
                directionsDisplay.setDirections(response);
            } 
        });

    }
  }
}
</script>

<style scoped>
 #map {
        height: 300px;
        width: 300px;
      }
</style>