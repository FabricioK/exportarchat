<?php 
return array(
    'chat_dep' => 2,
    'host' => 'http://localhost:3000/api/chat',        
    'throw_exceptions' => false,        // Set to true while debuging
    'create_duplicate_issues' => false, // If chat was already created on osTicket we won't create an issue again
    'createissuecallbacks' => array (
        'chat_close'        => true,    // Create issue automatically then chat is closed
        'offline_request'   => true,    // Create issue automatically then offline request is send from user
        //'chat_create'       => true,    // Create issue automatically then chat is created
    ),
    
/**
 * Issue from chat data
 * */
    
    /**
     * Subject for osTicket
     * */
    'subject' => 'New ticket from LHC {nick} {email} {country_code} {country_name} {city} {user_tz_identifier}',        
    
/**
 * Message template for osTicket if ticket are created from chat
 * */
    'message' => 
    'Chat ID - {id}<br />
    User nick - {nick}<br />,
    User e-mail - {email}<br />,
    User time zone - {user_tz_identifier}<br />
    Chat was created at - {time_created_front}<br /><br />
        
    //---------------//<br />
    URL to view a chat (url provided if chat exists)<br />
    {url}<br /><br />
        
    //---------------//<br />
    Referer<br />
    {referrer}<br /><br />
        
    //---------------//<br />
    Chat log<br />
    {messages}<br /><br />
        
    //---------------//<br />
    Operator remarks<br />
    {remarks}<br />
    //----------------//<br />
    User geo data:<br />
    Country code - {country_code} {country_name} {city}<br />
    //----------------//<br />
    Additional chat data<br />
    {additional_data}',
        
    /**
    * Message template for osTicket if ticket are created from offline request
    * */
    'message_offline' => 
    'User nick - {nick}<br />
    User e-mail - {email}<br />
    Processed at - {time_created_front}<br />
    //---------------//<br />
    Referer<br />
    {referrer}<br /><br />
        
    //---------------//<br />
    User message<br />
    {message}<br /><br />
        
    //----------------//<br />
    User geo data:<br />
    Country code - {country_code} {country_name} {city}<br />
    //----------------//<br />
    Additional data<br />
    {additional_data}<br />'
        
    
);
?>