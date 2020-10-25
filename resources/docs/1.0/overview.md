# Visão Geral


##Versionamento
Foi utilizado o GIT FLOW WORKFLOW para o fluxo de trabalho Git, este auxilia muito no gerenciamento das branchs, automatizando a forma de trabalho ideal no momento de criação de: features, hotfixes e releases.

Segue alguns exemplos de comandos:
```php
git flow init
git flow feature start  <nome>
git flow feature finish  <nome>
git flow release start <version>
npm run production
git flow release finish <version>
```


## Biblioteca LaraCipe

Para a documentação da regra de negócio foi proporcionada pela biblioteca chamada `LaRecipe` . O `LaRecipe` é simplesmente um pacote orientado a código que fornece uma maneira fácil de criar uma documentação bonita para seu projeto dentro do aplicativo Laravel. A documentação da API foi utilizado o `L5-Swagger`,  para ver a documentação completa da API clique <a href="/consultorio/public/api/documentation" target="_blank">Api Documentation</a>

<br>

Antes de avançar segue algumas teclas de atalho que podem ser utilizados na documentação:



| Tecla  | 			Ação			    |
|   :-   |  :  							|
|   /    |  Expande barra navegação  	|
|   s 	 |  Expande barra de pesquisa   |
|   t    |  Rolagem para cima  			|
|   b  	 |  Rolagem para baixo  		|

## ROTAS APIs
Uma rota de api foi criada, `doctor`  que retorna todos os médicos cadastrados no sistema. Para ver a documentação completa da API clique <a href="/consultorio/public/api/documentation" target="_blank">Api Documentation</a>

```php
Route::get('doctor', [App\Http\Controllers\ApiController::class, 'doctor']);