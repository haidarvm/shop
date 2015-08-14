RENAME TABLE image TO product_image;

ALTER TABLE `product` CHANGE `long_desc` `description` TEXT CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL;

ALTER TABLE `product_image` CHANGE `default` `status` TINYINT(1) NULL DEFAULT '1' COMMENT '1=active, 0=not_active';

ALTER TABLE `product_image` ADD `compress_img_url` VARCHAR(2000) NOT NULL AFTER `url`;
