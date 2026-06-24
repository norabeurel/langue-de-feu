FROM php:8.3-cli
LABEL authors="nono"

COPY ../ /app
WORKDIR /app
CMD [ "php", "-S", "0.0.0.0:8001", "-t", "/app/public" ]
