## Descrição
Desafio no qual se devia desenvolver um CRUD de produtos com categorias e seus respectivos relacionamentos, além de uma api autenticada para consultas.

## Dependências utilizadas
- Laravel (v.5.6.7)
- AngularJS (v.1.6.9) 
- Passport (OAuth2)

# Instalação
1 - Instale os pacotes usados no front-end
```
npm install ou npm install --production
```

2 - Instale os pacotes utilizados no laravel
```
composer install ou composer install --no-dev
```

3 - Libere permissão para a pasta storage
```
sudo chmod -R 0777 storage/
```

4 - Configure os dados da conexão em "config/database.php"  e execute a migração de tabelas para o a sua base de dados
```
php artisan migrate
```

5 - Instale a key do passport para ser utilizado no OAuth 2.0
```
php artisan passport:install
```

6 - Execute "php artisan serve" ou configure o VirtualHost




