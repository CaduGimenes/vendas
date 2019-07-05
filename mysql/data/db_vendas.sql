-- phpMyAdmin SQL Dump
-- version 4.6.6deb5
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Tempo de geração: 31/01/2019 às 23:15
-- Versão do servidor: 5.7.25-0ubuntu0.18.04.2
-- Versão do PHP: 7.2.14-1+ubuntu18.04.1+deb.sury.org+1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Banco de dados: `db_vendas`
--

DELIMITER $$
--
-- Procedimentos
--
CREATE DEFINER=`root`@`localhost` PROCEDURE `sp_complement_save` (`pcd_complemento` INT(11), `pnm_complemento` CHAR(35))  BEGIN

	IF pcd_complemento > 0 THEN
    
		UPDATE tb_complemento SET nm_complemento = pnm_complemento WHERE cd_complemento = pcd_complemento;
        
	ELSE 
    
	INSERT INTO tb_complemento(nm_complemento) VALUES(pnm_complemento);
    
    SET pcd_complemento = LAST_INSERT_ID();
    
    END IF;
    
    SELECT * from tb_complemento WHERE cd_complemento = pcd_complemento;

END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `sp_district_save` (`pcd_bairro` INT(11), `pnm_bairro` VARCHAR(50), `pvl_frete` DECIMAL(9,2))  BEGIN

	IF pcd_bairro> 0 THEN
    
		UPDATE tb_frete SET nm_bairro = pnm_bairro, vl_frete = pvl_frete WHERE cd_bairro = pcd_bairro;
        
	ELSE 
    
	INSERT INTO tb_frete(nm_bairro, vl_frete) VALUES(pnm_bairro, pvl_frete);
    
    SET pcd_bairro = LAST_INSERT_ID();
    
    END IF;
    
    SELECT * from tb_frete WHERE cd_bairro = pcd_bairro;

END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `sp_fruit_save` (`pcd_fruta` INT(11), `pnm_fruta` CHAR(35))  BEGIN

	IF pcd_fruta > 0 THEN
    
		UPDATE tb_fruta SET nm_fruta = pnm_fruta WHERE cd_fruta = pcd_fruta;
        
	ELSE 
    
	INSERT INTO tb_fruta(nm_fruta) VALUES(pnm_fruta);
    
    SET pcd_fruta = LAST_INSERT_ID();
    
    END IF;
    
    SELECT * from tb_fruta WHERE cd_fruta = pcd_fruta;

END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `sp_order_save` (`pds_tamanho` VARCHAR(40), `pds_fruta` VARCHAR(100), `pds_calda` VARCHAR(100), `pds_complemento` VARCHAR(100), `pvl_total` DECIMAL(9,2), `pcd_cliente` INT)  BEGIN
	
    DECLARE pdt_data TIMESTAMP;
    
    SET pdt_data = NOW();
    
    INSERT INTO tb_pedido(ds_tamanho, ds_fruta, ds_calda, ds_complemento, vl_total, dt_data, cd_cliente) 
    VALUES(pds_tamanho, pds_fruta, pds_calda, pds_complemento, pvl_total, pdt_data, pcd_cliente);
    
    SELECT * FROM tb_pedido a INNER JOIN tb_cliente b USING(cd_cliente) WHERE a.cd_pedido = LAST_INSERT_ID();
    
END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `sp_size_save` (`pcd_tamanho` INT(11), `pnm_tamanho` CHAR(35), `pvl_tamanho` DECIMAL(9,2))  BEGIN

	IF pcd_tamanho > 0 THEN
    
		UPDATE tb_tamanho SET nm_tamanho = pnm_tamanho, vl_tamanho = pvl_tamanho WHERE cd_tamanho = pcd_tamanho;
        
	ELSE 
    
	INSERT INTO tb_tamanho(nm_tamanho, vl_tamanho) VALUES(pnm_tamanho, pvl_tamanho);
    
    SET pcd_tamanho = LAST_INSERT_ID();
    
    END IF;
    
    SELECT * from tb_tamanho WHERE cd_tamanho = pcd_tamanho;

