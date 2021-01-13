-- -------------------------------------------------------------
-- TablePlus 3.12.0(354)
--
-- https://tableplus.com/
--
-- Database: samplein
-- Generation Time: 2021-01-13 4:26:46.0680 PM
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
  `idCustomer` text,
  `picSales` text,
  `customer` text,
  `alamat` text,
  `telpon` text,
  `negara` text,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `deleted` tinyint(1) DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

CREATE TABLE `permintaan` (
  `idPermintaan` varchar(100) NOT NULL,
  `noPermintaan` text,
  `idCustomer` text,
  `tanggal` text,
  `note` text,
  `deleted` int DEFAULT NULL,
  `sales` text,
  `noUrut` int DEFAULT NULL,
  PRIMARY KEY (`idPermintaan`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

CREATE TABLE `produk` (
  `idProduk` varchar(100) NOT NULL,
  `idPermintaan` text,
  `namaProduk` text,
  `partNo` text,
  `brand` text,
  `aplikasi` text,
  `qty` int DEFAULT NULL,
  `permintaan` text,
  `foto` text,
  `deleted` int DEFAULT NULL,
  `duedate` date DEFAULT NULL,
  `company` text COMMENT '4. ss/so  5.pjm 6.ss/et 7.adr shanghai',
  `statusEng` text,
  `result` text,
  `status` text,
  PRIMARY KEY (`idProduk`),
  UNIQUE KEY `idProduk` (`idProduk`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

CREATE TABLE `users` (
  `idUser` varchar(255) NOT NULL,
  `nama` text,
  `nik` text,
  `email` text,
  `username` text,
  `password` text,
  `role` int DEFAULT NULL COMMENT '1. admin 2.sales 3.prod-dev 4.eng-ss/so 5.eng-pjm 6.eng-ss 7.eng-shanghai',
  `image` text,
  PRIMARY KEY (`idUser`),
  UNIQUE KEY `idUser` (`idUser`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

INSERT INTO `customers` (`idCustomer`, `picSales`, `customer`, `alamat`, `telpon`, `negara`, `created_at`, `deleted`) VALUES
('cs5f9ea89731493', '46899', 'PT Samsan Tech', 'tokyo japan', '02198377168', 'jerman', '2020-11-01 19:22:47', '0'),
('cs5f9ea8d2807ab', '46899', 'PT Astra Honda Motor', 'jl. gaya motor no.12 jakarta', '02193877666', 'indonesia', '2020-11-01 19:23:46', '0'),
('cs5f9ea8fb52785', '12349', 'PT Wika Jaya', 'cimahi bandung', '021366771827', 'indonesia', '2020-11-01 19:24:27', '0'),
('cs5f9ea91b4e9ab', '12349', 'PT Mayora Indah', 'jl. daan mogot india barat', '021335546718', 'banglades', '2020-11-01 19:24:59', '0'),
('cs5fafb2e0e030a', '12349', 'solcrest', 'jl. prapto', '02132142445', 'jerman', '2020-11-14 17:35:12', '0');

INSERT INTO `permintaan` (`idPermintaan`, `noPermintaan`, `idCustomer`, `tanggal`, `note`, `deleted`, `sales`, `noUrut`) VALUES
('req5fe417bc73083', '001/XII/2020/MKT', 'cs5f9ea8d2807ab', '2020-11-11', 'tolong nanti produk nya di foto untuk detail nya agar lebih jelas', '0', '46899', '1');

INSERT INTO `produk` (`idProduk`, `idPermintaan`, `namaProduk`, `partNo`, `brand`, `aplikasi`, `qty`, `permintaan`, `foto`, `deleted`, `duedate`, `company`, `statusEng`, `result`, `status`) VALUES
('pro5fe417d22ae360', 'req5fe417bc73083', 'test produk2222223', 'satuduatiga', 'asda', NULL, '32', '1', 'default.png', '0', '2020-12-24', NULL, NULL, NULL, '1'),
('pro5fe417d22ae361', 'req5fe417bc73083', 'radiator', 'enmpatlima', 'brand 2', NULL, '43', '1/4', 'default.png', '0', '2020-12-23', NULL, NULL, NULL, '1'),
('pro5fe417d22ae362', 'req5fe417bc73083', 'filter rad', 'fGqW3rWvq0', 'brand 3', NULL, '12', '1/5', 'default.png', '0', '2020-11-24', NULL, NULL, NULL, '1');

INSERT INTO `users` (`idUser`, `nama`, `nik`, `email`, `username`, `password`, `role`, `image`) VALUES
('aabnsf', 'raja terakhir', '41092', 'raja.terakhir@gmail.com', 'admin', '21232f297a57a5a743894a0e4a801fc3', '1', NULL),
('abcdef', 'ade rahmat nurdiyana', '46899', 'nurdiyana.ade@gmail.com', 'sales', '21232f297a57a5a743894a0e4a801fc3', '2', NULL),
('abcedf', 'dodi saputra', '41129', 'dodi.saput@gmail.com', 'proddev', '21232f297a57a5a743894a0e4a801fc3', '3', NULL),
('us5fcca852163df', 'nandita putra udin SS/SO', '43322', 'nandita.udin@gmail.com', 'bonet', '21232f297a57a5a743894a0e4a801fc3', '4', NULL),
('us5fcca913d86c7', 'sigit saputra PJM', '42113', 'sigit.saput@gmail.com', 'sigit', '21232f297a57a5a743894a0e4a801fc3', '5', NULL),
('us5fcca9a0b9cf8', 'agus wiguna SS/ET', '45322', 'agus.wig@gmail.com', 'agus', '21232f297a57a5a743894a0e4a801fc3', '6', NULL);



/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;