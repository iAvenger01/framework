FROM nginx:1.14-alpine

RUN addgroup -g 1000 developer \
    && adduser -u 1000 -D -H -G developer -s /bin/sh developer

WORKDIR /var/www

CMD ["nginx", "-g", "daemon off;"]

EXPOSE 80 443