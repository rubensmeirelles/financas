<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="./assets/css/style.css">
    <link href="./assets/css/bootstrap.min.css" rel="stylesheet" crossorigin="anonymous">
    <script src="https://kit.fontawesome.com/7873db2fc3.js" crossorigin="anonymous"></script>
    <script src="https://unpkg.com/boxicons@2.1.4/dist/boxicons.js"></script>
    <title>Meu controle financeiro</title>
</head>

    <aside class="sidebar position-absolute d-flex flex-column top-0 text-white width-240">
        <div class="d-flex justify-content-center align-items-center p-2 user-data" id="user-data">
            <img src="./assets/images/avatar.png" alt="user">
            <span class="mx-2">Rubens Meirelles</span>
        </div>
        <div class="divider"></div>
        <div class="mt-2">
            <ul class="menu-item p-2">
                <a href="/financas/index.php" class="text-decoration-none menu-list active">
                    <li class="text-black fw-bolder"><i class="fas fa-tachometer-alt fa-rotate-by fa-lg mx-2 icon-color" style="--fa-rotate-angle: 91deg;"></i><span class="item-menu">Dashboard</span></li>
                </a>   
                <a href="/financas/lancamentos.php" class="text-decoration-none menu-list">
                    <li class="text-black fw-bolder"><i class="fas fa-wallet fa-rotate-by fa-lg mx-2 icon-color" style="--fa-rotate-angle: 91deg;"></i><span class="item-menu">Lançamentos</span></li>
                </a>              
            </ul>
        </div>
    </aside>   
    <body>
    <div class="shadow d-flex justify-content-between align-items-center top-header left-250">
        <div class="menu">
            <svg xmlns="http://www.w3.org/2000/svg" height="32" width="32" viewBox="0 0 448 512">
                <path d="M0 96C0 78.3 14.3 64 32 64H416c17.7 0 32 14.3 32 32s-14.3 32-32 32H32C14.3 128 0 113.7 0 96zM0 256c0-17.7 14.3-32 32-32H416c17.7 0 32 14.3 32 32s-14.3 32-32 32H32c-17.7 0-32-14.3-32-32zM448 416c0 17.7-14.3 32-32 32H32c-17.7 0-32-14.3-32-32s14.3-32 32-32H416c17.7 0 32 14.3 32 32z" />
            </svg>
        </div>
        <h1>Minhas Finança<span>$</span></h1>
        <div class="user">User</div>
    </div>