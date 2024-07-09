# ROdar projeto

## Requisitos

- PHP 7.1
- Composer 1.10
- MySQL 5.6
- Docker

## Configuração

1. Clone o repositório
2. Execute `docker-compose up -d`
3. Execute `docker-compose exec web bash`
4. Execute `./yii migrate`
5. Crie um usuário de teste `./yii create-user/index admin password123 "Admin User"`

## API Endpoints

### Autenticação

- POST `/auth/login` - Autenticação do usuário

### Cliente

- GET `/clients` - Lista de clientes (com paginação)
- POST `/clients` - Cadastro de cliente

### Produto

- GET `/products` - Lista de produtos (com paginação)
- GET `/products?client_id={id}` - Lista de produtos de um cliente específico
- POST `/products` - Cadastro de produto
