@component('mail::message')
#Hola {{$request->trip->user->apellido}} {{$request->trip->user->nombre}}
El usuario {{$request->user->apellido}} {{$request->user->nombre}} le acaba de enviar una solicitud para sumarse a su viaje, para aceptarlo haga click en el botón <strong>aceptar
@component('mail::button', ['url' => route('peticion.confirm',$request)])
Aceptar
@endcomponent
Gracias,
<br>
Equipo de UncoYendo
@endcomponent