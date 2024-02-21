<?php
// session_start();

$uri = parse_url($_SERVER['REQUEST_URI'])['path'];
$page = "";
$routes = [
    //log
    '/' => 'controllers/login/login.controller.php',
    '/logout' => 'controllers/logout/logout.controller.php',
    '/signup' => 'controllers/signup/signup.controller.php',

    '/admin' => 'controllers/admin/admin.controller.php',
    '/categories' => 'controllers/categories/category.controller.php',
    //order
    '/items' => 'controllers/items/item.controller.php',
    
    '/orders' => 'controllers/orders/order.controller.php',
    '/order_form' => 'controllers/orders/create.form.order.controller.php',
    '/reports' => 'controllers/reports/report.controller.php',
    '/users' => 'controllers/users/user.controller.php',
    //
    '/profile' => 'controllers/profile/profile.controller.php',
     //user
     '/userCreate' => 'controllers/users/user.create.controller.php',
     '/userUpdate' => 'controllers/users/user.edit.controller.php',
     //category
     '/categoryCreate'=> 'controllers/categories/category.create.controller.php',
     '/categoryUpdate'=> 'controllers/categories/category.edit.controller.php',

     //product
     '/productCreate' => 'controllers/items/form_create.controller.php',
     '/productUpdate' => 'controllers/items/product.edit.controller.php',
];

if (array_key_exists($uri, $routes)) {
    $page = $routes[$uri];
    require $page;
} else {
    require "layouts/header.php";
    require "layouts/navbar.php";
    http_response_code(404);
    $page = 'views/errors/404.php';
    require $page;
    require "layouts/footer.php";
}



