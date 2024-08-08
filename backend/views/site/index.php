<?php

use yii\helpers\Html;

$this->title = 'Dashboard';
$this->params['breadcrumbs'] = [['label' => $this->title]];
?>
<div class="container-fluid">

    <div class="row">
        <div class="col-md-6">
            <div class="card card-success">
                <div class="card-header">
                    <h3 class="card-title">Статті</h3>
                    <div class="card-tools">
                        <button type="button" class="btn btn-tool" data-card-widget="collapse">
                            <i class="fas fa-minus"></i>
                        </button>
                        <button type="button" class="btn btn-tool" data-card-widget="remove">
                            <i class="fas fa-times"></i>
                        </button>
                    </div>
                </div>
                <div class="card-body">
                    <div class="chart">
                        <canvas id="barChartRecord" style="min-height: 250px; height: 250px; max-height: 250px; max-width: 100%;"></canvas>
                    </div>
                </div>
            </div>
        </div>
        
        <div class="col-md-6">
            <div class="card">
                <div class="card-header">
                <h3 class="card-title">Статистика за операторами</h3>
                </div>

                <div class="card-body p-0">
                    <table class="table table-striped">
                    <thead>
                    <tr>
                        <th style="width: 10px">#</th>
                        <th>Оператор</th>
                        <th style="width: 40px">Кількість статей</th>
                    </tr>
                    </thead>
                    <tbody>
                    <?php 
                    $num =1;
                    foreach ($chartData['users'] as $user):?>
                        <tr>
                            <td><?= $num++ ?>.</td>
                            <td><?= $user['full_name'] ? $user['full_name']  : $user['username']  ?></td>
                            <td><?= $user['count'] ?></td>
                        </tr>
                    <?php endforeach;?>
                    </tbody>
                </table>
                </div>
            </div>
        </div>
  </div>  
  
    <!--
    <div class="row">
        <div class="col-12 col-sm-6 col-md-3">
            <?= \hail812\adminlte\widgets\InfoBox::widget([
                'text' => 'CPU Traffic',
                'number' => '10 <small>%</small>',
                'icon' => 'fas fa-cog',
            ]) ?>
        </div>
    </div>

    <div class="row">
        <div class="col-md-4 col-sm-6 col-12">
            <?= \hail812\adminlte\widgets\InfoBox::widget([
                'text' => 'Messages',
                'number' => '1,410',
                'icon' => 'far fa-envelope',
            ]) ?>
        </div>
        <div class="col-md-4 col-sm-6 col-12">
            <?= \hail812\adminlte\widgets\InfoBox::widget([
                'text' => 'Bookmarks',
                'number' => '410',
                 'theme' => 'success',
                'icon' => 'far fa-flag',
            ]) ?>
        </div>
        <div class="col-md-4 col-sm-6 col-12">
            <?= \hail812\adminlte\widgets\InfoBox::widget([
                'text' => 'Uploads',
                'number' => '13,648',
                'theme' => 'gradient-warning',
                'icon' => 'far fa-copy',
            ]) ?>
        </div>
    </div>

