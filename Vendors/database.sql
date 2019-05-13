/*Creation de la database*/
DROP DATABASE blog_php;
CREATE DATABASE blog_php;


/* Passage sur cette base de données*/
USE blog_php;


/* Création table users */ 
CREATE TABLE `users`(
    id BIGINT UNSIGNED AUTO_INCREMENT NOT NULL,
    name VARCHAR(255) NOT NULL,
    password VARCHAR(255) NOT NULL,
    email VARCHAR(255) NOT NULL,
    `group` VARCHAR(255) DEFAULT 'user',
    user_status INT DEFAULT 1,
    creation_date DATETIME DEFAULT NOW(),
    modification_date DATETIME DEFAULT NOW(),
    PRIMARY KEY(id)
);

/* Création table articles */
CREATE TABLE articles(
    id BIGINT UNSIGNED AUTO_INCREMENT NOT NULL,
    title VARCHAR(255) NOT NULL,
    content TEXT,
    id_creator BIGINT UNSIGNED NOT NULL,
    creation_date DATETIME DEFAULT NOW(),
    modification_date DATETIME DEFAULT NOW(),
    PRIMARY KEY(id),
    FOREIGN KEY(id_creator) REFERENCES users(id)
);

CREATE TABLE comments(
    id BIGINT UNSIGNED AUTO_INCREMENT NOT NULL,
    content TEXT,
    id_article BIGINT UNSIGNED NOT NULL,
    id_creator BIGINT UNSIGNED NOT NULL, 
    creation_date DATETIME DEFAULT NOW(),
    modification_date DATETIME DEFAULT NOW(),
    PRIMARY KEY(id),
    FOREIGN KEY(id_creator) REFERENCES users(id),
    FOREIGN KEY (id_article) REFERENCES articles(id)
);