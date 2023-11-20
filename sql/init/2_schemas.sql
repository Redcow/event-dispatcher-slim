USE local_food;

CREATE TABLE IF NOT EXISTS users (
                       id INTEGER UNSIGNED PRIMARY KEY AUTO_INCREMENT NOT NULL,
                       email VARCHAR(255) UNIQUE NOT NULL,
                       password VARCHAR(255) NOT NULL,
                       type VARCHAR(127) DEFAULT 'user',
                       is_active bool DEFAULT false,
                       token varchar(255) NOT NULL
) ENGINE=INNODB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;