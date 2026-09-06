<h1 align="center">🐳 Laravel Filament Template</h1>

<p align="center">
  <em>Ein dockerisiertes Starter-Setup mit Laravel 13 und Filament 5 — klonen, zwei Befehle ausführen, fertiges Admin-Panel.</em>
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
  <a href="README.md">🇬🇧 English version</a>
</p>

---

## 📖 Über das Projekt

Ein Ausgangspunkt für Laravel-Projekte, die ein Admin-Panel brauchen — mit
komplett containerisierter Umgebung. MySQL, Redis und ein Mail-Catcher starten
zusammen mit der Anwendung. Kein lokales PHP, keine lokale Datenbank, außer Docker
ist nichts zu installieren.

Die Laravel-Anwendung liegt in `laravel/`, im Repository-Root steht das
Docker-Setup — Infrastruktur und Anwendung bleiben also getrennt.

Die Tags des Repositories folgen der Filament-Version, auf die sie abzielen. Mit
`git clone -b 5.6.3.0` bekommst du einen fixierten Ausgangspunkt.

## 🛠️ Tech-Stack

| Technologie | Version | Zweck |
|-------------|---------|-------|
| <img src="https://img.shields.io/badge/Laravel-FF2D20?style=flat-square&logo=laravel&logoColor=white" alt="Laravel"> Laravel | 13.x | Anwendungs-Framework |
| <img src="https://img.shields.io/badge/Filament-FDAE4B?style=flat-square&logo=filament&logoColor=black" alt="Filament"> Filament | 5.x | Admin-Panel |
| <img src="https://img.shields.io/badge/PHP-777BB4?style=flat-square&logo=php&logoColor=white" alt="PHP"> PHP | 8.2+ | Sprache (Container läuft mit 8.4) |
| <img src="https://img.shields.io/badge/MySQL-4479A1?style=flat-square&logo=mysql&logoColor=white" alt="MySQL"> MySQL | 8.0 | Datenbank |
| <img src="https://img.shields.io/badge/Redis-FF4438?style=flat-square&logo=redis&logoColor=white" alt="Redis"> Redis | alpine | Cache und Queues |
| <img src="https://img.shields.io/badge/Vite-646CFF?style=flat-square&logo=vite&logoColor=white" alt="Vite"> Vite | — | Asset-Bundling |
| <img src="https://img.shields.io/badge/Tailwind_CSS-06B6D4?style=flat-square&logo=tailwindcss&logoColor=white" alt="Tailwind CSS"> Tailwind CSS | — | Styling |
| Mailpit | latest | Fängt ausgehende Mails in der Entwicklung ab |

## ✨ Funktionen

- **Vollständige Docker-Umgebung** — App, MySQL, Redis und Mailpit in einer Compose-Datei
- **Filament-Admin-Panel** vorkonfiguriert und sofort erreichbar
- **Versioniert per Tag** — checke den Tag zur gewünschten Filament-Version aus
- **Basis-Image von Laravel Sail** — vertrauter `sail`-Benutzer und dessen Tooling
- **Mail-Catcher inklusive** — ausgehende Mails werden abgefangen, nie versendet

## 🚀 Erste Schritte

### Voraussetzungen

- [Docker](https://www.docker.com/) und Docker Compose

Mehr nicht. PHP, Composer und MySQL laufen alle in Containern.

### Installation

**1. Klonen**

```bash
# aktuellster Stand
git clone git@github.com:cooolinho/laravel-filament-template.git

# oder eine bestimmte Version
git clone -b 5.6.3.0 git@github.com:cooolinho/laravel-filament-template.git
cd laravel-filament-template
```

**2. Konfigurieren**

```bash
cp .env.example .env
```

Optional einen eigenen Container-Namen in `.env` setzen:

```
LARAVEL_CONTAINER_NAME=laravel
```

**3. Container starten**

```bash
docker-compose build
docker-compose up -d
```

**4. Laravel initialisieren**

```bash
docker exec -it laravel bash -c "chmod -R 777 /var/www/html"
docker exec -it laravel bash -c "chown -R sail:sail /var/www/html"
docker exec -it --user sail laravel sh -c "sh init.sh"
```

**5. Admin-Benutzer anlegen**

```bash
docker exec -it --user sail laravel sh -c \
  "php artisan filament:user --name=Admin --email=admin@example.com --password=secret --panel=admin"
```

**6. Neu starten**

```bash
docker restart laravel
```

## 📋 Verwendung

Das Admin-Panel erreichst du unter **http://localhost/admin/login**

| | |
|---|---|
| E-Mail | `admin@example.com` |
| Passwort | `secret` |

> ⚠️ Das sind Entwicklungs-Zugangsdaten. Ändere sie, bevor die Anwendung für
> jemand anderen erreichbar ist.

### Frontend-Assets

```bash
docker exec -it --user sail laravel sh -c "npm run dev"     # Watch-Modus
docker exec -it --user sail laravel sh -c "npm run build"   # Produktions-Build
```

### Tests

```bash
docker exec -it --user sail laravel sh -c "php artisan test"
```

## 📁 Projektstruktur

```
laravel-filament-template/
├── laravel/              # Die Laravel-Anwendung
├── docker/               # Container-Konfiguration
├── docker-compose.yml    # App, MySQL, Redis, Mailpit
├── .env.example          # Vorlage für die Compose-Umgebung
└── docs/                 # Projektdokumentation
```

## 📚 Dokumentation

- [Projektdefinition](docs/index.md)
- [TODOs](docs/todos.md)

## 🔗 Referenzen

- [Filament 5](https://filamentphp.com/docs/5.x/) · [Laravel 13](https://laravel.com/docs/13.x)
- [Docker](https://www.docker.com/) · [Docker Compose](https://docs.docker.com/compose/)
- [MySQL](https://hub.docker.com/r/mysql/mysql-server) · [Redis](https://hub.docker.com/_/redis) · [Mailpit](https://hub.docker.com/r/axllent/mailpit)

## 📄 Lizenz

Veröffentlicht unter der [MIT-Lizenz](LICENSE).
