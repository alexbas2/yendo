
<div class="container">
    @php
        $conversation=\App\Conversation::where('trip_id','=',$viaje->id)->first();


    @endphp
    @if($conversation!=null)
        @if($conversation->messages!=null)
            @forelse($conversation->messages as $message)
                <div class="row">
                    <div class="col-md-2">
                        <img src="{{asset('theme/img/avatar-1.jpg')}}" alt="..." style="max-width: 3rem" class="rounded-circle mx-3 my-2 my-lg-0">

                    </div>


                    @if($message->user->id==auth()->user()->id)
                        <div class="col-md-9">
                            <div class="alert alert-success" role="alert">

                                <strong>{{$message->mensaje}}</strong>
                            </div>
                        </div>
                    @else
                        <div class="col-md-9">
                            <div class="alert alert-secondary" role="alert">

                                <strong>{{$message->mensaje}}</strong>
                            </div>
                        </div>

                    @endif

                </div>
            @empty


            @endforelse

        @endif

    @endif







</div>