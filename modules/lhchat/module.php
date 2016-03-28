<?php

$Module = array( "name" => "Chat Override",
				 'variable_params' => true );
$ViewList = Array();

$ViewList['startchat'] = array (
    'script' => 'startchat.php',
    'params' => array(),
    'uparams' => array('ua','usuarioid','switchform','operator','theme','er','vid','hash_resume','sound','hash','offline','leaveamessage','department','priority','chatprefill','survey','prod','phash','pvhash'),
	'multiple_arguments' => array ( 'department', 'ua', 'prod' )
);

$ViewList['getstatus'] = array(
    'script' => 'getstatus.php',
    'params' => array(),
    'uparams' => array('ua','ma','usuarioid','operator','theme','noresponse','priority','disable_pro_active','click','position','hide_offline','check_operator_messages','top','units','leaveamessage','department','identifier','survey','dot'),
	'multiple_arguments' => array ( 'department', 'ua' )
);

$ViewList['chatwidget'] = array (
    'script' => 'chatwidget.php',
    'params' => array(),
    'uparams' => array('ua','switchform','usuarioid','operator','theme','vid','sound','hash','hash_resume','mode','offline','leaveamessage','department','priority','chatprefill','survey','sdemo','prod','phash','pvhash'),
	'multiple_arguments' => array ( 'department', 'ua', 'prod' )
);
?>