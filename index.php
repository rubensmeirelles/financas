<?php include_once '../financas/app/includes/header.php'?>
<?php $url = filter_input(INPUT_GET, 'url', FILTER_DEFAULT);?>
<body>
<?php
    if(!empty($url)){
        if(file_exists("app/view/" . $url)){
            include "app/view/" .$url;
        } else {
            include "app/view/home.php";
        }
    } else {
        include "app/view/home.php";
    }
;?>
<?php include_once '../financas/app/includes/footer.php'?>