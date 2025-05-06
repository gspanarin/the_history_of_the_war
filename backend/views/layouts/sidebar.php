<?php
use common\models\User;

?>
<aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->
    <a href="index3.html" class="brand-link">
        <img src="<?=$assetDir?>/img/AdminLTELogo.png" alt="AdminLTE Logo" class="brand-image img-circle elevation-3" style="opacity: .8">
        <span class="brand-text font-weight-light">AdminLTE 3</span>
    </a>

    <!-- Sidebar -->
    <div class="sidebar">
        <!-- Sidebar user panel (optional) -->
        <div class="user-panel mt-3 pb-3 mb-3 d-flex">
            <div class="image">
                <img src="<?=$assetDir?>/img/user2-160x160.jpg" class="img-circle elevation-2" alt="User Image">
            </div>
            <div class="info">
                <a href="#" class="d-block"><?= User::getFullName( Yii::$app->user->getId() ) ?></a>
            </div>
        </div>

        <!-- SidebarSearch Form -->
        <!-- href be escaped -->
        <!-- <div class="form-inline">
            <div class="input-group" data-widget="sidebar-search">
                <input class="form-control form-control-sidebar" type="search" placeholder="Search" aria-label="Search">
                <div class="input-group-append">
                    <button class="btn btn-sidebar">
                        <i class="fas fa-search fa-fw"></i>
                    </button>
                </div>
            </div>
        </div> -->

        <!-- Sidebar Menu -->
        <nav class="mt-2">
            <?php
                $menu_items = [];
                if (Yii::$app->user->can('develop')){
                    $menu_items = [
                        ['label' => 'Yii2 PROVIDED', 'header' => true],
                        ['label' => 'Login', 'url' => ['site/login'], 'icon' => 'sign-in-alt', 'visible' => Yii::$app->user->isGuest],
                        ['label' => 'Gii',  'icon' => 'file-code', 'url' => ['/gii'], 'target' => '_blank'],
                        ['label' => 'Debug', 'icon' => 'bug', 'url' => ['/debug'], 'target' => '_blank'],
                        ['label' => 'RBAC', 'url' => ['/rbac']],
                        ['label' => 'Файли до статей', 'url' => ['/file']],
                        ['label' => 'Терміни опису', 'url' => ['/dictionary']],
			['label' => 'Відгуки', 'url' => ['/feedback']],			
                    ];
					
					
                }
                $menu_items = array_merge(
                    $menu_items, 
                    [
                        ['label' => 'Main menu', 'header' => true],
                        ['label' => 'Організації', 'url' => ['/organization']],
                        ['label' => 'Користувачі', 'url' => ['/user']],
                        ['label' => 'Сторінки/інструкції', 'url' => ['/page']],
						['label' => 'Партнерські проекти', 'url' => ['/partnership-project']],
                        ['label' => 'Налаштування полів', 'url' => ['/tag']],
                        ['label' => 'Налаштування значень полів', 'url' => ['/authority']],
                        ['label' => 'Розділи', 'url' => ['/section']]  ,
                        ['label' => 'Джерела статей', 'url' => ['/source']]  ,
                        ['label' => 'Статті', 'url' => ['/article']]]);
            
            echo \hail812\adminlte\widgets\Menu::widget([
                'items' => $menu_items,
            ]);
            ?>
        </nav>
        <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
</aside>