<nav class="navbar navbar-expand-md navbar-light " style="background-color: #33D1FF;">
  <a class="navbar-brand" href="http://localhost/practica2t/public/home" style="color: black;">FMQ</a>
  <button class="navbar-toggler" style="background-color: #33D1FF;" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>

  <div class="collapse navbar-collapse" id="navbarSupportedContent">
    <ul class="navbar-nav mr-auto">
      <li class="nav-item active">
        <a class="nav-link" href="http://localhost/practica2t/public/home" style="color: black;">Home <span class="sr-only">(current)</span></a>
      </li>
      <li class="nav-item">
        <div class="dropdown">
          <button class="btn btn-ligth dropdown-toggle" type="button" id="categorias" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
            Caregorias
          </button>
          <div class="dropdown-menu" aria-labelledby="categorias">
            <?php 
            foreach($categorias as $categoria){
                if(!$categoria->oculto){
            ?>
              <a class="dropdown-item" href="http://localhost/practica2t/public/categoria/<?= $categoria->id?>"><?= $categoria->nombre ?></a>
            <?php
              }
            }
            ?>
          </div>
        </div>
      </li>
    </ul>
  </div>
</nav>