<h1 align="center">Poc para desenvolvimento API TeraByte</h1>

## Descrição do Projeto
<p dir="auto">Esse template foi construido baseado em boas práticas e conceitos que trazem eficiência na hora de codificar e na sua manutenção. Nosso objetivo foi deixar fácil de se implementar o certo e dificil de se implementar o errado.

Nosso propósito foi desenvolver um template que aceita fácil a Mudança onde caso ocorra, não necessite alteração em inumeras outras partes do sistema que não fazem parte do contexto da mudança. Robustez caso uma alteração seja feita não quebre outras partes do sistema inesperadamente. E por último Mobilidade o sistema porporciona fácil reutilização de suas features/camadas, como o software é sempre evolutivo esse ponto é crucial para a facilidade da sua progressão.

Foi proposto para uma resolução genérica, caso seu projeto necessite de uma estrutura específica que o template não proporcione fique a vontade em adicionar</p>

### Pré-requisitos

Antes de começar, você vai precisar ter instalado em sua máquina as seguintes ferramentas:
[Git](https://git-scm.com), [Docker](https://www.docker.com/). 
Além disto é bom ter um editor para trabalhar com o código como [VSCode](https://code.visualstudio.com/)

### 🎲 Rodando o Back End (servidor)

```bash
# Clone este repositório
$ git clone <https://github.com/tcommerce/layoutbase-api.git >

# Acesse a pasta do projeto no terminal/cmd
$ cd layoutbase

```

<h1 align="center">
    🚀  Rodando Ambiente
</h1>
<p align="left">
    Copiar .env.example e renomiar para .env 
    alterar variaveis de ambiente para acessar banco de dados local 
<ul>
    <li>DB_CONNECTION=mysql</li>
    <li>DB_HOST=db_micro_01</li>
    <li>DB_PORT=3306</li>
    <li>DB_DATABASE=backoffice</li>
    <li>DB_USERNAME=admin</li>
    <li>DB_PASSWORD=admin</li>
</ul>
    <li>IMPORTANTE VERIFICAR SE PORT ESTÁ SENDO USADO EM ALGUM OUTRO SERVIÇO LOCAL</li>

caso erro ocorra alterar no arquivo 

docker-compose.yml

ports:
  - 3306:3306

e atualizar a porta no arquivo .env </p>




```bash

# Instale as dependências
$ docker-compose up -d --build 

# Entrar na imagem como bash
$ docker-compose exec micro_01 bash 

# Executar composer instalar dependências do projeto
$ composer install

# Gerar key laravel
$ php artisan key:generate

# Gerar migrations 
$ php artisan migrate

# O servidor inciará na porta:8000 - acesse <http://localhost:8000>


```

### 🛠 Tecnologias

As seguintes ferramentas foram usadas na construção do projeto:

- [Laravel](https://laravel.com/docs)
- [Docker](https://www.docker.com/)
- [PHP](https://www.php.net/)

<h1 align="center"> 
	🚧  Padrões e princípios utilizados  🚧
</h1>

<p dir="auto">Todos os padrões e princípios tiveram sua importância para montar um template de fácil manutenção e implementação de novas features, segregando suas responsabilidades deixando o projeto com alta coesão e baixo aclopamento.</p>

<h3> Solid </h3>

<p dir="auto">
    SOLID é um acrônimo para os 5 princípios da programação orientada a objetos e design de código teorizados por Robert C. Martin (Tio Bob): Single responsability; Open-closed; Liskov substitution; Interface segregation; Dependency inversion.

    "Os princípios SOLID não são regras. Eles não são leis. Eles não são verdades perfeitas. São declarações na ordem de "Uma maçã por dia mantém o médico longe." Este é um bom princípio, é um bom conselho, mas não é uma verdade pura, nem uma regra.” - Tio Bob
</p>
<h4 align="left">
    <a href="https://dev.to/thiagoluna/solid-no-laravel-aplicando-principios-e-boas-praticas-para-entregar-melhores-solucoes-1ogh">🔗 Solid Leia Sobre</a>
</h4>

<h3> Repository Pattern </h3>
<p dir="auto">
O Repository Pattern é um padrão de projeto bastante utilizado quando precisamos separar a camada de acesso aos dados da camada de regras de negócios de uma aplicação (conhecida também como camada de domínio).

Com a utilização desse padrão, toda lógica relacionada com o acesso aos dados é encapsulada e as entidades da camada de domínio não são impactadas pela forma com que os dados são armazenados e isso traz alguns benefícios como:

Evita códigos duplicados;
Diminui o acoplamento de responsabilidades nas classes;
Impulsiona o uso da injeção de dependência;
Permite trocar a forma como armazenamos os dados sem afetar todo o sistema;
Facilita na criação de testes unitários;
</p>
<h4 align="left">
    <a href="https://www.twilio.com/blog/repository-pattern-in-laravel-application">🔗 Repository Leia Sobre</a>
</h4>

<h3> Service Pattern </h3>
<p dir="auto">
Um serviço aplica a lógica de negócios do seu aplicativo. Ele simplesmente executa uma tarefa definida (por exemplo, calcular um empréstimo, atualizar um usuário) usando as informações fornecidas, usando quaisquer repositórios ou outras classes que você criou fora do serviço.
</p>
<h4 align="left">
    <a href="https://joe-wadsworth.medium.com/laravel-repository-service-pattern-acf50f95726">🔗 Service Layer Leia Sobre</a>
</h4>






