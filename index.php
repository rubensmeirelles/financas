<?php include_once '../financas/app/includes/header.php';

include_once "../financas/app/config/config.php";

$url = filter_input(INPUT_GET, 'url', FILTER_DEFAULT);

include_once '../financas/app/lib/lib_clean_url.php';

$url_clean = cleanUrl($url);

// Converte a string em array
$url_path = explode("/", $url_clean);

// Verificar se existe a posicao 1 no array
if (isset($url_path['0'])) {
    $path_page = $url_path['0'];
}

// Verificar se existe a posicao 2 no array
if (isset($url_path['1'])) {
    $path_detail = $url_path['1'];
}

?>
<body>
<?php
    if(!empty($path_page)){
        if(file_exists("app/view/" . $path_page . ".php")){
            include "app/view/" . $path_page . ".php";
        } else {
            include "app/view/404.php";
        }
    } else {
        include "app/view/home.php";
    }
;?>
<?php include_once '../financas/app/includes/footer.php'?>