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
                        <th style="width: 80px">#</th>
                        <th>Tag</th>
                        <th style="width: 80px">Count</th>
                    </tr>
                    </thead>
                    <tbody>
                    <?php 
                    $num =1;
                    foreach ($chartData['tags']['lng'] as $tag):?>
                        <tr>
                            <td><?= $num++ ?>.</td>
                            <td><a href="/article?term_name=language&term_value=<?= urlencode( $tag['value']) ?>"> <?= $tag['value'] ?> </a>
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
                        <th style="width: 80px">#</th>
                        <th>Tag</th>
                        <th style="width: 80px">Count</th>
                    </tr>
                    </thead>
                    <tbody>
                    <?php 
                    $num =1;
                    foreach ($chartData['tags']['format'] as $tag):?>
                        <tr>
                            <td><?= $num++ ?>.</td>
                            <td><a href="/article?term_name=format&term_value=<?= urlencode( $tag['value']) ?>"> <?= $tag['value'] ?> </a>
                            <td><?= $tag['count'] ?></td>
                        </tr>
                    <?php endforeach;?>
                    </tbody>
                </table>
                </div>
            </div>
        </div>
        
    </div>