END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `sp_syrup_save` (`pcd_calda` INT(11), `pnm_calda` CHAR(35))  BEGIN

	IF pcd_calda > 0 THEN
    
		UPDATE tb_calda SET nm_calda = pnm_calda WHERE cd_calda = pcd_calda;
        
	ELSE 
    
	INSERT INTO tb_calda(nm_calda) VALUES(pnm_calda);
    
    SET pcd_calda = LAST_INSERT_ID();
    
    END IF;
    
    SELECT * from tb_calda WHERE cd_calda = pcd_calda;

END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `sp_user_save` (`pnm_cliente` CHAR(60), `pnr_celular` VARCHAR(16), `pnm_logradouro` VARCHAR(65), `pnr_casa` VARCHAR(10), `pnm_bloco` VARCHAR(5), `pcd_bairro` INT(11))  BEGIN
	
    DECLARE vcd_cliente INT;
    
	INSERT INTO tb_cliente (nm_cliente, nr_celular)
    VALUES(pnm_cliente, pnr_celular);
    
    SET vcd_cliente = LAST_INSERT_ID();
    
    INSERT INTO tb_endereco (cd_cliente, nm_logradouro, nr_casa, nm_bloco, cd_bairro)
    VALUES(vcd_cliente, pnm_logradouro, pnr_casa, pnm_bloco, pcd_bairro);
    
	SELECT * FROM tb_endereco a INNER JOIN tb_cliente b USING(cd_cliente) INNER JOIN tb_frete USING(cd_bairro) WHERE a.cd_endereco = LAST_INSERT_ID();
    
END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `sp_user_update_address` (`pcd_cliente` INT, `pnm_logradouro` VARCHAR(65), `pnr_casa` VARCHAR(10), `pnm_bloco` VARCHAR(5), `pnm_cliente` VARCHAR(65), `pcd_bairro` INT(11))  BEGIN

	UPDATE tb_endereco SET nm_logradouro = pnm_logradouro, nr_casa = pnr_casa, nm_bloco = pnm_bloco, cd_bairro = pcd_bairro WHERE cd_cliente = pcd_cliente;

	UPDATE tb_cliente SET nm_cliente = pnm_cliente where cd_cliente = pcd_cliente;

	SELECT * FROM tb_endereco a INNER JOIN tb_cliente b USING(cd_cliente) INNER JOIN tb_frete USING(cd_bairro) WHERE b.cd_cliente = pcd_cliente;

END$$

DELIMITER ;

-- --------------------------------------------------------

--
-- Estrutura para tabela `tb_calda`
--

