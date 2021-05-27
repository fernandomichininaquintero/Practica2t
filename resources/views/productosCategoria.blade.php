@extends('layout')

@section('cuerpo')
<div class="container p-3">
    <h3>Categoria: {{$nombreCategoria->nombre}}</h3>
    @php
        $count = 0;
        $salto_fila=$count%3==0;
    @endphp
    @foreach ($productos as $producto)
    @php 
        $count++;
        $salto_inicio_fila=$count%3==0;
        $salto_fin_fila=$count%3==2;
      
    @endphp
    @if ($salto_inicio_fila)
        <div class="row"> 
    @endif
               
                <div class="col-lg-4 col-sm-6">
                    <a href="{{route('producto.ver', ['producto_id'=>$producto->id])}}" style="color: black;">
                        <div class="card mb-3 mr-2">
                            <div class="row no-gutters">
                                <div class="col-3 col-sm-5">
                                    <img src="/../practica2t/assets/img/{{$producto->imagen}}" class="card-img" alt="{{$producto->nombre}}" height="150px">
                                </div>
                                <div class="col-5 col-sm-7">
                                    <div class="card-body">
                                        <h5 class="card-title text-uppercase">{{$producto->nombre}}</h5>
                                            
                                                <p class="card-text"><small class="text-muted">{{$producto->precio}}€</small></p>
                                                <p class="card-text"><small style="color: red;"><?= $producto->descuento?>%</small> {{ $producto->getPrecioFinal()}}€</p>
                                        
                                            <p class="card-text"><?=$producto->precio?>€</p>
                
                                        
                                    </div>
                                </div>
                            </div>
                        </div> 
                    </a>
                </div>
                
        @if ($salto_fin_fila)
            </div> 
        @endif                
    @endforeach
</div>
    
@endsection