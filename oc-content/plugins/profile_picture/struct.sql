CREATE TABLE /*TABLE_PREFIX*/t_profile_picture(
id int( 10 ) unsigned NOT NULL AUTO_INCREMENT ,
user_id int( 10 ) ,
pic_ext VARCHAR( 10 ) ,
PRIMARY KEY ( id )
) ENGINE = InnoDB DEFAULT CHARACTER SET 'UTF8' COLLATE 'UTF8_GENERAL_CI';