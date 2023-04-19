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
	🚧  Padrões/Camadas e princípios utilizados  🚧
</h1>

<p dir="auto">Todos os padrões e princípios tiveram sua importância para montar um template de fácil manutenção e implementação de novas features, segregando suas responsabilidades deixando o projeto com alta coesão e baixo aclopamento.</p>

<h3> Solid </h3>

<p dir="auto">
    SOLID é um acrônimo para os 5 princípios da programação orientada a objetos e design de código teorizados por Robert C. Martin (Tio Bob): Single responsability; Open-closed; Liskov substitution; Interface segregation; Dependency inversion.

    "Os princípios SOLID não são regras. Eles não são leis. Eles não são verdades perfeitas. São declarações na ordem de "Uma maçã por dia mantém o médico longe." Este é um bom princípio, é um bom conselho, mas não é uma verdade pura, nem uma regra.” - Tio Bob
</p>
<h4 align="left">
    <a href="https://dev.to/thiagoluna/solid-no-laravel-aplicando-principios-e-boas-praticas-para-entregar-melhores-solucoes-1ogh" target="_blank" >🔗 Solid Leia Sobre</a>
</h4>
<h3> Validation com Form Request </h3>
<p dir="auto">
    As vezes a validação é bem mais complexa ou o seu formulário tem muitos campos, nesse caso, usar o Form Request faz bem mais sentido.
    As Form Request são classes de requests personalizadas que encapsulam sua própria lógica de validação e autorização.
</p>
<h4 align="left">
    <a href="https://blog.debugeverything.com/pt/laravel-validation-com-form-request/" target="_blank" >🔗 From Request Leia Sobre</a>
</h4>

<h3> API Resource </h3>
<p dir="auto">
    O API Resource é uma camada extra que usamos na API para transformar os dados que vamos enviar ao cliente. Ela permite que a estrutura de retorno seja totalmente personalizada, isso nos permite formatar os dados na melhor maneira para entregar ao cliente. Além de garantir o desacoplamento com o model, uma vez que podemos definir a estrutura de forma separada. O conceito da camada de transformação não é exclusividade do Laravel. Inclusive no próprio PHP temos algumas outras bibliotecas que facilitam esse trabalho, uma das mais conhecidas é o Fractal. O API Resource do Laravel facilita bastante a vida quando estamos dentro do Framework, mas também é possível utilizar qualquer outra biblioteca.
</p>
<h4 align="left">
    <a href="https://www.treinaweb.com.br/blog/como-melhorar-o-retorno-das-suas-apis-no-laravel-com-api-resource-do-eloquent" target="_blank" >🔗 API Resource Leia Sobre</a>
</h4>

<h3> Service Pattern </h3>
<p dir="auto">
Um serviço aplica a lógica de negócios do seu aplicativo. Ele simplesmente executa uma tarefa definida (por exemplo, calcular um empréstimo, atualizar um usuário) usando as informações fornecidas, usando quaisquer repositórios ou outras classes que você criou fora do serviço.
</p>
<h4 align="left">
    <a href="https://joe-wadsworth.medium.com/laravel-repository-service-pattern-acf50f95726" target="_blank" >🔗 Service Layer Leia Sobre</a>
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
    <a href="https://www.twilio.com/blog/repository-pattern-in-laravel-application" target="_blank" >🔗 Repository Leia Sobre</a>
</h4>

<h3> Models/Entidades</h3>
<p dir="auto">
O Eloquent ORM incluido com o Laravel fornece uma bonita, e simples implementação ActiveRecord para trabalhar com o seu banco de dados. Cada trabala do banco de dados tem a um "Modelo" correspondente que é usado para interagir com determinada tabela.
</p>
<h4 align="left">
    <a href="https://laravel-docs-pt-br.readthedocs.io/en/latest/eloquent/" target="_blank" >🔗 Models Leia Sobre</a>
</h4>


<h3> PhpUnit</h3>
<p dir="auto">
PHPUnit é um dos mais antigos e conhecidos pacotes de testes unitários para PHP. Ele é projetado principalmente para testes unitários, o que significa testar seu código nos menores componentes possíveis, mas também é incrivelmente flexível e pode ser usado para muito mais do que apenas testes unitários.
</p>
<h4 align="left">
    <a href="https://imasters.com.br/back-end/phpunit-no-laravel-parte-01">🔗 Models Leia Sobre</a>
</h4>




