Laravel Pokemon
======

Descrição
------

Projeto desenvolvido em **Laravel** utilizando a API **PokéAPI** (https://pokeapi.co/). Para a criação das views foi utlizado o Blade Template do Laravel e o **Bootstrap** e **Jquery**, você poderá listar os pokemons por paginação.

Para as requisições HTTP foi utilizado a biblioteca do **Guzzle** (https://packagist.org/packages/guzzlehttp/guzzle), e foi utilizado o design pattern **Repository**. Aproveitando para o reaproveitamento de código, você pode utilizar como uma **API** onde ao invés de retornar um view retornará um **JSON** para que os dados possam ser consumidos por outras aplicações.

Instalação
------

Você precisará do **composer** e do **npm** para gerenciar as dependências.

Após clonar o projeto, instale as dependencias do **PHP** com comando:
```bash
composer install
```

Para baixar o restante das dependências **(Bootstrap, JQuery, ...)** utilize o comando:
```bash
npm install
```

E logo após utilize o comando:
```bash
npm run dev
```

Configurando as variaveis de ambiente
------

Com as dependências instaladas, você precisará configurar as suas variaveis de ambiente, para isso faça uma cópia do arquivo **.env.example** para **.env** na raiz do projeto e logo após execute o comando abaixo para criar a **APP_KEY**:
```bash
php artisan key:generate
```

Depois configure o **APP_URL** do seu servidor, por padrão é http://localhost:8000

Como usar
------

Para utilizar temos duas opções, utilizar com a view que criada ou usar a API que retornará um json e você poderá utilizar em outras aplicação se necessário.

Utilizando as view: **host:port/pokemons**

Utilizando a API:   **host:port/api/pokemons**

Por padrão, tanto nas views como na API, retornará 10 registros por página, porém você pode configurar isso nas variavéis de ambiente, basta criar uma nova chave com o valor desejado, como é mostrado abaixo:
```bash
POKEMON_LIMIT_PER_PAGE=20
```
dessa forma retornará 20 registros, você também pode alterar essa informação acessando o arquivo:
```bash
config/pokemon.php
```

### Iniciando o servidor

Para iniciar o servidor local utilize o comando:
```bash
php artisan serve
```

Documentação da API
------
https://documenter.getpostman.com/view/7272792/T1LPDSCF?version=latest

Imagens
------

Screenshots

![Alt text](https://github.com/LucasViniciusDev/laravel-pokemon/raw/master/screenshots/001.PNG "001")

![Alt text](https://github.com/LucasViniciusDev/laravel-pokemon/raw/master/screenshots/002.PNG "002")

![Alt text](https://github.com/LucasViniciusDev/laravel-pokemon/raw/master/screenshots/003.PNG "003")

Example retorno da API

![Alt text](https://github.com/LucasViniciusDev/laravel-pokemon/raw/master/screenshots/004.PNG "004")
