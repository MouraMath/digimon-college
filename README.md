# DigimonMM - CRUD de Digimons


## Sobre o Projeto

DigimonMM é um sistema CRUD (Create, Read, Update, Delete) desenvolvido como projeto acadêmico, focado na gestão de Digimons. O projeto oferece uma interface intuitiva para gerenciar uma coleção de Digimons.

### Funcionalidades Principais

- 📋 Listagem de Digimons com paginação e ordenação
- ➕ Adição de novos Digimons
- 🔍 Visualização detalhada de cada Digimon
- ✏️ Edição de informações dos Digimons
- 🗑️ Exclusão de Digimons

## Tecnologias Utilizadas

- PHP 8.4
- Laravel (Framework PHP)
- MySQL
- HTML, CSS, JavaScript
- Bootstrap 5

## Começando

### Pré-requisitos

- PHP 8.4+
- Composer
- MySQL
- Servidor web (Apache, Nginx) ou PHP Artisan serve

### Instalação

1. Clone o repositório
git clone https://github.com/MouraMath/digimon-college.git
cd digimon-mm


2. Instale as dependências
composer install

3. Configure o ambiente
cp .env.example .env

Configure .env para acessar o banco de dados

DB_CONNECTION=mysql
DB_HOST=127.0.0.1
DB_PORT=3306
DB_DATABASE=digimon_mm
DB_USERNAME=root
DB_PASSWORD=aot2000

4. Prepare a aplicação
php artisan key:generate
php artisan migrate --seed //Com isso, não será necessário rodar manualmente o script do export_data.sql

5. Inicie o servidor
php artisan serve

6. Acesse `http://localhost:8000/digimons`

## Estrutura do Projeto

- `app/Models/Digimon.php`: Modelo Digimon
- `app/Http/Controllers/DigimonController.php`: Controller CRUD
- `resources/views/digimons/`: Views do sistema
- `database/migrations/`: Migrações do banco de dados
- `database/seeders/DigimonSeeder.php`: Seeder para dados iniciais