-- Criação de usuário e atribuição de permissões
CREATE ROLE elmojerry WITH LOGIN PASSWORD 'secret';

-- Criação do banco de dados e usuário
CREATE DATABASE "naesquina";

DO $$
BEGIN
    -- Verifica se o usuário já existe
    IF NOT EXISTS (
        SELECT FROM pg_roles WHERE rolname = 'elmojerry'
    ) THEN
        -- Cria o usuário
        CREATE USER elmojerry WITH PASSWORD 'secret';

        RAISE NOTICE 'Usuário elmojerry criado.';
    ELSE

        RAISE NOTICE 'Usuário elmojerry já existe.';

    END IF;
END $$;

GRANT ALL PRIVILEGES ON DATABASE "naesquina" TO elmojerry;

-- Configurações de otimização
\connect "naesquina";

-- Ajustando o tamanho padrão dos blocos para tabelas temporárias
ALTER DATABASE "naesquina" SET temp_buffers = '32MB';

-- Configuração de cache de consultas
ALTER DATABASE "naesquina" SET work_mem = '64MB';

-- Configurando paralelismo de consultas
ALTER DATABASE "naesquina" SET max_parallel_workers_per_gather = 4;

-- Ajustando checkpoint para minimizar I/O
ALTER DATABASE "naesquina" SET checkpoint_timeout = '15min';
ALTER DATABASE "naesquina" SET wal_buffers = '16MB';
ALTER DATABASE "naesquina" SET max_wal_size = '1GB';

-- Habilitando estatísticas de indexação
ALTER DATABASE "naesquina" SET track_io_timing = ON;
