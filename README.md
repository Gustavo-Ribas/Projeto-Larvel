# Sistema de Loja de Carros — Projeto Final Laravel

Sistema web desenvolvido em Laravel com PostgreSQL, contendo autenticação, controle de acesso por papéis (roles), CRUD de veículos, relacionamento entre entidades e autorização via Policies.

**Integrantes:** Gustavo, Matheus, Gabriel

## Pré-requisitos

- PHP >= 8.2
- Composer
- Node.js e NPM
- Conta no [Neon](https://neon.tech) (PostgreSQL na nuvem) — o link de acesso ao banco será compartilhado entre os integrantes

## Instalação e Execução

1. Clone o repositório:
```bash
git clone https://github.com/seu-usuario/nome-do-repo.git
cd nome-do-repo
```

2. Instale as dependências do PHP:
```bash
composer install
```

3. Instale as dependências do JavaScript:
```bash
npm install
```

4. Copie o arquivo de ambiente:
```bash
cp .env.example .env
```

5. Configure a conexão com o banco no arquivo `.env` (os dados de conexão do Neon serão compartilhados no grupo pelo WhatsApp/Discord):
```env
DB_CONNECTION=pgsql
DB_HOST=<host do Neon, sem -pooler>
DB_PORT=5432
DB_DATABASE=neondb
DB_USERNAME=neondb_owner
DB_PASSWORD=<senha compartilhada>
DB_SSLMODE=require
```

6. Gere a chave da aplicação:
```bash
php artisan key:generate
```

7. Rode as migrations:
```bash
php artisan migrate
```

8. Rode o seeder de usuários de teste:
```bash
php artisan db:seed
```

9. Compile os assets:
```bash
npm run build
```

10. Suba o servidor local:
```bash
php artisan serve
```

Acesse em `http://127.0.0.1:8000`

## Usuários de Teste

Após rodar o seeder (`php artisan db:seed`), os seguintes usuários estarão disponíveis:

| Papel   | Email              | Senha     |
|---------|--------------------|-----------| 
| Admin   | admin@teste.com    | senha123  |
| Gerente | gerente@teste.com  | senha123  |
| Usuário | usuario@teste.com  | senha123  |

## Fluxo de Trabalho

- Cada integrante trabalha em uma branch própria (`feat/auth-gustavo`, `feat/crud-carros-matheus`, `feat/relacionamentos-gabriel`)
- Integração via Pull Requests no GitHub

## Contribuições

**Gustavo** — Setup do projeto, configuração do PostgreSQL (Neon), autenticação (Laravel Breeze), migration e seeder de usuários com roles, middleware de controle de acesso (CheckRole), organização das rotas.

**Matheus** — _(a preencher)_

**Gabriel** — Responsável pelo relacionamento entre entidades, autorização e CRUD de carros: criação das tabelas `marcas` e `carros` com chave estrangeira, Models `Marca` e `Carro`, CarroController com CRUD complet, rotas protegidas por autenticação, views Blade, CarroPolicy com regras de acesso por papel, autorização aplicada via `@can` nas views e `authorize()` no controller, e seeder de marcas de teste.