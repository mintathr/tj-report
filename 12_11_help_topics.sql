-- -------------------------------------------------------------
-- TablePlus 5.6.2(516)
--
-- https://tableplus.com/
--
-- Database: k1784397_db_ticketing
-- Generation Time: 2023-11-12 22:11:40.5050
-- -------------------------------------------------------------


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;
/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;


INSERT INTO `help_topics` (`id`, `topic_name`, `created_at`, `updated_at`) VALUES
(1, 'BCT', '2022-01-18 11:38:18', '2022-01-18 11:38:20'),
(2, 'CCTV halte', '2022-01-18 11:38:18', '2022-01-18 11:38:20'),
(3, 'CCTV halte / DVR CCTV', '2022-01-18 11:38:18', '2022-01-18 11:38:20'),
(4, 'CCTV halte / KAMERA CCTV', '2022-01-18 11:38:18', '2022-01-18 11:38:20'),
(5, 'CCTV halte / Power Supply CCTV (adaptor)', '2022-01-18 11:38:18', '2022-01-18 11:38:20'),
(6, 'CCTV halte / Date Time', '2022-01-18 11:38:18', '2022-01-18 11:38:20'),
(7, 'CCTV halte / Hardisk DVR', '2022-01-18 11:38:18', '2022-01-18 11:38:20'),
(8, 'Dispatcher', '2022-01-18 11:38:18', '2022-01-18 11:38:20'),
(9, 'Dispatcher / Aplikasi Dispatcher', '2022-01-18 11:38:18', '2022-01-18 11:38:20'),
(10, 'Dispatcher / PC Dispatcher', '2022-01-18 11:38:18', '2022-01-18 11:38:20'),
(11, 'Dispatcher / Printer Dispatcher', '2022-01-18 11:38:18', '2022-01-18 11:38:20'),
(12, 'eTiketing / Acrylic Buram', '2022-01-18 11:38:18', '2022-01-18 11:38:20'),
(13, 'eTiketing / Adaptor SBC', '2022-01-18 11:38:18', '2022-01-18 11:38:20'),
(14, 'eTiketing / Adaptor Smartcard', '2022-01-18 11:38:18', '2022-01-18 11:38:20'),
(15, 'eTiketing / Aplikasi Nutech', '2022-01-18 11:38:18', '2022-01-18 11:38:20'),
(16, 'eTiketing / Aplikasi Nutech / qr scanner', '2022-01-18 11:38:18', '2022-01-18 11:38:20'),
(17, 'eTiketing / Controller AR721e', '2022-01-18 11:38:18', '2022-01-18 11:38:20'),
(18, 'eTiketing / Converter 701', '2022-01-18 11:38:18', '2022-01-18 11:38:20'),
(19, 'eTiketing / Gate Gunnebo', '2022-01-18 11:38:18', '2022-01-18 11:38:20'),
(20, 'eTiketing / Gate Kaba', '2022-01-18 11:38:18', '2022-01-18 11:38:20'),
(21, 'eTiketing / Led Counter', '2022-01-18 11:38:18', '2022-01-18 11:38:20'),
(22, 'eTiketing / Local Server (ls)', '2022-01-18 11:38:18', '2022-01-18 11:38:20'),
(23, 'eTiketing / Monitor Penjualan', '2022-01-18 11:38:18', '2022-01-18 11:38:20'),
(24, 'eTiketing / Samcard Bank', '2022-01-18 11:38:18', '2022-01-18 11:38:20'),
(25, 'eTiketing / SBC (Embeded pc)', '2022-01-18 11:38:18', '2022-01-18 11:38:20'),
(26, 'eTiketing / Sensor Infrared', '2022-01-18 11:38:18', '2022-01-18 11:38:20'),
(27, 'eTiketing / Smartcard Reader (kinetics)', '2022-01-18 11:38:18', '2022-01-18 11:38:20'),
(28, 'eTiketing / Speaker Suara', '2022-01-18 11:38:18', '2022-01-18 11:38:20'),
(29, 'Ipphone', '2022-01-18 11:38:18', '2022-01-18 11:38:20'),
(30, 'kelistrikan Halte', '2022-01-18 11:38:18', '2022-01-18 11:38:20'),
(31, 'LED / PIS', '2022-01-18 11:38:18', '2022-01-18 11:38:20'),
(32, 'LED PIS / Adaptor', '2022-01-18 11:38:18', '2022-01-18 11:38:20'),
(33, 'LED PIS / Aplikasi Moovit', '2022-01-18 11:38:18', '2022-01-18 11:38:20'),
(34, 'LED PIS / Konfigurasi', '2022-01-18 11:38:18', '2022-01-18 11:38:20'),
(35, 'LED PIS / Mini pc', '2022-01-18 11:38:18', '2022-01-18 11:38:20'),
(36, 'LED PIS / Raspberry', '2022-01-18 11:38:18', '2022-01-18 11:38:20'),
(37, 'Mikrotik', '2022-01-18 11:38:18', '2022-01-18 11:38:20'),
(38, 'Modem', '2022-01-18 11:38:18', '2022-01-18 11:38:20'),
(39, 'Monitor', '2022-01-18 11:38:18', '2022-01-18 11:38:20'),
(40, 'Monitor / LCD mati total', '2022-01-18 11:38:18', '2022-01-18 11:38:20'),
(41, 'Network', '2022-01-18 11:38:18', '2022-01-18 11:38:20'),
(42, 'Monitor / LCD pecah', '2022-01-18 11:38:18', '2022-01-18 11:38:20'),
(43, 'Network / Akses internet', '2022-01-18 11:38:18', '2022-01-18 11:38:20'),
(44, 'Network / Akses wifi', '2022-01-18 11:38:18', '2022-01-18 11:38:20'),
(45, 'Network / Router', '2022-01-18 11:38:18', '2022-01-18 11:38:20'),
(46, 'Network / Iforte', '2022-01-18 11:38:18', '2022-01-18 11:38:20'),
(47, 'Network / Switch', '2022-01-18 11:38:18', '2022-01-18 11:38:20'),
(48, 'Samcard', '2022-01-18 11:38:18', '2022-01-18 11:38:20'),
(49, 'Simcard / Telkomsel', '2022-01-18 11:38:18', '2022-01-18 11:38:20'),
(50, 'Stabilizer', '2022-01-18 11:38:18', '2022-01-18 11:38:20'),
(51, 'UPS', '2022-01-18 11:38:18', '2022-01-18 11:38:20');


/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;