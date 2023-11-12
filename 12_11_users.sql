-- -------------------------------------------------------------
-- TablePlus 5.6.2(516)
--
-- https://tableplus.com/
--
-- Database: k1784397_db_ticketing
-- Generation Time: 2023-11-12 22:12:02.5010
-- -------------------------------------------------------------


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;
/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;


INSERT INTO `users` (`id`, `user_id`, `name`, `password`, `is_admin`, `role`, `block`, `last_change`, `remember_token`, `deleted_at`, `created_at`, `updated_at`) VALUES
(1, 999999, 'saradm', '$2y$10$fGvn5Mm/8qyZ2aog4dXIT.Ea7qviFSObui0o0DZMnPv7rgqd4RHe2', 1, 'saradm', 0, '2023-11-02', NULL, NULL, '2022-01-02 15:03:23', '2023-11-11 10:11:27'),
(2, 100371, 'Fernandes', '$2y$10$MQkqOVqSOB1eCWWkd0plEuFoRBA5.g0p/dF/DkiEfhx7xbZsbbPQa', 1, 'superadmin', 0, '2022-10-03', NULL, NULL, '2022-01-02 17:52:02', '2023-11-12 17:50:41'),
(3, 102362, 'Hendra', '$2y$10$AycFb97BfqCra60QdiOG0uXp8Ip8nrhdLynlsNjCbNFtpL4MWKKcS', 1, 'admin', 0, '2022-05-19', NULL, NULL, '2022-01-18 11:37:56', '2023-11-12 17:50:23'),
(4, 104055, 'Endang Rizky', '$2y$10$BIuolmC8zj1aAwMiV08/ye9QtVYohniHqvZGFy4gu65DZd087D4lK', 1, 'admin', 0, '2022-08-01', NULL, NULL, '2022-01-18 12:25:04', '2023-11-10 10:01:33'),
(5, 105336, 'Joni', '$2y$10$92vqcTHbsrm9VgSQwu4h2.YcHDWtTqnsPzqAju3kqnHCOW2.o6vsO', 0, 'user', 0, '2023-01-17', NULL, NULL, '2022-01-21 14:57:57', '2023-11-08 20:49:56'),
(6, 102090, 'Purwo Adhi', '$2y$10$5Zg3ePzjpkk02hZ1T0eQueAa1bSv2wrBBPqS8cLXklqarcoCqQdLW', 1, 'admin', 0, '2023-09-29', NULL, NULL, '2022-01-24 09:59:05', '2023-11-03 10:12:38'),
(7, 108027, 'Frengky J.s', '$2y$10$Cch6XSA6.FzzCTsgFqXcfuoxkSyAUlNVJkzQQkIuDbL.VvgxTTbt6', 1, 'admin', 0, '2022-12-04', NULL, NULL, '2022-01-24 10:31:39', '2023-11-09 19:19:52'),
(8, 118677, 'Rudi Yono', '$2y$10$7ot/9eigDQoB1a/yLslkr.Cn15KonOv8isI28VmlfggaTKN83SIiy', 0, 'user', 0, '2023-11-12', NULL, NULL, '2022-01-24 16:18:04', '2023-11-12 08:36:31'),
(9, 107251, 'Fatahillah', '$2y$10$W7Xyr8jKSL.XUqyDkW5JvOD.qijPZEcy3u5S3dR0OxBtY85D94U6G', 0, 'user', 0, '2022-01-25', NULL, NULL, '2022-01-24 16:18:28', '2023-11-12 13:44:04'),
(10, 107044, 'M.Imron', '$2y$10$1UQNgBFvb7SoonnkFNSon.OrnyCveB9hUXE6/ELiwtex9NmRLnPvm', 0, 'user', 0, '2022-01-24', NULL, NULL, '2022-01-24 16:19:13', '2023-11-12 18:23:13'),
(11, 108048, 'Nahelo', '$2y$10$TiaFzv8hafBZx6CDGkYw7OMHxgluW78lrfDgGzjaB41mb2njhfkQW', 1, 'admin', 0, '2023-08-21', NULL, NULL, '2022-01-24 16:19:27', '2023-11-12 21:11:25'),
(12, 118627, 'Randy', '$2y$10$GhowthvGCemExvBzMrGYlueFMojJnyGkhx8HMfAnuEcHjrC2kXAIK', 0, 'user', 0, '2022-03-08', NULL, '2023-06-07 13:17:45', '2022-01-24 16:19:57', '2023-06-07 13:17:45'),
(13, 118673, 'Bagas Erwin', '$2y$10$/ak8fbwheObK9QIaZ4O/R.z/AoZnqqivxFoWY51JSr5hcW4EdqsZ6', 0, 'user', 0, '2022-11-12', NULL, '2023-05-26 20:48:33', '2022-01-24 16:20:17', '2023-05-26 20:48:33'),
(14, 118675, 'M.Machmud', '$2y$10$nsYJ63xyClHazeXQbhxNyews5R7BA3uJNuHeLzwzUNjj6mDBUiovC', 0, 'user', 0, '2023-10-20', NULL, NULL, '2022-01-24 16:20:47', '2023-11-10 09:17:31'),
(15, 118642, 'Harda Wismanto', '$2y$10$mV2l93NfJyls4uLcsTmgbuzzgtFotf8.aow34YLItLnLBXd9xiGUq', 0, 'user', 0, '2022-01-25', NULL, '2023-11-06 09:39:51', '2022-01-24 16:21:23', '2023-11-06 09:39:51'),
(16, 107649, 'David Rivan Juventus', '$2y$10$umqwLml9qkA8W1GmMPyZEexHEuuBpslbWjt0RP.SfAiZalxntcJo6', 0, 'user', 0, '2023-04-05', NULL, NULL, '2022-01-24 16:21:59', '2023-11-12 08:26:45'),
(17, 104169, 'Yaser', '$2y$10$HzeIIMpIGbsnd.VZJalyVe5yuy2ESDesLoAC1KsewtbUGi1Smz2LO', 0, 'user', 0, '2022-01-25', NULL, NULL, '2022-01-24 16:22:17', '2023-11-12 14:48:15'),
(18, 118676, 'M.Reza', '$2y$10$aXI77/uTOYnXQauEsovI2e6i22ueepit1W0I8.SGxhZuPvrGUA2z.', 0, 'user', 0, '2023-07-10', NULL, NULL, '2022-01-24 16:22:36', '2023-11-10 20:05:55'),
(19, 105422, 'Aykbal Suwitno', '$2y$10$h5fR2MJwyr8KoR.WLjiK/e/nMCayDKMP9M4BxFSQvinbagB63zMSW', 1, 'admin', 0, '2023-08-07', NULL, NULL, '2022-01-27 16:57:24', '2023-08-07 11:18:44'),
(20, 100180, 'Johannes', '$2y$10$WtrSokhsVIoQPucJF./hwuQ0ROlpKJpcKZl9UCxrkuBvaOYdc1fDa', 1, 'admin', 0, '2022-08-08', NULL, NULL, '2022-01-27 17:00:55', '2023-11-09 21:40:27'),
(21, 105840, 'Sigit Rahmadi', '$2y$10$wLl8JMJK/b0ZZnVHeG//L.Qbe6bKN1TdDudruvS3RENwCEV0mCBgW', 0, 'user', 0, '2022-12-28', NULL, NULL, '2022-01-28 11:11:24', '2023-01-19 12:14:48'),
(22, 106127, 'Eko Rudi Hartono', '$2y$10$qOYnpa1a4gjaV82hyyTVu.5zDelMuUrUWAtioMrwp0u4I8imYA.3i', 0, 'user', 0, '2022-01-28', NULL, '2022-01-29 08:13:36', '2022-01-28 13:22:51', '2022-01-29 08:13:36'),
(23, 104316, 'Ahmad Afandi', '$2y$10$oZCKYHNnLpB1jbrJ9xEwjuRyQyzPmP913Ej084K4HaN7n2TQn1Bhu', 0, 'user', 0, '2022-09-20', NULL, NULL, '2022-01-30 10:29:27', '2023-04-15 18:26:57'),
(24, 100661, 'Ahmad Zamroni', '$2y$10$ibTBWiEgTQhkICmyOS97j.H3B3Gagjksn.tyY639maaQRy2nUv5uK', 0, 'user', 0, '2022-05-10', NULL, NULL, '2022-01-31 07:37:39', '2023-11-10 21:04:43'),
(25, 102669, 'Heru Santoso', '$2y$10$tk4M/Cjh4p4jBVUpXAzN9.Pc/CWGuIqBLXJHoLhmN.9OcBq5a.jDG', 0, 'user', 0, '2022-01-31', NULL, NULL, '2022-01-31 13:17:15', '2023-02-19 13:44:20'),
(26, 101509, 'Yanto Heryanto', '$2y$10$fmltm6.L47gEME/hRYAS8uFAt2CMk4rIdJHUMTdcQWtyWAPRy3W8S', 0, 'user', 0, '2022-12-02', NULL, NULL, '2022-01-31 13:18:41', '2023-01-01 10:11:11'),
(27, 101441, 'Achmad Pahri', '$2y$10$kJ9i7IT./qzN31k7RaL68uS09MuaLSAv2pt6mdRf5vFtEP2pQfXIi', 0, 'user', 0, '2022-06-27', NULL, NULL, '2022-02-02 11:09:05', '2023-03-30 20:08:37'),
(28, 100049, 'Pak Miyono', '$2y$10$OiZHkSgWhGu0.gyL999ZoeV0z3E.8MlNJPcEvixq.BGzOaZzpozwa', 1, 'admin', 0, '2022-02-07', NULL, NULL, '2022-02-07 15:37:29', '2022-02-07 15:40:38'),
(29, 107389, 'Mulyanto', '$2y$10$gS1z1xrGfh48HqhC7jf9teQAniXals.Ht.BJr/5hjzDQymnrd3BP6', 0, 'user', 0, '2022-08-31', NULL, NULL, '2022-08-31 14:38:10', '2023-03-09 12:03:48'),
(30, 119197, 'Randy', '$2y$10$tWqFBctRkKx.Mt1O.J7jUe4PXpAh/12ZYQiDVm.XLt0MQN4Ivpbka', 0, 'user', 0, '2023-01-10', NULL, '2023-06-07 13:21:45', '2023-01-10 08:05:23', '2023-06-07 13:21:45'),
(31, 118674, 'Deri Batubara', '$2y$10$wxv6i1QLOX18LKD14GPPR.b0diPgTS03i1h02gz9zhvi2Q6vPowga', 0, 'user', 0, '2023-10-18', NULL, NULL, '2023-06-06 16:09:45', '2023-11-12 19:10:48'),
(32, 119202, 'Randy', '$2y$10$s8LmvlV83b7MmLcgkXh8FeHXkD2ioFMk0Gdb6mXN8M66DLM.65cdS', 0, 'user', 0, '2023-06-07', NULL, NULL, '2023-06-07 13:18:35', '2023-11-10 19:55:08'),
(33, 103678, 'Suhartono', '$2y$10$.Z6ARolTqhxk0iUAZdw.4uKrilsWPvImSsvAuPvsadP5jRj1VJ0ES', 1, 'admin', 0, '2023-10-13', NULL, NULL, '2023-08-15 10:54:50', '2023-11-11 14:30:48');


/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;