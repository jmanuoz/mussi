<?php
/*
|--------------------------------------------------------------------------
| Instagram
|--------------------------------------------------------------------------
|
| Instagram client details
|
*/

$config['instagram_client_name']	= 'Monteagudo';//Your App Name
$config['instagram_client_id']		= 'eefdd231eb414feb91385eef7faddc75';//Your Client ID
$config['instagram_client_secret']	= '7feb8ace331743a188ac5f1bd5452241';//Your Secret Key
$config['instagram_callback_url']	= 'http://localhost/mussi/Redes/get_code_insta';//e.g. http://yourwebsite.com/authorize/get_code/
$config['instagram_website']		= 'http://localhost/mussi';//e.g. http://yourwebsite.com/
$config['instagram_description']	= 'instagram';//Your App Description
	
/**
 * Instagram provides the following scope permissions which can be combined as likes+comments
 * 
 * basic - to read any and all data related to a user (e.g. following/followed-by lists, photos, etc.) (granted by default)
 * comments - to create or delete comments on a user’s behalf
 * relationships - to follow and unfollow users on a user’s behalf
 * likes - to like and unlike items on a user’s behalf
 * 
 */
$config['instagram_scope'] = 'basic';

// There was issues with some servers not being able to retrieve the data through https
// If you have this problem set the following to FALSE 

$config['instagram_ssl_verify']		= TRUE;