-->

    <div class="row">
        <div class="col-md-6">
            <div class="card">
                <div class="card-header">
                <h3 class="card-title">Статистика за мовою матеріала</h3>
                </div>

                <div class="card-body p-0">
                    <table class="table table-striped">
                    <thead>
                    <tr>
                        <th style="width: 10px">#</th>
                        <th>Tag</th>
                        <th style="width: 40px">Count</th>
                    </tr>
                    </thead>
                    <tbody>
                    <?php 
                    $num =1;
                    foreach ($chartData['tags']['lng'] as $tag):?>
                        <tr>
                            <td><?= $num++ ?>.</td>
                            <td><a href="http://warhistory/article?term_name=language&term_value=<?= urlencode( $tag['value']) ?>"> <?= $tag['value'] ?> </a>
							</td>
                            <td><?= $tag['count'] ?></td>
                        </tr>
                    <?php endforeach;?>
                    </tbody>
                </table>
                </div>
            </div>
        </div>
        
        
        <div class="col-md-6">
            <div class="card">
                <div class="card-header">
                <h3 class="card-title">Статистика за форматом</h3>
                </div>

                <div class="card-body p-0">
                    <table class="table table-striped">
                    <thead>
                    <tr>
                        <th style="width: 10px">#</th>
                        <th>Tag</th>
                        <th style="width: 40px">Count</th>
                    </tr>
                    </thead>
                    <tbody>
                    <?php 
                    $num =1;
                    foreach ($chartData['tags']['format'] as $tag):?>
                        <tr>
                            <td><?= $num++ ?>.</td>
                            <td><a href="http://warhistory/article?term_name=format&term_value=<?= urlencode( $tag['value']) ?>"> <?= $tag['value'] ?> </a>
                            <td><?= $tag['count'] ?></td>
                        </tr>
                    <?php endforeach;?>
                    </tbody>
                </table>
                </div>
            </div>
        </div>
        
    </div>


    <div class="row">
        <div class="col-md-6">
            <div class="card">
                <div class="card-header">
                <h3 class="card-title">Статистика за джерелом матеріалу</h3>
                </div>

                <div class="card-body p-0">
                    <table class="table table-striped text-break">
                    <thead>
                    <tr>
                        <th style="width: 10px">#</th>
                        <th>Tag</th>
                        <th style="width: 80px">Count</th>
                    </tr>
                    </thead>
                    <tbody>
                    <?php 
                    $num =1;
                    foreach ($chartData['tags']['source'] as $tag):?>
                        <tr>
                            <td><?= $num++ ?>.</td>
                            <td><a href="<?= $tag['value'] ?>" target="_blanck"><?= $tag['value'] ?></a></td>
                            <td><?= $tag['count'] ?></td>
                        </tr>
                    <?php endforeach;?>
                    </tbody>
                </table>
                </div>
            </div>
        </div>
        
        
        <div class="col-md-6">
            <div class="card">
                <div class="card-header">
                <h3 class="card-title">Статистика за авторством матеріалу</h3>
                </div>

                <div class="card-body p-0">
                    <table class="table table-striped">
                    <thead>
                    <tr>
                        <th style="width: 10px">#</th>
                        <th>Tag</th>
                        <th style="width: 40px">Count</th>
                    </tr>
                    </thead>
                    <tbody>
                    <?php 
                    $num =1;
                    foreach ($chartData['tags']['creators'] as $tag):?>
                        <tr>
                            <td><?= $num++ ?>.</td>
                            <td><a href="http://warhistory/article?term_name=creator&term_value=<?= urlencode( $tag['value']) ?>"> <?= $tag['value'] ?> </a>
                            <td><?= $tag['count'] ?></td>
                        </tr>
                    <?php endforeach;?>
                    </tbody>
                </table>
                </div>
            </div>
        </div>
        
    </div>

</div>


<?php

$labels_str = $chartData["labels_str"];
$value_str = $chartData["value_str"];
$script = <<< JS
  $(function () {    
   var areaChartData = {
      labels  : [$labels_str],  
      datasets: [
        {
          label               : 'Нових',
          backgroundColor     : 'rgba(60,141,188,0.9)',
          borderColor         : 'rgba(60,141,188,0.8)',
          data                : [$value_str]
        }
      ]
    }
    //-------------
    //- BAR CHART -
    //-------------
    var barChartCanvas = $('#barChartRecord').get(0).getContext('2d')
    var barChartData = $.extend(true, {}, areaChartData)
    var temp0 = areaChartData.datasets[0]
    barChartData.datasets[0] = temp0
        
    var barChartOptions = {
      responsive              : true,
      maintainAspectRatio     : false,
      datasetFill             : false
    }

    new Chart(barChartCanvas, {
      type: 'bar',
      data: barChartData,
      options: barChartOptions
    })

  })
JS;

//view-source:https://adminlte.io/themes/v3/plugins/chart.js/Chart.min.js

//$this->registerJsFile('@web/js/chart.js/chart.min.js', ['position'=>  yii\web\View::POS_HEAD]);


/*
$this->registerJsFile(
    '@web/js/main.js',
    ['depends' => [\yii\web\JqueryAsset::class]]
);
*/

$this->registerJs($script, yii\web\View::POS_END);

?>