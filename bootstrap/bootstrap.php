<?php 
class erLhcoreClassExtensionExportarchat {
    
    private $configData = false;
    
	public function __construct() {
		
	}
	
	public function run(){		
        
        $this->registerAutoload ();

		$dispatcher = erLhcoreClassChatEventDispatcher::getInstance();
		
		// Attatch event listeners
		$dispatcher->listen('chat.close',array($this,'chatClosed'));						
	}  
    
    public function registerAutoload() {
        spl_autoload_register ([$this,'autoload'] );
    }
    public function autoload($className) {
        $classesArray = array (
            'erLhcoreClassModelChat' => 'extension/exportarchat/classes/erlhcoreclassmodelchat.php', 
            'erLhcoreClassChat' => 'extension/exportarchat/classes/lhchat.php'
        );
    
        if (key_exists ( $className, $classesArray )) {
            include_once $classesArray [$className];
        }
    }

    public function getConfig()
    {
        if ($this->configData === false) {
            $this->configData = include('extension/exportarchat/settings/settings.ini.php');
        }
    }

	public function sendRequest($datachatresponse)
    {
        $this->getConfig();        
        $ch = curl_init();
        $url =  $this->configData['host'];
        curl_setopt($ch, CURLOPT_URL, $url);
        curl_setopt($ch, CURLOPT_POST, 1);
        curl_setopt($ch, CURLOPT_POSTFIELDS,json_encode($datachatresponse));
        curl_setopt($ch, CURLOPT_HTTPHEADER, array('Content-Type: application/json'));        
        curl_setopt($ch, CURLOPT_FOLLOWLOCATION, FALSE);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, TRUE);

        $result = curl_exec($ch);      
        if ($result === false) {
            throw new Exception(curl_error($ch), curl_errno($ch));
        }

        curl_close($ch);
                
        return (int)$result; 
    }
    
	public function chatClosed($params) 
    {    
        $this->getConfig();
        $chat = $params['chat'];
        if (isset( $this->configData['chat_dep']) && !empty( $this->configData['chat_dep'])){
            if($chat->dep_id == $this->configData['chat_dep']){
                $currentUser = erLhcoreClassUser::instance();

                $userData = $currentUser->getUserData(true);
                // Format message content
                $this->sendRequest($this->fillDataByChat($chat));  
            }
        }
        return array('chat' => & $chat, 'user_data' => $userData);      
	}    
   
    // preenche dados do formulário
    public function fillDataByChat($chat)
    {  
        $this->getConfig();
        
        $messages = array_reverse(erLhcoreClassModelmsg::getList(array(
            'limit' => 5000,
            'sort' => 'id DESC',
            'filter' => array(
                'chat_id' => $chat->id
            )
        )));
        
        $messagesContent = '';
        foreach ($messages as $msg) {
            if ($msg->user_id == - 1) {
                $messagesContent .= date(erLhcoreClassModule::$dateDateHourFormat, $msg->time) . ' ' . erTranslationClassLhTranslation::getInstance()->getTranslation('chat/syncadmin', 'System assistant') . ': ' . htmlspecialchars($msg->msg) . "<br />";
            } else {
                $messagesContent .= date(erLhcoreClassModule::$dateDateHourFormat, $msg->time) . ' ' . ($msg->user_id == 0 ? htmlspecialchars($chat->nick) : htmlspecialchars($msg->name_support)) . ': ' . htmlspecialchars($msg->msg) . "<br />";
            }
        }
        
        $data = array(
            'name' => $chat->nick,
            'email' => $chat->email,
            'inscricaoid' => $chat->inscricaoid,
            'disciplinaid' => $chat->disciplinaid,
            'subject' => str_replace(array(
                '{referrer}',
                '{nick}',
                '{email}',
                '{country_code}',
                '{country_name}',
                '{city}',
                '{user_tz_identifier}'
            ), array(
                $chat->referrer,
                $chat->nick,
                $chat->email,
                $chat->country_code,
                $chat->country_name,
                $chat->city,
                $chat->user_tz_identifier
            ), $this->configData['subject']
            ),
            'message' => str_replace(array(
                '{time_created_front}',
                '{additional_data}',
                '{id}',
                '{url}',
                '{referrer}',
                '{messages}',
                '{remarks}',
                '{nick}',
                '{email}',
                '{country_code}',
                '{country_name}',
                '{city}',
                '{user_tz_identifier}'
            ), array(
                date(erLhcoreClassModule::$dateDateHourFormat,$chat->time),
                $chat->additional_data,
                $chat->id,
                (erLhcoreClassSystem::$httpsMode == true ? 'https://' : 'http://') . $_SERVER['HTTP_HOST'] . erLhcoreClassDesign::baseurl('user/login') . '/(r)/' . rawurlencode(base64_encode('chat/single/' . $chat->id)),
                $chat->referrer,
                $messagesContent,
                $chat->remarks,
                $chat->nick,
                $chat->email,
                $chat->country_code,
                $chat->country_name,
                $chat->city,
                $chat->user_tz_identifier
            ), $this->configData['message']),
            'ip' => $chat->ip
        );
        
        return $data;
    }
}


