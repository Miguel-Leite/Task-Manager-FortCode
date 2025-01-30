# 📋 TaskMinder

Um sistema de gerenciamento de tarefas baseado em Kanban, construído com Laravel (backend) e Alpine.js (frontend). Crie, edite, mova e exclua tarefas entre diferentes colunas (A Fazer, Em Andamento, Concluído).

## 🚀 Começando

Siga estas etapas para configurar e executar o projeto localmente.

### Pré-requisitos

Certifique-se de ter instalado:

- Docker (para o container do banco de dados MySQL)
- PHP 8.0 ou superior
- Composer
- Node.js e npm
- Git

### Configuração do Ambiente

1. **Clone o repositório**

```bash
git clone https://github.com/Miguel-Leite/Task-Manager-FortCode.git
cd Task-Manager-FortCode
```

2. **Inicie o container:**

```bash
docker-compose up -d
```

3. **Configure as variáveis de ambiente**

```bash
cp .env.example .env
```

Atualize as configurações do banco de dados no `.env`:

```
DB_CONNECTION=mysql
DB_HOST=127.0.0.1
DB_PORT=3306
DB_DATABASE=taskmanager
DB_USERNAME=docker
DB_PASSWORD=docker
```

4. **Instale as dependências e configure o projeto**

```bash
composer install
php artisan key:generate
php artisan migrate
npm install
npm run dev
```

## 🚀 Executando o Projeto

1. Inicie o servidor PHP:

```bash
php artisan serve
```

2. Acesse o projeto em: http://127.0.0.1:8000

## 🧪 Funcionalidades

- **Criar Tarefas**: Clique em "Nova Tarefa" e preencha o formulário
- **Editar Tarefas**: Clique no ícone de edição ao lado de qualquer tarefa
- **Mover Tarefas**: Arraste e solte tarefas entre as colunas
- **Excluir Tarefas**: Clique no ícone de exclusão e confirme

## 🛠 Estrutura do Projeto

### Backend

- `app/Http/Controllers/TaskController.php`: Lógica de gerenciamento de tarefas
- `app/Models/Task.php`: Modelo de tarefa
- `database/migrations/`: Migrações do banco de dados

### Frontend

- `resources/views/`: Views Blade
- `resources/js/`: Scripts Alpine.js
- `resources/css/`: Estilos CSS

### Rotas

- `routes/web.php`: Rotas da aplicação

## 🧰 Tecnologias Utilizadas

### Backend

- Laravel (PHP)
- MySQL

### Frontend

- Alpine.js
- Tailwind CSS

### Ferramentas

- Docker
- npm
