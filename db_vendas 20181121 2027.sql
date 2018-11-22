-- MySQL Administrator dump 1.4
--
-- ------------------------------------------------------
-- Server version	5.5.5-10.1.36-MariaDB


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;


--
-- Create schema db_imp_acai
--

CREATE DATABASE IF NOT EXISTS db_imp_acai;
USE db_imp_acai;

--
-- Definition of table `tb_calda`
--

DROP TABLE IF EXISTS `tb_calda`;
CREATE TABLE `tb_calda` (
  `cd_calda` int(11) NOT NULL AUTO_INCREMENT,
  `nm_calda` varchar(55) NOT NULL,
  PRIMARY KEY (`cd_calda`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tb_calda`
--

/*!40000 ALTER TABLE `tb_calda` DISABLE KEYS */;
INSERT INTO `tb_calda` (`cd_calda`,`nm_calda`) VALUES 
 (1,'Chocolate');
/*!40000 ALTER TABLE `tb_calda` ENABLE KEYS */;


--
-- Definition of table `tb_cliente`
--

DROP TABLE IF EXISTS `tb_cliente`;
CREATE TABLE `tb_cliente` (
  `cd_cliente` int(11) NOT NULL AUTO_INCREMENT,
  `nm_cliente` char(60) NOT NULL,
  `nr_celular` varchar(16) NOT NULL,
  PRIMARY KEY (`cd_cliente`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tb_cliente`
--

/*!40000 ALTER TABLE `tb_cliente` DISABLE KEYS */;
INSERT INTO `tb_cliente` (`cd_cliente`,`nm_cliente`,`nr_celular`) VALUES 
 (1,'Carlos Eduardo Gimenes Moura','(13) 9.9629-0768'),
 (2,'Carlos Eduardo Gimenes Moura','(13) 9.9629-0768');
/*!40000 ALTER TABLE `tb_cliente` ENABLE KEYS */;


--
-- Definition of table `tb_complemento`
--

DROP TABLE IF EXISTS `tb_complemento`;
CREATE TABLE `tb_complemento` (
  `cd_complemento` int(11) NOT NULL AUTO_INCREMENT,
  `nm_complemento` varchar(55) NOT NULL,
  PRIMARY KEY (`cd_complemento`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tb_complemento`
--

/*!40000 ALTER TABLE `tb_complemento` DISABLE KEYS */;
INSERT INTO `tb_complemento` (`cd_complemento`,`nm_complemento`) VALUES 
 (1,'Bolinha de chocolate 1');
/*!40000 ALTER TABLE `tb_complemento` ENABLE KEYS */;


--
-- Definition of table `tb_endereco`
--

DROP TABLE IF EXISTS `tb_endereco`;
CREATE TABLE `tb_endereco` (
  `cd_endereco` int(11) NOT NULL AUTO_INCREMENT,
  `nm_logradouro` varchar(65) NOT NULL,
  `nm_bairro` varchar(50) NOT NULL,
  `nr_casa` varchar(10) NOT NULL,
  `nm_bloco` varchar(5) DEFAULT NULL,
  `cd_cliente` int(11) DEFAULT NULL,
  `nr_cep` varchar(9) DEFAULT NULL,
  PRIMARY KEY (`cd_endereco`),
  KEY `cd_cliente` (`cd_cliente`),
  CONSTRAINT `tb_endereco_ibfk_1` FOREIGN KEY (`cd_cliente`) REFERENCES `tb_cliente` (`cd_cliente`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tb_endereco`
--

/*!40000 ALTER TABLE `tb_endereco` DISABLE KEYS */;
INSERT INTO `tb_endereco` (`cd_endereco`,`nm_logradouro`,`nm_bairro`,`nr_casa`,`nm_bloco`,`cd_cliente`,`nr_cep`) VALUES 
 (2,'','','',NULL,2,NULL);
/*!40000 ALTER TABLE `tb_endereco` ENABLE KEYS */;


--
-- Definition of table `tb_fruta`
--

DROP TABLE IF EXISTS `tb_fruta`;
CREATE TABLE `tb_fruta` (
  `cd_fruta` int(11) NOT NULL AUTO_INCREMENT,
  `nm_fruta` varchar(45) NOT NULL,
  PRIMARY KEY (`cd_fruta`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tb_fruta`
--

/*!40000 ALTER TABLE `tb_fruta` DISABLE KEYS */;
INSERT INTO `tb_fruta` (`cd_fruta`,`nm_fruta`) VALUES 
 (1,'Abacaxi'),
 (2,'Banana'),
 (3,'Manga'),
 (4,'Morango'),
 (5,'Kiwi');
/*!40000 ALTER TABLE `tb_fruta` ENABLE KEYS */;


--
-- Definition of table `tb_pedido`
--

DROP TABLE IF EXISTS `tb_pedido`;
CREATE TABLE `tb_pedido` (
  `cd_pedido` int(11) NOT NULL AUTO_INCREMENT,
  `ds_tamanho` varchar(40) NOT NULL,
  `ds_fruta` char(100) DEFAULT NULL,
  `ds_calda` char(100) DEFAULT NULL,
  `ds_complemento` char(100) DEFAULT NULL,
  `ds_sorvete` char(100) DEFAULT NULL,
  `dt_data` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `cd_cliente` int(11) NOT NULL,
  `nr_bola` varchar(30) DEFAULT NULL,
  `nm_inteiro` varchar(150) DEFAULT NULL,
  `nm_meioameio` varchar(200) DEFAULT NULL,
  `vl_total` decimal(9,2) DEFAULT NULL,
  PRIMARY KEY (`cd_pedido`),
  KEY `cd_cliente` (`cd_cliente`),
  CONSTRAINT `tb_pedido_ibfk_1` FOREIGN KEY (`cd_cliente`) REFERENCES `tb_cliente` (`cd_cliente`)
) ENGINE=InnoDB AUTO_INCREMENT=29 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tb_pedido`
--

/*!40000 ALTER TABLE `tb_pedido` DISABLE KEYS */;
INSERT INTO `tb_pedido` (`cd_pedido`,`ds_tamanho`,`ds_fruta`,`ds_calda`,`ds_complemento`,`ds_sorvete`,`dt_data`,`cd_cliente`,`nr_bola`,`nm_inteiro`,`nm_meioameio`,`vl_total`) VALUES 
 (1,'Pequeno','Abacaxi,Banana,Manga','Chocolate','Bolinha de chocolate 1','','2018-11-11 19:10:04',11,'','0','Meio-a-meio','0.00'),
 (2,'Pequeno','','Chocolate','','','2018-11-11 19:23:55',11,'','0','','0.00'),
 (3,'Pequeno','Abacaxi','Chocolate','Bolinha de chocolate 1','','2018-11-16 21:02:47',11,'','0','','0.00'),
 (4,'Pequeno','Abacaxi','Chocolate','Bolinha de chocolate 1','','2018-11-16 21:03:54',11,'','0','','0.00'),
 (5,'Pequeno','Abacaxi,Manga','','Bolinha de chocolate 1','','2018-11-16 21:04:44',11,'','0','','0.00'),
 (6,'Pequeno','Abacaxi,Manga','','Bolinha de chocolate 1','','2018-11-16 21:06:08',11,'','0','','0.00'),
 (7,'Pequeno','Abacaxi,Banana,Manga,Morango','Chocolate','','','2018-11-16 21:20:36',1,'','0','','0.00'),
 (8,'Pequeno','Abacaxi,Banana,Manga,Morango','Chocolate','','','2018-11-16 21:21:11',1,'','0','','0.00'),
 (9,'Pequeno','Manga,Kiwi','','','','2018-11-16 21:21:11',1,'','0','','0.00'),
 (10,'Pequeno','Abacaxi,Banana,Manga,Morango','Chocolate','','','2018-11-16 21:21:20',1,'','0','','0.00'),
 (11,'Pequeno','Manga,Kiwi','','','','2018-11-16 21:21:20',1,'','0','','0.00'),
 (12,'Pequeno','Abacaxi,Manga','','','','2018-11-17 13:25:50',1,'','0','','0.00'),
 (13,'Pequeno','Abacaxi,Manga','','','','2018-11-17 13:27:09',1,'','0','','0.00'),
 (14,'Pequeno','Abacaxi','','','','2018-11-17 13:35:58',2,'','0','','0.00'),
 (15,'Pequeno','Abacaxi,Banana,Manga,Morango','','','','2018-11-17 13:51:05',2,'','0','','0.00'),
 (16,'Pequeno','Abacaxi','','','','2018-11-17 16:55:50',2,'','0','','0.00'),
 (17,'Pequeno','Abacaxi','Chocolate','','','2018-11-17 16:56:31',2,'','0','','0.00'),
 (18,'Pequeno','Abacaxi','Chocolate','','','2018-11-17 16:56:41',2,'','0','','0.00'),
 (19,'Pequeno','Abacaxi','Chocolate','','','2018-11-17 16:57:24',2,'','0','','0.00'),
 (20,'Pequeno','Abacaxi,Banana','','','','2018-11-17 16:59:29',2,'','0','','0.00'),
 (21,'Pequeno','Abacaxi,Banana,Manga,Morango','','','','2018-11-17 17:00:18',2,'','0','','0.00'),
 (22,'Pequeno','Manga,Morango','','','','2018-11-17 17:00:49',2,'','0','','0.00'),
 (23,'Pequeno','Banana','','','','2018-11-17 17:05:46',2,'','0','','0.00'),
 (24,'Pequeno','Abacaxi,','','','','2018-11-17 17:05:46',2,'','0','','0.00'),
 (25,'Pequeno','Abacaxi','','','','2018-11-17 17:06:17',2,'','0','','0.00'),
 (26,'Pequeno','Abacaxi','','','','2018-11-17 17:07:43',2,'','0','','0.00'),
 (27,'Pequeno','Banana,Manga','','','','2018-11-17 17:08:12',2,'','0','','0.00'),
 (28,'Pequeno','Abacaxi,Banana,Manga','','','','2018-11-17 17:10:00',2,'','0','','0.00');
/*!40000 ALTER TABLE `tb_pedido` ENABLE KEYS */;


--
-- Definition of table `tb_sorvete`
--

DROP TABLE IF EXISTS `tb_sorvete`;
CREATE TABLE `tb_sorvete` (
  `cd_sorvete` int(11) NOT NULL AUTO_INCREMENT,
  `nm_sorvete` varchar(45) NOT NULL,
  PRIMARY KEY (`cd_sorvete`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tb_sorvete`
--

/*!40000 ALTER TABLE `tb_sorvete` DISABLE KEYS */;
INSERT INTO `tb_sorvete` (`cd_sorvete`,`nm_sorvete`) VALUES 
 (2,'CupuaÃ§u');
/*!40000 ALTER TABLE `tb_sorvete` ENABLE KEYS */;


--
-- Definition of table `tb_tamanho`
--

DROP TABLE IF EXISTS `tb_tamanho`;
CREATE TABLE `tb_tamanho` (
  `cd_tamanho` int(11) NOT NULL AUTO_INCREMENT,
  `nm_tamanho` varchar(45) NOT NULL,
  `vl_tamanho` decimal(9,2) NOT NULL,
  PRIMARY KEY (`cd_tamanho`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tb_tamanho`
--

/*!40000 ALTER TABLE `tb_tamanho` DISABLE KEYS */;
INSERT INTO `tb_tamanho` (`cd_tamanho`,`nm_tamanho`,`vl_tamanho`) VALUES 
 (1,'Pequeno','7.00');
/*!40000 ALTER TABLE `tb_tamanho` ENABLE KEYS */;


--
-- Definition of procedure `sp_complement_save`
--

DROP PROCEDURE IF EXISTS `sp_complement_save`;

DELIMITER $$

/*!50003 SET @TEMP_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_CREATE_USER,NO_ENGINE_SUBSTITUTION' */ $$
CREATE DEFINER=`root`@`localhost` PROCEDURE `sp_complement_save`(
	pcd_complemento INT(11),
    pnm_complemento CHAR(35)
    )
BEGIN

	IF pcd_complemento > 0 THEN
    
		UPDATE tb_complemento SET nm_complemento = pnm_complemento WHERE cd_complemento = pcd_complemento;
        
	ELSE 
    
	INSERT INTO tb_complemento(nm_complemento) VALUES(pnm_complemento);
    
    SET pcd_complemento = LAST_INSERT_ID();
    
    END IF;
    
    SELECT * from tb_complemento WHERE cd_complemento = pcd_complemento;

END $$
/*!50003 SET SESSION SQL_MODE=@TEMP_SQL_MODE */  $$

DELIMITER ;

--
-- Definition of procedure `sp_fruit_save`
--

DROP PROCEDURE IF EXISTS `sp_fruit_save`;

DELIMITER $$

/*!50003 SET @TEMP_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_CREATE_USER,NO_ENGINE_SUBSTITUTION' */ $$
CREATE DEFINER=`root`@`localhost` PROCEDURE `sp_fruit_save`(
	pcd_fruta INT(11),
    pnm_fruta CHAR(35)
    )
BEGIN

	IF pcd_fruta > 0 THEN
    
		UPDATE tb_fruta SET nm_fruta = pnm_fruta WHERE cd_fruta = pcd_fruta;
        
	ELSE 
    
	INSERT INTO tb_fruta(nm_fruta) VALUES(pnm_fruta);
    
    SET pcd_fruta = LAST_INSERT_ID();
    
    END IF;
    
    SELECT * from tb_fruta WHERE cd_fruta = pcd_fruta;

END $$
/*!50003 SET SESSION SQL_MODE=@TEMP_SQL_MODE */  $$

DELIMITER ;

--
-- Definition of procedure `sp_icecream_save`
--

DROP PROCEDURE IF EXISTS `sp_icecream_save`;

DELIMITER $$

/*!50003 SET @TEMP_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_CREATE_USER,NO_ENGINE_SUBSTITUTION' */ $$
CREATE DEFINER=`root`@`localhost` PROCEDURE `sp_icecream_save`(
	pcd_sorvete INT(11),
    pnm_sorvete CHAR(35)
    )
BEGIN

	IF pcd_sorvete > 0 THEN
    
		UPDATE tb_sorvete SET nm_sorvete = pnm_sorvete WHERE cd_sorvete = pcd_sorvete;
        
	ELSE 
    
	INSERT INTO tb_sorvete(nm_sorvete) VALUES(pnm_sorvete);
    
    SET pcd_sorvete = LAST_INSERT_ID();
    
    END IF;
    
    SELECT * from tb_sorvete WHERE cd_sorvete = pcd_sorvete;

END $$
/*!50003 SET SESSION SQL_MODE=@TEMP_SQL_MODE */  $$

DELIMITER ;

--
-- Definition of procedure `sp_order_save`
--

DROP PROCEDURE IF EXISTS `sp_order_save`;

DELIMITER $$

/*!50003 SET @TEMP_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_CREATE_USER,NO_ENGINE_SUBSTITUTION' */ $$
CREATE DEFINER=`root`@`localhost` PROCEDURE `sp_order_save`(
pds_tamanho VARCHAR(40), 
pds_fruta VARCHAR(100), 
pds_calda VARCHAR(100), 
pds_complemento VARCHAR(100), 
pds_sorvete VARCHAR(100),
pnr_bola VARCHAR(30) ,
pnm_inteiro INT(150),
pnm_meioameio VARCHAR(200),
pvl_total DECIMAL(9,2),
pcd_cliente INT
)
BEGIN
	
    DECLARE pdt_data TIMESTAMP;
    
    SET pdt_data = NOW();
    
    INSERT INTO tb_pedido(ds_tamanho, ds_fruta, ds_calda, ds_complemento, ds_sorvete, nr_bola, nm_inteiro, nm_meioameio, vl_total, dt_data, cd_cliente) 
    VALUES(pds_tamanho, pds_fruta, pds_calda, pds_complemento, pds_sorvete, pnr_bola, pnm_inteiro, pnm_meioameio, pvl_total, pdt_data, pcd_cliente);
    
    SELECT * FROM tb_pedido a INNER JOIN tb_cliente b USING(cd_cliente) WHERE a.cd_pedido = LAST_INSERT_ID();
    
END $$
/*!50003 SET SESSION SQL_MODE=@TEMP_SQL_MODE */  $$

DELIMITER ;

--
-- Definition of procedure `sp_size_save`
--

DROP PROCEDURE IF EXISTS `sp_size_save`;

DELIMITER $$

/*!50003 SET @TEMP_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_CREATE_USER,NO_ENGINE_SUBSTITUTION' */ $$
CREATE DEFINER=`root`@`localhost` PROCEDURE `sp_size_save`(
	pcd_tamanho INT(11),
    pnm_tamanho CHAR(35),
    pvl_tamanho DECIMAL(9,2)
    )
BEGIN

	IF pcd_tamanho > 0 THEN
    
		UPDATE tb_tamanho SET nm_tamanho = pnm_tamanho, vl_tamanho = pvl_tamanho WHERE cd_tamanho = pcd_tamanho;
        
	ELSE 
    
	INSERT INTO tb_tamanho(nm_tamanho, vl_tamanho) VALUES(pnm_tamanho, pvl_tamanho);
    
    SET pcd_tamanho = LAST_INSERT_ID();
    
    END IF;
    
    SELECT * from tb_tamanho WHERE cd_tamanho = pcd_tamanho;

END $$
/*!50003 SET SESSION SQL_MODE=@TEMP_SQL_MODE */  $$

DELIMITER ;

--
-- Definition of procedure `sp_syrup_save`
--

DROP PROCEDURE IF EXISTS `sp_syrup_save`;

DELIMITER $$

/*!50003 SET @TEMP_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_CREATE_USER,NO_ENGINE_SUBSTITUTION' */ $$
CREATE DEFINER=`root`@`localhost` PROCEDURE `sp_syrup_save`(
	pcd_calda INT(11),
    pnm_calda CHAR(35)
    )
BEGIN

	IF pcd_calda > 0 THEN
    
		UPDATE tb_calda SET nm_calda = pnm_calda WHERE cd_calda = pcd_calda;
        
	ELSE 
    
	INSERT INTO tb_calda(nm_calda) VALUES(pnm_calda);
    
    SET pcd_calda = LAST_INSERT_ID();
    
    END IF;
    
    SELECT * from tb_calda WHERE cd_calda = pcd_calda;

END $$
/*!50003 SET SESSION SQL_MODE=@TEMP_SQL_MODE */  $$

DELIMITER ;

--
-- Definition of procedure `sp_user_save`
--

DROP PROCEDURE IF EXISTS `sp_user_save`;

DELIMITER $$

/*!50003 SET @TEMP_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_CREATE_USER,NO_ENGINE_SUBSTITUTION' */ $$
CREATE DEFINER=`root`@`localhost` PROCEDURE `sp_user_save`(
pnm_cliente CHAR(60),
pnr_celular VARCHAR(16),
pnm_logradouro VARCHAR(65),
pnm_bairro VARCHAR(50),
pnr_casa VARCHAR(10),
pnm_bloco VARCHAR(5),
pnr_cep VARCHAR(9)
)
BEGIN
	
    DECLARE vcd_cliente INT;
    
	INSERT INTO tb_cliente (nm_cliente, nr_celular)
    VALUES(pnm_cliente, pnr_celular);
    
    SET vcd_cliente = LAST_INSERT_ID();
    
    INSERT INTO tb_endereco (cd_cliente, nm_logradouro, nm_bairro, nr_casa, nm_bloco, nr_cep)
    VALUES(vcd_cliente, pnm_logradouro, pnm_bairro, pnr_casa, pnm_bloco, pnr_cep);
    
	SELECT * FROM tb_endereco a INNER JOIN tb_cliente b USING(cd_cliente) WHERE a.cd_endereco = LAST_INSERT_ID();
    
END $$
/*!50003 SET SESSION SQL_MODE=@TEMP_SQL_MODE */  $$

DELIMITER ;

--
-- Definition of procedure `sp_user_update_address`
--

DROP PROCEDURE IF EXISTS `sp_user_update_address`;

DELIMITER $$

/*!50003 SET @TEMP_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_CREATE_USER,NO_ENGINE_SUBSTITUTION' */ $$
CREATE DEFINER=`root`@`localhost` PROCEDURE `sp_user_update_address`(
pcd_cliente int,
pnm_logradouro varchar(65),
pnm_bairro varchar(50),
pnr_casa varchar(10),
pnm_bloco varchar(5),
pnr_cep varchar(9)
)
BEGIN

	UPDATE tb_endereco SET nm_logradouro = pnm_logradouro, nm_bairro = pnm_bairro, nr_casa = pnr_casa, nm_bloco = pnm_bloco, nr_cep = pnr_cep WHERE cd_cliente = pcd_cliente;

	SELECT * FROM tb_endereco a INNER JOIN tb_cliente b USING(cd_cliente) WHERE b.cd_cliente = pcd_cliente;

END $$
/*!50003 SET SESSION SQL_MODE=@TEMP_SQL_MODE */  $$

DELIMITER ;



/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
