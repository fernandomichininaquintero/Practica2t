@extends('layout')

@section('cuerpo')
<h3>Carrito de la compra</h3>

@if(!Cart::isEmpty())
    @foreach(Cart::getContent() as $item)
        <div class="col">
            <a href="{{route('producto.ver', ['producto_id'=>$item->id])}}" style="color: black;">
                <div class="card mb-3 mr-2">
                    <div class="row no-gutters">
                        <div class="col-5 col-sm-7">
                            <div class="card-body">
                                <h5 class="card-title text-uppercase">{{$item->name}}</h5>
                                <p class="card-text">Precio:{{$item->price}}€</p>
                                <p class="card-text">Cantidad:{{$item->quantity}}</p>
                                <div scope="row">
                                    <form method="POST" action="{{url('carrito-destroy')}}">
                                        
                                        @csrf
                                        <input type="hidden" name="product_id" value="{{$item->id}}">
                                        <button class="btn btn-primary" type="submit">Eliminar</button>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div> 
            </a>
            
        </div>
    @endforeach
    <form method="POST" action="{{url('carrito-clear')}}">
                                        
        @csrf
        
        <button class="btn btn-primary" type="submit">Vaciar</button>
    </form>
@endif

<table class="table">
      <thead>
                <tr>
                    <th sc ope="col">Items</th>
                    <th sc ope="col">Sub total</th>
                    <th scope="col">Total</th>
                 </tr>
      </thead>
      <tbody>
                  <tr>
                      <th scope="row">{{Cart::getTotalQuantity()}}</th>
                      <th scope="row">{{Cart::getSubTotal()}}</th>
                      <th scope="row">{{Cart::getTotal()}}</th>
                   </tr>
      </tbody>
</table>
@endsection