
--

DELIMITER $$
--
-- Procedures
--
CREATE DEFINER=`xxx`@`localhost` PROCEDURE `procSaveUser`(IN `i_user_id` INT(11), IN `i_firstname` VARCHAR(45), IN `i_lastname` VARCHAR(45), IN `i_email` VARCHAR(255), IN `i_password` VARCHAR(55), IN `i_confirmpassword` VARCHAR(55), IN `i_city` VARCHAR(45), IN `i_country` VARCHAR(45), IN `i_role` VARCHAR(255), IN `i_status` VARCHAR(255),IN `i_mail_subscribe` int(11))
BEGIN
    if(i_user_id=0) then
      insert into user(firstname,lastname,email,password,confirmpassword,city,country,role,status,mail_subscribe) 
      
      values(i_firstname,i_lastname,i_email,i_password,i_confirmpassword,i_city ,i_country,i_role,i_status,i_mail_subscribe );
    Else
                 update user set firstname=i_firstname,lastname=i_lastname,
                 email=i_email,password=i_password ,confirmpassword=i_confirmpassword,city=i_city,
                 country=i_country,role=i_role,status=i_status,mail_subscribe=i_mail_subscribe
                 where user_id=i_user_id;
    end if;
END$$

DELIMITER ;

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE IF NOT EXISTS `user` (
  `user_id` int(11) NOT NULL AUTO_INCREMENT,
  `email` varchar(255) NOT NULL,
  `password` varchar(55) NOT NULL,
  `firstname` varchar(45) NOT NULL,
  `lastname` varchar(45) NOT NULL,
  `role` varchar(255) NOT NULL,
  `status` varchar(255) NOT NULL,
  `city` varchar(45) NOT NULL,
  `country` varchar(45) NOT NULL,
  `confirmpassword` varchar(55) NOT NULL,
  `mail_subscribe` int(11) NOT NULL,
  PRIMARY KEY (`user_id`),
  UNIQUE KEY `user_id` (`user_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=89 ;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`user_id`, `email`, `password`, `firstname`, `lastname`, `role`, `status`, `city`, `country`, `confirmpassword`, `mail_subscribe`) VALUES
(12, 'xxx', 'eee', 'yyy', 'zzz', 'softwareprogrammer', 'active', 'd1', 'malayasia', 'eee', 1);

