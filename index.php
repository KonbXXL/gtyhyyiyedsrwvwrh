<link rel="stylesheet" type="text/css" href="views/css/style_3.css" />
<script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.4.1/jquery.min.js"></script>
<script type="text/javascript" src="js/jquery.liveFilter.js"></script>
    <?php
    $ctrl=isset($_GET['ctrl']) ? $_GET['ctrl']:'prosto';
    $act=isset($_GET['act']) ? $_GET['act'] : 'All';
    $controlerClassName= $ctrl .'Controler';
    require_once __DIR__ .'/controlers/' .$controlerClassName.'.php';
    $controller=new $controlerClassName;
    $method='action' .$act;
    $controller->$method();
    ?>