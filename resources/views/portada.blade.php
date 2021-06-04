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
                            <a href="{{route('producto.ver', ['producto_id'=>$producto->id])}}" >  
                                <div class="card text-white bg-warning mb-3" style="width: 540px; height: 150px;">
                                    <div class="row no-gutters">
                                        <div class="col-md-4">
                                            <img src="/../practica2t/assets/img/{{$producto->imagen}}" alt="{{$producto->nombre}}" height="150px" width="150px">
                                        </div>
                                        <div class="col-md-8">
                                            <div class="card-body" style="color: black;">
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
                            <a href="{{route('producto.ver', ['producto_id'=>$producto->id])}}">
                                <div class="card text-white bg-warning mb-3" style="width: 540px; height: 150px;">
                                    <div class="row no-gutters">
                                        <div class="col-md-4">
                                            <img src="/../practica2t/assets/img/{{$producto->imagen}}" alt="{{$producto->nombre}}" height="150px">
                                        </div>
                                        <div class="col-md-8">
                                            <div class="card-body" style="color: black;">
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
        <div class="row">
            @foreach($productos as $producto)
                @if($producto->destacado)
                    <div class="col">
                        <a href="{{route('producto.ver', ['producto_id'=>$producto->id])}}" style="color: black;">
                            <div class="card mb-3 mr-2">
                                <div class="row no-gutters">
                                    <div class="col-3 col-sm-5">
                                        <img src="/../practica2t/assets/img/{{$producto->imagen}}" class="card-img" alt="{{$producto->nombre}}" height="150px">
                                    </div>
                                    <div class="col-5 col-sm-7">
                                        <div class="card-body">
                                            <h5 class="card-title text-uppercase">{{$producto->nombre}}</h5>
                                            <p class="card-text">
                                            @if($producto->descuento>0)
                                                <small class="text-muted" style="text-decoration: line-through;">{{$producto->precio}}€</small></p>
                                                <p class="card-text"><small style="color: red;">{{$producto->descuento}}%</small>
                                            @endif
                                                {{ $producto->getPrecioFinal()}}€</p>
                                        </div>
                                    </div>
                                </div>
                            </div> 
                        </a>
                    </div>
                    
                @endif 
            @endforeach
            
        </div>
    </div>
@endsection