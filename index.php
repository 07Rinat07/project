<?php

require_once "config.php";
require_once "db.php";
require_once ROOT . "libs/functions/functions.php";

$_SESSION['errors'] = array();
$_SESSION['success'] = array();

session_start();

/* ..........................................

РОУТЕР // ROUTE - МАРШРУТ

............................................. */

$uriModule = getModuleName();
$uriGet = getUriGet();
$uriGetCat = getUriGetCat();

require ROOT . "modules/settings/settings.php";
require ROOT . "modules/admin-panel/admin-panel.php";
require ROOT . "modules/cart/usercart.php";

// Роутер
switch ( $uriModule ) {
	
	case '':
		require ROOT . "modules/main/main.php";
		break;

	// login & registration

	case 'login':
		require ROOT . "modules/login/login.php";
		break;

	case 'registration':
		require ROOT . "modules/login/registration.php";
		break;

	case 'logout':
		require ROOT . "modules/login/logout.php";
		break;		

	case 'lost-password':
		require ROOT . "modules/login/lost-password.php";
		break;

	case 'set-new-password':
		require ROOT . "modules/login/set-new-password.php";
		break;

	// profile

	case 'profile':
		require ROOT . "modules/profile/profile.php";
		break;

	case 'profile-edit':
		require ROOT . "modules/profile/edit.php";
		break;

	// about

	case 'about':
		require ROOT . "modules/about/about.php";
		break;

	// portfolio

	case 'portfolio':

		if ( isset($uriGet) && !empty(intval($uriGet)) ) {
			require ROOT . "modules/portfolio/project.php";
		
		} elseif ( isset($_GET['tag']) && !empty($_GET['tag']) ) {
			require ROOT . "modules/portfolio/tag.php";

		} else {
			require ROOT . "modules/portfolio/all.php";
		}

		break;

	// blog

	case 'blog':
		
		if ( isset($uriGet) && $uriGet === 'cat' && !empty($uriGetCat) ) {
			require ROOT . "modules/blog/category.php";
		
		} elseif ( isset($uriGet) && !empty(intval($uriGet)) ) {
			require ROOT . "modules/blog/post.php";
		
		} else {
			require ROOT . "modules/blog/all.php";
		}
		
		break;

	case 'add-comment':
		require ROOT . "modules/blog/add-comment.php";
		break;	

	// shop

	case 'shop':

		if ( isset($uriGet) && !empty(intval($uriGet)) ) {
			require ROOT . "modules/shop/product.php";
		
		} else {
			require ROOT . "modules/shop/all.php";
		}
		
		break;

	// cart

	case 'cart':
		require ROOT . "modules/cart/cart.php";
		break;	

	case 'add-to-cart':
		require ROOT . "modules/cart/add-to-cart.php";
		break;		

	case 'remove-from-cart':
		require ROOT . "modules/cart/remove.php";
		break;	

	// orders

	case 'new-order':
		require ROOT . "modules/orders/new.php";
		break;		

	case 'order-created':
		require ROOT . "modules/orders/created.php";
		break;	

	// contacts	

	case 'contacts':
		require ROOT . "modules/contacts/contacts.php";
		break;	

	// other
	
	default:
		echo "404";
		break;
}

?>
