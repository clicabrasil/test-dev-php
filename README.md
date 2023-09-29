## Instalação

Primeiro clone este repositório e configure seu arquivo .env.

```
git clone git@github.com:benjamimWalker/test-dev-php.git
cp .env.example .env
```
## Configuração
Suba o container. Se docker compose não funcionar, tente docker-compose.

```
docker compose up -d
```
Instale as dependências do composer.
```
docker compose exec app composer install
```

Instale as dependências do node
```
docker compose exec app npm install
```
Inicie o servidor node.

```
docker compose exec app npm run dev
```

Execute as migrations iniciais.

```
docker compose exec app php artisan migrate
```

Execute o seeder para popular o banco de dados.

```
docker compose exec app php artisan db:seed
```

Temos usuários normais e admins, é importante testar com ambos.
Um usuário é admin quando a sua coluna admin da tabela users é true

Não é necessário executar comando para o servidor php, uma vez que o container esteja de pé, basta acessar
```
http://localhost
```
na porta 80 mesmo.

## Testando

Você pode executar os testes com o comando.
```
docker compose exec app php artisan test
```
