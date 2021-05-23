@extends('layout')

@section('cuerpo')
    <div class="container">
        <h3>Productos Destacados</h3>
        
        <div id="carouselExampleControls" class="carousel slide" data-ride="carousel" data-interval="2500" style="max-width: 540px;">
            <div class="carousel-inner">
            <?php 
            $count=1;
            foreach($productos as $producto){ 
                if ($producto->destacado) {
                    if ($count==1) {
            ?>
                        <div class="carousel-item active">    
                            <div class="card mb-3" style="width: 540px; height: 150px; background-color: #FF9F33;">
                                <div class="row no-gutters">
                                    <div class="col-md-4">
                                        <img src="/../practica2t/assets/img/<?= $producto->imagen?>" alt="<?= $producto->nombre?>" height="150px" width="150px">
                                    </div>
                                    <div class="col-md-8">
                                        <div class="card-body">
                                            <h5 class="card-title"><?= $producto->nombre?></h5>
                                            <p class="card-text"><?= $producto->descripcion?></p>
                                        </div>
                                    </div>
                                </div>
                            </div> 
                        </div>          
            <?php
                        $count++;
                    }else{
            ?>
                        <div class="carousel-item">
                            <div class="card mb-3" style="width: 540px; height: 150px; background-color: #FF9F33;">
                                <div class="row no-gutters">
                                    <div class="col-md-4">
                                        <img src="/../practica2t/assets/img/<?= $producto->imagen?>" alt="<?= $producto->nombre?>" height="150px">
                                    </div>
                                    <div class="col-md-8">
                                        <div class="card-body">
                                            <h5 class="card-title"><?= $producto->nombre?></h5>
                                            <p class="card-text"><?= $producto->descripcion?></p>
                                        </div>
                                    </div>
                                </div>
                            </div> 
                        </div>
            <?php
                    }
                }
            }
            ?> 
            </div>
        </div>
    </div>
@endsection