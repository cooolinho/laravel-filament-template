# laravel-filament-template

## 1. clone repository
```bash
git clone git@github.com:cooolinho/laravel-filament-template.git
```

## 2. Installation
### create .env file for docker-compose.yaml
```bash
cp .env.example .env
```
### set your own LARAVEL_CONTAINER_NAME in .env file (optional)
```bash
LARAVEL_CONTAINER_NAME=laravel
```

### Run the following commands in terminal
```bash
### docker dependencies
composer install --ignore-platform-reqs

### build and run docker containers
docker-compose build
docker-compose up -d

## Laravel initialization
docker exec -it laravel sh -c "sh init.sh"

### restart container
docker restart laravel
```

## 3. Open Admin Dashboard
http://localhost/admin/login
```
E-Mmail:  admin@example.com
Password: secret
```

## References
- [Filament 5](https://filamentphp.com/docs/5.x/)
- [Laravel 13](https://laravel.com/docs/13.x)
- [Docker](https://www.docker.com/)
- [Docker-Compose](https://docs.docker.com/compose/)
- [MySQL](https://hub.docker.com/r/mysql/mysql-server)
- [Redis](https://hub.docker.com/_/redis)
- [mailpit](https://hub.docker.com/r/axllent/mailpit)

Version: 5.0.1
