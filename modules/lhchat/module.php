<?php

$Module = array( "name" => "Chat Override",
				 'variable_params' => true );

$ViewList = array();

$ViewList['getstatus'] = array(
    'params' => array(),
    'uparams' => array('ua','ma','inscricaoid','disciplinaid','operator','theme','priority','disable_pro_active','click','position','hide_offline','check_operator_messages','top','units','leaveamessage','department','identifier','survey','dot'),
	'multiple_arguments' => array ( 'department', 'ua' )
);


$ViewList['startchat'] = array (
    'params' => array(),
    'uparams' => array('ua','inscricaoid','disciplinaid','switchform','operator','theme','er','vid','hash_resume','sound','hash','offline','leaveamessage','department','priority','chatprefill','survey','prod','phash','pvhash','ajaxmode'),
	'multiple_arguments' => array ( 'department', 'ua', 'prod' )
);

$ViewList['chatwidget'] = array (
    'params' => array(),
    'uparams' => array('ua','switchform','inscricaoid','disciplinaid','operator','theme','vid','sound','hash','hash_resume','mode','offline','leaveamessage','department','priority','chatprefill','survey','sdemo','prod','phash','pvhash','fullheight','ajaxmode'),
	'multiple_arguments' => array ( 'department', 'ua', 'prod' )
);

$FunctionList['use'] = array('explain' => 'Allow operator to save a chat');

?>