<?php

use yii\helpers\Html;

$this->title = 'Dashboard';
$this->params['breadcrumbs'] = [['label' => $this->title]];
?>
<div class="container-fluid">

	
	<div class="row">
		<div class="col-12">
            <div class="card card-primary card-outline card-tabs">
              <div class="card-header p-0 pt-1 border-bottom-0">
                <ul class="nav nav-tabs" id="custom-tabs-three-tab" role="tablist">
                  <li class="nav-item">
                    <a class="nav-link active" id="custom-tabs-three-home-tab" data-toggle="pill" href="#custom-tabs-three-page1" role="tab" aria-controls="custom-tabs-three-home" aria-selected="true">Наповнення архіву</a>
                  </li>
                  <li class="nav-item">
                    <a class="nav-link" id="custom-tabs-three-profile-tab" data-toggle="pill" href="#custom-tabs-three-page2" role="tab" aria-controls="custom-tabs-three-profile" aria-selected="false">Мова та формат</a>
                  </li>
                  <li class="nav-item">
                    <a class="nav-link" id="custom-tabs-three-messages-tab" data-toggle="pill" href="#custom-tabs-three-page3" role="tab" aria-controls="custom-tabs-three-messages" aria-selected="false">Джерела та авторство</a>
                  </li>
                  <li class="nav-item">
                    <a class="nav-link" id="custom-tabs-three-settings-tab" data-toggle="pill" href="#custom-tabs-three-page4" role="tab" aria-controls="custom-tabs-three-settings" aria-selected="false">Адміністративні та географічні об'єкти</a>
                  </li>
				  
				  
				  <li class="nav-item">
                    <a class="nav-link" id="custom-tabs-three-settings-tab" data-toggle="pill" href="#custom-tabs-three-page5" role="tab" aria-controls="custom-tabs-three-settings" aria-selected="false">Організації та підрозділи</a>
                  </li>
				  <li class="nav-item">
                    <a class="nav-link" id="custom-tabs-three-settings-tab" data-toggle="pill" href="#custom-tabs-three-page6" role="tab" aria-controls="custom-tabs-three-settings" aria-selected="false">Рейтинг статей</a>
                  </li>
				  
				  
                </ul>
              </div>
              <div class="card-body">
                <div class="tab-content" id="custom-tabs-three-tabContent">
                  <div class="tab-pane fade show active" id="custom-tabs-three-page1" role="tabpanel" aria-labelledby="custom-tabs-three-home-tab">
					  <?= $this->render('dashboard/page1', compact('chartData')) ?>
                  </div>
                  <div class="tab-pane fade" id="custom-tabs-three-page2" role="tabpanel" aria-labelledby="custom-tabs-three-profile-tab">
                     <?= $this->render('dashboard/page2', compact('chartData')) ?>
                  </div>
                  <div class="tab-pane fade" id="custom-tabs-three-page3" role="tabpanel" aria-labelledby="custom-tabs-three-messages-tab">
                     <?= $this->render('dashboard/page3', compact('chartData')) ?>
                  </div>
                  <div class="tab-pane fade" id="custom-tabs-three-page4" role="tabpanel" aria-labelledby="custom-tabs-three-settings-tab">
                     <?= $this->render('dashboard/page4', compact('chartData')) ?>
                  </div>
				  <div class="tab-pane fade" id="custom-tabs-three-page5" role="tabpanel" aria-labelledby="custom-tabs-three-settings-tab">
                     <?= $this->render('dashboard/page5', compact('chartData')) ?>
                  </div>
				  <div class="tab-pane fade" id="custom-tabs-three-page6" role="tabpanel" aria-labelledby="custom-tabs-three-settings-tab">
                     <?= $this->render('dashboard/page6', compact('chartData')) ?>
                  </div>
					
					
                </div>
              </div>
              <!-- /.card -->
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