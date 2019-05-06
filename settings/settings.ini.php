<?php 
return array(
    'chat_dep' => 9,
    'host' => 'http://localhost:8080/ead/home/RecebeNotificacaoChatlive',
/**
 * Chat data
 * */
    
    /**
     * titulo da exportação  ( pode ser alterado a vontade)
     * */
    'title' => 'Solicitação de tutoria: {nick}',        
    
/**
 * Message template ( pode ser alterado a vontade)
 * */
    'message' => 
    'Chat ID - {id}
    Aluno - {nick}
    E-mail - {email}
    Data/hora do Chat - {time_created_front}   
    //---------------//
    Referente
    {referrer}
        
    //---------------//
    Chat log
    {messages}
    //----------------//
    informações adicionais do chat
    {additional_data}',
        
    /**
    * Message template for osTicket if ticket are created from offline request
    * */
    'message_offline' => 
    'User nick - {nick}
    User e-mail - {email}
    Processed at - {time_created_front}
    //---------------//
    User message
    {message}
        
    //----------------//
    User geo data:
    Country code - {country_code} {country_name} {city}
    //----------------//
    Additional data
    {additional_data}'
);
?>