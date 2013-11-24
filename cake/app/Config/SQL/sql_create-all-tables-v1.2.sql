CREATE TABLE `recipes` (
  `rec_id` int(11) NOT NULL AUTO_INCREMENT,
  `rec_name` varchar(100) NOT NULL,
  `rating` int(11) NOT NULL,
  PRIMARY KEY (`rec_id`),
  UNIQUE KEY `rec_id_UNIQUE` (`rec_id`)
) ENGINE=InnoDB;

CREATE TABLE `ins` (
  `in_id` int(11) NOT NULL AUTO_INCREMENT,
  `in_name` varchar(100) NOT NULL,
  `in_detailed` varchar(150) NOT NULL,
  PRIMARY KEY (`in_id`),
  UNIQUE KEY `in_id_UNIQUE` (`in_id`)
) ENGINE=InnoDB;

CREATE TABLE `recins` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `rec_id` int(11) NOT NULL,
  `in_id` int(11) NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `id_UNIQUE` (`id`),
  KEY `rec_id_reccins_fk_idx` (`rec_id`),
  KEY `in_id_reccins_fk_idx` (`in_id`),
  CONSTRAINT `rec_id_reccins_fk` FOREIGN KEY (`rec_id`) REFERENCES `recipes` (`rec_id`) ON DELETE CASCADE ON UPDATE NO ACTION,
  CONSTRAINT `in_id_reccins_fk` FOREIGN KEY (`in_id`) REFERENCES `ins` (`in_id`) ON DELETE CASCADE ON UPDATE NO ACTION
) ENGINE=InnoDB;

