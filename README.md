Este é meu projeto de CRUD desenvolvido como atividade da faculdade. Escolhi o tema de Digimons porque sempre fui fã da série e achei que seria uma forma divertida de aplicar os conceitos aprendidos em aula.

O sistema permite gerenciar uma lista de Digimons, com informações como nome, level, tipo e atributo. Implementei também um recurso de ordenação na listagem, permitindo organizar os Digimons por qualquer uma das colunas, em ordem crescente ou decrescente.

Tecnologias Utilizadas
PHP 8.4

Laravel (Framework PHP)

MySQL (Banco de Dados)

HTML, CSS

Bootstrap 5 (Framework CSS)

JavaScript

Funcionalidades
Listar todos os Digimons com paginação

Ordenar a lista por qualquer coluna (crescente/decrescente)

Adicionar novos Digimons

Visualizar detalhes de um Digimon específico

Editar informações de Digimons existentes

Excluir Digimons

Como Executar o Projeto
Pré-requisitos
PHP 8.4 ou superior

Composer

MySQL

Servidor web (Apache, Nginx) ou PHP Artisan serve

Passos para Instalação
Clone o repositório:

text
git clone https://github.com/seu-usuario/digimon-mm.git
cd digimon-mm
Instale as dependências:

text
composer install
Configure o arquivo .env:

text
cp .env.example .env
Edite o arquivo .env com suas configurações de banco de dados.

Gere a chave da aplicação:

text
php artisan key:generate
Execute as migrações:

text
php artisan migrate
Importe os dados iniciais:

text
mysql -u seu_usuario -p seu_banco < export_database.sql
Inicie o servidor:

text
php artisan serve
Acesse o sistema em: http://localhost:8000/digimons

Estrutura do Projeto
app/Models/Digimon.php: Modelo que representa um Digimon no sistema

app/Http/Controllers/DigimonController.php: Controller com as ações CRUD

resources/views/digimons/: Pasta com as views do sistema

database/migrations/: Migrações para criar e modificar a tabela de Digimons

export_database.sql: Script SQL com dados iniciais para o banco