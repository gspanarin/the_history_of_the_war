<?php
use common\models\User;

?>
<!--
    <div class="row">
        <div class="col-sm-4">
            <a href="#" class=""><img src="###" class="img-responsive"></a>
        </div>
        <div class="col-sm-8">
            <h5 class="title"><?= $model->title ?></h5>
            <p class="text-muted">
                <span class="glyphicon glyphicon-lock"></span> 
                <a target="_blanck" href="<?= $model->source?>">Джерело інформації</a>
            </p>
            <p><?= $model->text_preview ?></p>
            <p class="text-muted">Матеріал архівовано <a href="#"><?= User::getFullName( $model->user ) ?></a></p>
        </div>
    </div>
    <hr>
    -->
    <div class="card" style="width: 18rem;">
  <img class="card-img-top" src="..." alt="Card image cap">
  <div class="card-body">
    <h5 class="card-title"><?= $model->title?></h5>
    <p class="card-text"><?= $model->text_preview?></p>
    <a href="#" class="btn btn-primary">читати повністю</a>
  </div>
</div>
    
    
    <div class="card">
  <div class="card-header">
    Featured
  </div>
  <div class="card-body">
    <h5 class="card-title">Special title treatment</h5>
    <p class="card-text">With supporting text below as a natural lead-in to additional content.</p>
    <a href="#" class="btn btn-primary">Go somewhere</a>
  </div>
</div>