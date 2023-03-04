<?php 

$pageTitle = 'Редактировать профиль | ' . $settings['site_title'];

$_POST = array_map('trim', $_POST);
$_POST = array_map('htmlentities', $_POST);

function updateUserAndGoToProfile($user){

	// Проверить поля на заполненность
	if ( isset($_POST['update-profile']) ) {

		if ( $_POST['name'] == '' ) {
			$_SESSION['errors'][] = ['title' => "Введите имя"];	
		}

		if ( $_POST['surname'] == '' ) {
			$_SESSION['errors'][] = ['title' => "Введите фамилию"];	
		}

		if ( $_POST['email'] == '' ) {
			$_SESSION['errors'][] = ['title' => "Введите e-mail"];	
		}

		if ( empty($_SESSION['errors']) ) {
			$user->name = $_POST['name'];
			$user->surname = $_POST['surname'];	
			$user->email = $_POST['email'];	
			$user->city = $_POST['city'];	
			$user->country = $_POST['country'];	
		}

		if ( isset($_POST['delete-avatar']) && $_POST['delete-avatar'] === 'on' ) {

			$avatarFullUrl = ROOT . 'usercontent/avatars/' . $user->avatar;
			$avatarSmallUrl = ROOT . 'usercontent/avatars/' . $user->avatarSmall;

			if (file_exists($avatarFullUrl)) unlink($avatarFullUrl);
			if (file_exists($avatarSmallUrl)) unlink($avatarSmallUrl);	

			$user->avatar = null;
			$user->avatarSmall = null;

		} else {

			if ( isset($_FILES['avatar']['name']) && $_FILES['avatar']['tmp_name'] !== '' ) {

				$avatarFileName = saveUploadedImg('resize_and_crop','avatar', [160, 160], 4, 'avatars', [160, 160], [48, 48]);

				if ( $avatarFileName !== false ) {
					if ( !empty($user->avatar) ) {
						$avatarFullUrl = ROOT . 'usercontent/avatars/' . $user->avatar;
						$avatarSmallUrl = ROOT . 'usercontent/avatars/' . $user->avatarSmall;

						if (file_exists($avatarFullUrl)) unlink($avatarFullUrl);
						if (file_exists($avatarSmallUrl)) unlink($avatarSmallUrl);
					}

					$user->avatar = $avatarFileName[0];
					$user->avatarSmall = $avatarFileName[1];
				}
			}	
		}

		if ( empty($_SESSION['errors']) ) {	
			R::store($user);
			if ( $user->id === $_SESSION['logged_user']['id'] ) {
				$_SESSION['logged_user'] = $user;
			}
			$_SESSION['success'][] = ['title' => "Данные успешно отредактированы"];	
			header('Location: ' . HOST . 'profile/' . $user->id);	
			exit();	
		}
	}
}

if ( isset($_SESSION['login']) && $_SESSION['login'] === 1 ) {
	if ( $_SESSION['logged_user']['role'] === 'user' ) {
		$user = R::load('users', $_SESSION['logged_user']['id']);
		updateUserAndGoToProfile($user);

	} else if ( $_SESSION['logged_user']['role'] === 'admin' ) {
		if ( isset($uriGet) ) {
			$user = R::load('users', intval($uriGet));
			updateUserAndGoToProfile($user);	
		}

	} else {
		header('Location: ' . HOST . 'login');
		exit();
	}
}

include ROOT . "templates/_parts/_head.tpl";
include ROOT . "templates/_parts/_header.tpl";
include ROOT . "templates/profile/profile-edit.tpl";
include ROOT . "templates/_parts/_footer.tpl";
include ROOT . "templates/_parts/_foot.tpl";

?>