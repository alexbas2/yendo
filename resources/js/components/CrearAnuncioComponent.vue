<template>
<div class="col-lg-12 mb-4 mb-lg-0">
    <div class="card">
        <div class="card-header">
            <h2 class="h6 text-uppercase mb-0">Publicar Anuncio de viaje</h2>
        </div>
        <div class="card-body">
           <h3 class="text-center">Completa el formulario</h3>
            <br>
            <form form method="post" @submit.prevent >
                <div class="form-group row d-flex justify-content-center">
                    <label class="col-md-1 form-control-label">Ubicacion</label>
                    <div class="col-md-5">
                     <autocompletemap v-on:direccion="setDireccion" ></autocompletemap>
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
                    <label class="col-md-2 form-control-label">Comentario</label>
                    <div class="col-md-4">
                        <input v-model="descripcion" name="descripcion" type="text" class="form-control">
                    </div>
                </div>
                <br>
                <div class="form-group row d-flex justify-content-center">
                    <div class="col-md-3">
                        <button type="submit" @click="crearAnuncio" class="btn btn-primary">Publicar Anuncio</button>
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
        name: "crear-anuncio",
        props:{
            usuario:Object
        },
        data(){
            return {
                user:'',
                fecha:'',
                hora:'',
                descripcion:'',
                ciudad:'',
                calle:'',
                numero:'',
                direccion:'',
                estado:'',
                lugares_disponibles:'',
                arrayMsjs:[],
                error:0,
            }
        },
        methods:{
            crearAnuncio(){
                axios.post('/Ad/store',
                    {
                        'fecha':this.fecha,
                        'calle':this.direccion.route,
                        'numero':this.direccion.street_number,
                        'descripcion':this.descripcion,
                        'hora': this.hora,
                        'latitud':this.direccion.latitude,
                        'longitud':this.direccion.longitude,
                        'ciudad':this.direccion.locality,
                    }).then(function(){
                    Swal.fire({
                        title: 'Anuncio para solicitar viaje publicado!',
                        text: 'Acabas de generar un anuncio,felicitaciones',
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

<style scoped>

</style>
