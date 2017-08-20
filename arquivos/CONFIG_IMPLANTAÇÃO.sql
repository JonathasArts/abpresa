=====================================================================
/*---------------*/ CONFIGURAÇÃO PARA IMPLANTAÇÃO /*---------------*/
=====================================================================

Instalar os softwares:
> XAMP 7.1.6
> PostgreSQL 9.4

---------------------------------------------------------------------
						INSTALAÇÃO DO SLIM PHP
---------------------------------------------------------------------
1 - No XAMP, edite o arquivo do apache (no botão 'config'), o arquivo 
php.ini removendo o ';' nas linhas:

	extension=php_openssl.dll,
	extension=php_curl.dll,
	extension=php_sockets.dll

2 - Faça o download e instale o Composer-Setup.exe 
	https://getcomposer.org/Composer-Setup.exe);

3 - Clone o projeto no diretório 'htdocs' do XAMP em C:\xampp\htdocs;
	projeto: https://github.com/JonathasArts/abpresa

4 - Crie um novo banco no postgreSQL com o nome 'bd_abpresa' e usuario 
'postgres' e senha 'postgres'.
	/*(OBS. Esses dados são provisórios, para modificar os dados do 
	banco basta editar o arquivo init.php na raiz da aplicação);*/

5 - Rode os scripts de criação e insert dos dados nas tabelas no 
Banco criado (abpresa). Os scripts estão no diretório do projeto 
abpresa\arquivos\BD\Script_BDabpresa.sql;

6 - Inicie o apache no XAMP e acesse o projeto em 
http://localhost/abpresa/;

7 - Pronto! :).


---------------------------------------------------------------------
							DOCUMENTAÇÃO
---------------------------------------------------------------------
SLIM PHP 	==> https://www.slimframework.com/
COMPOSER 	==> https://getcomposer.org/download/
POSTGRESQL 	==> https://www.postgresql.org/
XAMP 		==> https://www.apachefriends.org/pt_br/index.html
---------------------------------------------------------------------
---------------------------------------------------------------------