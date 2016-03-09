<?php 
return array(
    'chat_dep' => 2,
    'host' => 'http://localhost:3000/api/chat',
/**
 * Chat data
 * */
    
    /**
     * titulo da exportação  ( pode ser alterado a vontade)
     * */
    'title' => 'Solicitação de tutoria: {nick}-{cpf}-{curso}',        
    
/**
 * Message template ( pode ser alterado a vontade)
 * */
    'message' => 
    'Chat ID - {id}<br />
    Aluno - {nick}<br />
    Cpf - {cpf}<br />
    E-mail - {email}<br />
    Curso - {curso}<br />
    Data/hora do Chat - {time_created_front}<br /><br />   
    //---------------//<br />
    Referente<br />
    {referrer}<br /><br />
        
    //---------------//<br />
    Chat log<br />
    {messages}<br /><br />
    //----------------//<br />
    informações adicionaris do chat<br />
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