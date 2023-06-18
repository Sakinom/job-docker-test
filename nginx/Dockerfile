FROM nginx:latest as develop

FROM develop

# Nginxの設定取り込み
COPY ./nginx/develop/default.conf /etc/nginx/conf.d/default.conf

# アプリケーション資材取り込み
COPY ./src /var/www/html
