<h1 align="center">🐳 Laravel Filament Template</h1>

<p align="center">
  <em>A Dockerized Laravel 13 + Filament 5 starter — clone, run two commands, and log into a working admin panel.</em>
</p>

<p align="center">
  <img src="https://img.shields.io/badge/Laravel-FF2D20?style=for-the-badge&logo=laravel&logoColor=white" alt="Laravel">
  <img src="https://img.shields.io/badge/Filament-FDAE4B?style=for-the-badge&logo=filament&logoColor=black" alt="Filament">
  <img src="https://img.shields.io/badge/PHP-777BB4?style=for-the-badge&logo=php&logoColor=white" alt="PHP">
  <img src="https://img.shields.io/badge/Docker-2496ED?style=for-the-badge&logo=docker&logoColor=white" alt="Docker">
  <img src="https://img.shields.io/badge/MySQL-4479A1?style=for-the-badge&logo=mysql&logoColor=white" alt="MySQL">
  <img src="https://img.shields.io/badge/Redis-FF4438?style=for-the-badge&logo=redis&logoColor=white" alt="Redis">
</p>

<p align="center">
  <a href="README.de.md">🇩🇪 Deutsche Version</a>
</p>

---

## 📖 About

A starting point for Laravel projects that need an admin panel, with the whole
environment already containerized. MySQL, Redis and a mail catcher come up
alongside the application — no local PHP, no local database, nothing to install
beyond Docker.

The Laravel application lives in `laravel/`; the repository root holds the Docker
setup, so infrastructure and application stay separate.

Repository tags follow the Filament version they target, so
`git clone -b 5.6.3.0` gets you a pinned starting point.

## 🛠️ Tech Stack

| Technology | Version | Purpose |
|------------|---------|---------|
| <img src="https://img.shields.io/badge/Laravel-FF2D20?style=flat-square&logo=laravel&logoColor=white" alt="Laravel"> Laravel | 13.x | Application framework |
| <img src="https://img.shields.io/badge/Filament-FDAE4B?style=flat-square&logo=filament&logoColor=black" alt="Filament"> Filament | 5.x | Admin panel |
| <img src="https://img.shields.io/badge/PHP-777BB4?style=flat-square&logo=php&logoColor=white" alt="PHP"> PHP | 8.2+ | Language (container runs 8.4) |
| <img src="https://img.shields.io/badge/MySQL-4479A1?style=flat-square&logo=mysql&logoColor=white" alt="MySQL"> MySQL | 8.0 | Database |
| <img src="https://img.shields.io/badge/Redis-FF4438?style=flat-square&logo=redis&logoColor=white" alt="Redis"> Redis | alpine | Cache and queues |
| <img src="https://img.shields.io/badge/Vite-646CFF?style=flat-square&logo=vite&logoColor=white" alt="Vite"> Vite | — | Asset bundling |
| <img src="https://img.shields.io/badge/Tailwind_CSS-06B6D4?style=flat-square&logo=tailwindcss&logoColor=white" alt="Tailwind CSS"> Tailwind CSS | — | Styling |
| Mailpit | latest | Catches outgoing mail in development |

## ✨ Features

- **Complete Docker environment** — app, MySQL, Redis and Mailpit in one compose file
- **Filament admin panel** preconfigured and reachable immediately
- **Version-tagged** — check out a tag matching the Filament release you want
- **Laravel Sail base image** — the familiar `sail` user and tooling
- **Mail catcher included** — outgoing mail is captured, never sent

## 🚀 Getting Started

### Prerequisites

- [Docker](https://www.docker.com/) and Docker Compose

Nothing else. PHP, Composer and MySQL all run inside containers.

### Installation

**1. Clone**

```bash
# latest
git clone git@github.com:cooolinho/laravel-filament-template.git

# or a specific version
git clone -b 5.6.3.0 git@github.com:cooolinho/laravel-filament-template.git
cd laravel-filament-template
```

**2. Configure**

```bash
cp .env.example .env
```

Optionally set your own container name in `.env`:

```
LARAVEL_CONTAINER_NAME=laravel
```

**3. Start the containers**

```bash
docker-compose build
docker-compose up -d
```

**4. Initialize Laravel**

```bash
docker exec -it laravel bash -c "chmod -R 777 /var/www/html"
docker exec -it laravel bash -c "chown -R sail:sail /var/www/html"
docker exec -it --user sail laravel sh -c "sh init.sh"
```

**5. Create an admin user**

```bash
docker exec -it --user sail laravel sh -c \
  "php artisan filament:user --name=Admin --email=admin@example.com --password=secret --panel=admin"
```

**6. Restart**

```bash
docker restart laravel
```

## 📋 Usage

The admin panel is at **http://localhost/admin/login**

| | |
|---|---|
| E-mail | `admin@example.com` |
| Password | `secret` |

> ⚠️ These are development credentials. Change them before the application is
> reachable by anyone else.

### Frontend assets

```bash
docker exec -it --user sail laravel sh -c "npm run dev"     # watch
docker exec -it --user sail laravel sh -c "npm run build"   # production build
```

### Tests

```bash
docker exec -it --user sail laravel sh -c "php artisan test"
```

## 📁 Project Structure

```
laravel-filament-template/
├── laravel/              # The Laravel application
├── docker/               # Container configuration
├── docker-compose.yml    # App, MySQL, Redis, Mailpit
├── .env.example          # Compose environment template
└── docs/                 # Project documentation
```

## 📚 Documentation

- [Project Definition](docs/index.md)
- [TODOs](docs/todos.md)

## 🔗 References

- [Filament 5](https://filamentphp.com/docs/5.x/) · [Laravel 13](https://laravel.com/docs/13.x)
- [Docker](https://www.docker.com/) · [Docker Compose](https://docs.docker.com/compose/)
- [MySQL](https://hub.docker.com/r/mysql/mysql-server) · [Redis](https://hub.docker.com/_/redis) · [Mailpit](https://hub.docker.com/r/axllent/mailpit)

## 📄 License

Released under the [MIT License](LICENSE).
