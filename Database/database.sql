drop database if exists DB2;
create database DB2;
use DB2;

create table users (
	id int (11) primary key auto_increment,
	username varchar(255),
	password varchar(255),
	isActive tinyint(4),
	u_role varchar(45),
    email varchar(100));


create table messages (
	id int(11) primary key auto_increment,
    message varchar(255),
    created_at datetime);

create table employees (
	id int(11) primary key auto_increment,
    name varchar(255),
    identify_card_num int(11),
    title varchar(255),
    email varchar(255),
    salary int(11));
    
create table employees_audit (
	id int(11) primary key auto_increment,
    emp_id int(11),
    action varchar(45),
    changed_on datetime,
    message varchar(500),
    foreign key(emp_id) references employees(id));

create table customers (
	id int(11) primary key auto_increment,
    username varchar(255),
    password varchar(255),
    name varchar(255),
    address varchar(255),
    level varchar(100),
    email varchar (255),
    sdt varchar(255));
        
create table orders (
	id int(11) primary key auto_increment,
    cus_id int(11),
    date timestamp,
    status varchar(45),
    foreign key(cus_id) references customers(id));
    
create table categories (
	id int(11) primary key auto_increment,
    name varchar(255),
    code varchar(45),
    description text);

create table products (
	id int(11) primary key auto_increment,
    pname varchar(255),
    price int(11),
    quantity int(11),
    description text,
    category_id int(11),
    gender varchar(500),
    img varchar(255),
    status varchar(255),
    sale int (11),
    foreign key(category_id) references categories(id));

create table ords_prods (
	product_id int(11) auto_increment,
    order_id int(11),
    quantity int(11),
    price int(11),
    total int(11),
    primary key (product_id,order_id),
    foreign key(product_id) references products(id),
    foreign key(order_id) references orders(id));
    
create table product_audit(
	id int(11) primary key auto_increment,
    id_prod int(11),
    old_quantity int(11),
    new_quantity int(11),
    action varchar(45),
    changed_on datetime,
    message varchar(500),
    foreign key(id_prod) references products(id)
);

create table slide(
	id int(11) primary key auto_increment,
    name varchar(225),
    img varchar(225)
);

