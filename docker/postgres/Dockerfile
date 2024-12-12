# Use a imagem oficial do PostgreSQL como base
FROM postgres:10

# Defina o mantenedor (opcional)
LABEL maintainer="elmoleitao@gmail.com"

# Copie os arquivos de configuração personalizados para o contêiner
# (Por exemplo: init.sql, postgresql.conf, ou outros scripts)
COPY ./docker/postgres/init-db /docker-entrypoint-initdb.d

# Comando de inicialização (herdado da imagem base)
CMD ["postgres"]
