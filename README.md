# Local Development

1. Open .htaccess & disable the following rules:

```
# RewriteCond %{HTTPS} !=on
# RewriteRule ^(.*)$ https://www.demispaargaren.nl/$1 [L,R=301]

# RewriteCond %{HTTP_HOST} !www.demispaargaren.nl$ [NC]
# RewriteRule ^(.*)$ https://www.demispaargaren.nl/$1 [L,R=301]
```

2. Run `make start`

3. Go to phpMyAdmin http://localhost:8080 & import the database

User: root
Pass: root

4. Open the frontend: http://localhost:8000 or cms http://localhost:8000/admin_cms