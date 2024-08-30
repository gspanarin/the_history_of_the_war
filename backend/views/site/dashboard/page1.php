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
                        <th style="width: 90px">#</th>
                        <th>Оператор</th>
                        <th style="width: 90px">Кількість статей</th>
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