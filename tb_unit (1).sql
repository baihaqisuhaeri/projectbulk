-- phpMyAdmin SQL Dump
-- version 5.1.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Aug 31, 2022 at 11:25 AM
-- Server version: 10.4.18-MariaDB
-- PHP Version: 7.4.16

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `itjticom_input_cust`
--

-- --------------------------------------------------------

--
-- Table structure for table `tb_unit`
--

CREATE TABLE `tb_unit` (
  `id` int(20) NOT NULL,
  `kd_unit` varchar(30) NOT NULL,
  `nm_unit` varchar(255) NOT NULL,
  `email1` varchar(50) NOT NULL,
  `email2` varchar(50) NOT NULL,
  `email3` varchar(50) NOT NULL,
  `no1` varchar(50) NOT NULL,
  `no2` varchar(50) NOT NULL,
  `no3` varchar(50) NOT NULL,
  `al1_cab` text NOT NULL,
  `al2_cab` varchar(30) NOT NULL,
  `al3_cab` varchar(30) NOT NULL,
  `telp` varchar(15) NOT NULL,
  `kontak` varchar(30) NOT NULL,
  `n_kacab` varchar(20) NOT NULL,
  `j_kacab` varchar(20) NOT NULL,
  `npwp` varchar(15) NOT NULL,
  `sk` varchar(20) NOT NULL,
  `tgl_sk` date NOT NULL,
  `nama_fp` varchar(25) NOT NULL,
  `lokasi` varchar(10) NOT NULL,
  `kode_nomor` varchar(2) NOT NULL,
  `flag_aktif` varchar(1) NOT NULL,
  `tgl_aktif` date NOT NULL,
  `ttpbln` double(3,0) NOT NULL,
  `n_pt` varchar(30) NOT NULL,
  `al_pjk` varchar(50) NOT NULL,
  `al_pjk2` varchar(50) NOT NULL,
  `kode_spm` varchar(3) NOT NULL,
  `plaf_unit` double(18,2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tb_unit`
--

INSERT INTO `tb_unit` (`id`, `kd_unit`, `nm_unit`, `email1`, `email2`, `email3`, `no1`, `no2`, `no3`, `al1_cab`, `al2_cab`, `al3_cab`, `telp`, `kontak`, `n_kacab`, `j_kacab`, `npwp`, `sk`, `tgl_sk`, `nama_fp`, `lokasi`, `kode_nomor`, `flag_aktif`, `tgl_aktif`, `ttpbln`, `n_pt`, `al_pjk`, `al_pjk2`, `kode_spm`, `plaf_unit`) VALUES
(1, 'JTI', 'Jaya Trade Indonesia (JTI)', 'dasma.hutasoit@gmail.com', 'gultom@jayatrade.com', 'jti.ascur@yahoo.co.id', '08129186601', '0811851330', '085888314837', '', '', '', '', '', '', '', '', '', '0000-00-00', '', '', 'TI', '', '0000-00-00', 0, '', '', '', '', 0.00),
(2, 'GBU', 'Global Bitumen Utama (GBU)', 'dasma.hutasoit@gmail.com', 'gultom@jayatrade.com', 'jti.ascur@yahoo.co.id', '08129186601', '0811851330', '085382564415', '', '', '', '', '', '', '', '', '', '0000-00-00', '', '', 'BU', '', '2022-06-18', 0, '', '', '', '', 0.00),
(3, 'SAU', 'Sarana Aceh Utama (SAU)', 'hanni_mi@yahoo.com', 'gultom@jayatrade.com', 'saranaacehutama@yahoo.com', '08126422246', '0811851330', '085306510253', '', '', '', '', '', '', '', '', '', '0000-00-00', '', '', 'AU', '', '0000-00-00', 0, '', '', '', '', 0.00),
(4, 'SLU', 'Sarana Lampung Utama (SLU)', 'pras_jti@yahoo.com', 'gultom@jayatrade.com', 'saranalampungutama@yahoo.com', '081272221333', '0811851330', '082185214567', '', '', '', '', '', '', '', '', '', '0000-00-00', '', '', 'LU', '', '0000-00-00', 0, '', '', '', '', 0.00),
(5, 'SJU', 'Sarana Jambi Utama (SJU)', 'lukmanalwi@rocketmail.com', 'gultom@jayatrade.com', 'saranajambiutama@yahoo.co.id', '081360982764', '0811851330', '085273374142', '', '', '', '', '', '', '', '', '', '0000-00-00', '', '', 'JU', '', '0000-00-00', 0, '', '', '', '', 0.00),
(6, 'SLO', 'Sarana Lombok Utama (SLO)', 'pugargesang@yahoo.com', 'gultom@jayatrade.com', 'slolombok@yahoo.com', '081246050000', '0811851330', '08175781207', '', '', '', '', '', '', '', '', '', '0000-00-00', '', '', 'LO', '', '0000-00-00', 0, '', '', '', '', 0.00),
(7, 'SBU', 'Sarana Bitung Utama (SBU)', 'sophia_pontoh@yahoo.com', 'gultom@jayatrade.com', 'ptsaranabitungutama_1997@yahoo.co.id', '0811433715', '0811851330', '081340006034', '', '', '', '', '', '', '', '', '', '0000-00-00', '', '', 'UB', '', '0000-00-00', 0, '', '', '', '', 0.00),
(8, 'TGU', 'Toba Gena Utama (TGU)', 'lukmanalwi@rocketmail.com', 'gultom@jayatrade.com', 'wisnu_jti@yahoo.com', '081360982764', '0811851330', '085362024687', '', '', '', '', '', '', '', '', '', '0000-00-00', '', '', 'GU', '', '0000-00-00', 0, '', '', '', '', 0.00),
(9, 'TGP', 'Toba Gena Utama Cabang Perawang (TGP)', 'lukmanalwi@rocketmail.com', 'gultom@jayatrade.com', 'tulus.simorangkir@gmail.com', '081360982764', '0811851330', '0811755676', '', '', '', '', '', '', '', '', '', '0000-00-00', '', '', 'GP', '', '0000-00-00', 0, '', '', '', '', 0.00),
(10, 'GBM', 'GBU Cab.Merak (GBM)', 'dasma.hutasoit@gmail.com', 'gultom@jayatrade.com', 'jti.ascur@yahoo.co.id', '08129186601', '0811851330', '085382564415', '', '', '', '', '', '', '', '', '', '0000-00-00', '', '', 'BM', '', '0000-00-00', 0, '', '', '', '', 0.00),
(11, 'SMB', 'Sarana Mbay Utama (SMB)', 'donimusdi@yahoo.co.id', 'gultom@jayatrade.com', 'smbu_mbay@yahoo.co.id', '081238102964', '0811851330', '081327371873', '', '', '', '', '', '', '', '', '', '0000-00-00', '', '', 'MB', '', '0000-00-00', 0, '', '', '', '', 0.00),
(12, 'SSM', 'Sarana Sampit Mentaya Utama (SSM)', 'jti.trijoko@yahoo.com', 'gultom@jayatrade.com', 'ssmutama@yahoo.com', '085218838220', '0811851330', '085100711543', '', '', '', '', '', '', '', '', '', '0000-00-00', '', '', 'SM', '', '0000-00-00', 0, '', '', '', '', 0.00),
(13, 'SJB', 'Sarana Jambi Utama Cabang Belinyu (SJB)', 'lukmanalwi@rocketmail.com', 'gultom@jayatrade.com', 'chen.fitri68@yahoo.com', '081360982764', '0811851330', '082280191327', '', '', '', '', '', '', '', '', '', '0000-00-00', '', '', 'JB', '', '0000-00-00', 0, '', '', '', '', 0.00),
(14, 'SMU', 'Sarana Merpati Utama (SMU)', 'dasma.hutasoit@gmail.com', 'gultom@jayatrade.com', 'irfa.rizqiany16@gmail.com', '08129186601', '0811851330', '085888314837', '', '', '', '', '', '', '', '', '', '0000-00-00', '', '', 'MU', '', '0000-00-00', 0, '', '', '', '', 0.00),
(15, 'ABN', 'Adibaroto Nugratama (ABN)', 'stephen@jayatrade.com', 'gultom@jayatrade.com', 'cicik_yudo@yahoo.com', '081286562067', '0811851330', '081230811054', '', '', '', '', '', '', '', '', '', '0000-00-00', '', '', 'BN', '', '0000-00-00', 0, '', '', '', '', 0.00),
(16, 'SLK', 'Sarana Lombok Utama Cabang Kupang (SLK)', 's_raturandang@yahoo.co.id', 'gultom@jayatrade.com', 'sarana_lombok@yahoo.co.id', '081340178019', '0811851330', '082236988622', '', '', '', '', '', '', '', '', '', '0000-00-00', '', '', 'KL', '', '0000-00-00', 0, '', '', '', '', 0.00),
(17, 'SSP', 'Sarana Sampit Cabang Pulang Pisau (SSP)', 'ika_smu@yahoo.com', 'gultom@jayatrade.com', 'friscillaumboh@gmail.com', '08129571357', '0811851330', '085298250305', '', '', '', '', '', '', '', '', '', '0000-00-00', '', '', 'SP', '', '0000-00-00', 0, '', '', '', '', 0.00),
(18, 'SAL', 'Sarana Aceh Utama Cabang Lhokseumawe (SAL)', 'hanni_mi@yahoo.com', 'gultom@jayatrade.com', 'sau.lhokseumawe@gmail.com', '08126422246', '0811851330', '082363806747', '', '', '', '', '', '', '', '', '', '0000-00-00', '', '', 'AL', '', '0000-00-00', 0, '', '', '', '', 0.00),
(19, 'JTB', 'Jaya Trade Indonesia Cabang Belawan (JTB)', 'lukmanalwi@rocketmail.com', 'gultom@jayatrade.com', 'jayatrade.medan@yahoo.com', '081360982764', '0811851330', '081396336187', 'jakarta', 'jakarta2', 'jakarta3', '08176721', 'uknown', 'unknown', 'kacab', '2432434', 'dfdf', '2022-07-27', 'sas', 'bandung', 'TB', '', '2022-08-01', 0, 'dfd', 'dxsd', 'asa', 'sa', 2.00),
(20, 'BLK', 'Jaya Gas Indonesia - Div. BULK (BLK)', 'fauzan@jayatrade.com', 'aslukita@jayatrade.com', 'lienawin@jayagas.co.id', '081210066722', '08119944986', '081287678008', '', '', '', '', '', '', '', '', '', '0000-00-00', '', '', 'LK', '', '2022-05-19', 0, '', '', '', '', 0.00),
(21, 'JTS', 'Jaya Trade Indonesia Cabang Surabaya (JTS)', 'stephen@jayatrade.com', 'gultom@jayatrade.com', 'cicik_yudo@yahoo.com', '081286562067', '0811851330', '081230811054', '', '', '', '', '', '', '', '', '', '0000-00-00', '', '', 'TS', '', '0000-00-00', 0, '', '', '', '', 0.00),
(22, 'YLE', 'Handling Equipment (YLE)', 'dekky_myd@yahoo.co.id', 'gultom@jayatrade.com', 'erlyardini94@gmail.com', '08111315745', '0811851330', '081298403408', '', '', '', '', '', '', '', '', '', '0000-00-00', '', '', 'LE', '', '0000-00-00', 0, '', '', '', '', 0.00),
(23, 'KNU', 'Kenrope Utama (KNU)', 'mhr_gas@yahoo.com', 'gultom@jayatrade.com', 'edwin_garut@yahoo.co.id', '085693697348', '0811851330', '08156135371', '', '', '', '', '', '', '', '', '', '0000-00-00', '', '', 'NU', '', '0000-00-00', 0, '', '', '', '', 0.00),
(24, 'PWP', 'Power Plus (HVE)', 'dekky_myd@yahoo.co.id', 'gultom@jayatrade.com', 'solihin@jayatrade.com', '08111315745', '0811851330', '087888682224', '', '', '', '', '', '', '', '', '', '0000-00-00', '', '', 'WP', '', '0000-00-00', 0, '', '', '', '', 0.00),
(25, 'TNK', 'Teknik (TNK)', 'fauzan@jayatrade.com', 'gultom@jayatrade.com', 'etinurjanah94@gmail.com', '081210066722', '0811851330', '087884855253', '', '', '', '', '', '', '', '', '', '0000-00-00', '', '', 'NK', '', '0000-00-00', 0, '', '', '', '', 0.00),
(26, 'GBB', 'Global Bitumen Utama - Div. BULK (GBB)', 'fauzan@jayatrade.com', 'aslukita@jayatrade.com', 'lienawin@jayagas.co.id', '081210066722', '08119944986', '081287678008', '', '', '', '', '', '', '', '', '', '0000-00-00', '', '', 'BB', '', '2022-08-02', 0, '', '', '', '', 0.00),
(27, 'JTE', 'Jaya Trade Emulsi (JTE)', 'r_sipayung02@yahoo.com', 'gultom@jayatrade.com', 'alhanzsandayani@gmail.com', '085361077173', '0811851330', '081287211465', '', '', '', '', '', '', '', '', '', '0000-00-00', '', '', 'TE', '', '0000-00-00', 0, '', '', '', '', 0.00),
(28, 'JTC', 'Jaya Trade Indonesia Cabang Cilacap (JTC)', 'dasma.hutasoit@gmail.com', 'gultom@jayatrade.com', 'adhdit@gmail.com', '08129186601', '0811851330', '085888314837', '', '', '', '', '', '', '', '', '', '0000-00-00', '', '', 'TC', '', '0000-00-00', 0, '', '', '', '', 0.00),
(29, 'JAB', 'Jaya Trade Aspal Buton (JAB)', 'stephen@jayatrade.com', 'gultom@jayatrade.com', 'raymondsibuea@yahoo.com', '081286562067', '0811851330', '081330054851', '', '', '', '', '', '', '', '', '', '0000-00-00', '', '', 'AB', '', '0000-00-00', 0, '', '', '', '', 0.00),
(30, 'AJP', 'Adigas Jaya Pratama Cab. Sapan (AJP)', 's.indra3108@gmail.com', 'aslukita@jayatrade.com', 'adigasjayapratama@yahoo.com', '08561750191', '08119944986', '085770107919', '', '', '', '', '', '', '', '', '', '0000-00-00', '', '', 'JP', '', '0000-00-00', 0, '', '', '', '', 0.00),
(31, 'KMD', 'Metroja Mandiri (cab. Merdeka Tangerang) (KMD)', 's.indra3108@gmail.com', 'aslukita@jayatrade.com', 'metrojamandiri@yahoo.co.id', '08561750191', '08119944986', '081288096262', '', '', '', '', '', '', '', '', '', '0000-00-00', '', '', 'MD', '', '0000-00-00', 0, '', '', '', '', 0.00),
(32, 'KBT', 'Jaya Gas (Cab. Bintaro) (KBT)', 's.indra3108@gmail.com', 'aslukita@jayatrade.com', 'gsujono@yahoo.co.id', '08561750191', '08119944986', '081585566646', '', '', '', '', '', '', '', '', '', '0000-00-00', '', '', 'BT', '', '0000-00-00', 0, '', '', '', '', 0.00),
(33, 'KBG', 'Jaya Gas Cabang (Bogor) (KBG)', 's.indra3108@gmail.com', 'aslukita@jayatrade.com', 'jgi_bgr@yahoo.co.id', '08561750191', '08119944986', '087823110899', '', '', '', '', '', '', '', '', '', '0000-00-00', '', '', 'BG', '', '0000-00-00', 0, '', '', '', '', 0.00),
(34, 'KKG', 'Jaya Gas Cabang (Gading) (KKG)', 's.indra3108@gmail.com', 'aslukita@jayatrade.com', 'jgi.kelapagading@yahoo.co.id', '08561750191', '08119944986', '081317948122', '', '', '', '', '', '', '', '', '', '0000-00-00', '', '', 'KG', '', '0000-00-00', 0, '', '', '', '', 0.00),
(35, 'KKW', 'Jaya Gas Cab. (Karawang) (KKW)', 's.indra3108@gmail.com', 'aslukita@jayatrade.com', 'jgikarawang@yahoo.co.id', '08561750191', '08119944986', '08121802646', '', '', '', '', '', '', '', '', '', '0000-00-00', '', '', 'KW', '', '0000-00-00', 0, '', '', '', '', 0.00),
(36, 'KKJ', 'Jaya Gas Cabang (Keb. Jeruk) (KKJ)', 's.indra3108@gmail.com', 'aslukita@jayatrade.com', 'muin.jgi@gmail.com', '08561750191', '08119944986', '081318190703', '', '', '', '', '', '', '', '', '', '0000-00-00', '', '', 'KJ', '', '0000-00-00', 0, '', '', '', '', 0.00),
(37, 'KBS', 'Jaya Gas Cabang (Bekasi) (KBS)', 's.indra3108@gmail.com', 'aslukita@jayatrade.com', 'jgibekasi@yahoo.co.id', '08561750191', '08119944986', '081311417818', '', '', '', '', '', '', '', '', '', '0000-00-00', '', '', 'BS', '', '0000-00-00', 0, '', '', '', '', 0.00),
(38, 'KPK', 'Jaya Gas Cabang (Jati Asih) (KPK)', 's.indra3108@gmail.com', 'aslukita@jayatrade.com', 'rifkysani12@gmail.com', '08561750191', '08119944986', '', '', '', '', '', '', '', '', '', '', '0000-00-00', '', '', 'PK', '', '0000-00-00', 0, '', '', '', '', 0.00),
(39, 'KCK', 'Jaya Gas Cabang (Cikarang) (KCK)', 's.indra3108@gmail.com', 'aslukita@jayatrade.com', 'jgicikarang@yahoo.co.id', '08561750191', '08119944986', '081511949488', '', '', '', '', '', '', '', '', '', '0000-00-00', '', '', 'CK', '', '0000-00-00', 0, '', '', '', '', 0.00),
(40, 'KJG', 'Jaya Gas Cabang (Lenteng Agung) (KJG)', 's.indra3108@gmail.com', 'aslukita@jayatrade.com', 'lorianisiringo@yahoo.co.id', '08561750191', '08119944986', '081585566646', '', '', '', '', '', '', '', '', '', '0000-00-00', '', '', 'JG', '', '0000-00-00', 0, '', '', '', '', 0.00),
(41, 'KCW', 'Jaya Gas Cabang (BSD) (KCW)', 's.indra3108@gmail.com', 'aslukita@jayatrade.com', 'metroja_bsd@yahoo.com', '08561750191', '08119944986', '081310165715', '', '', '', '', '', '', '', '', '', '0000-00-00', '', '', 'CW', '', '0000-00-00', 0, '', '', '', '', 0.00),
(42, 'KBR', 'METROJA MANDIRI (Balaraja) (KBR)', 's.indra3108@gmail.com', 'aslukita@jayatrade.com', 'balaraja_gas@yahoo.co.id', '08561750191', '08119944986', '081297854887', '', '', '', '', '', '', '', '', '', '0000-00-00', '', '', 'BR', '', '0000-00-00', 0, '', '', '', '', 0.00),
(60, 'JUN', 'TESTER PENGAJUAN ASPAL', 'junior.siahaan@yahoo.com', 'junior.siahaan@yahoo.com', 'junior.siahaan@yahoo.com', '081211112504', '081211112504', '081211112504', '', '', '', '', '', '', '', '', '', '0000-00-00', '', '', 'UN', '', '0000-00-00', 0, '', '', '', '', 0.00),
(62, 'TGD', 'Toba Gena Utama Cabang Dumai (TGD)', 'lukmanalwi@rocketmail.com', 'gultom@jayatrade.com', 'tulus.simorangkir@gmail.com', '081360982764', '0811851330', '0811755676', '', '', '', '', '', '', '', '', '', '0000-00-00', '', '', 'GD', '', '0000-00-00', 0, '', '', '', '', 0.00),
(63, 'JPU', 'Jaya Prasarana Utama (JPU)', 'hamid_jti@yahoo.com', 'hamid_jti@yahoo.com', 'hamid_jti@yahoo.com', '087771702126', '087771702126', '087771702126', '', '', '', '', '', '', '', '', '', '0000-00-00', '', '', 'PU', '', '0000-00-00', 0, '', '', '', '', 0.00);

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
  MODIFY `id` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=64;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
