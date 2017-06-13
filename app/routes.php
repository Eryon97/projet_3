<?php

// Home page
$app->get('/', "MicroCMS\Controller\HomeController::indexAction")
->bind('home');

// List page
$app->get('/list', "MicroCMS\Controller\HomeController::listAction")
->bind('list');

// Detailed info about an article
$app->match('/article/{id}', "MicroCMS\Controller\HomeController::articleAction")
->bind('article');

// Login form
$app->get('/login', "MicroCMS\Controller\HomeController::loginAction")
->bind('login');

// Admin zone
$app->get('/admin', "MicroCMS\Controller\AdminController::indexAction")
->bind('admin');

// Add a new article
$app->match('/admin/article/add', "MicroCMS\Controller\AdminController::addArticleAction")
->bind('admin_article_add');

// Edit an existing article
$app->match('/admin/article/{id}/edit', "MicroCMS\Controller\AdminController::editArticleAction")
->bind('admin_article_edit');

// Remove an article
$app->get('/admin/article/{id}/delete', "MicroCMS\Controller\AdminController::deleteArticleAction")
->bind('admin_article_delete');

// Add response comment
$app->match('/comment/{id}', "MicroCMS\Controller\HomeController::addResponseComment")
->bind('comment');

// Edit an existing comment
$app->match('/admin/comment/{id}/edit', "MicroCMS\Controller\AdminController::editCommentAction")
->bind('admin_comment_edit');

// Remove a comment
$app->get('/admin/comment/{id}/delete', "MicroCMS\Controller\AdminController::deleteCommentAction")
->bind('admin_comment_delete');

// Add a user
$app->match('/admin/user/add', "MicroCMS\Controller\AdminController::addUserActionAdmin")
->bind('admin_user_add');

// Add a user
$app->match('/account', "MicroCMS\Controller\AdminController::addUserAction")
->bind('account');

// Edit an existing user
$app->match('/admin/user/{id}/edit', "MicroCMS\Controller\AdminController::editUserAction")
->bind('admin_user_edit');

// Remove a user
$app->get('/admin/user/{id}/delete', "MicroCMS\Controller\AdminController::deleteUserAction")
->bind('admin_user_delete');

// API : get all articles
$app->get('/api/articles', "MicroCMS\Controller\ApiController::getArticlesAction")
->bind('api_articles');

// API : get an article
$app->get('/api/article/{id}', "MicroCMS\Controller\ApiController::getArticleAction")
->bind('api_article');

// API : create an article
$app->post('/api/article', "MicroCMS\Controller\ApiController::addArticleAction")
->bind('api_article_add');

// API : remove an article
$app->delete('/api/article/{id}', "MicroCMS\Controller\ApiController::deleteArticleAction")
->bind('api_article_delete');
