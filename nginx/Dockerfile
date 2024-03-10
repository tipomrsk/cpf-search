# Use the nginx alpine image as base
FROM nginx:alpine

# Copy nginx configuration files
COPY ./config/conf.d /etc/nginx/conf.d
COPY ./config/nginx.conf /etc/nginx/nginx.conf

# Copy your application files
COPY ../app /var/www

# Expose port 80
EXPOSE 80

# Entrypoint command
CMD ["nginx", "-g", "daemon off;"]