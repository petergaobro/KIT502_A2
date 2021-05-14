-- admin table
CREATE TABLE `users_admin` (
    `id` int(11) NOT NULL AUTO_INCREMENT PRIMARY KEY,
    `type_user` varchar(100) NOT NULL,
    `username` varchar(100) NOT NULL,
    `first_name` varchar(100) NOT NULL,
    `last_name` varchar(100) NOT NULL,
    `email` varchar(100) NOT NULL,
    `mobile` varchar(100) NOT NULL,
    `password` varchar(100) NOT NULL,
    `address` varchar(100) NOT NULL,
    `country` varchar(100) NOT NULL,
    `abn` varchar(100) NOT NULL
) ENGINE = InnoDB DEFAULT CHARSET = latin1;
INSERT INTO `users_admin` (
        `id`,
        `type_user`,
        `username`,
        `first_name`,
        `last_name`,
        `email`,
        `mobile`,
        `password`,
        `address`,
        `country`,
        `abn`
    )
VALUES (
        1,
        'System manager',
        'peter',
        'Peng',
        'Gao',
        'peter@gmail.com',
        '0426612585',
        '202cb962ac59075b964b07152d234b70',
        '7 lincoln st',
        'China',
        ''
    ),
    (
        2,
        'Host',
        'petergao',
        'Peng',
        'Gao',
        'petergao@gmail.com',
        '0426612585',
        '202cb962ac59075b964b07152d234b70',
        '70 lincoln st',
        'Australia',
        '123'
    );
ALTER TABLE `users_admin`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,
    AUTO_INCREMENT = 3;
COMMIT;
-- customer table
CREATE TABLE `users_customer` (
    `id` int(11) NOT NULL AUTO_INCREMENT PRIMARY KEY,
    `c_username` varchar(100) NOT NULL,
    `c_first_name` varchar(100) NOT NULL,
    `c_last_name` varchar(100) NOT NULL,
    `c_email` varchar(100) NOT NULL,
    `c_mobile` varchar(100) NOT NULL,
    `c_password` varchar(100) NOT NULL,
    `c_address` varchar(100) NOT NULL,
    `c_country` varchar(100) NOT NULL
) ENGINE = InnoDB DEFAULT CHARSET = latin1;
ALTER TABLE `users_customer`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,
    AUTO_INCREMENT = 1;
COMMIT;
-- booking table
CREATE TABLE `booking` (
    `id` int(11) NOT NULL AUTO_INCREMENT PRIMARY KEY,
    -- `Location` varchar(100) NOT NULL,
    -- `checkin` varchar(100) NOT NULL,
    `con_checkin` varchar(100) NOT NULL,
    `con_checkout` varchar(100) NOT NULL,
    `con_guest` varchar(100) NOT NULL,
    `con_price` varchar(100) NOT NULL,
    `b_first_name` varchar(100) NOT NULL,
    `b_last_name` varchar(100) NOT NULL,
    `b_email` varchar(100) NOT NULL,
    `b_mobile` varchar(100) NOT NULL,
    `b_status` varchar(100) NOT NULL,
    `b_payment` varchar(100) NOT NULL,
    `b_reason` varchar(100) NOT NULL
) ENGINE = InnoDB DEFAULT CHARSET = latin1;
ALTER TABLE `booking`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,
    AUTO_INCREMENT = 1;
COMMIT;
-- house table
CREATE TABLE `house` (
    `id` int(11) NOT NULL AUTO_INCREMENT PRIMARY KEY,
    `house_name` varchar(100) NOT NULL,
    `house_desc` varchar(100) NOT NULL,
    `house_addr` varchar(100) NOT NULL,
    `house_city` varchar(100) NOT NULL,
    `house_price` varchar(100) NOT NULL,
    `house_guest` varchar(100) NOT NULL,
    `house_num_room` varchar(100) NOT NULL,
    `house_num_bathroom` varchar(100) NOT NULL,
    `house_checkin` varchar(100) NOT NULL,
    `house_checkout` varchar(100) NOT NULL,
    `house_entire` varchar(100) NOT NULL,
    `house_garage` varchar(100) NOT NULL,
    `house_smoke` varchar(100) NOT NULL,
    `house_internet` varchar(100) NOT NULL,
    `house_pet` varchar(100) NOT NULL,
    `house_image` longblob NOT NULL
) ENGINE = InnoDB DEFAULT CHARSET = latin1;
-- insert into house table database
INSERT INTO `house` (
        `id`,
        `house_name`,
        `house_desc`,
        `house_addr`,
        `house_city`,
        `house_price`,
        `house_guest`,
        `house_num_room`,
        `house_num_bathroom`,
        `house_checkin`,
        `house_checkout`,
        `house_entire`,
        `house_garage`,
        `house_smoke`,
        `house_internet`,
        `house_pet`,
        `house_image`
    )
VALUES (
        1,
        'UTAS',
        'Wonderful',
        'Sandy bay',
        'Hobart',
        '200',
        '4',
        '2',
        '1',
        '2021-04-22',
        '2021-05-30',
        'Yes',
        'Yes',
        'No',
        'Yes',
        'No',
        './img/background/background_img.jpg'
    ),
    (
        2,
        'Mental',
        'Wonderful',
        'Sandy bay',
        'Melbourne',
        '150',
        '3',
        '5',
        '3',
        '2021-05-20',
        '2021-05-31',
        'No',
        'Yes',
        'Yes',
        'No',
        'Yes',
        './img/booking/background.jpg'
    ),
    (
        3,
        'Onemore',
        'Perfect',
        'Hobart CBD',
        'Adelaide',
        '130',
        '2',
        '6',
        '1',
        '2021-06-20',
        '2021-05-31',
        'Yes',
        'No',
        'No',
        'No',
        'Yes',
        './img/booking/close.jpg'
    ),
    (
        4,
        'Onemore',
        'Bad',
        'Hobart CBD',
        'Melbourne',
        '130',
        '6',
        '6',
        '1',
        '2021-07-13',
        '2021-07-31',
        'Yes',
        'No',
        'No',
        'No',
        'Yes',
        './img/footer_social/fb.png'
    );
ALTER TABLE `house`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,
    AUTO_INCREMENT = 6;
COMMIT;
-- review table
CREATE TABLE `users_review` (
    `id` int(11) NOT NULL AUTO_INCREMENT PRIMARY KEY,
    `r_location` varchar(100) NOT NULL,
    `r_rating` varchar(100) NOT NULL,
    `r_comment` varchar(100) NOT NULL
) ENGINE = InnoDB DEFAULT CHARSET = latin1;
INSERT INTO `users_review` (
        `id`,
        `r_location`,
        `r_rating`,
        `r_comment`
    )
VALUES (
        1,
        'sandy vay',
        '3.4',
        'Perfect'
    );
ALTER TABLE `users_review`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,
    AUTO_INCREMENT = 2;
COMMIT;
-- Q&A
CREATE TABLE `Q_A` (
    `id` int(11) NOT NULL AUTO_INCREMENT PRIMARY KEY,
    `QA` varchar(100) NOT NULL
) ENGINE = InnoDB DEFAULT CHARSET = latin1;
ALTER TABLE `Q_A`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,
    AUTO_INCREMENT = 1;
COMMIT;