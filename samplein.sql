-- -------------------------------------------------------------
-- TablePlus 3.12.2(358)
--
-- https://tableplus.com/
--
-- Database: samplein
-- Generation Time: 2021-02-03 9:44:40.2030 PM
-- -------------------------------------------------------------


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;
/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;


CREATE TABLE `customers` (
  `idCustomer` varchar(20) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci DEFAULT NULL,
  `picSales` varchar(20) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci DEFAULT NULL,
  `customer` varchar(20) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci DEFAULT NULL,
  `alamat` varchar(30) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci DEFAULT NULL,
  `telpon` varchar(13) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci DEFAULT NULL,
  `negara` varchar(20) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `deleted` int DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

CREATE TABLE `penerimaan` (
  `idPenerimaan` varchar(20) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL,
  `idPermintaan` varchar(20) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci DEFAULT NULL,
  `nik` varchar(8) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci DEFAULT NULL,
  `tanggalPenerimaan` date DEFAULT NULL,
  `notePenerimaan` varchar(100) DEFAULT NULL,
  PRIMARY KEY (`idPenerimaan`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

CREATE TABLE `pengembangan` (
  `idPengembangan` varchar(20) NOT NULL,
  `idPermintaan` varchar(20) DEFAULT NULL,
  `idProduk` varchar(20) DEFAULT NULL,
  `nik` varchar(8) DEFAULT NULL,
  `notePengembangan` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci DEFAULT NULL,
  `tanggalPengembangan` date DEFAULT NULL,
  PRIMARY KEY (`idPengembangan`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

CREATE TABLE `permintaan` (
  `idPermintaan` varchar(20) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL,
  `noPermintaan` varchar(20) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci DEFAULT NULL,
  `idCustomer` varchar(20) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci DEFAULT NULL,
  `tanggal` date DEFAULT NULL,
  `note` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci DEFAULT NULL,
  `deleted` int DEFAULT NULL,
  `sales` varchar(10) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci DEFAULT NULL,
  `noUrut` int DEFAULT NULL,
  `statusPermintaan` int DEFAULT NULL,
  PRIMARY KEY (`idPermintaan`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

CREATE TABLE `produk` (
  `idProduk` varchar(20) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL,
  `idPermintaan` varchar(20) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci DEFAULT NULL,
  `namaProduk` varchar(20) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci DEFAULT NULL,
  `partNo` varchar(20) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci DEFAULT NULL,
  `brand` varchar(20) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci DEFAULT NULL,
  `aplikasi` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci DEFAULT NULL,
  `qty` int DEFAULT NULL,
  `permintaan` varchar(20) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci DEFAULT NULL,
  `foto` varchar(40) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci DEFAULT NULL,
  `deleted` int DEFAULT NULL,
  `duedate` date DEFAULT NULL,
  `company` varchar(20) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci DEFAULT NULL COMMENT '4. ss/so  5.pjm 6.ss/et 7.adr shanghai',
  `statusEng` text,
  `result` varchar(40) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci DEFAULT NULL,
  `status` varchar(1) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci DEFAULT NULL,
  PRIMARY KEY (`idProduk`),
  UNIQUE KEY `idProduk` (`idProduk`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

CREATE TABLE `users` (
  `idUser` varchar(20) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL,
  `nama` varchar(25) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci DEFAULT NULL,
  `nik` varchar(8) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci DEFAULT NULL,
  `email` varchar(25) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci DEFAULT NULL,
  `username` varchar(20) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci DEFAULT NULL,
  `password` varchar(32) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci DEFAULT NULL,
  `role` int DEFAULT NULL COMMENT '1. admin 2.sales 3.prod-dev 4.eng-ss/so 5.eng-pjm 6.eng-ss 7.eng-shanghai',
  PRIMARY KEY (`idUser`),
  UNIQUE KEY `idUser` (`idUser`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

INSERT INTO `customers` (`idCustomer`, `picSales`, `customer`, `alamat`, `telpon`, `negara`, `created_at`, `deleted`) VALUES
('cs5f9ea89731493', '46899', 'PT Samsan Tech', 'tokyo japan', '02198377168', 'jerman', '2020-11-01 19:22:47', '0'),
('cs5f9ea8d2807ab', '46899', 'PT Astra Honda Motor', 'jl. gaya motor no.12 jakarta', '02193877666', 'indonesia', '2020-11-01 19:23:46', '0'),
('cs5f9ea8fb52785', '12349', 'PT Wika Jaya', 'cimahi bandung', '021366771827', 'indonesia', '2020-11-01 19:24:27', '0'),
('cs5f9ea91b4e9ab', '12349', 'PT Mayora Indah', 'jl. daan mogot india barat', '021335546718', 'banglades', '2020-11-01 19:24:59', '0'),
('cs5fafb2e0e030a', '12349', 'solcrest', 'jl. prapto', '02132142445', 'jerman', '2020-11-14 17:35:12', '0'),
('cs601ab30e67044', '46899', 'asasasasasa', 'DuhYdXwMMg', '12312313', 'banglades', '2021-02-03 21:28:30', '0');

INSERT INTO `penerimaan` (`idPenerimaan`, `idPermintaan`, `nik`, `tanggalPenerimaan`, `notePenerimaan`) VALUES
('acc601aa8aa9ad5f', 'req601a9fcc80646', '41129', '2021-02-03', 'appp323');

INSERT INTO `pengembangan` (`idPengembangan`, `idPermintaan`, `idProduk`, `nik`, `notePengembangan`, `tanggalPengembangan`) VALUES
('pgm601ab2684a318', 'req601a9fcc80646', 'pro601a9fdc905bb0', '43322', 'note pengembangan nih', '2021-02-03');

INSERT INTO `permintaan` (`idPermintaan`, `noPermintaan`, `idCustomer`, `tanggal`, `note`, `deleted`, `sales`, `noUrut`, `statusPermintaan`) VALUES
('req601a9fcc80646', '001/II/2021/MKT', 'cs5f9ea8d2807ab', '2020-11-11', 'tolong nanti produk nya di foto untuk detail nya agar lebih jelas', '0', '46899', '1', '4'),
('req601aab885c0ad', '002/II/2021/MKT', 'cs5f9ea89731493', '2021-02-03', 'tolong nanti produk nya di foto untuk detail nya agar lebih jelas', '0', '46899', '2', '1');

INSERT INTO `produk` (`idProduk`, `idPermintaan`, `namaProduk`, `partNo`, `brand`, `aplikasi`, `qty`, `permintaan`, `foto`, `deleted`, `duedate`, `company`, `statusEng`, `result`, `status`) VALUES
('pro601a9fdc905bb0', 'req601a9fcc80646', 'test produk2222223', 'satuduatiga', 'asda', 'appp323', '32', '1', 'ecee171af37b401a4a44cca3c42fd8a6.png', '0', '2020-12-24', '4', '1', '4c44cf1cd87e69be5cbb7881f2dab3e7.pdf', '2'),
('pro601a9fdc905bb1', 'req601a9fcc80646', 'radiator', 'enmpatlima', 'brand 2', 'appp323', '43', '1/4', 'f7cb6f2bac0940c49583f7472f1d9eb3.jpeg', '0', '2020-12-23', '4', '1', 'c6f95d7bc06a4e3e599087b6c73ed0ae.pdf', '2'),
('pro601aab25bdbb10', 'req601aab1a34a6e', 'test produk2222223', 'satuduatiga', 'asda', NULL, '32', '1/5', 'default.png', '0', '2020-12-24', NULL, NULL, NULL, '1'),
('pro601aab930076f0', 'req601aab885c0ad', 'test produk2222223', 'satuduatiga', 'asda', NULL, '32', '1/5', 'default.png', '0', '2020-12-24', NULL, NULL, NULL, '1');

INSERT INTO `users` (`idUser`, `nama`, `nik`, `email`, `username`, `password`, `role`) VALUES
('aabnsf', 'raja terakhir', '41092', 'raja.terakhir@gmail.com', 'admin', '21232f297a57a5a743894a0e4a801fc3', '1'),
('abcdef', 'ade rahmat nurdiyana', '46899', 'nurdiyana.ade@gmail.com', 'sales', '21232f297a57a5a743894a0e4a801fc3', '2'),
('abcedf', 'dodi saputra', '41129', 'dodi.saput@gmail.com', 'proddev', '21232f297a57a5a743894a0e4a801fc3', '3'),
('us5fcca852163df', 'nandita putra udin SS/SO', '43322', 'nandita.udin@gmail.com', 'bonet', '21232f297a57a5a743894a0e4a801fc3', '4'),
('us5fcca913d86c7', 'sigit saputra PJM', '42113', 'sigit.saput@gmail.com', 'sigit', '21232f297a57a5a743894a0e4a801fc3', '5'),
('us5fcca9a0b9cf8', 'agus wiguna SS/ET', '45322', 'agus.wig@gmail.com', 'agus', '21232f297a57a5a743894a0e4a801fc3', '6');



/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;