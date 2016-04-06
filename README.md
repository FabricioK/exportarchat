Exportar Chat
==============
## Sobre
extensão do live helper chat para exportar um chat ao fecha-lo. 
## LHC
baseado nas extensões existentes do live helper chat; https://github.com/remdex/livehelperchat

## Como Utilizar
* criar o departamento para os tutores ( o id dele deve ser adicionado posteriormente ao arquivo conforme descrito abaixo )

* adicionar os campos inscricaoid e disciplinaid na tabela lh_chat

    ALTER TABLE `lh_chat` ADD `inscricaoid` INT(11) NULL DEFAULT NULL ;
    
    ALTER TABLE `lh_chat` ADD `disciplinaid` INT(11) NULL DEFAULT NULL ;


* incluir a pasta exportarchat dentro da pasta extensions do live helper chat.
    * pode ser feito atraves de linhas de comando do git ( git clone https://github.com/FabricioK/exportarchat.git )
    
* alterar o arquivo de settings da extensão "livehelperchat\htdocs\extension\exportarchat\settings\system.ini.php".
    'chat_dep' => Id_Do_Departamento,
    'host' => 'https://Url_do_Site.com/Caminho',
    
* adicionar o módulo exportarchat as extensões no arquivo "livehelperchat\htdocs\settings\system.ini.php".
    * :  'extensions' => 
      array (
          0 => 'exportarchat'
      )
* adicionar as seguintes classes ao array do arquivo "var\autoloads\lhextension_autoload.php" .
    * : return array(	
        'erLhcoreClassModelChat' => 'extension/exportarchat/classes/erlhcoreclassmodelchat.php',
        'erLhcoreClassChat' => 'extension/exportarchat/classes/lhchat.php',
    );
    
* limpar o cache do livehelper

 ## Bitnami
 existe um erro conhecido conforme postagem no forum: https://forum.livehelperchat.com/viewtopic.php?pid=5156#p5156
 segue correção para o problema de configuração no bitnami -> https://wiki.bitnami.com/Applications/Bitnami_Live_Helper_Chat#How_to_enable_framing_in_your_domain