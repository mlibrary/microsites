# Setup

1.  Set a .env file.  Start with these values.

    ```bash
    DOMAIN_CURRENT_SITE=
    NOBLOGREDIRECT=

    MYSQL_DATABASE=
    MYSQL_USER=
    MYSQL_PASSWORD=
    MYSQL_HOST=
    MYSQL_ROOT_PASSWORD=

    APACHE_DOCUMENT_ROOT=

    AUTH_KEY=
    SECURE_AUTH_KEY=
    LOGGED_IN_KEY=
    NONCE_KEY=
    AUTH_SALT=
    SECURE_AUTH_SALT=
    LOGGED_IN_SALT=
    NONCE_SALT=
    ```

2.  Run `docker-compose up`

3.  Load a copy of the database 

    ```
    docker-compose exec -T db bash -c 'mysql -u$MYSQL_USER -p$MYSQL_PASSWORD $MYSQL_DATABASE' < /path/to/dump.sql
    ```

4.  Add `microsites.local` to `/etc/hosts`

    ```
    127.0.0.1	localhost microsites.local
    ```

    Alternatively, make your own blog to use:

    ```
    # Multi-site WP expects you to have your sites be a subdomin or subdirectory
    docker-compose exec web wp site create --slug=local

    # Get the site id NNN from wp site list
    docker-compose exec web wp site list
    docker-compose exec db mysql --execute "update wp_blogs set domain = 'microsites.localho.st' WHERE blog_id = NNN"
    # Fix up the places where the site url is in the database.
    docker-compose exec web wp --url=http://microsites.localho.st option set siteurl http://micorsites.localho.st
    docker-compose exec web wp --url=http://microsites.localho.st option set home http://micorsites.localho.st

    # Set up the http_authentication to receive the REMOTE_USER or PHP_AUTH_USER variables.
    docker-compose exec web wp --url=http://microsites.localho.st option set --format=json http_authentication_options '{"auth_label":"HTTP authentication","login_uri":"%base%\/login?target=%redirect_encoded%","logout_uri":"%base%/wp-login.php?action=logout","additional_server_keys":"PHP_AUTH_USER","auto_create_user":true,"auto_create_email_domain":"umich.edu","db_version":2,"allow_wp_auth":false}'
    ```

5.  If needed, add yourself as as site admin

    ```
    docker-compose exec web wp user create $USER $USER@umich.edu --role=administrator
    docker-compose exec web wp super-admin add $USER
    ```

6.  ???
