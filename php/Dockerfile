FROM php:7.4.7-fpm AS develop

FROM develop

# 資材置き場をワークディレクトリに設定
WORKDIR /var/www/html

# PHPの設定取り込み
COPY ./php/php.ini /usr/local/etc/php/

# COMPOSERでAWS SDKのインストールに必要なコマンドを準備
RUN apt-get update \
  && apt-get install -y zip git \
  && apt-get clean

# COMPOSER対応
COPY --from=composer:2.0 /usr/bin/composer /usr/bin/composer
ENV COMPOSER_ALLOW_SUPERUSER=1 \
  COMPOSER_HOME=/composer
RUN composer config -g process-timeout 3600 && \
  composer config -g repos.packagist composer https://packagist.org
RUN composer require aws/aws-sdk-php

# アプリケーション資材取り込み
COPY ./src /var/www/html
