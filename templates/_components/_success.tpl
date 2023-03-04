<?php 
if ( !empty($_SESSION['success']) ) :
	foreach ( $_SESSION['success'] as $success_msg ) :
		if ( count($success_msg) == 1 ) { 
?>
			<div class="notifications mb-20">
				<div class="notifications__title notifications__title--success"><?=$success_msg['title']?></div>
			</div>
<?php 
		} else if ( count($success_msg) == 2 ) : 
?>
			<div class="notifications mb-20 notifications__title--with-message">
				<div class="notifications__title notifications__title--success"><?=$success_msg['title']?></div>
				<div class="notifications__message"><?=$success_msg['desc']?></div>
			</div>
<?php
		endif; 
	endforeach;

	$_SESSION['success'] = array();
	
endif;
?>