CREATE TABLE `tb_calda` (
  `cd_calda` int(11) NOT NULL,
  `nm_calda` varchar(55) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estrutura para tabela `tb_cliente`
--

CREATE TABLE `tb_cliente` (
  `cd_cliente` int(11) NOT NULL,
  `nm_cliente` char(60) NOT NULL,
  `nr_celular` varchar(16) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estrutura para tabela `tb_complemento`
--

CREATE TABLE `tb_complemento` (
  `cd_complemento` int(11) NOT NULL,
  `nm_complemento` varchar(55) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estrutura para tabela `tb_endereco`
--

CREATE TABLE `tb_endereco` (
  `cd_endereco` int(11) NOT NULL,
  `nm_logradouro` varchar(65) NOT NULL,
  `nr_casa` varchar(10) NOT NULL,
  `nm_bloco` varchar(5) DEFAULT NULL,
  `cd_cliente` int(11) DEFAULT NULL,
  `cd_bairro` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estrutura para tabela `tb_frete`
--

CREATE TABLE `tb_frete` (
  `cd_bairro` int(11) NOT NULL,
  `nm_bairro` varchar(50) NOT NULL,
  `vl_frete` decimal(9,2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estrutura para tabela `tb_fruta`
--

CREATE TABLE `tb_fruta` (
  `cd_fruta` int(11) NOT NULL,
  `nm_fruta` varchar(45) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estrutura para tabela `tb_pedido`
--

CREATE TABLE `tb_pedido` (
  `cd_pedido` int(11) NOT NULL,
  `ds_tamanho` varchar(40) NOT NULL,
  `ds_fruta` char(100) DEFAULT NULL,
  `ds_calda` char(100) DEFAULT NULL,
  `ds_complemento` char(100) DEFAULT NULL,
  `dt_data` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `cd_cliente` int(11) NOT NULL,
  `vl_total` decimal(9,2) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estrutura para tabela `tb_tamanho`
--

CREATE TABLE `tb_tamanho` (
  `cd_tamanho` int(11) NOT NULL,
  `nm_tamanho` varchar(45) NOT NULL,
  `vl_tamanho` decimal(9,2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Índices de tabelas apagadas
--

--
-- Índices de tabela `tb_calda`
--
ALTER TABLE `tb_calda`
  ADD PRIMARY KEY (`cd_calda`);

--
-- Índices de tabela `tb_cliente`
--
ALTER TABLE `tb_cliente`
  ADD PRIMARY KEY (`cd_cliente`);

--
-- Índices de tabela `tb_complemento`
--
ALTER TABLE `tb_complemento`
  ADD PRIMARY KEY (`cd_complemento`);

--
-- Índices de tabela `tb_endereco`
--
ALTER TABLE `tb_endereco`
  ADD PRIMARY KEY (`cd_endereco`),
  ADD KEY `cd_cliente` (`cd_cliente`),
  ADD KEY `fk_endereco_frete_idx` (`cd_bairro`);

--
-- Índices de tabela `tb_frete`
--
ALTER TABLE `tb_frete`
  ADD PRIMARY KEY (`cd_bairro`);

--
-- Índices de tabela `tb_fruta`
--
ALTER TABLE `tb_fruta`
  ADD PRIMARY KEY (`cd_fruta`);

--
-- Índices de tabela `tb_pedido`
--
ALTER TABLE `tb_pedido`
  ADD PRIMARY KEY (`cd_pedido`),
  ADD KEY `cd_cliente` (`cd_cliente`);

--
-- Índices de tabela `tb_tamanho`
--
ALTER TABLE `tb_tamanho`
  ADD PRIMARY KEY (`cd_tamanho`);

--
-- AUTO_INCREMENT de tabelas apagadas
--

--
-- AUTO_INCREMENT de tabela `tb_calda`
--
ALTER TABLE `tb_calda`
  MODIFY `cd_calda` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT de tabela `tb_cliente`
--
ALTER TABLE `tb_cliente`
  MODIFY `cd_cliente` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;
--
-- AUTO_INCREMENT de tabela `tb_complemento`
--
ALTER TABLE `tb_complemento`
  MODIFY `cd_complemento` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT de tabela `tb_endereco`
--
ALTER TABLE `tb_endereco`
  MODIFY `cd_endereco` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;
--
-- AUTO_INCREMENT de tabela `tb_frete`
--
ALTER TABLE `tb_frete`
  MODIFY `cd_bairro` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;
--
-- AUTO_INCREMENT de tabela `tb_fruta`
--
ALTER TABLE `tb_fruta`
  MODIFY `cd_fruta` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT de tabela `tb_pedido`
--
ALTER TABLE `tb_pedido`
  MODIFY `cd_pedido` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT de tabela `tb_tamanho`
--
ALTER TABLE `tb_tamanho`
  MODIFY `cd_tamanho` int(11) NOT NULL AUTO_INCREMENT;
--
-- Restrições para dumps de tabelas
--

--
-- Restrições para tabelas `tb_endereco`
--
ALTER TABLE `tb_endereco`
  ADD CONSTRAINT `fk_endereco_cliente` FOREIGN KEY (`cd_cliente`) REFERENCES `tb_cliente` (`cd_cliente`) ON DELETE CASCADE ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_endereco_frete` FOREIGN KEY (`cd_bairro`) REFERENCES `tb_frete` (`cd_bairro`) ON DELETE CASCADE ON UPDATE NO ACTION;

--
-- Restrições para tabelas `tb_pedido`
--
ALTER TABLE `tb_pedido`
  ADD CONSTRAINT `tb_pedido_ibfk_1` FOREIGN KEY (`cd_cliente`) REFERENCES `tb_cliente` (`cd_cliente`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
