![IFPB Logo](http://joaopessoa.ifpb.edu.br/horario/imagens/logo_campus.png)

#### **Este repositório faz parte do Projeto "Ambiente de Boas Práticas Reconfiguráveis em Engenharia de Software".**####

Este projeto faz parte do **Grupo de Pesquisa em Engenharia de Software do IFPB**, Campus João Pessoa.

* **Objetivo do Projeto:** Definir e desenvolver uma nova versão do ambiente virtual inovador de boas
práticas reconfiguráveis de ES para cenários específicos de projetos de software.

* **Membros do GPES:**
    - **Docentes:**
        

        DSc. Heremita Brasileiro Lira
        
        DSc. Francisco Petrônio Alencar de Medeiros
        
        DSc. Juliana Dantas Ribeiro Viana de Medeiros
        
        MSc. Nadja da Nóbrega Rodrigues
        
        MSc. Carlos Diego Quirino Lima
        
    - **Discentes:**
        
        Alber Jonathas Nunes Paz

        Alexandre Dias Sales de Morais
        
        Ana Karina de Melo Pedrosa Dunning

        Helder Jerônimo Leite Rangel

        Jonathas Arestides de Almeida

        Marianna Soares Veríssimo

        Matheus Augusto Coutinho Costa
        
        Rayssa Mª Santos de Freitas

        Samyra Lara Ferreira de Almeida

        Sérgio Campos da Silva

        Thuany Alves Gomes da Silva
        
        Tiago Cesário Barbosa.   

______________________________________________________________________

####**Como implantar o ambiente:**

Instalar os softwares:

    - XAMP 7.1.6
    
    - PostgreSQL 9.4

 **Instalação do Slim PHP**

1. No XAMP, edite o arquivo do apache (no botão 'config'), o arquivo 
php.ini removendo o ';' nas linhas:

	extension=php_openssl.dll,
	
	extension=php_curl.dll,
	
	extension=php_sockets.dll
	
4. Faça o download e instale o Composer-Setup.exe 
	https://getcomposer.org/Composer-Setup.exe);

5. Clone o projeto no diretório 'htdocs' do XAMP em C:\xampp\htdocs;
	projeto: https://github.com/JonathasArts/abpresa

6. Crie um novo banco no postgreSQL com o nome 'bd_abpresa' e usuario  'postgres' e senha 'postgres'.
	/*(OBS. Esses dados são provisórios, para modificar os dados do 
	banco basta editar o arquivo init.php na raiz da aplicação);*/

7. Rode os scripts de criação e insert dos dados nas tabelas no 
Banco criado (abpresa). Os scripts estão no diretório do projeto 
abpresa\arquivos\BD\Script_BDabpresa.sql;

8. Inicie o apache no XAMP e acesse o projeto em 
http://localhost/abpresa/;

9. Pronto!  :).


**Documentação**

SLIM PHP 	==> https://www.slimframework.com/

COMPOSER 	==> https://getcomposer.org/download/

POSTGRESQL 	==> https://www.postgresql.org/

XAMP 		==> https://www.apachefriends.org/pt_br/index.html

--------------------------------------------------------------------
