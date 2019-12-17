@component('mail::message')
#Hola esperamos hayas disfrutado el viaje.
si quieres calificar por favor ingresa aqui
@component('mail::button', ['url' => route('votar',$request)])
Calificar viaje
@endcomponent
Gracias,
<br>
Equipo de UncoYendo
@endcomponent