# Projeto BIMI

Este projeto é um sistema de atendente virtual que utiliza inteligência artificial para fornecer respostas rápidas e precisas aos usuários. O sistema é desenvolvido em Laravel para o backend e Vue 3 com Composition API para o frontend, integrado através do Inertia.js. A inteligência artificial é alimentada pelo Gemini, que permite interações avançadas e personalizadas.

<img src="https://github.com/gabrielsooliveira/projeto-bimi/resources/assets/images/Captura de tela de 2024-10-13 03-31-53.png"> 

## Requisitos

Antes de começar, certifique-se de ter as seguintes ferramentas instaladas:

- [PHP](https://www.php.net/) (versão 8.1 ou superior)
- [Composer](https://getcomposer.org/)
- [Node.js](https://nodejs.org/) (versão 16 ou superior)
- [NPM](https://www.npmjs.com/) (ou [Yarn](https://yarnpkg.com/))
- [Laravel Herd](https://herd.laravel.com/windows) (Opcional)
- [API GEMINI](https://ai.google.dev/?authuser=1)

## Configuração do Ambiente

### 1. Clonagem do Repositório

O projeto utiliza um repositório bare para controle de versão. Para clonar o repositório, siga estes passos:

1. Navegue até o diretório onde deseja clonar o projeto. No caso de um repositório bare, você pode utilizar o seguinte comando:

    ```bash
    git clone K:\<diretorio-existente>
    ```

2. Navegue até o diretório do projeto clonado:

    ```bash
    cd <diretorio-destino>
    ```
3. Adicione o comando caso necessario para segurança:

    ```bash
    git config --global --add safe.directory K:/<diretorio-existente>
    ```

### 2. Instalação das Dependências

Instale as dependências do Laravel e do Vue.js com os seguintes comandos:

1. Instale as dependências do backend (Laravel):

    ```bash
    composer install
    ```

2. Instale as dependências do frontend (Vue.js):

    ```bash
    npm install
    ```

### 3. Configuração do Ambiente

1. Copie o arquivo `.env.example` para `.env`:

    ```bash
    cp .env.example .env
    ```

2. Configure as variáveis de ambiente no arquivo `.env` conforme necessário. As variáveis principais a serem configuradas são `DB_CONNECTION`, `DB_HOST`, `DB_PORT`, `DB_DATABASE`, `DB_USERNAME`, `DB_PASSWORD`e a chave da Gemini APi `GOOGLE_API_KEY`.

3. Gere a chave de aplicação do Laravel:

    ```bash
    php artisan key:generate
    ```

4. Execute as migrações do banco de dados:

    ```bash
    php artisan migrate
    ```

### 4. Inicialização do Projeto
#### Caso não esteja utilizando o Laravel Herd siga os dois passo, se não apenas inicialize o segundo passo para rodar o vite e fazer o front-end inicializar

1. Inicie o servidor de desenvolvimento do Laravel:

    ```bash
    php artisan serve
    ```

2. Inicie o servidor de desenvolvimento do frontend (Vue.js):

    ```bash
    npm run dev
    ```