CREATE TABLE `products` (
  `prod_id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(150) NOT NULL,
  `price` decimal(8,2) NOT NULL,
  `image` longblob NOT NULL,
  `description` text NOT NULL,
  `in_id` int(11) NOT NULL,
  PRIMARY KEY (`prod_id`),
  UNIQUE KEY `prod_id_UNIQUE` (`prod_id`),
  KEY `in_id_products_fk_idx` (`in_id`),
  CONSTRAINT `in_id_products_fk` FOREIGN KEY (`in_id`) REFERENCES `ins` (`in_id`) ON DELETE CASCADE ON UPDATE NO ACTION
) ENGINE=InnoDB;

CREATE TABLE `courses` (
  `cou_id` int(11) NOT NULL AUTO_INCREMENT,
  `type` varchar(45) NOT NULL,
  PRIMARY KEY (`cou_id`),
  UNIQUE KEY `cou_id_UNIQUE` (`cou_id`)
) ENGINE=InnoDB AUTO_INCREMENT=12;

INSERT INTO `courses` VALUES (1,'Main Dishes'),(2,'Desserts'),(3,'Side Dishes'),(4,'Lunch and Snacks'),(5,'Appetizers'),(6,'Salads'),(7,'Breads'),(8,'Breakfast and Soups'),(9,'Beverages'),(10,'Condiments and Sauces'),(11,'Cocktails');

CREATE TABLE `cuisines` (
  `cuis_id` int(11) NOT NULL AUTO_INCREMENT,
  `type` varchar(45) NOT NULL,
  PRIMARY KEY (`cuis_id`),
  UNIQUE KEY `cus_id_UNIQUE` (`cuis_id`)
) ENGINE=InnoDB AUTO_INCREMENT=26;

INSERT INTO `cuisines` VALUES (1,'American'),(2,'Italian'),(3,'Asian'),(4,'Mexican'),(5,'Southern & Soul Food'),(6,'French'),(7,'Southwestern'),(8,'Barbecue'),(9,'Indian'),(10,'Chinese'),(11,'Cajun & Creole'),(12,'English'),(13,'Mediterranean'),(14,'Greek'),(15,'Spanish'),(16,'German'),(17,'Thai'),(18,'Moroccan'),(19,'Irish'),(20,'Japanese'),(21,'Cuban'),(22,'Hawaiian'),(23,'Swedish'),(24,'Hungarian'),(25,'Portuguese');

CREATE TABLE `reccourses` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `rec_id` int(11) NOT NULL,
  `cou_id` int(11) NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `id_UNIQUE` (`id`),
  KEY `cou_id_reccourses_fk_idx` (`cou_id`),
  KEY `rec_id_reccourses_fk_idx` (`rec_id`),
  CONSTRAINT `rec_id_reccourses_fk` FOREIGN KEY (`rec_id`) REFERENCES `recipes` (`rec_id`) ON DELETE CASCADE ON UPDATE NO ACTION,
  CONSTRAINT `cou_id_reccourses_fk` FOREIGN KEY (`cou_id`) REFERENCES `courses` (`cou_id`) ON DELETE CASCADE ON UPDATE NO ACTION
) ENGINE=InnoDB;

CREATE TABLE `reccuisines` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `rec_id` int(11) NOT NULL,
  `cuis_id` int(11) NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `id_UNIQUE` (`id`),
  KEY `cuis_id_reccuisines_fk_idx` (`cuis_id`),
  KEY `rec_id_reccuisines_fk_idx` (`rec_id`),
  CONSTRAINT `rec_id_reccuisines_fk` FOREIGN KEY (`rec_id`) REFERENCES `recipes` (`rec_id`) ON DELETE CASCADE ON UPDATE NO ACTION,
  CONSTRAINT `cuis_id_reccuisines_fk` FOREIGN KEY (`cuis_id`) REFERENCES `cuisines` (`cuis_id`) ON DELETE CASCADE ON UPDATE NO ACTION
) ENGINE=InnoDB;


ALTER TABLE `recipeuserdb`.`products` 
DROP FOREIGN KEY `in_id_products_fk`;
ALTER TABLE `recipeuserdb`.`products` 
CHANGE COLUMN `in_id` `in_id` INT(11) NULL ;
ALTER TABLE `recipeuserdb`.`products` 
ADD CONSTRAINT `in_id_products_fk`
  FOREIGN KEY (`in_id`)
  REFERENCES `recipeuserdb`.`ins` (`in_id`)
  ON DELETE CASCADE
  ON UPDATE NO ACTION;
  

ALTER TABLE `recipeuserdb`.`recins` 
DROP FOREIGN KEY `rec_id_reccins_fk`,
DROP FOREIGN KEY `in_id_reccins_fk`;
ALTER TABLE `recipeuserdb`.`recins` 
CHANGE COLUMN `rec_id` `rec_id` INT(11) NULL ,
CHANGE COLUMN `in_id` `in_id` INT(11) NULL ;
ALTER TABLE `recipeuserdb`.`recins` 
ADD CONSTRAINT `rec_id_reccins_fk`
  FOREIGN KEY (`rec_id`)
  REFERENCES `recipeuserdb`.`recipes` (`rec_id`)
  ON DELETE CASCADE
  ON UPDATE NO ACTION,
ADD CONSTRAINT `in_id_reccins_fk`
  FOREIGN KEY (`in_id`)
  REFERENCES `recipeuserdb`.`ins` (`in_id`)
  ON DELETE CASCADE
  ON UPDATE NO ACTION;

ALTER TABLE `recipeuserdb`.`reccourses` 
DROP FOREIGN KEY `rec_id_reccourses_fk`,
DROP FOREIGN KEY `cou_id_reccourses_fk`;
ALTER TABLE `recipeuserdb`.`reccourses` 
CHANGE COLUMN `rec_id` `rec_id` INT(11) NULL ,
CHANGE COLUMN `cou_id` `cou_id` INT(11) NULL ;
ALTER TABLE `recipeuserdb`.`reccourses` 
ADD CONSTRAINT `rec_id_reccourses_fk`
  FOREIGN KEY (`rec_id`)
  REFERENCES `recipeuserdb`.`recipes` (`rec_id`)
  ON DELETE CASCADE
  ON UPDATE NO ACTION,
ADD CONSTRAINT `cou_id_reccourses_fk`
  FOREIGN KEY (`cou_id`)
  REFERENCES `recipeuserdb`.`courses` (`cou_id`)
  ON DELETE CASCADE
  ON UPDATE NO ACTION;

ALTER TABLE `recipeuserdb`.`reccuisines` 
DROP FOREIGN KEY `rec_id_reccuisines_fk`,
DROP FOREIGN KEY `cuis_id_reccuisines_fk`;
ALTER TABLE `recipeuserdb`.`reccuisines` 
CHANGE COLUMN `rec_id` `rec_id` INT(11) NULL ,
CHANGE COLUMN `cuis_id` `cuis_id` INT(11) NULL ;
ALTER TABLE `recipeuserdb`.`reccuisines` 
ADD CONSTRAINT `rec_id_reccuisines_fk`
  FOREIGN KEY (`rec_id`)
  REFERENCES `recipeuserdb`.`recipes` (`rec_id`)
  ON DELETE CASCADE
  ON UPDATE NO ACTION,
ADD CONSTRAINT `cuis_id_reccuisines_fk`
  FOREIGN KEY (`cuis_id`)
  REFERENCES `recipeuserdb`.`cuisines` (`cuis_id`)
  ON DELETE CASCADE
  ON UPDATE NO ACTION;
