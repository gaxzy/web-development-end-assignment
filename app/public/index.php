<?php
require '../vendor/autoload.php';

use App\Router;
use App\Controllers\HomeController;
use App\Controllers\ProfileController;
use App\Controllers\PostController;
use App\Controllers\AdminController;
use App\Controllers\AuthController;

$router = new Router();

// home
$router->add('/', HomeController::class, 'index');

// -> profile
$router->add('/profile/{username}', ProfileController::class, 'showProfile');
$router->add('/profile/{username}/edit', ProfileController::class, 'editProfile');
$router->add('/profile/{username}/picture', ProfileController::class, 'updateProfilePicture');
$router->add('/profile/{username}/delete', ProfileController::class, 'deleteProfile');

// -> post
$router->add('/post/view/{post_id}', PostController::class, 'showPost');
$router->add('/post/create', PostController::class, 'createPost');
$router->add('/post/view/{post_id}/delete', PostController::class, 'removePost');
$router->add('/post/view/{post_id}/comment/{comment_id}/delete', PostController::class, 'removeComment');

// -> admin
$router->add('/admin', AdminController::class, 'admin');

// -> auth
$router->add('/login', AuthController::class, 'login');
$router->add('/register', AuthController::class, 'register');
$router->add('/logout', AuthController::class, 'logout');

// -> api
$router->add('/api/users', AdminController::class, 'getUsersJson');
$router->add('/api/user/{username}', ProfileController::class, 'getUserJson');
$router->add('/api/post/{id}', PostController::class, 'getPostJson');
$router->add('/api/posts', PostController::class, 'getPostsJson');

// -> temp
$router->add('/hash', HomeController::class, 'hash');

// request
$router->route($_SERVER['REQUEST_URI']);
