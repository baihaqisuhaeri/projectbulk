-- phpMyAdmin SQL Dump
-- version 4.9.7
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Jul 05, 2022 at 02:01 PM
-- Server version: 10.3.35-MariaDB-cll-lve
-- PHP Version: 7.4.29

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `itjticom_plafon`
--

-- --------------------------------------------------------

--
-- Table structure for table `tb_unit`
--

CREATE TABLE `tb_unit` (
  `id` int(11) NOT NULL,
  `kd_unit` varchar(10) DEFAULT NULL,
  `nm_unit` varchar(255) DEFAULT NULL,
  `email1` varchar(50) DEFAULT NULL,
  `email2` varchar(50) DEFAULT NULL,
  `email3` varchar(50) DEFAULT NULL,
  `no1` varchar(50) NOT NULL,
  `no2` varchar(50) NOT NULL,
  `no3` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 ROW_FORMAT=COMPACT;

--
-- Dumping data for table `tb_unit`
--

INSERT INTO `tb_unit` (`id`, `kd_unit`, `nm_unit`, `email1`, `email2`, `email3`, `no1`, `no2`, `no3`) VALUES
(1, 'JTI', 'Jaya Trade Indonesia (JTI)', 'dasma.hutasoit@gmail.com', 'gultom@jayatrade.com', 'jti.ascur@yahoo.co.id', '08129186601', '0811851330', '085888314837'),
(2, 'GBU', 'Global Bitumen Utama (GBU)', 'dasma.hutasoit@gmail.com', 'gultom@jayatrade.com', 'jti.ascur@yahoo.co.id', '08129186601', '0811851330', '085382564415'),
(3, 'SAU', 'Sarana Aceh Utama (SAU)', 'hanni_mi@yahoo.com', 'gultom@jayatrade.com', 'saranaacehutama@yahoo.com', '08126422246', '0811851330', '085358674225'),
(4, 'SLU', 'Sarana Lampung Utama (SLU)', 'pras_jti@yahoo.com', 'gultom@jayatrade.com', 'saranalampungutama@yahoo.com', '081272221333', '0811851330', '082185214567'),
(5, 'SJU', 'Sarana Jambi Utama (SJU)', 'yohanes_rusdianto@yahoo.com', 'gultom@jayatrade.com', 'saranajambiutama@yahoo.co.id', '081284982652', '0811851330', '085273374142'),
(6, 'SLO', 'Sarana Lombok Utama (SLO)', 'pugargesang@yahoo.com', 'gultom@jayatrade.com', 'slolombok@yahoo.com', '081246050000', '0811851330', '08175781207'),
(7, 'SBU', 'Sarana Bitung Utama (SBU)', 'ptsaranabitungutama_1997@yahoo.co.id', 'gultom@jayatrade.com', 'marselino_paendong@yahoo.co.id', '081340006034', '0811851330', '082348030347'),
(8, 'TGU', 'Toba Gena Utama (TGU)', 'lukmanalwi@rocketmail.com', 'gultom@jayatrade.com', 'bunga.ananda55@yahoo.com', '081360982764', '0811851330', '085362024687'),
(9, 'TGP', 'Toba Gena Utama Cabang Perawang (TGP)', 'lukmanalwi@rocketmail.com', 'gultom@jayatrade.com', 'tulus.simorangkir@gmail.com', '081360982764', '0811851330', '0811755676'),
(10, 'GBM', 'GBU Cab.Merak (GBM)', 'dasma.hutasoit@gmail.com', 'gultom@jayatrade.com', 'jti.ascur@yahoo.co.id', '08129186601', '0811851330', '085382564415'),
(11, 'SMB', 'Sarana Mbay Utama (SMB)', 'donimusdi@yahoo.co.id', 'gultom@jayatrade.com', 'smbu_mbay@yahoo.co.id', '081238102964', '0811851330', '081327371873'),
(12, 'SSM', 'Sarana Sampit Mentaya Utama (SSM)', 'jti.trijoko@yahoo.com', 'gultom@jayatrade.com', 'ssmutama@yahoo.com', '085218838220', '0811851330', '085100711543'),
(13, 'SJB', 'Sarana Jambi Utama Cabang Belinyu (SJB)', 'yohanes_rusdianto@yahoo.com', 'gultom@jayatrade.com', 'chen.fitri68@yahoo.com', '081284982652', '0811851330', '082280191327'),
(14, 'SMU', 'Sarana Merpati Utama (SMU)', 'dasma.hutasoit@gmail.com', 'gultom@jayatrade.com', 'irfa.rizqiany16@gmail.com', '08129186601', '0811851330', '085888314837'),
(15, 'ABN', 'Adibaroto Nugratama (ABN)', 'perdian.abn@gmail.com', 'gultom@jayatrade.com', 'cicik_yudo@yahoo.com', '081237717077', '0811851330', '081230811054'),
(16, 'SLK', 'Sarana Lombok Utama Cabang Kupang (SLK)', 's_raturandang@yahoo.co.id', 'gultom@jayatrade.com', 'sarana_lombok@yahoo.co.id', '081340178019', '0811851330', '082236988622'),
(17, 'SSP', 'Sarana Sampit Cabang Pulang Pisau (SSP)', 'ika_smu@yahoo.com', 'gultom@jayatrade.com', 'friscillaumboh@gmail.com', '08129571357', '0811851330', '085298250305'),
(18, 'SAL', 'Sarana Aceh Utama Cabang Lhokseumawe (SAL)', 'hanni_mi@yahoo.com', 'gultom@jayatrade.com', 'sau.lhokseumawe@gmail.com', '08126422246', '0811851330', '082363806747'),
(19, 'JTB', 'Jaya Trade Indonesia Cabang Belawan (JTB)', 'lukmanalwi@rocketmail.com', 'gultom@jayatrade.com', 'bunga.ananda55@yahoo.com', '081360982764', '0811851330', '081396336187'),
(20, 'BLK', 'Jaya Gas Indonesia - Div. BULK (BLK)', 'fauzan@jayatrade.com', 'aslukita@jayatrade.com', 'lienawin@jayagas.co.id', '081210066722', '08119944986', '081287678008'),
(21, 'JTS', 'Jaya Trade Indonesia Cabang Surabaya (JTS)', 'perdian.abn@gmail.com', 'gultom@jayatrade.com', 'cicik_yudo@yahoo.com', '081237717077', '0811851330', '081230811054'),
(22, 'YLE', 'Handling Equipment (YLE)', 'dekky_myd@yahoo.co.id', 'gultom@jayatrade.com', 'erlyardini94@gmail.com', '08111315745', '0811851330', '081298403408'),
(23, 'KNU', 'Kenrope Utama (KNU)', 'mhr_gas@yahoo.com', 'gultom@jayatrade.com', 'edwin_garut@yahoo.co.id', '085693697348', '0811851330', '08156135371'),
(24, 'HVE', 'Power Plus (HVE)', 'dekky_myd@yahoo.co.id', 'gultom@jayatrade.com', 'solihin@jayatrade.com', '08111315745', '0811851330', '087888682224'),
(25, 'TNK', 'Teknik (TNK)', 'fauzan@jayatrade.com', 'gultom@jayatrade.com', 'etinurjanah94@gmail.com', '081210066722', '0811851330', '087884855253'),
(26, 'GBB', 'Global Bitumen Utama - Div. BULK (GBB)', 'fauzan@jayatrade.com', 'aslukita@jayatrade.com', 'lienawin@jayagas.co.id', '081210066722', '08119944986', '081287678008'),
(27, 'JTE', 'Jaya Trade Emulsi (JTE)', 'r_sipayung02@yahoo.com', 'aslukita@jayatrade.com', 'adm.emulsijti@gmail.com', '085361077173', '08119944986', '081287211465'),
(28, 'JTC', 'Jaya Trade Indonesia Cabang Cilacap (JTC)', 'dasma.hutasoit@gmail.com', 'gultom@jayatrade.com', 'adhdit@gmail.com', '08129186601', '0811851330', '085888314837'),
(29, 'JAB', 'Jaya Trade Aspal Buton (JAB)', 'perdian.abn@gmail.com', 'gultom@jayatrade.com', 'raymondsibuea@yahoo.com', '081237717077', '0811851330', '081330054851'),
(30, 'AJP', 'Adigas Jaya Pratama Cab. Sapan (AJP)', 's.indra3108@gmail.com', 'aslukita@jayatrade.com', 'adigasjayapratama@yahoo.com', '08561750191', '08119944986', '085770107919'),
(31, 'KMD', 'Metroja Mandiri (cab. Merdeka Tangerang) (KMD)', 's.indra3108@gmail.com', 'aslukita@jayatrade.com', 'metrojamandiri@yahoo.co.id', '08561750191', '08119944986', '081288096262'),
(32, 'KBT', 'Jaya Gas (Cab. Bintaro) (KBT)', 's.indra3108@gmail.com', 'aslukita@jayatrade.com', 'gsujono@yahoo.co.id', '08561750191', '08119944986', '081585566646'),
(33, 'KBG', 'Jaya Gas Cabang (Bogor) (KBG)', 's.indra3108@gmail.com', 'aslukita@jayatrade.com', 'jgi_bgr@yahoo.co.id', '08561750191', '08119944986', '087823110899'),
(34, 'KKG', 'Jaya Gas Cabang (Gading) (KKG)', 's.indra3108@gmail.com', 'aslukita@jayatrade.com', 'jgi.kelapagading@yahoo.co.id', '08561750191', '08119944986', '081317948122'),
(35, 'KKW', 'Jaya Gas Cab. (Karawang) (KKW)', 's.indra3108@gmail.com', 'aslukita@jayatrade.com', 'jgikarawang@yahoo.co.id', '08561750191', '08119944986', '08121802646'),
(36, 'KKJ', 'Jaya Gas Cabang (Keb. Jeruk) (KKJ)', 's.indra3108@gmail.com', 'aslukita@jayatrade.com', 'muin.jgi@gmail.com', '08561750191', '08119944986', '081318190703'),
(37, 'KBS', 'Jaya Gas Cabang (Bekasi) (KBS)', 's.indra3108@gmail.com', 'aslukita@jayatrade.com', 'jgibekasi@yahoo.co.id', '08561750191', '08119944986', '081311417818'),
(38, 'KPK', 'Jaya Gas Cabang (Jati Asih) (KPK)', 's.indra3108@gmail.com', 'aslukita@jayatrade.com', 'rifkysani12@gmail.com', '08561750191', '08119944986', ''),
(39, 'KCK', 'Jaya Gas Cabang (Cikarang) (KCK)', 's.indra3108@gmail.com', 'aslukita@jayatrade.com', 'jgicikarang@yahoo.co.id', '08561750191', '08119944986', '081511949488'),
(40, 'KJG', 'Jaya Gas Cabang (Lenteng Agung) (KJG)', 's.indra3108@gmail.com', 'aslukita@jayatrade.com', 'lorianisiringo@yahoo.co.id', '08561750191', '08119944986', '081585566646'),
(41, 'KCW', 'Jaya Gas Cabang (BSD) (KCW)', 's.indra3108@gmail.com', 'aslukita@jayatrade.com', 'metroja_bsd@yahoo.com', '08561750191', '08119944986', '081310165715'),
(42, 'KBR', 'METROJA MANDIRI (Balaraja) (KBR)', 's.indra3108@gmail.com', 'aslukita@jayatrade.com', 'balaraja_gas@yahoo.co.id', '08561750191', '08119944986', '081297854887'),
(44, 'BDG', 'Bandung (BDG)', 'rifkysani12@gmail.com', 'rifkysani12@gmail.com', 'rifkysani12@gmail.com', '081360982764', '081382433230', '081382433230'),
(45, 'KBJ', 'Balaraja (KBJ)', 'rifkysani12@gmail.com', 'rifkysani12@gmail.com', 'rifkysani12@gmail.com', '081289795610', '081289795610', '081289795610'),
(46, 'KDG', 'Sapan (KDG)', 'rifkysani12@gmail.com', 'rifkysani12@gmail.com', 'rifkysani12@gmail.com', '081360982764', '081382433230', '081382433230'),
(47, 'KSD', 'BSD (KSD)', 'rifkysani12@gmail.com', 'rifkysani12@gmail.com', 'rifkysani12@gmail.com', '081360982764', '081382433230', '081382433230'),
(48, 'KTG', 'Tangerang (KTG)', 'rifkysani12@gmail.com', 'rifkysani12@gmail.com', 'rifkysani12@gmail.com', '081360982764', '081382433230', '081382433230'),
(50, 'KBO', 'Bogor (KBO)', 'rifkysani12@gmail.com', 'rifkysani12@gmail.com', 'rifkysani12@gmail.com', '081360982764', '081382433230', '087823110899'),
(51, 'KBE', 'Bekasi (KBE)', 'rifkysani12@gmail.com', 'rifkysani12@gmail.com', 'rifkysani12@gmail.com', '081360982764', '081382433230', '081311417818'),
(52, 'KCI', 'Cikarang (KCI)', 'rifkysani12@gmail.com', 'rifkysani12@gmail.com', 'rifkysani12@gmail.com', '081360982764', '081382433230', '081398223407'),
(53, 'KLA', 'Lenteng Agung (KLA)', 'rifkysani12@gmail.com', 'rifkysani12@gmail.com', 'rifkysani12@gmail.com', '081360982764', '081382433230', '087823110899'),
(54, 'KGD', 'Kelapa Gading (KGD)', 'rifkysani12@gmail.com', 'rifkysani12@gmail.com', 'rifkysani12@gmail.com', '081360982764', '081382433230', '081311417818'),
(55, 'KJR', 'Kebon Jeruk (KJR)', 'rifkysani12@gmail.com', 'rifkysani12@gmail.com', 'rifkysani12@gmail.com', '081280453681', '081280453681', '081280453681'),
(56, 'KKA', 'Karawang (KKA)', 'rifkysani12@gmail.com', 'rifkysani12@gmail.com', 'rifkysani12@gmail.com', '081360982764', '081382433230', '08121802646'),
(57, 'KBI', 'Bintaro (KBI)', 'rifkysani12@gmail.com', 'rifkysani12@gmail.com', 'rifkysani12@gmail.com', '081360982764', '081382433230', '081585566646'),
(58, 'JJJ', 'JTI HE - Simulasi (JJJ)', 'hamid_jti@yahoo.com', 'hamid_jti@yahoo.com', 'hamid_jti@yahoo.com', '', '', ''),
(59, 'GGG', 'GBU BULK - Simulasi (GGG)', 'hamid_jti@yahoo.com', 'hamid_jti@yahoo.com', 'hamid_jti@yahoo.com', '', '', ''),
(60, 'JUN', 'TESTER PENGAJUAN ASPAL', 'junior.siahaan@yahoo.com', 'junior.siahaan@yahoo.com', 'junior.siahaan@yahoo.com', '081211112504', '081211112504', '081211112504'),
(62, 'TGD', 'Toba Gena Utama Cabang Dumai (TGD)', 'lukmanalwi@rocketmail.com', 'gultom@jayatrade.com', 'tulus.simorangkir@gmail.com', '081360982764', '0811851330', '0811755676');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `tb_unit`
--
ALTER TABLE `tb_unit`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `tb_unit`
--
ALTER TABLE `tb_unit`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=63;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
