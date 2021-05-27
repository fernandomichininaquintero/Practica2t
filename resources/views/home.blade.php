@extends('layout')

@section('cuerpo')
    <div class="container">
        <h3>Productos Destacados</h3>
        
        <div id="carouselExampleControls" class="carousel slide" data-ride="carousel" data-interval="2500" style="max-width: 540px;">
            <div class="carousel-inner">
            @php
            $count=1;
            @endphp
            @foreach($productos as $producto)
                @if($producto->destacado) 
                    @if($count==1)
                        <div class="carousel-item active">  
                            <a href="{{route('producto.ver', ['producto_id'=>$producto->id])}}" style="color: black;">  
                                <div class="card text-white bg-warning mb-3" style="width: 540px; height: 150px;">
                                    <div class="row no-gutters">
                                        <div class="col-md-4">
                                            <img src="/../practica2t/assets/img/{{$producto->imagen}}" alt="{{$producto->nombre}}" height="150px" width="150px">
                                        </div>
                                        <div class="col-md-8">
                                            <div class="card-body">
                                                <h5 class="card-title">{{$producto->nombre}}</h5>
                                                <p class="card-text">{{$producto->descripcion}}</p>
                                            </div>
                                        </div>
                                    </div>
                                </div> 
                            </a>
                        </div>          
                        @php
                        $count++;
                        @endphp
                    @else
                        <div class="carousel-item">
                            <a href="{{route('producto.ver', ['producto_id'=>$producto->id])}}" style="color: black;">
                                <div class="card text-white bg-warning mb-3" style="width: 540px; height: 150px;">
                                    <div class="row no-gutters">
                                        <div class="col-md-4">
                                            <img src="/../practica2t/assets/img/{{$producto->imagen}}" alt="{{$producto->nombre}}" height="150px">
                                        </div>
                                        <div class="col-md-8">
                                            <div class="card-body">
                                                <h5 class="card-title">{{$producto->nombre}}</h5>
                                                <p class="card-text">{{$producto->descripcion}}</p>
                                            </div>
                                        </div>
                                    </div>
                                </div> 
                            </a>
                        </div>
                    @endif
                @endif
            @endforeach
            </div>
        </div>
    </div>
@endsection