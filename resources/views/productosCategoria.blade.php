@extends('layout')

@section('cuerpo')
<div class="container">

    <?php
    $count = 0;
    foreach ($productos as $producto) {
        if ($count==3) {
            $count = 0;
        }
        if ($count==0) {
    ?>
            <div class="row">     
    <?php
        }
    ?>
            <div class="card mb-3" style="width: 350px; height: 150px; text-align: center;">
                <div class="row no-gutters">
                    <div class="col-md-4">
                        <img src="/../practica2t/assets/img/<?= $producto->imagen?>" alt="<?= $producto->nombre?>" height="150px" width="150px">
                    </div>
                    <div class="col-md-8">
                        <div class="card-body">
                            <h5 class="card-title"><?= $producto->nombre?></h5>
                            <?php    
                                if($producto->descuento>0){
                                $descuento = ($producto->descuento * $producto->precio)/100;
                                $precio = $producto->precio - $descuento;
                            ?>
                                    <p class="card-text"><small class="text-muted"><?=$producto->precio?>€</small></p>
                                    <p class="card-text"><?= $precio?>€</p>
                            <?php
                                }else{
                            ?>
                                <p class="card-text"><?=$producto->precio?>€</p>
                            <?php
                                }
                            ?>
                            
                        </div>
                    </div>
                </div>
            </div> 
    <?php
    $count++;
        if ($count==3) {
    ?>
            </div>     
    <?php
        }
        
    }
    ?>
</div>
    
@endsection