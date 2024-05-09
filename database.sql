drop database gallery;
create database gallery;
use gallery;

CREATE TABLE `User` (
  `id` int PRIMARY KEY AUTO_INCREMENT,
  `username` nvarchar(256) UNIQUE NOT NULL,
  `email` nvarchar(1024) UNIQUE NOT NULL,
  `passwd` nvarchar(128) NOT NULL,
  `role` int NOT NULL,
  CHECK(`role` in (0, 1, 2))
);

CREATE TABLE `Artist` (
  `id` int PRIMARY KEY AUTO_INCREMENT,
  `username` nvarchar(256) UNIQUE NOT NULL,
  `email` nvarchar(1024) UNIQUE NOT NULL,
  `passwd` nvarchar(128) NOT NULL,
  `pfp` nvarchar(512) NOT NULL,
  `country` nvarchar(128) NOT NULL,
  `bio` text
);

CREATE TABLE `Artwork` (
  `id` int PRIMARY KEY AUTO_INCREMENT,
  `artist_id` int REFERENCES `Artist`(`id`) ON DELETE CASCADE,
  `title` nvarchar(1024) NOT NULL,
  `picture_link` nvarchar(512) NOT NULL,
  `price` int NOT NULL,
  `height` int NOT NULL,
  `width` int NOT NULL,
  `description` text NOT NULL,
  `offer` float DEFAULT 0,
  `state` int DEFAULT 0,
  `date` date
);

CREATE TABLE `Cart` (
  `user_id` int REFERENCES `User`(`id`) ON DELETE CASCADE,
  `artwork_id` int REFERENCES `Artwork`(`id`) ON DELETE CASCADE,
  PRIMARY KEY (`user_id`, `artwork_id`)
);

CREATE TABLE `Feedback` (
  `id` int PRIMARY KEY AUTO_INCREMENT,
  `user_id` int REFERENCES `User`(`id`) ON DELETE SET NULL,
  `description` text NOT NULL,
  `date` date,
  `state` boolean DEFAULT 0
);

CREATE TABLE `ArtFair` (
  `id` int PRIMARY KEY AUTO_INCREMENT,
  `title` nvarchar(1024) NOT NULL,
  `date` date,
  `location` nvarchar(2048) NOT NULL,
  `description` text NOT NULL
);

CREATE TABLE `ArtFair.Member` (
  `artfair_id` int REFERENCES `ArtFair`(`id`) ON DELETE CASCADE,
  `member_id` int REFERENCES `User`(`id`) ON DELETE CASCADE,
  PRIMARY KEY (`artfair_id`, `member_id`)
);

CREATE TABLE `ArtFair.Artists` (
  `artfair_id` int REFERENCES `ArtFair`(`id`) ON DELETE CASCADE,
  `artist_id` int REFERENCES `Artist`(`id`) ON DELETE CASCADE,
  PRIMARY KEY (`artfair_id`, `artist_id`)
);

CREATE TABLE `Request` (
  `id` int PRIMARY KEY AUTO_INCREMENT,
  `user_id` int REFERENCES `User`(`id`),
  `details` text NOT NULL,
  `state` boolean DEFAULT 0
);

CREATE TABLE `Vote` (
  `user_id` int REFERENCES `User`(`id`) ON DELETE CASCADE,
  `artwork_id` int REFERENCES `Artwork`(`id`) ON DELETE CASCADE,
  `value` boolean,
  PRIMARY KEY (`user_id`, `artwork_id`)
);

CREATE TABLE `WishList` (
  `user_id` int REFERENCES `User`(`id`) ON DELETE CASCADE,
  `artwork_id` int REFERENCES `Artwork`(`id`) ON DELETE CASCADE,
  PRIMARY KEY (`user_id`, `artwork_id`)
);

CREATE TABLE `Follow` (
  `user_id` int REFERENCES `User`(`id`) ON DELETE CASCADE,
  `artist_id` int REFERENCES `Artist`(`id`) ON DELETE CASCADE,
  PRIMARY KEY (`user_id`, `artist_id`)
);

CREATE TABLE `Invitation` (
  `token` nvarchar(1024) PRIMARY KEY,
  `user_id` int REFERENCES `User`(`id`),
  `score` int DEFAULT 0
);
