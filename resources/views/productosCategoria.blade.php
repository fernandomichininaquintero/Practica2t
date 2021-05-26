@extends('layout')

@section('cuerpo')
<div class="container p-3">
    <h3>Categoria: <?= $nombreCategoria->nombre?></h3>
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
               
                <div class="col-lg-4 col-sm-6">
                    <a href="http://localhost/practica2t/public/categoria/<?= $producto->categoria_id?>/producto/<?= $producto->id?>" style="color: black;">
                        <div class="card mb-3 mr-2">
                            <div class="row no-gutters">
                                <div class="col-3 col-sm-5">
                                    <img src="/../practica2t/assets/img/<?= $producto->imagen?>" class="card-img" alt="<?= $producto->nombre?>" height="150px">
                                </div>
                                <div class="col-5 col-sm-7">
                                    <div class="card-body">
                                        <h5 class="card-title"><?= $producto->nombre?></h5>
                                        <?php    
                                            if($producto->descuento>0){
                                            $descuento = ($producto->descuento * $producto->precio)/100;
                                            $precio = $producto->precio - $descuento;
                                        ?>
                                                <p class="card-text"><small class="text-muted"><?=$producto->precio?>€</small></p>
                                                <p class="card-text"><small style="color: red;"><?= $producto->descuento?>%</small> <?= $precio?>€</p>
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
                    </a>
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