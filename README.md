![logo](https://github.com/user-attachments/assets/d0b1aed7-217c-4d82-ac33-0cc39334b872)
## Description
Project created for the HE-Arc autumn semester web app course (3251.3 Développement web I).
The goal is to create a web application using the Laravel framework, allowing an user to create various timelines and then share them with others.
## Dependencies
- PHP >= 8.2
- Composer
- Node.js
## Local project startup
1. Clone repository
2. Generate the `.env` file by copying the `.env.example` file and configure it as needed (to execute in project root)
    ```
    cp .env.example .env
    ```
3. Install dependencies
   
    ```
    composer install
    npm install
    ```
4. Configure project (to execute in the workspace)

    ```
    php artisan key:generate
    php artisan migrate
    php artisan db:seed
    ```
5. Start servers

    ```
    php artisan serve
    npm run dev
    ```
6. Access website on the following URL: http://localhost:8000
