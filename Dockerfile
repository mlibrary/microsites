FROM debian:bullseye-slim

RUN apt-get update \
 && apt-get install -y curl \
 && curl -sSLo /tmp/debsuryorg-archive-keyring.deb https://packages.sury.org/debsuryorg-archive-keyring.deb \
 && dpkg -i /tmp/debsuryorg-archive-keyring.deb \
 && rm -f /tmp/debsuryorg-archive-keyring.deb \
 && echo "deb https://packages.sury.org/php/ bullseye main" > /etc/apt/sources.list.d/php.list \
 && apt-get update \
 && apt-get upgrade -y \
 && apt-get autoremove -y \
 && apt-get install -y \
      build-essential \
      git \
      unzip \
      zip \
      libxml2-dev \
      libjpeg-dev \
      libpng-dev \
      libmcrypt-dev \
      libmariadb-dev-compat \
      libmariadb-dev \
      libzip-dev \
      pkg-config \
      apache2 \
      apache2-dev \
      libapache2-mod-auth-openidc \
      libapache2-mod-php5.6 \
      php5.6 \
      php5.6-apcu \
      php5.6-bz2 \
      php5.6-curl \
      php5.6-gd \
      php5.6-intl \
      php5.6-mbstring \
      php5.6-mcrypt \
      php5.6-mysql \
      php5.6-opcache \
      php5.6-readline \
      php5.6-xml \
      php5.6-zip \
 && (apt-get distclean || rm -rf  /var/cache/apt/archives /var/lib/apt/lists/*) \
 && a2enmod rewrite \
 && mkdir -p /var/cache/apache2/mod_auth_openidc/oidc-sessions /var/www/lib \
 && chown www-data:www-data /var/cache/apache2/mod_auth_openidc/oidc-sessions

COPY docker/web/auth_openidc.conf /etc/apache2/mods-enabled/auth_openidc.conf
COPY docker/web/000-default.conf /etc/apache2/sites-available/000-default.conf
COPY . /var/www/html

RUN curl https://raw.githubusercontent.com/wp-cli/builds/gh-pages/phar/wp-cli.phar \
    > /usr/bin/wp && \
    chmod +x /usr/bin/wp

CMD ["apache2ctl", "-D", "FOREGROUND"]
