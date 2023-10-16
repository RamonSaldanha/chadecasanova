- php 8.1

```sh
composer install
```

```sh
cp .env.example .env
```

```sh
npm install
```

```sh
php artisan storage:link
```

```sh
php artisan migrate
```

```sh
php artisan migrate
```

## Mercado pago teste

Primeiro tem que subir o servidor ngrok para testar o webhook do mercado pago, usando o comando abaixo você terá acesso a um domínio temporário que aponta para o seu localhost.

```sh
ngrok http 8000
```
para instalar ngrok com npm use o comando abaixo

```sh
npm install ngrok -g
```

Após subir o servidor ngrok, copie o domínio temporário e cole no arquivo .env na variável "MERCADO_PAGO_NOTIFY_URL"


