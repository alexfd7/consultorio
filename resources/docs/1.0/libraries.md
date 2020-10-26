# Biliotecas

---

- [Bibliotecas e Recursos Utilizados](#section-1)

<a name="section-1"></a>
## Bibliotecas e Recursos Utilizados


### LARAVEL
<larecipe-card shadow>
    Utilização do framework Laravel 8.x. Para mais informações acessar <a href="https://laravel.com/docs/8.x/releases" target="_blank">aqui</a>.
</larecipe-card>
COMANDOS UTILIZADOS:

```php
composer create-project --prefer-dist laravel/laravel consultorio
composer require laravel/ui
php artisan ui bootstrap --auth
composer dump-autoload
composer install
php artisan serve --host=127.0.0.1 --port=8080
```


### MIGRATIONS
<larecipe-card shadow>
    Pra facilitar o controle de versão do seu banco de dados, permitindo que sua equipe modifique e compartilhe o esquema do banco de dados do projeto. Para mais informações acessar <a href="https://laravel.com/docs/7.x/migrations" target="_blank">aqui</a>.
</larecipe-card>
COMANDOS UTILIZADOS:

```php
php artisan make:migration
php artisan db:seed
php artisan migrate:refresh --seed
```

### BLUE PRINT
<larecipe-card shadow>

Blueprint é uma ferramenta de código aberto para gerar rapidamente vários componentes do Laravel a partir de uma única definição. 

Tendo uma boa gestão de projetos e fazendo uma boa definição do banco de dados conseguirá gerar todas as tabelas com seus relacionamentos, os controller com métodos básicos, seeders, models, views e rotas.
Para mais informações acessar <a href="https://blueprint.laravelshift.com/docs/getting-started/" target="_blank">aqui</a>.
</larecipe-card>
COMANDOS UTILIZADOS:

```php
composer require --dev laravel-shift/blueprint
php artisan blueprint:build
php artisan blueprint:erase
```



### LARECIPE
<larecipe-card shadow>    
A documentação utiliada foi proporcionada pela biblioteca chamada LaRecipe. O LaRecipe é simplesmente um pacote orientado a código que fornece uma maneira fácil de criar uma documentação bonita para seu projeto dentro do aplicativo Laravel. Para mais informações acessar <a href="https://larecipe.binarytorch.com.my/docs/2.2/overview" target="_blank">aqui</a>.
</larecipe-card>
COMANDOS UTILIZADOS:

```php
	composer require binarytorch/larecipe
	php artisan larecipe:install
```


### L5-SWAGGER
<larecipe-card shadow>
    Pacote que facilita a documentação das APIS criadas no projeto. Para mais informações acessar <a href="https://github.com/DarkaOnLine/L5-Swagger/" target="_blank">aqui</a>.
</larecipe-card>
COMANDOS UTILIZADOS:

```php
composer require "darkaonline/l5-swagger"
php artisan vendor:publish --provider "L5Swagger\L5SwaggerServiceProvider"
php artisan l5-swagger:generate
```


### OUTRAS BIBLIOTECAS LARAVEL
| Bilioteca  | 			Ação			    |
|   :-   |  :  							|
|   Tradução pt-BR    |  <a href="https://github.com/lucascudo/laravel-pt-BR-localization" target="_blank">Documentation</a>	|
|   Flash View  	 |  <a href="https://github.com/laracasts/flash" target="_blank">Documentation</a> |



### BIBLIOTECAS FRONT-END
| Bilioteca  | 			Ação			    |
|   :-   |  :  							|
|   Jquery    |  <a href="https://api.jquery.com/" target="_blank">Documentation</a>	|
|   DataTables 	 |  <a href="https://datatables.net/manual/" target="_blank">Documentation</a> |
|   SweetAlert    |  <a href="https://sweetalert.js.org/docs/" target="_blank">Documentation</a>			|
|   FontAwesome  	 | <a href="https://fontawesome.com/" target="_blank">Documentation</a>		|
|   Bootstrap  	 |  <a href="https://getbootstrap.com/docs/4.1/getting-started/introduction/" target="_blank">Documentation</a> 		|
|   AdminLte  	 |  <a href="https://adminlte.io/" target="_blank">Documentation</a> 		|
|   FullCalendar  	 |  <a href="https://fullcalendar.io/docs/getting-started" target="_blank">Documentation</a> 		|



