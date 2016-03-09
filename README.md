Exportar Chat
==============
## Sobre
extensão do live helper chat para exportar um chat ao fecha-lo. 
## LHC
baseado nas extensões existentes do live helper chat; https://github.com/remdex/livehelperchat

## Como Utilizar

* incluir a pasta exportarchat dentro da pasta extensions do live helper chat.
    * pode ser feito atraves de linhas de comando do git ( git clone https://github.com/FabricioK/exportarchat.git )
* adicionar o módulo exportarchat as extensões no arquivo system.ini.php do live helper chat.
    * :  'extensions' => 
      array (
          0 => 'exportarchat'
      )
      
 ## Bitnami
 existe um erro conhecido conforme postagem no forum: https://forum.livehelperchat.com/viewtopic.php?pid=5156#p5156
 segue correção para o problema de configuração no bitnami -> https://wiki.bitnami.com/Applications/Bitnami_Live_Helper_Chat#How_to_enable_framing_in_your_domain