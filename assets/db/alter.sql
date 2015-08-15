RENAME TABLE image TO product_image;

ALTER TABLE `product` CHANGE `long_desc` `description` TEXT CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL;

ALTER TABLE `product_image` CHANGE `default` `status` TINYINT(1) NULL DEFAULT '1' COMMENT '1=active, 0=not_active';

ALTER TABLE `product_image` ADD `compress_img_url` VARCHAR(2000) NOT NULL AFTER `url`;






CREATE TRIGGER setFileName 
AFTER INSERT ON `product_image` 
FOR EACH ROW  
    UPDATE `product_image` SET `order` = NEW.id WHERE `id` = NEW.id; 


CREATE TABLE `product_image` (
  `image_id` int(11) NOT NULL,
  `product_id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `default` tinyint(1) NOT NULL DEFAULT '0' COMMENT '1=default, 0=not_show',
  `extension` varchar(20) NOT NULL,
  `size` varchar(40) NOT NULL,
  `type` varchar(20) NOT NULL,
  `url` varchar(255) NOT NULL,
  `medium_url` varchar(255) NOT NULL,
  `thumbnail_url` varchar(255) NOT NULL,
  PRIMARY KEY (`image_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;


ALTER TABLE `product_image` CHANGE `ext` `ext` VARCHAR(20) CHARACTER SET utf8 COLLATE utf8_general_ci NULL, CHANGE `size` `size` FLOAT NULL, CHANGE `width` `width` INT(11) NULL, CHANGE `height` `height` INT(11) NULL, CHANGE `type` `type` VARCHAR(20) CHARACTER SET utf8 COLLATE utf8_general_ci NULL, CHANGE `path` `path` VARCHAR(500) CHARACTER SET utf8 COLLATE utf8_general_ci NULL, CHANGE `thumbnail_url` `thumbnail_url` VARCHAR(255) CHARACTER SET utf8 COLLATE utf8_general_ci NULL;

CREATE TABLE `product` (
  `product_id` int(11) NOT NULL AUTO_INCREMENT,
  `category_id` int(3) NOT NULL,
  `name` varchar(300) NOT NULL,
  `slug` varchar(255) NOT NULL,
  `shortdesc` varchar(255) NOT NULL,
  `longdesc` text NOT NULL,
  `product_order` int(11) NOT NULL,
  `class` varchar(255) NOT NULL,
  `grouping` varchar(16) NOT NULL,
  `status` enum('active','inactive') NOT NULL DEFAULT 'active',
  `featured` enum('none','front','webshop') NOT NULL,
  `other_feature` enum('none','most sold','new product') NOT NULL,
  `image` varchar(255) NOT NULL,
  `thumbnail` varchar(255) NOT NULL,
  `price` double DEFAULT NULL,
  `stock` int(4) NOT NULL,
  `create_date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `stock_status` varchar(45) DEFAULT 'in-stock',
  `ship_restrict` varchar(45) DEFAULT NULL,
  PRIMARY KEY (`product_id`),
  KEY `slug` (`slug`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;
