<p align="center"><a href="https://laravel.com" target="_blank"><img src="https://raw.githubusercontent.com/laravel/art/master/logo-lockup/5%20SVG/2%20CMYK/1%20Full%20Color/laravel-logolockup-cmyk-red.svg" width="400" alt="Laravel Logo"></a></p>

<p align="center">
<a href="https://github.com/laravel/framework/actions"><img src="https://github.com/laravel/framework/workflows/tests/badge.svg" alt="Build Status"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/dt/laravel/framework" alt="Total Downloads"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/v/laravel/framework" alt="Latest Stable Version"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/l/laravel/framework" alt="License"></a>
</p>

# Projeto Crud vue.js + laravel

Esse projeto foi desenvolvido com a finalidade de aprendizagem e demonstrar um aplicativo SPA com laravel monolítico.

![Preview Site](https://github.com/nioark/crud-laravel-vue/blob/main/resources/media/Captura-de-tela-login.png?raw=true)

![Preview Site](https://github.com/nioark/crud-laravel-vue/blob/main/resources/media/Captura-de-tela-acesso-rapido.png?raw=true)

![Preview Site](https://github.com/nioark/crud-laravel-vue/blob/main/resources/media/Captura-de-tela-crud.png?raw=true)

![Preview Site](https://github.com/nioark/crud-laravel-vue/blob/main/resources/media/Captura-de-tela-info.png?raw=true)

## Funcionalidades

O projeto possui funcionalidades como:

-   Sistema de autenticação;
-   Adição, remoção e edição de cadastros;

## Frameworks

-   [Laravel](https://laravel.com/)
-   [Vue.js](https://vuejs.org/)
-   [TailwindCSS](https://tailwindcss.com/)
-   [DaisyUI](https://daisyui.com/)
-   [Rxjs](https://rxjs.dev/)

## 🚀 Como utilizar

Siga os passos abaixo para configurar e executar o projeto corretamente.

## 📌 Requisitos

-   PHP e Composer instalados
-   Node.js e npm instalados
-   Banco de dados PostgreSQL configurado

## 🔧 Passos para configuração

1. **Instalar as dependências do PHP:**

    ```sh
    composer update --no-scripts
    ```

2. **Instalar as dependências do Node.js:**

    ```sh
    npm install
    ```

3. **Configurar a conexão com o banco de dados PostgreSQL**

    - Edite o arquivo `.env` e ajuste as configurações do banco conforme necessário.

4. **Executar as migrações do banco:**

    ```sh
    php artisan migrate
    ```

5. **Iniciar o servidor Laravel:**

    ```sh
    php artisan serve
    ```

6. **Iniciar o Vite:**

    ```sh
    npm run dev
    ```

7. **Acessar a aplicação:**  
   Abra [http://127.0.0.1:8000/login](http://127.0.0.1:8000/login) no navegador.

8. **Credenciais padrão para login:**
    - **Usuário:** `admin@admin.com`
    - **Senha:** `admin`

---
