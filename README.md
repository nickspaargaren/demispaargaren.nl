# Demi Spaargaren
🇳🇱 Eigen content management systeem ontwikkeld in PHP en MySQL. Inclusief inlogsysteem, mogelijkheid om zelf gebruikers en pagina's aan te maken en bestanden te uploaden. Voor Demi Spaargaren, Grafisch vormgever & student Communication & Multimedia Design.

<img width="926" alt="cms-pages" src="https://user-images.githubusercontent.com/20847106/194754052-4b932e9e-28eb-478b-88c6-82359f8033c5.png">

## Local Development

1. Run `make install`

2. Run `make start`

3. Go to phpMyAdmin http://localhost:8080 & import the [database](development/database.sql)

- User: root
- Pass: root

4. Open the frontend: http://localhost:8000 or cms http://localhost:8000/admin_cms

## History

This project started in late 2014 with tools like:
- Plain php (No framework)
- All code mostly in Dutch
- Developing using MAMP, a local database & CodeKit
- Manually uploading the new code via FileZilla

In 2022 i've added:
- Git version control
- Docker setup with make commands and a readme for easy development
- Xdebug to find php problems
- Store database & ftp credentials in environment variables instead of the code itself
- Composer to download assets instead of downloading and saving them locally
- Saving passwords with encryption
- Migration to PDO to somewhat prevent sql injections
