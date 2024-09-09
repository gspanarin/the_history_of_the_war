<div class="row">
        <div class="col-md-6">
            <div class="card">
                <div class="card-header">
                <h3 class="card-title">Найпопулярніші статті</h3>
                </div>

                <div class="card-body p-0">
                    <table class="table table-striped text-break">
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
                    foreach ($chartData['popular_articles'] as $article):?>
                        <tr>
                            <td><?= $num++ ?>.</td>
							<td><a href="/official/article/view?id=<?= $article->id ?>"><?= $article->title ?> </a>
                            <td><?= $article->view ?></td>
                        </tr>
                    <?php endforeach;?>
                    </tbody>
                </table>
                </div>
            </div>
        </div>
        
    </div>