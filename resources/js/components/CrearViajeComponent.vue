<template>
<div class="col-lg-12 mb-4 mb-lg-0">
    <div class="card">
        <div class="card-header">
            <h2 class="h6 text-uppercase mb-0">Crear un viaje</h2>
        </div>
        <div class="card-body">
           <h4 class="text-center">Completa el formulario</h4>
            <br>
            <form form method="post" @submit.prevent >
                <div class="form-group row d-flex justify-content-center">
                    <label class="col-md-1 form-control-label">Origen</label>
                    <div class="col-md-5">
                     <autocompletemap v-on:direccion="setDireccion"></autocompletemap>
                    </div>
                </div>
                <div class="form-group row d-flex justify-content-center">
                    <label class="col-md-1 form-control-label">Fecha</label>
                    <div class="col-md-5">
                        <input v-model="fecha" name="fecha" type="date" class="form-control">
                     
                    </div>
                </div>
                <div class="form-group row d-flex justify-content-center">
                    <label class="col-md-1 form-control-label">Hora</label>
                    <div class="col-md-5">
                        <input v-model="hora" name="hora" type="time" class="form-control">
                    </div>
                </div>
                <div class="form-group row d-flex justify-content-center">
                    <label class="col-md-2 form-control-label">Lugares Disponibles</label>
                    <div class="col-md-4">
                        <input v-model="lugares_disponibles" name="lugares_disponibles" type="number" max="4" class="form-control">
                    </div>
                </div>
                <br>
                <div class="form-group row d-flex justify-content-center">
                    <div class="col-md-3">
                        <button type="submit" @click="crearViaje" class="btn btn-primary">Crear Viaje</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>

</template>

<script>
import axios from 'axios';
    export default {
        name: "CrearViaje",
        props:{
            usuario:Object
        },
        data(){
            return {
                fecha:'',
                calle:'',
                numero:'',
                hora:'',
                lugares_disponibles:'',
                arrayMsjs:[],
                error:0,
                direccion:'',
                cars:[],
                user:''
            }
        },
        methods:{
            crearViaje(){
                axios.post('/trip/store',
                    {
                        'fecha':this.fecha,
                        'calle':this.direccion.route,
                        'numero':this.direccion.street_number,
                        'hora': this.hora,
                        'latitud':this.direccion.latitude,
                        'longitud':this.direccion.longitude,
                        'ciudad':this.direccion.locality,
                        'lugares_disponibles':this.lugares_disponibles,
                    }).then(function(){
                    Swal.fire({
                        title: 'Viaje creado!',
                        text: 'Acabas de generar un viaje,felicitaciones',
                        type: 'success',
                        confirmButtonText: 'Continuar'
                    }).then((result)=>{
                        if(result.value){
                            window.location.href = '/';
                        }
                    })

                }).catch(function(error){
                    console.log(error);
                })
            },
            setDireccion(direccion){
                this.direccion=direccion;
            }

        }
    }
</script>