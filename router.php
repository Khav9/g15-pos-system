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
    '/orders' => 'controllers/orders/order.controller.php',
    '/insert_order' => 'controllers/orders/insert.order.controller.php',
    '/order_delete' => 'controllers/orders/order.delete.controller.php',
    
    '/items' => 'controllers/items/item.controller.php',

    
    '/reports' => 'controllers/reports/report.controller.php',
    '/users' => 'controllers/users/user.controller.php',
    //
    '/profile' => 'controllers/profile/profile.controller.php',
    //user
    '/userCreate' => 'controllers/users/user.create.controller.php',
    '/userUpdate' => 'controllers/users/user.edit.controller.php',
    //category
    '/categoryUpdate' => 'controllers/categories/category.edit.controller.php',

    //product
    '/productCreate' => 'controllers/items/form_create.controller.php',
    '/productUpdate' => 'controllers/items/product.edit.controller.php',

    //expire
    '/expired' => 'controllers/expired/expire.controller.php',

    //forgot pass
    '/forgotPassword' => 'controllers/forgot/forgotPassword.controller.php',
    '/verifyPIN' => 'controllers/forgot/verifyPIin.controller.php',
    '/newPassword' => 'controllers/forgot/resetPassword.controller.php',

    //report
    '/reportPrint' => 'controllers/reports/report_print.controller.php',
    '/reportView' => 'controllers/reports/report_view.controller.php'
];

if (array_key_exists($uri, $routes)) {
    $page = $routes[$uri];
    require $page;
} else {
    require "layouts/header.php";
    http_response_code(404);
    $page = 'views/errors/404.php';
    require $page;

}
