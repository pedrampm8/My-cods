<?php
session_start();
require_once "config/db.php";
require_once "lib/jdf.php";

$uri = isset($_SERVER["PATH_INFO"]) ? $_SERVER["PATH_INFO"] : "/"; // /about

//echo $uri;
//die();

$routes = [
    "/"=>[
        "controller"=>"HomeController",
        "method"=>"home",
    ],
    "/news"=>[
        "controller"=>"HomeController",
        "method"=>"news",
    ],
    "/commandstor"=>[
        "controller"=>"UserController",
        "method"=>"commandstor",
    ],
    "/commandstor/like"=>[
        "controller"=>"UserController",
        "method"=>"like",
    ],
    "/commandstor/dislike"=>[
        "controller"=>"UserController",
        "method"=>"dislike",
    ],
    "/search"=>[
        "controller"=>"HomeController",
        "method"=>"search",
    ],
    "/category"=>[
        "controller"=>"HomeController",
        "method"=>"category",
    ],
    "/about"=>[
        "controller"=>"AboutController",
        "method"=>"index",
    ],
    "/contactus"=>[
        "controller"=>"AboutController",
        "method"=>"contact",
    ],
    "/dashboard"=>[
        "controller"=>"DashboardController",
        "method"=>"index",
        "onlyAuth"=>true
    ],
    "/dashboard/logout"=>[
        "controller"=>"AuthController",
        "method"=>"logout",
        "onlyAuth"=>true
    ], // USER
    "/dashboard/users"=>[
        "controller"=>"UserController",
        "method"=>"index",
        "onlyAuth"=>true
    ],
    "/dashboard/users/delete"=>[
        "controller"=>"UserController",
        "method"=>"delete",
        "onlyAuth"=>true
    ],
    "/dashboard/users/create"=>[
        "controller"=>"UserController",
        "method"=>"create",
        "onlyAuth"=>true
    ],
    "/dashboard/users/store"=>[
        "controller"=>"UserController",
        "method"=>"store",
        "onlyAuth"=>true
    ],
    "/dashboard/users/edit"=>[
        "controller"=>"UserController",
        "method"=>"edit",
        "onlyAuth"=>true
    ],
    "/dashboard/users/update"=>[
        "controller"=>"UserController",
        "method"=>"update",
        "onlyAuth"=>true
    ],
    // NEWS
    "/dashboard/news"=>[
        "controller"=>"NewsController",
        "method"=>"index",
        "onlyAuth"=>true
    ],
    "/dashboard/news/edit"=>[
        "controller"=>"NewsController",
        "method"=>"edit",
        "onlyAuth"=>true
    ],
    "/dashboard/news/update"=>[
        "controller"=>"NewsController",
        "method"=>"update",
        "onlyAuth"=>true
    ],
    "/dashboard/news/create"=>[
        "controller"=>"NewsController",
        "method"=>"create",
        "onlyAuth"=>true
    ],
    "/dashboard/news/store"=>[
        "controller"=>"NewsController",
        "method"=>"store",
        "onlyAuth"=>true
    ],
    "/dashboard/news/delete"=>[
        "controller"=>"NewsController",
        "method"=>"delete",
        "onlyAuth"=>true
    ], // CATEGORY
    "/dashboard/category"=>[
        "controller"=>"CategoryController",
        "method"=>"index",
        "onlyAuth"=>true
    ],
    "/dashboard/category/create"=>[
        "controller"=>"CategoryController",
        "method"=>"create",
        "onlyAuth"=>true
    ],
    "/dashboard/category/store"=>[
        "controller"=>"CategoryController",
        "method"=>"store",
        "onlyAuth"=>true
    ],
    "/dashboard/category/delete"=>[
        "controller"=>"CategoryController",
        "method"=>"delete",
        "onlyAuth"=>true
    ],
    "/login"=>[
        "controller"=>"AuthController",
        "method"=>"login",
        "onlyGuest"=>true
    ],
    "/login/store"=>[
        "controller"=>"AuthController",
        "method"=>"loginStore",
        "onlyGuest"=>true
    ],
    "/register"=>[
        "controller"=>"AuthController",
        "method"=>"register",
    ]
];


if(isset($routes[$uri])){


    if(isset($routes[$uri]["onlyAuth"]) && $routes[$uri]["onlyAuth"] == true){ // middleware layer
        if(!isset($_SESSION["userData"])){
            header("Location:/login");
            die("403 Forbidden"); // important
        }
    }

    if(isset($routes[$uri]["onlyGuest"]) && $routes[$uri]["onlyGuest"] == true){ // middleware layer
        if(isset($_SESSION["userData"])){
            header("Location:/dashboard");
            die("403 Forbidden"); // important
        }
    }

    $controllerName = $routes[$uri]["controller"]; // AboutController
    $methodName = $routes[$uri]["method"]; // index

    require_once "Controller/$controllerName.php"; // require_once "Controller/AboutController.php";
    $controller = new $controllerName(); // $controller = new AboutController();
    $controller->$methodName(); // $controller->index();


}else{
    echo "404 not found : ".strip_tags($uri);
}


//echo $controllerName." ==> ".$methodName;