ALTER TABLE `employees` CHANGE `id` `id` INT(11) NOT NULL AUTO_INCREMENT, 
CHANGE `name` `name` VARCHAR(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_520_ci NULL DEFAULT NULL, 
CHANGE `identify_card_num` `identify_card_num` INT(11) NULL DEFAULT NULL, 
CHANGE `title` `title` VARCHAR(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_520_ci NULL DEFAULT NULL, 
CHANGE `email` `email` VARCHAR(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_520_ci NULL DEFAULT NULL, 
CHANGE `salary` `salary` INT(11) NULL DEFAULT NULL;

ALTER TABLE `categories` CHANGE `id` `id` INT(11) NOT NULL AUTO_INCREMENT, 
CHANGE `name` `name` VARCHAR(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_520_ci NULL DEFAULT NULL,
CHANGE `code` `code` VARCHAR(45) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_520_ci NULL DEFAULT NULL, 
CHANGE `description` `description` TEXT CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_520_ci NULL DEFAULT NULL;

ALTER TABLE `customers` CHANGE `id` `id` INT(11) NOT NULL AUTO_INCREMENT, 
CHANGE `name` `name` VARCHAR(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_520_ci NULL DEFAULT NULL, 
CHANGE `address` `address` VARCHAR(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_520_ci NULL DEFAULT NULL, 
CHANGE `level` `level` VARCHAR(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_520_ci NULL DEFAULT NULL, 
CHANGE `email` `email` VARCHAR(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_520_ci NULL DEFAULT NULL, 
CHANGE `sdt` `sdt` VARCHAR(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_520_ci NULL DEFAULT NULL;

ALTER TABLE `employees_audit` CHANGE `id` `id` INT(11) NOT NULL AUTO_INCREMENT, 
CHANGE `emp_id` `emp_id` INT(11) NULL DEFAULT NULL, 
CHANGE `action` `action` VARCHAR(45) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_520_ci NULL DEFAULT NULL, 
CHANGE `changed_on` `changed_on` DATETIME NULL DEFAULT NULL, 
CHANGE `message` `message` VARCHAR(500) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_520_ci NULL DEFAULT NULL;

ALTER TABLE `messages` CHANGE `id` `id` INT(11) NOT NULL AUTO_INCREMENT, 
CHANGE `message` `message` VARCHAR(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_520_ci NULL DEFAULT NULL, 
CHANGE `created_at` `created_at` DATETIME NULL DEFAULT NULL;

ALTER TABLE `orders` CHANGE `status` `status` VARCHAR(45) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_520_ci NULL DEFAULT NULL;

ALTER TABLE `products` CHANGE `id` `id` INT(11) NOT NULL AUTO_INCREMENT, 
CHANGE `pname` `pname` VARCHAR(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_520_ci NULL DEFAULT NULL, 
CHANGE `description` `description` TEXT CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_520_ci NULL DEFAULT NULL, 
CHANGE `gender` `gender` VARCHAR(500) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_520_ci NULL DEFAULT NULL, 
CHANGE `img` `img` VARCHAR(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_520_ci NULL DEFAULT NULL, 
CHANGE `status` `status` VARCHAR(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_520_ci NULL DEFAULT NULL;

ALTER TABLE `product_audit` CHANGE `id` `id` INT(11) NOT NULL AUTO_INCREMENT, 
CHANGE `action` `action` VARCHAR(45) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_520_ci NULL DEFAULT NULL, 
CHANGE `message` `message` VARCHAR(500) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_520_ci NULL DEFAULT NULL;

ALTER TABLE `slide` CHANGE `name` `name` VARCHAR(225) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_520_ci NULL DEFAULT NULL, 
CHANGE `img` `img` VARCHAR(225) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_520_ci NULL DEFAULT NULL;

ALTER TABLE `users` CHANGE `username` `username` VARCHAR(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_520_ci NULL DEFAULT NULL, 
CHANGE `password` `password` VARCHAR(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_520_ci NULL DEFAULT NULL, 
CHANGE `isActive` `isActive` TINYINT(4) NULL DEFAULT NULL, 
CHANGE `u_role` `u_role` VARCHAR(45) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_520_ci NULL DEFAULT NULL, 
CHANGE `email` `email` VARCHAR(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_520_ci NULL DEFAULT NULL;

INSERT INTO `db2`.`categories` (`id`, `name`, `code`, `description`) 
	VALUES ('1', 'Adidas', 'Ad', 'Giày thời trang thể thao')
			,('2', 'Jordan', 'Jd', 'Giày đá bóng')
			,('3', 'Converse', 'Cv', 'giày điền kinh, thời trang')
			,('4', 'Reebok', 'Rb', 'giày xe đạp')
			,('5', 'Vans', 'Vs', 'giày bóng đá')
			,('6', 'Under Armour', 'UA', 'giày patin')
			,('7', 'Nike', 'Ni', 'giày thể thao thời trang')
			,('8', 'Puma', 'Pu', 'giày patin')
			,('9', 'DC', 'DC', 'mẫu giày chạy bộ,thể thao thời trang ')
			,('10', 'New Balance', 'NBa', 'giày thể thao thời trang');
            
INSERT INTO `db2`.`products` (`id`, `pname`, `price`, `quantity`, `description`, `category_id`,`gender`, `img`, `status`,`sale`) 
	VALUES ('1', 'Adidas Superstar Boost', '2368000', '12', 'Full size', '1','All', 'https://images.solecollector.com/complex/image/upload/fl_lossy,q_auto/ypox0w2ynvesrkjj0nso.jpg','hot',0),
			('2', 'Adidas Superstar Primeknit Bounce', '1500000', '20', 'Full size', '1','All', 'http://www.nicekicks.com/files/2016/08/adidas-Superstar-80s-Primeknit-Black-White.jpg','sale',10),
			('3', 'Adidas Superstar 80s Primeknit', '1700000', '21', 'Full size', '1','Female', 'https://i1.wp.com/www.nicekicks.com/files/2016/09/adidas-superstar-80s-primeknit-grey.jpg?fit=750%2C400&ssl=1','sell well',0),
			('4', 'Adidas Superstar Boost', '1200000', '21', 'Full size', '1','Male', 'https://a.ipricegroup.com/media/Sneaker/adidas/Superstar/Giay_Superstar_Primeknit_Slip_On.jpg','hot',0),
			('5', 'Superstar Boost Primeknit multicolor', '1550000', '21', 'Full size', '1','Male', 'https://a.ipricegroup.com/media/Sneaker/adidas/Superstar/Giay_adias_Superstar_Boost_Primeknit_multicolor_nam.jpg','sale',40),
		 ('6', 'Air Jordan 1 Retro High OG “Chicago”', '1550000', '35', 'Full size', '2', 'Male', 'https://i0.wp.com/hnbmg.com/wp-content/uploads/2015/06/11692924_10153571436745695_2086990296_n.jpg?zoom=0.5&resize=840%2C630','hot',0),
		 ('7', ' Fragment x Air Jordan 1 Retro High OG', '1200000', '24', '34,39,42', '2', 'Male', 'https://i2.wp.com/hnbmg.com/wp-content/uploads/2015/06/best-air-jordan-2014-air-jordan-1-fragment.jpg?zoom=0.5&resize=800%2C498','sale',50),
		 ('8', ' Air Jordan 3 Retro ’88 “White Cement”', '1500000', '45', '35,37,39', '2', 'Female', 'https://i0.wp.com/hnbmg.com/wp-content/uploads/2015/06/best-air-jordan-2013-air-jordan-3-88-white-cement.jpg?zoom=0.5&resize=800%2C464','sell well',0),
		 ('9', 'Air Jordan 11 Retro “Bred”', '1200000', '42', '37,39,42', '2', 'Male', 'https://i2.wp.com/hnbmg.com/wp-content/uploads/2015/06/best-air-jordan-2012-air-jordan-11-bred-retro.jpg?zoom=0.5&resize=800%2C466','hot',0),
		 ('10', 'Air Jordan 1 Retro High “Banned”', '1549000', '32', '34,39,42', '2', 'Male', 'https://i1.wp.com/hnbmg.com/wp-content/uploads/2015/06/best-air-jordan-2011-air-jordan-1-banned.jpg?zoom=0.5&resize=800%2C466','sale',45),
		 ('11', 'Converse Chuck Taylor All Star', '249000', '21', '37,39,40', '3', 'Female', 'https://i.pinimg.com/474x/06/50/dc/0650dcb84eedbcb6ea98494760e93e80--red-converse-shoes-red-chucks.jpg','sell well',0),
		 ('12', 'Chuck Taylor All Star X Nike Flyknit', '549000', '32', '34,39,42', '3', 'Male', 'https://www.converse.com/on/demandware.static/-/Sites-ConverseMaster/default/dw06bda3cf/images/hi-res/156735_standard.jpg?sw=580&sh=580&sm=fit','hot',0),
		 ('13', 'Converse x COMME des GARÇONS Play', '1390000', '23', '37,39,40', '3', 'Female', 'https://cdn.shopify.com/s/files/1/0408/9909/products/download_4.png?v=1520026833','sale',20),
		 ('14', 'Converse Spring Blossom Pack', '819000', '54', '37,39,40', '3', 'Female', 'http://www.hypeandstuff.com/wp-content/uploads/2017/03/converse-spring-3.jpg','sell well',0),
		 ('15', 'Converse Chuck Taylor All Star 70s Suede', '879000', '52', '34,39,40,42', '3', 'All', 'https://cdn5.kicksonfire.com/wp-content/uploads/2015/10/Converse-Chuck-Taylor-All-Star-70-Hi-1.jpg?x37335','hot',0),
		 ('16', 'Reebok Instapump Fury x Vertements', '230000', '21', '34,39,40,42', '4', 'All', 'https://agiare.vn/wp-content/uploads/2018/06/Reebok-X-Vetements-Instapump-Fury.jpg','sale',15),
		 ('17', 'Reebok chống thấm nước Gore Tex', '540000', '36', '37,39,40', '4', 'Female', 'https://agiare.vn/wp-content/uploads/2018/06/Reebok-Gore-Tex.jpg','sell well',0),
		 ('18', 'Giày bóng rổ Reebok DMX', '859000', '24', '34,39,42', '4', 'All', 'https://agiare.vn/wp-content/uploads/2018/06/reebok-DMX.jpg','hot',0),
		 ('19', 'Reebok Classic Leather', '449000', '19', '34,39,40,42', '4', 'All', 'https://agiare.vn/wp-content/uploads/2018/06/reebok-pink.jpg','sale',20),
		 ('20', 'Reebok The Pump', '399000', '28', '34,39,42', '4', 'Male', 'https://agiare.vn/wp-content/uploads/2018/06/reebok-pump.jpg','sell well',0),
		 ('21', 'Vans Old Skool Platform', '199000', '35', '34,39,42', '5', 'All', 'https://kenh14cdn.com/2017/g9-1506333089744.jpg','hot',0),
		 ('22', 'Vans Mono Canvas Old Skool', '469000', '87', '34,39,40,42', '5', 'All', 'https://kenh14cdn.com/2017/g7-1506333089740.jpg','hot',0),
		 ('23', 'Vans Suede Authentic Platform 2.0', '469000', '56', '37,39,40', '5', 'Female', 'https://kenh14cdn.com/2017/g6-1506333089738.jpg','sale',10),
		 ('24', 'Vans Blue White Sk8 Hi 38 DX Trainers', '329000', '65', '34,39,40,42', '5', 'All', 'https://kenh14cdn.com/2017/g13-1506333089750.jpg','hot',0),
		 ('25', 'Vans Sk8-Hi Two-Tone Sneaker', '249000', '42', '34,39,42', '5', 'Male', 'https://kenh14cdn.com/2017/g10-1506333089745.jpeg','sell well',0),
		 ('26', '“All-Star” Curry 4', '249000', '21', '34,39,42', '6', 'Female', 'https://i1.wp.com/kicksgeeks.vn/wp-content/uploads/2018/10/under-armour-2.jpg?resize=696%2C468&ssl=1','sale',50),
		 ('27', '“Nothing But Nets” Curry 4 Low', '329000', '21', '34,39,40,42', '6', 'Male', 'https://i2.wp.com/kicksgeeks.vn/wp-content/uploads/2018/10/under-armour-3.jpg?resize=696%2C468&ssl=1','hot',0),
		 ('28', '“Wired Different” Curry 5', '329000', '23', '34,39,40,42', '6', 'Male', 'https://i2.wp.com/kicksgeeks.vn/wp-content/uploads/2018/10/under-armour-4.jpg?resize=696%2C468&ssl=1','sale',29),
		 ('29', '“Sunburst” Curry 5', '469000', '24', '34,39,42', '6', 'All', 'https://i1.wp.com/kicksgeeks.vn/wp-content/uploads/2018/10/under-armour-8.jpg?resize=696%2C468&ssl=1','sell well',0),
		 ('30', '“Dub Nation” Curry 4', '469000', '25', '34,39,40,42', '6', 'Male', 'https://i2.wp.com/kicksgeeks.vn/wp-content/uploads/2018/10/under-armour-9.jpg?resize=696%2C468&ssl=1','hot',0),
		 ('31', 'Nike Classic Corter Leather Lux', '239000', '23', '34,39,40,42', '7', 'Female', 'https://s2.bloganchoi.com/wp-content/uploads/2018/03/nike-cortez-pink.jpg','sale',30),
		 ('32', 'Nike Air Max 97 Ultra', '199000', '24', '35,36,37,38', '7', 'All', 'https://s2.bloganchoi.com/wp-content/uploads/2018/03/nike-air-max97-gold-696x387.jpg','sell well',0),
		 ('33', 'Nike Air More Uptempo', '549000', '25', '34,39,40,42', '7', 'Female', 'https://s2.bloganchoi.com/wp-content/uploads/2018/03/nike-air-more-uptempo-tri-color-696x435.jpg','hot',0),
		 ('34', 'Nike City Loop', '345000', '28', '35,36,37,38', '7', 'Female', 'https://s1.bloganchoi.com/wp-content/uploads/2018/03/nike-city-loop-pink.jpg','sale',40),
		 ('35', 'Nike Air Force 1', '289000', '29', '34,39,42', '7', 'Male', 'https://s1.bloganchoi.com/wp-content/uploads/2018/03/nike-air-force1-mid-shoes-clearance-696x489.jpg','sell well',0),
		 ('36', 'Puma Fenty Creeper', '349000', '31', '34,39,42', '8', 'Female', 'https://agiare.vn/wp-content/uploads/2018/02/rsz_giaypuma01.jpg','hot',0),
		 ('37', 'PUMA nữ Fenty P698', '240000', '32', '34,39,40,42', '8', 'Female', 'https://ostun.com/image/cache/catalog/giay/puma/2017/puma-fenty/365054-01/puma-fenty-by-rihanna-bow-women-s-sneakers-silver-pink-365054-01_2-590x443.jpg','sale',20),
		 ('38', 'Puma Fenty Trainer', '169000', '23', '34,39,40,42', '8', 'All', 'https://sneakernews.com/wp-content/uploads/2017/06/rihanna-puma-fenty-trainer-release-date-info-11.jpg','sell well',0),
		 ('39', 'PUMA Suede', '179000', '25', '35,36,37,38', '8', 'All', 'https://m.media-amazon.com/images/I/81yyYCAzFkL._SX480_.jpg','hot',0),
		 ('40', 'BAPE x PUMA Ignite', '349000', '29', '35,36,37,38', '8', 'Male', 'https://cdn3.volusion.com/djnwh.trfgs/v/vspfiles/photos/1C23-191-911-2.jpg?1466242853','sale',15),
		 ('41', 'Legacy', '239000', '41', '35,36,37,38', '9', 'All', 'https://ssl.quiksilver.com/www/store.quiksilver.eu/html/images/catalogs/global/dcshoes-products/all/default/medium-large2/adys100476_legacyog,p_bdw_frt2.jpg','sell well',0),
		 ('42', 'E.Tribeka LE Leather', '258000', '23', '34,39,40,42', '9', 'Male', 'https://ssl.quiksilver.com/www/store.quiksilver.eu/html/images/catalogs/global/dcshoes-products/all/default/medium-large2/adys700146_etribekale,p_gdb_frt2.jpg','hot',0),
		 ('43', 'Manteca Shoes', '248000', '25', '35,36,37,38', '9', 'Male', 'https://ssl.quiksilver.com/www/store.quiksilver.eu/html/images/catalogs/global/dcshoes-products/all/default/xlarge/adys100177_manteca,p_xskn_frt2.jpg','sale',20),
		 ('44', 'Syntax Shoes', '239000', '24', '34,39,40,42', '9', 'Female', 'https://ssl.quiksilver.com/www/store.quiksilver.eu/html/images/catalogs/global/dcshoes-products/all/default/xlarge/adys300290_syntax,p_wny_frt2.jpg','sell well',0),
		 ('45', 'Legacy 98 Slim Shoes', '258000', '45', '35,36,37,38', '9', 'Male', 'https://ssl.quiksilver.com/www/store.quiksilver.eu/html/images/catalogs/global/dcshoes-products/all/default/xlarge/adys100445_legacy98slim,p_xbrw_frt2.jpg','hot',0),
		 ('46', 'Giày sneaker New Balance 247', '239000', '23', '34,39,40,42', '10', 'Male', 'https://a.ipricegroup.com/media/Ed-Rumour_Mills/New_Balance/Sneaker/Giay_New_Balance_247.jpg','sale',20),
		 ('47', 'Giày sneaker New Balance 300', '219000', '24', '35,36,37,38', '10', 'All', 'https://a.ipricegroup.com/media/Ed-Rumour_Mills/New_Balance/Sneaker/Giay_New_Balance_346.jpg','sell well',0),
		 ('48', 'Giày thể thao New Balance 996', '229000', '42', '35,36,37,38', '10', 'All', 'https://a.ipricegroup.com/media/Ed-Rumour_Mills/New_Balance/Sneaker/Giay_New_Balance_996.jpg','hot',0),
		 ('49', 'Giày sneaker New Balance 574', '399000', '52', '34,39,40,42', '10', 'Female', 'https://a.ipricegroup.com/media/Ed-Rumour_Mills/New_Balance/Sneaker/Giay_New_Balance_574_Sport.jpg','sale',35),
		 ('50', 'Giày chạy bộ New Balance 910v4', '499000', '32', '34,39,40,42', '10', 'All', 'https://a.ipricegroup.com/media/Ed-Rumour_Mills/New_Balance/Sneaker/Giay_New_Balance_910v4.jpg','sell well',0);
INSERT INTO `db2`.`users` (`id`, `username`, `password`, `u_role`,`email`) 
VALUES ('1', 'Administrator', '$2y$10$GXW.K5mKwiJ0e7lZpVPkYejLyae6ztLJKF6IoyvDn80.RzlbccXXS', 'Admin','adminshopOn@gmail.com')
		,('2', 'Customer', '987654321', 'Sale','saleshopOn@gmail.com');

insert into employees (id,name, identify_card_num, title,email,salary) values 
(1,'Đỗ Duy Thảo', 1, 'Sale','doduythao@gmail.com',122000),
(2,'Đỗ Duy Thanh', 2 ,'Sale', 'doduythanh@gmail.com',122000),
(3,'Đỗ Duy Thọ', 3, 'Sale','doduytho@gmail.com',122000),
(4,'Đỗ Duy Thinh', 4,'Sale', 'doduythinh@gmail.com',122000);

INSERT INTO `db2`.`slide` (`id`, `name`, `img`) 
VALUES ('1', 'salomon', 'https://salt.tikicdn.com/ts/categoryblock/e8/fc/a0/9ef836d66e612a1ab0fa78025779654a.jpg'),
('2', 'bisthunter', 'http://vinagiay.vn/uploads/slides/slides_1547265229.jpg'),
('3', 'sale 50%', 'http://genknews.genkcdn.vn/thumb_w/640/2016/15726162-1228386480573379-1772749156-o-1482985108059.png'),
('4', 'uudai', 'https://www.khuyenmaivui.com/wp-content/uploads/2017/06/bitis-khuyen-mai-giam-gia-cach-mang-mua-sam-11.11-giam-gia-20.jpg'),
('5', 'dica', 'http://pgsm.edu.vn/wp-content/uploads/2017/11/BITIS-3.png');

INSERT INTO `db2`.`customers` (`id`, `username`,`password`,`name`, `address`, `level`, `email`, `sdt`) 
VALUES ('1','levana','$2y$10$GXW.K5mKwiJ0e7lZpVPkYejLyae6ztLJKF6IoyvDn80.RzlbccXXS', 'Lê Văn A', '101B Lê Hữu Trác, Phước Mỹ, Sơn Trà, Đà Nẵng', '1', 'levana@gmail.com', '034569872'),
('2','levanha','$2y$10$GXW.K5mKwiJ0e7lZpVPkYejLyae6ztLJKF6IoyvDn80.RzlbccXXS', 'Lê Văn Hà', '120A Nguyễn Văn Thoại, Bắc Mỹ Phú, Ngũ Hành Sơn, Đà Nẵng ', '2', 'levanha@gmail.com', '036547895'),
('3','levanmo','$2y$10$GXW.K5mKwiJ0e7lZpVPkYejLyae6ztLJKF6IoyvDn80.RzlbccXXS', 'Lê Văn Mơ', '120A Nguyễn Văn Thoại, Bắc Mỹ Phú, Ngũ Hành Sơn, Đà Nẵng ', '3', 'levanmo@gmail.com', '045689753'),
('4','nguyenhoang','$2y$10$GXW.K5mKwiJ0e7lZpVPkYejLyae6ztLJKF6IoyvDn80.RzlbccXXS', 'Nguyễn Văn Hoàng', '101B Lê Hữu Trác, Phước Mỹ, Sơn Trà, Đà Nẵng', '4', 'hoangnguyen@gmail.com', '034567891');


 INSERT INTO `db2`.`orders` (`id`, `cus_id`, `date`, `status`) 
 VALUES ('1', '1', '2019-01-01 13:00:0', 'pending'),
	('2', '1', '2018-12-01 13:01:0', 'completed'),
	('3', '1', '2018-03-01 13:12:0', 'pending'),
	('4', '2', '2019-04-01 13:32:0', 'completed'),
	('5', '3', '2019-05-01 13:33:0', 'pending'),
	('6', '2', '2019-06-01 13:12:0', 'completed'),
	('7', '4', '2019-07-01 13:54:0', 'pending'),
	('8', '4', '2019-08-01 13:11:0', 'completed'),
	('9', '2', '2019-09-01 13:11:0', 'completed'),
	('10', '2', '2019-11-01 13:32:0', 'completed');

INSERT INTO `db2`.`ords_prods` (`product_id`, `order_id`, `quantity`, `price`, `total`) 
      VALUES('1', '1', '1', '2368000', '2368000'),
	  ('2', '1', '1', '1500000', '1500000'),
      ('1', '2', '1', '2368000', '2368000'),
      ('2', '2', '2', '1500000', '2368000'),
      ('1', '3', '5', '2368000', '5090000'),
      ('23', '1', '1', '469000', '469000'),
      ('2', '3', '1', '1500000', '1500000'),
      ('5', '1', '2', '1550000', '2368000'),
      ('7', '2', '2', '1200000', '2168000'),
      ('8', '1', '2', '1500000', '2368000'),
      ('8', '5', '2', '1500000', '2368000'),
      ('8', '6', '5', '1500000', '2368000'),
      ('9', '5', '4', '1200000', '2168000'),
      ('10', '1', '3', '1549000', '2468000');







	
    
