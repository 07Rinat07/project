<?php

require_once "./../config.php";
require_once "./../db.php";
require_once ROOT . "libs/functions/functions.php";

$_SESSION['errors'] = array();
$_SESSION['success'] = array();

session_start();

	// Проверка на права доступа
if ( !(isset($_SESSION['role']) && $_SESSION['role'] === 'admin') ) {
	header('Location: ' . HOST . 'login');
	exit();
}

$uriModule = getModuleName('for_admin');
$uriGet = getUriGet();

	// Sidebar
require ROOT . "admin/modules/sidebar/sidebar.php";

switch ( $uriModule ) {
	
	// admin -> dashboard

	case 'admin':
		require ROOT . "admin/modules/main/main.php";
		break;

	// blog

	case 'blog':
		require ROOT . "admin/modules/blog/all.php";
		break;

	case 'post-new':
		require ROOT . "admin/modules/blog/new.php";
		break;

	case 'post-edit':
		require ROOT . "admin/modules/blog/edit.php";
		break;

	case 'post-delete':
		require ROOT . "admin/modules/blog/delete.php";
		break;		

	// blog -> categories 

	case 'categories':
		require ROOT . "admin/modules/categories/all.php";
		break;

	case 'category-new':
		require ROOT . "admin/modules/categories/new.php";
		break;

	case 'category-edit':
		require ROOT . "admin/modules/categories/edit.php";
		break;

	case 'category-delete':
		require ROOT . "admin/modules/categories/delete.php";
		break;	

	// contacts 

	case 'contacts':
		require ROOT . "admin/modules/contacts/edit.php";
		break;	

	// messages		

	case 'messages':
		require ROOT . "admin/modules/messages/all.php";
		break;	

	case 'message':
		require ROOT . "admin/modules/messages/message.php";
		break;	

	// comments		

	case 'comments':
		require ROOT . "admin/modules/comments/all.php";
		break;	

	case 'comment':
		require ROOT . "admin/modules/comments/comment.php";
		break;		

	case 'comment-delete':
		require ROOT . "admin/modules/comments/delete.php";
		break;			

	// portfolio 

	case 'portfolio':
		require ROOT . "admin/modules/portfolio/all.php";
		break;

	case 'project-new':
		require ROOT . "admin/modules/portfolio/new.php";
		break;

	case 'project-edit':
		require ROOT . "admin/modules/portfolio/edit.php";
		break;

	case 'project-delete':
		require ROOT . "admin/modules/portfolio/delete.php";
		break;	

	// shop

	case 'shop':
		require ROOT . "admin/modules/shop/all.php";
		break;

	case 'product-new':
		require ROOT . "admin/modules/shop/new.php";
		break;

	case 'product-edit':
		require ROOT . "admin/modules/shop/edit.php";
		break;

	case 'product-delete':
		require ROOT . "admin/modules/shop/delete.php";
		break;	

	// orders

	case 'orders':
		require ROOT . "admin/modules/orders/all.php";
		break;	

	case 'order':
		require ROOT . "admin/modules/orders/order.php";
		break;		

	case 'order-delete':
		require ROOT . "admin/modules/orders/delete.php";
		break;			

	// about

	case 'about':
		require ROOT . "admin/modules/about/edit.php";
		break;

	// about->experience		

	case 'experience':
		require ROOT . "admin/modules/experience/all.php";
		break;

	case 'workplace-new':
		require ROOT . "admin/modules/experience/new.php";
		break;	

	case 'workplace-edit':
		require ROOT . "admin/modules/experience/edit.php";
		break;

	case 'workplace-delete':
		require ROOT . "admin/modules/experience/delete.php";
		break;		

	// settings 

	case 'settings':
		require ROOT . "admin/modules/settings/settings.php";
		break;	

	// users 

	case 'users':
		require ROOT . "admin/modules/users/all.php";
		break;	

	case 'user-delete':
		require ROOT . "admin/modules/users/delete.php";
		break;					

	// etc 	

	default:
		require ROOT . "admin/modules/main/main.php";
		break;
}

?>
