-- phpMyAdmin SQL Dump
-- version 4.5.1
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: 15 Des 2018 pada 17.53
-- Versi Server: 10.1.13-MariaDB
-- PHP Version: 5.6.20

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `mitralanggeng`
--

DELIMITER $$
--
-- Fungsi
--
CREATE DEFINER=`root`@`localhost` FUNCTION `fckodebarang` (`nomer` INT) RETURNS VARCHAR(8) CHARSET latin1 BEGIN
DECLARE urut int;
DECLARE hasil varchar(8);
SET urut = IF(nomer IS null, 1, nomer + 1);
SET hasil = CONCAT('BRG',LPAD(urut,5,0));
RETURN hasil;
END$$

CREATE DEFINER=`root`@`localhost` FUNCTION `fckodedtpembelian` (`nomer` INT) RETURNS VARCHAR(8) CHARSET latin1 BEGIN
DECLARE urut int;
DECLARE hasil varchar(8);
SET urut = IF(nomer IS null, 1, nomer + 1);
SET hasil = CONCAT('DPB',LPAD(urut,5,0));
RETURN hasil;
END$$

CREATE DEFINER=`root`@`localhost` FUNCTION `fckodedtpenjualan` (`nomer` INT) RETURNS VARCHAR(8) CHARSET latin1 BEGIN
DECLARE urut int;
DECLARE hasil varchar(8);
SET urut = IF(nomer IS null, 1, nomer + 1);
SET hasil = CONCAT('DPJ',LPAD(urut,5,0));
RETURN hasil;
END$$

CREATE DEFINER=`root`@`localhost` FUNCTION `fckodekategori` (`nomer` INT) RETURNS VARCHAR(8) CHARSET latin1 BEGIN
DECLARE urut int;
DECLARE hasil varchar(8);
SET urut = IF(nomer IS null, 1, nomer + 1);
SET hasil = CONCAT('KTG',LPAD(urut,5,0));
RETURN hasil;
END$$

CREATE DEFINER=`root`@`localhost` FUNCTION `fckodemember` (`nomer` INT) RETURNS VARCHAR(8) CHARSET latin1 BEGIN
DECLARE urut int;
DECLARE hasil varchar(8);
SET urut = IF(nomer IS null, 1, nomer + 1);
SET hasil = CONCAT('MBR',LPAD(urut,5,0));
RETURN hasil;
END$$

CREATE DEFINER=`root`@`localhost` FUNCTION `fckodepembelian` (`nomer` INT) RETURNS VARCHAR(8) CHARSET latin1 BEGIN
DECLARE urut int;
DECLARE hasil varchar(8);
SET urut = IF(nomer IS null, 1, nomer + 1);
SET hasil = CONCAT('PBL',LPAD(urut,5,0));
RETURN hasil;
END$$

CREATE DEFINER=`root`@`localhost` FUNCTION `fckodepemhutang` (`nomer` INT) RETURNS VARCHAR(8) CHARSET latin1 BEGIN
DECLARE urut int;
DECLARE hasil varchar(8);
SET urut = IF(nomer IS null, 1, nomer + 1);
SET hasil = CONCAT('PMH',LPAD(urut,5,0));
RETURN hasil;
END$$

CREATE DEFINER=`root`@`localhost` FUNCTION `fckodepempiutang` (`nomer` INT) RETURNS VARCHAR(8) CHARSET latin1 BEGIN
DECLARE urut int;
DECLARE hasil varchar(8);
SET urut = IF(nomer IS null, 1, nomer + 1);
SET hasil = CONCAT('PMP',LPAD(urut,5,0));
RETURN hasil;
END$$

CREATE DEFINER=`root`@`localhost` FUNCTION `fckodepenjualan` (`nomer` INT) RETURNS VARCHAR(8) CHARSET latin1 NO SQL
BEGIN
DECLARE urut int;
DECLARE hasil varchar(8);
SET urut = IF(nomer IS null, 1, nomer + 1);
SET hasil = CONCAT('PNJ',LPAD(urut,5,0));
RETURN hasil;
END$$

CREATE DEFINER=`root`@`localhost` FUNCTION `fckoderetur` (`nomer` INT) RETURNS VARCHAR(8) CHARSET latin1 BEGIN
DECLARE urut int;
DECLARE hasil varchar(8);
SET urut = IF(nomer IS null, 1, nomer + 1);
SET hasil = CONCAT('RTR',LPAD(urut,5,0));
RETURN hasil;
END$$

CREATE DEFINER=`root`@`localhost` FUNCTION `fckodesatuan` (`nomer` INT) RETURNS VARCHAR(8) CHARSET latin1 BEGIN
DECLARE urut int;
DECLARE hasil varchar(8);
SET urut = IF(nomer IS null, 1, nomer + 1);
SET hasil = CONCAT('SAT',LPAD(urut,5,0));
RETURN hasil;
END$$

CREATE DEFINER=`root`@`localhost` FUNCTION `fckodesupplier` (`nomer` INT) RETURNS VARCHAR(8) CHARSET latin1 BEGIN
DECLARE urut int;
DECLARE hasil varchar(8);
SET urut = IF(nomer IS null, 1, nomer + 1);
SET hasil = CONCAT('SPL',LPAD(urut,5,0));
RETURN hasil;
END$$

CREATE DEFINER=`root`@`localhost` FUNCTION `fckodeuser` (`nomer` INT) RETURNS VARCHAR(8) CHARSET latin1 BEGIN
DECLARE urut int;
DECLARE hasil varchar(8);
SET urut = IF(nomer IS null, 1, nomer + 1);
SET hasil = CONCAT('USR',LPAD(urut,5,0));
RETURN hasil;
END$$

DELIMITER ;

-- --------------------------------------------------------

--
-- Struktur dari tabel `barang`
--

CREATE TABLE `barang` (
  `kodebarang` varchar(8) NOT NULL,
  `namabarang` varchar(100) NOT NULL,
  `hargabeli` int(11) DEFAULT NULL,
  `hargajual` int(11) DEFAULT NULL,
  `stokutuh` int(11) DEFAULT NULL,
  `stok` int(11) DEFAULT NULL,
  `kodesatuan` varchar(8) NOT NULL,
  `kodekategori` varchar(8) NOT NULL,
  `gambar` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `barang`
--

INSERT INTO `barang` (`kodebarang`, `namabarang`, `hargabeli`, `hargajual`, `stokutuh`, `stok`, `kodesatuan`, `kodekategori`, `gambar`) VALUES
('BRG00001', 'Kuas Cat 4"', 90000, 10000, 50, 50, 'SAT00003', 'KTG00007', '67029-kuas1.jpg'),
('BRG00002', 'Kuas Cat 3"', 72000, 8000, 50, 50, 'SAT00003', 'KTG00007', '96653-kuas1.jpg'),
('BRG00003', 'Kuas Cat 2,5"', 69000, 7000, 50, 50, 'SAT00003', 'KTG00007', '56718-kuas2.jpg'),
('BRG00004', 'Kuas Cat 2"', 54000, 6000, 50, 50, 'SAT00003', 'KTG00007', '81809-kuas2.jpg'),
('BRG00005', 'Kuas Cat 1,5"', 48000, 5000, 50, 50, 'SAT00003', 'KTG00007', '37285-kuas.jpg'),
('BRG00006', 'Kuas Cat 1"', 30000, 4000, 50, 50, 'SAT00003', 'KTG00007', '30850-kuas.jpg'),
('BRG00007', 'Lem G (Lem Kayu)', 225000, 6000, 50, 50, 'SAT00010', 'KTG00013', '86807-lemg.jpg'),
('BRG00008', 'Semen Tiga Roda 50kg', 51000, 53000, 50, 50, 'SAT00004', 'KTG00009', '71256-3roda.jpg'),
('BRG00009', 'Semen Tiga Roda 40kg', 41000, 43000, 50, 50, 'SAT00004', 'KTG00009', '92154-3roda.jpg'),
('BRG00010', 'Semen Holcim 50Kg', 50000, 52000, 50, 50, 'SAT00004', 'KTG00009', '14411-84773-3.jpg'),
('BRG00011', 'Semen Holcim 40Kg', 40000, 42000, 50, 50, 'SAT00004', 'KTG00009', '19925-84773-3.jpg'),
('BRG00012', 'Cat Dinding Weldon 5kg White (W-0001)', 380000, 115000, 50, 50, 'SAT00001', 'KTG00004', '16674-weldon.jpg'),
('BRG00013', 'Cat Dinding Weldon 5kg Aqua Green (W-7051)', 380000, 115000, 50, 50, 'SAT00001', 'KTG00004', '34502-weldon.jpg'),
('BRG00014', 'Cat Dinding Weldon 5kg Lucky Green (W-701)', 380000, 115000, 50, 50, 'SAT00001', 'KTG00004', '8096-weldon.jpg'),
('BRG00015', 'Cat Dinding Weldon 5kg Bug Green (W-7041)', 380000, 115000, 50, 50, 'SAT00001', 'KTG00004', '62652-weldon.jpg'),
('BRG00016', 'Cat Dinding Weldon 5kg Red (W-739)', 380000, 115000, 50, 50, 'SAT00001', 'KTG00004', '61624-weldon.jpg'),
('BRG00017', 'Cat Dinding Weldon 5kg Gypsy Pink (W-7381)', 380000, 115000, 50, 50, 'SAT00001', 'KTG00004', '17021-weldon.jpg'),
('BRG00018', 'Cat Dinding Weldon 5kg Canary Yellow (W-716)', 380000, 115000, 50, 50, 'SAT00001', 'KTG00004', '84492-weldon.jpg'),
('BRG00019', 'Cat Dinding Weldon 5kg Rose Velvet (W-733)', 380000, 115000, 50, 50, 'SAT00001', 'KTG00004', '53703-weldon.jpg'),
('BRG00020', 'Cat Dinding Weldon 5kg Manaco (W-767)', 380000, 115000, 50, 50, 'SAT00001', 'KTG00004', '34684-weldon.jpg'),
('BRG00021', 'Cat Dinding Weldon 5kg Atlantic Blue (W-724)', 380000, 115000, 50, 50, 'SAT00001', 'KTG00004', '39098-weldon.jpg'),
('BRG00022', 'Cat Dinding Weldon 5kg Galaxy Blue (W-727)', 380000, 115000, 50, 50, 'SAT00001', 'KTG00004', '54618-weldon.jpg'),
('BRG00023', 'Cat Dinding Weldon 5kg Orchid (W-777)', 380000, 100000, 50, 50, 'SAT00001', 'KTG00004', '5045-weldon.jpg'),
('BRG00024', 'Cat Kayu Brillo 1kg Happy Red (2544)', 28000, 35000, 50, 50, 'SAT00003', 'KTG00024', '78610-brillo.jpg'),
('BRG00025', 'Cat Kayu Brillo 1kg Basil Green (4550)', 28000, 35000, 50, 50, 'SAT00003', 'KTG00024', '90360-brillo.jpg'),
('BRG00026', 'Cat Kayu Brillo 1kg Fresh Green (3562)', 28000, 35000, 50, 50, 'SAT00003', 'KTG00024', '45621-brillo.jpg'),
('BRG00027', 'Cat Kayu Brillo 1kg Milk Cream (2543)', 28000, 35000, 50, 50, 'SAT00003', 'KTG00024', '25405-brillo.jpg'),
('BRG00028', 'Cat Kayu Brillo 1kg Silver Point (1910)', 28000, 35000, 50, 50, 'SAT00003', 'KTG00024', '37031-brillo.jpg'),
('BRG00029', 'Cat Kayu Brillo 1kg Royal Lilac (3710)', 28000, 35000, 50, 50, 'SAT00003', 'KTG00024', '45929-brillo.jpg'),
('BRG00030', 'Cat Kayu Brillo 1kg Summer Blue (3670)', 28000, 35000, 50, 50, 'SAT00003', 'KTG00024', '86091-brillo.jpg'),
('BRG00031', 'Selang Waterpass Tebal 1/4"', 90000, 2500, 50, 50, 'SAT00011', 'KTG00025', '78099-selang1.jpg'),
('BRG00032', 'Cetok Lancip Besar', 180000, 20000, 50, 50, 'SAT00003', 'KTG00015', '90514-cetok.jpg'),
('BRG00033', 'Kran Besi 1/2"', 192000, 20000, 50, 50, 'SAT00003', 'KTG00017', '49935-kran.jpg'),
('BRG00034', 'Meteran Tajima 3m', 90000, 10000, 50, 50, 'SAT00003', 'KTG00026', '19671-meteran.jpg'),
('BRG00035', 'Meteran Tajima 5m', 144000, 15000, 50, 50, 'SAT00003', 'KTG00026', '87278-meteran.jpg'),
('BRG00036', 'Tang Genggam', 15000, 20000, 50, 50, 'SAT00005', 'KTG00027', '65930-tang1.jpg'),
('BRG00037', 'Tang Catut ', 16000, 20000, 50, 50, 'SAT00005', 'KTG00027', '15357-catut.jpg'),
('BRG00038', 'Kuas Roll Cat Dinding', 13000, 16000, 50, 50, 'SAT00005', 'KTG00007', '94345-rolkuas.jpg'),
('BRG00039', 'Lem Paralon Isarplas', 85000, 10000, 50, 50, 'SAT00012', 'KTG00013', '40569-isarplas.jpg'),
('BRG00040', 'Palu Kambing', 20000, 25000, 50, 50, 'SAT00005', 'KTG00003', '65624-92680-5.jpg'),
('BRG00041', 'Toren/Tanki Air Excel 250liter', 610000, 640000, 50, 50, 'SAT00005', 'KTG00008', '6942-24732-6.jpg'),
('BRG00042', 'Toren/Tanki Air Excel 300liter', 640000, 670000, 50, 50, 'SAT00005', 'KTG00008', '92792-24732-6.jpg');

--
-- Trigger `barang`
--
DELIMITER $$
CREATE TRIGGER `trgbarang` BEFORE INSERT ON `barang` FOR EACH ROW BEGIN
DECLARE k varchar(8);
DECLARE i integer;
SET i = (SELECT substring(barang.kodebarang,5,4) AS nomer FROM barang ORDER BY nomer DESC LIMIT 1);
SET k = (SELECT fckodebarang(i));
IF(new.kodebarang IS null OR new.kodebarang = '') THEN SET new.kodebarang = k;
END IF;
END
$$
DELIMITER ;

-- --------------------------------------------------------

--
-- Struktur dari tabel `detailpembelian`
--

CREATE TABLE `detailpembelian` (
  `kodedtpembelian` varchar(8) NOT NULL,
  `namabarang` varchar(100) NOT NULL,
  `jumlah` int(11) NOT NULL,
  `hargabeli` int(11) NOT NULL,
  `total` int(11) NOT NULL,
  `kodepembelian` varchar(8) NOT NULL,
  `kodebarang` varchar(8) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Trigger `detailpembelian`
--
DELIMITER $$
CREATE TRIGGER `trgdtpembelian` BEFORE INSERT ON `detailpembelian` FOR EACH ROW BEGIN
DECLARE k varchar(8);
DECLARE i integer;
SET i = (SELECT substring(detailpembelian.kodedtpembelian,5,4) AS nomer FROM detailpembelian ORDER BY nomer DESC LIMIT 1);
SET k = (SELECT fckodedtpembelian(i));
IF(new.kodedtpembelian IS null OR new.kodedtpembelian = '') THEN SET new.kodedtpembelian = k;
END IF;
END
$$
DELIMITER ;

-- --------------------------------------------------------

--
-- Struktur dari tabel `detailpenjualan`
--

CREATE TABLE `detailpenjualan` (
  `kodedtpenjualan` varchar(8) NOT NULL,
  `namabarang` varchar(100) NOT NULL,
  `jumlah` int(11) NOT NULL,
  `hargajual` int(11) NOT NULL,
  `total` int(11) NOT NULL,
  `kodepenjualan` varchar(8) NOT NULL,
  `kodebarang` varchar(8) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Trigger `detailpenjualan`
--
DELIMITER $$
CREATE TRIGGER `trgdtpenjualan` BEFORE INSERT ON `detailpenjualan` FOR EACH ROW BEGIN
DECLARE k varchar(8);
DECLARE i integer;
SET i = (SELECT substring(detailpenjualan.kodedtpenjualan,5,4) AS nomer FROM detailpenjualan ORDER BY nomer DESC LIMIT 1);
SET k = (SELECT fckodedtpenjualan(i));
IF(new.kodedtpenjualan IS null OR new.kodedtpenjualan = '') THEN SET new.kodedtpenjualan = k;
END IF;
END
$$
DELIMITER ;

-- --------------------------------------------------------

--
-- Struktur dari tabel `kategori`
--

CREATE TABLE `kategori` (
  `kodekategori` varchar(8) NOT NULL,
  `namakategori` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `kategori`
--

INSERT INTO `kategori` (`kodekategori`, `namakategori`) VALUES
('KTG00002', 'Besi'),
('KTG00003', 'Palu'),
('KTG00004', 'Cat Dinding'),
('KTG00005', 'Paralon'),
('KTG00006', 'Fitting PVC'),
('KTG00007', 'Kuas'),
('KTG00008', 'Toren/Tank Air'),
('KTG00009', 'Semen'),
('KTG00010', 'Stop Kran'),
('KTG00011', 'Gamping/Kalsit'),
('KTG00012', 'Paku'),
('KTG00013', 'Lem'),
('KTG00014', 'Amplas'),
('KTG00015', 'Cetok'),
('KTG00016', 'Closet'),
('KTG00017', 'Kran'),
('KTG00018', 'Bak Cuci'),
('KTG00019', 'Engsel Pintu'),
('KTG00020', 'Engsel Jendela'),
('KTG00021', 'Grendel Pintu'),
('KTG00022', 'Grendel Jendela'),
('KTG00023', 'Strimin'),
('KTG00024', 'Cat Kayu'),
('KTG00025', 'Selang'),
('KTG00026', 'Meteran'),
('KTG00027', 'Tang Besi');

--
-- Trigger `kategori`
--
DELIMITER $$
CREATE TRIGGER `trgkategori` BEFORE INSERT ON `kategori` FOR EACH ROW BEGIN
DECLARE k varchar(8);
DECLARE i integer;
SET i = (SELECT substring(kategori.kodekategori,5,4) AS nomer FROM kategori ORDER BY nomer DESC LIMIT 1);
SET k = (SELECT fckodekategori(i));
IF(new.kodekategori IS null OR new.kodekategori = '') THEN SET new.kodekategori = k;
END IF;
END
$$
DELIMITER ;

-- --------------------------------------------------------

--
-- Struktur dari tabel `member`
--

CREATE TABLE `member` (
  `kodemember` varchar(8) NOT NULL,
  `idmember` varchar(15) DEFAULT NULL,
  `namamember` varchar(100) NOT NULL,
  `jenkel` varchar(1) DEFAULT NULL,
  `alamat` varchar(250) NOT NULL,
  `notelp` varchar(13) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `member`
--

INSERT INTO `member` (`kodemember`, `idmember`, `namamember`, `jenkel`, `alamat`, `notelp`) VALUES
('MBR00001', '1999888777666', 'Fais', 'P', 'Wironayan, Kradenan, Srumbung', '085678765654'),
('MBR00002', '1888777666555', 'Afika', 'P', 'Wironayan, Kradenan, Srumbung', '098876765654'),
('MBR00003', '1666555444333', 'Rini', 'P', 'Kradenan, Srumbung, Magelang', '087765654543'),
('MBR00004', '1222333444555', 'Tiara', 'P', 'Kradenan, Srumbung, Magelang', '087765567765'),
('MBR00005', '1555444999888', 'Sutarman', 'L', 'Cabe, Srumbung, Magelang', '087444543432'),
('MBR00006', '1777666333999', 'Pradika', 'L', 'Cungkup, Srumbung, Magelang', '087567456345'),
('MBR00007', '1997051222333', 'Cahyawst', 'L', 'Kradenan, Srumbung, Magelang', '087834173222'),
('MBR00008', '1997071799222', 'Candra K', 'L', 'Turi, Sleman, Yogyakarta', '081338300400');

--
-- Trigger `member`
--
DELIMITER $$
CREATE TRIGGER `trgmember` BEFORE INSERT ON `member` FOR EACH ROW BEGIN
DECLARE k varchar(8);
DECLARE i integer;
SET i = (SELECT substring(member.kodemember,5,4) AS nomer FROM member ORDER BY nomer DESC LIMIT 1);
SET k = (SELECT fckodemember(i));
IF(new.kodemember IS null OR new.kodemember = '') THEN SET new.kodemember = k;
END IF;
END
$$
DELIMITER ;

-- --------------------------------------------------------

--
-- Struktur dari tabel `pembayaranhutang`
--

CREATE TABLE `pembayaranhutang` (
  `kodepemhutang` varchar(8) NOT NULL,
  `jumlahbayar` int(11) NOT NULL,
  `tglbayar` date NOT NULL,
  `kodepembelian` varchar(8) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Trigger `pembayaranhutang`
--
DELIMITER $$
CREATE TRIGGER `trgpemhutang` BEFORE INSERT ON `pembayaranhutang` FOR EACH ROW BEGIN
DECLARE k varchar(8);
DECLARE i integer;
SET i = (SELECT substring(pembayaranhutang.kodepemhutang,5,4) AS nomer FROM pembayaranhutang ORDER BY nomer DESC LIMIT 1);
SET k = (SELECT fckodepemhutang(i));
IF(new.kodepemhutang IS null OR new.kodepemhutang = '') THEN SET new.kodepemhutang = k;
END IF;
END
$$
DELIMITER ;

-- --------------------------------------------------------

--
-- Struktur dari tabel `pembayaranpiutang`
--

CREATE TABLE `pembayaranpiutang` (
  `kodepempiutang` varchar(8) NOT NULL,
  `jumlahbayar` int(11) NOT NULL,
  `tglbayar` date DEFAULT NULL,
  `jumlahbunga` int(11) DEFAULT NULL,
  `kodepenjualan` varchar(8) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Trigger `pembayaranpiutang`
--
DELIMITER $$
CREATE TRIGGER `trgpempiutang` BEFORE INSERT ON `pembayaranpiutang` FOR EACH ROW BEGIN
DECLARE k varchar(8);
DECLARE i integer;
SET i = (SELECT substring(pembayaranpiutang.kodepempiutang,5,4) AS nomer FROM pembayaranpiutang ORDER BY nomer DESC LIMIT 1);
SET k = (SELECT fckodepempiutang(i));
IF(new.kodepempiutang IS null OR new.kodepempiutang = '') THEN SET new.kodepempiutang = k;
END IF;
END
$$
DELIMITER ;

-- --------------------------------------------------------

--
-- Struktur dari tabel `pembelian`
--

CREATE TABLE `pembelian` (
  `kodepembelian` varchar(8) NOT NULL,
  `tglpembelian` datetime NOT NULL,
  `uangtunai` int(11) DEFAULT NULL,
  `totalbayar` int(11) DEFAULT NULL,
  `status` varchar(20) DEFAULT NULL,
  `uangmuka` int(11) DEFAULT NULL,
  `persendiskon` int(11) DEFAULT NULL,
  `hutang` int(11) DEFAULT NULL,
  `sisahutang` int(11) DEFAULT NULL,
  `kodeuser` varchar(8) NOT NULL,
  `kodesupplier` varchar(8) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Trigger `pembelian`
--
DELIMITER $$
CREATE TRIGGER `trgpembelian` BEFORE INSERT ON `pembelian` FOR EACH ROW BEGIN
DECLARE k varchar(8);
DECLARE i integer;
SET i = (SELECT substring(pembelian.kodepembelian,5,4) AS nomer FROM pembelian ORDER BY nomer DESC LIMIT 1);
SET k = (SELECT fckodepembelian(i));
IF(new.kodepembelian IS null OR new.kodepembelian = '') THEN SET new.kodepembelian = k;
END IF;
END
$$
DELIMITER ;

-- --------------------------------------------------------

--
-- Struktur dari tabel `penjualan`
--

CREATE TABLE `penjualan` (
  `kodepenjualan` varchar(8) NOT NULL,
  `tglpenjualan` datetime NOT NULL,
  `uangtunai` int(11) DEFAULT NULL,
  `total` int(11) DEFAULT NULL,
  `status` varchar(20) DEFAULT NULL,
  `uangmuka` int(11) DEFAULT NULL,
  `persenbunga` int(11) DEFAULT NULL,
  `piutang` int(11) DEFAULT NULL,
  `sisapiutang` int(11) DEFAULT NULL,
  `tgltagihan` date DEFAULT NULL,
  `kodemember` varchar(8) DEFAULT NULL,
  `kodeuser` varchar(8) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Trigger `penjualan`
--
DELIMITER $$
CREATE TRIGGER `trgpenjualan` BEFORE INSERT ON `penjualan` FOR EACH ROW BEGIN
DECLARE k varchar(8);
DECLARE i integer;
SET i = (SELECT substring(penjualan.kodepenjualan,5,4) AS nomer FROM penjualan ORDER BY nomer DESC LIMIT 1);
SET k = (SELECT fckodepenjualan(i));
IF(new.kodepenjualan IS null OR new.kodepenjualan = '') THEN SET new.kodepenjualan = k;
END IF;
END
$$
DELIMITER ;

-- --------------------------------------------------------

--
-- Struktur dari tabel `retur`
--

CREATE TABLE `retur` (
  `koderetur` varchar(8) NOT NULL,
  `tglretur` date NOT NULL,
  `tglambil` date DEFAULT NULL,
  `jumlah` int(11) NOT NULL,
  `ket` varchar(250) DEFAULT NULL,
  `jmlkembali` int(11) DEFAULT NULL,
  `kodebarang` varchar(8) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Trigger `retur`
--
DELIMITER $$
CREATE TRIGGER `trgretur` BEFORE INSERT ON `retur` FOR EACH ROW BEGIN
DECLARE k varchar(8);
DECLARE i integer;
SET i = (SELECT substring(retur.koderetur,5,4) AS nomer FROM retur ORDER BY nomer DESC LIMIT 1);
SET k = (SELECT fckoderetur(i));
IF(new.koderetur IS null OR new.koderetur = '') THEN SET new.koderetur = k;
END IF;
END
$$
DELIMITER ;

-- --------------------------------------------------------

--
-- Struktur dari tabel `satuan`
--

CREATE TABLE `satuan` (
  `kodesatuan` varchar(8) NOT NULL,
  `namasatuan` varchar(100) NOT NULL,
  `jumlah` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `satuan`
--

INSERT INTO `satuan` (`kodesatuan`, `namasatuan`, `jumlah`) VALUES
('SAT00001', 'Dus isi 4', 4),
('SAT00002', 'Dus isi 10', 10),
('SAT00003', 'Dus isi 12', 12),
('SAT00004', 'Sak', 1),
('SAT00005', 'Pcs', 1),
('SAT00006', 'Dus isi 84', 84),
('SAT00007', 'Dus isi 54', 54),
('SAT00008', 'Dus isi 60', 60),
('SAT00009', 'Dus isi 30', 30),
('SAT00010', 'Dus isi 50', 50),
('SAT00011', 'Roll 50m', 50),
('SAT00012', 'Pak isi 10', 10);

--
-- Trigger `satuan`
--
DELIMITER $$
CREATE TRIGGER `trgsatuan` BEFORE INSERT ON `satuan` FOR EACH ROW BEGIN
DECLARE k varchar(8);
DECLARE i integer;
SET i = (SELECT substring(satuan.kodesatuan,5,4) AS nomer FROM satuan ORDER BY nomer DESC LIMIT 1);
SET k = (SELECT fckodesatuan(i));
IF(new.kodesatuan IS null OR new.kodesatuan = '') THEN SET new.kodesatuan = k;
END IF;
END
$$
DELIMITER ;

-- --------------------------------------------------------

--
-- Struktur dari tabel `supplier`
--

CREATE TABLE `supplier` (
  `kodesupplier` varchar(8) NOT NULL,
  `namasupplier` varchar(100) NOT NULL,
  `alamat` varchar(250) NOT NULL,
  `notelp` varchar(13) NOT NULL,
  `ket` varchar(250) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `supplier`
--

INSERT INTO `supplier` (`kodesupplier`, `namasupplier`, `alamat`, `notelp`, `ket`) VALUES
('SPL00001', 'Pak Marno', 'Magelang', '087876765654', 'Esel, Grendel dll'),
('SPL00002', 'Pak Nandung', 'Magelang', '089786765453', 'Bendrat, Esel, Baut dll'),
('SPL00003', 'Prabu Kaca', 'Yogyakarta', '082876765432', 'Berbagai kaca'),
('SPL00004', 'TB. Sumber Jaya Mandiri', 'Gulon, Salam, Magelang', '087876789876', 'Semen, Gamping, Besi dll');

--
-- Trigger `supplier`
--
DELIMITER $$
CREATE TRIGGER `trgsupplier` BEFORE INSERT ON `supplier` FOR EACH ROW BEGIN
DECLARE k varchar(8);
DECLARE i integer;
SET i = (SELECT substring(supplier.kodesupplier,5,4) AS nomer FROM supplier ORDER BY nomer DESC LIMIT 1);
SET k = (SELECT fckodesupplier(i));
IF(new.kodesupplier IS null OR new.kodesupplier = '') THEN SET new.kodesupplier = k;
END IF;
END
$$
DELIMITER ;

-- --------------------------------------------------------

--
-- Struktur dari tabel `user`
--

CREATE TABLE `user` (
  `kodeuser` varchar(8) NOT NULL,
  `iduser` varchar(15) DEFAULT NULL,
  `namauser` varchar(100) NOT NULL,
  `alamat` varchar(250) NOT NULL,
  `jenkel` varchar(1) NOT NULL,
  `level` varchar(10) NOT NULL,
  `notelp` varchar(13) DEFAULT NULL,
  `username` varchar(10) DEFAULT NULL,
  `password` char(32) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `user`
--

INSERT INTO `user` (`kodeuser`, `iduser`, `namauser`, `alamat`, `jenkel`, `level`, `notelp`, `username`, `password`) VALUES
('USR00009', '1923458987654', 'Admin', 'Magelang', 'L', 'Admin', '0859212825980', 'admin', '21232f297a57a5a743894a0e4a801fc3'),
('USR00010', '1987876765654', 'kasir', 'Magelang', 'L', 'Kasir', '098987876321', 'kasir', 'c7911af3adbd12a035b289556d96470a'),
('USR00011', '128883337223', 'Andika Putra', 'Kradenan, Srumbung, Magelang', 'L', 'Admin', '098987876321', 'andi', 'ce0e5bf55e4f71749eade7a8b95c4e46');

--
-- Trigger `user`
--
DELIMITER $$
CREATE TRIGGER `trguser` BEFORE INSERT ON `user` FOR EACH ROW BEGIN
DECLARE k varchar(8);
DECLARE i integer;
SET i = (SELECT substring(user.kodeuser,5,4) AS nomer FROM user ORDER BY nomer DESC LIMIT 1);
SET k = (SELECT fckodeuser(i));
IF(new.kodeuser IS null OR new.kodeuser = '') THEN SET new.kodeuser = k;
END IF;
END
$$
DELIMITER ;

-- --------------------------------------------------------

--
-- Stand-in structure for view `vbarang`
--
CREATE TABLE `vbarang` (
`kodebarang` varchar(8)
,`namabarang` varchar(100)
,`namakategori` varchar(100)
,`kodekategori` varchar(8)
,`hargabeli` int(11)
,`hargajual` int(11)
,`stokutuh` int(11)
,`stok` int(11)
,`namasatuan` varchar(100)
);

-- --------------------------------------------------------

--
-- Stand-in structure for view `vdetailpembelian`
--
CREATE TABLE `vdetailpembelian` (
`kodebarang` varchar(8)
,`namabarang` varchar(100)
,`hargabeli` int(11)
,`jumlah` int(11)
,`total` bigint(21)
,`kodepembelian` varchar(8)
,`kodedtpembelian` varchar(8)
);

-- --------------------------------------------------------

--
-- Stand-in structure for view `vpembelian`
--
CREATE TABLE `vpembelian` (
`kodepembelian` varchar(8)
,`tglpembelian` datetime
,`uangtunai` int(11)
,`totalbayar` int(11)
,`status` varchar(20)
,`uangmuka` int(11)
,`persendiskon` int(11)
,`hutang` int(11)
,`sisahutang` int(11)
,`kodesupplier` varchar(8)
,`namasupplier` varchar(100)
,`notelp` varchar(13)
,`kodeuser` varchar(8)
,`namauser` varchar(100)
,`jumlahbayar` int(11)
,`jumlahcicilanhutang` decimal(32,0)
,`kodepemhutang` varchar(8)
);

-- --------------------------------------------------------

--
-- Stand-in structure for view `vpenjualan`
--
CREATE TABLE `vpenjualan` (
`kodepenjualan` varchar(8)
,`tglpenjualan` datetime
,`uangtunai` int(11)
,`total` int(11)
,`status` varchar(20)
,`uangmuka` int(11)
,`persenbunga` int(11)
,`piutang` int(11)
,`sisapiutang` int(11)
,`tgltagihan` date
,`tanggaljatuhtempo` date
,`kodemember` varchar(8)
,`namamember` varchar(100)
,`notelp` varchar(13)
,`kodeuser` varchar(8)
,`namauser` varchar(100)
,`jumlahbayar` int(11)
,`jumlahcicilan` decimal(32,0)
,`kodepempiutang` varchar(8)
);

-- --------------------------------------------------------

--
-- Stand-in structure for view `vretur`
--
CREATE TABLE `vretur` (
`koderetur` varchar(8)
,`kodebarang` varchar(8)
,`namabarang` varchar(100)
,`jumlah` int(11)
,`tglambil` date
,`jmlkembali` int(11)
,`ket` varchar(250)
);

-- --------------------------------------------------------

--
-- Struktur untuk view `vbarang`
--
DROP TABLE IF EXISTS `vbarang`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `vbarang`  AS  select `barang`.`kodebarang` AS `kodebarang`,`barang`.`namabarang` AS `namabarang`,`kategori`.`namakategori` AS `namakategori`,`kategori`.`kodekategori` AS `kodekategori`,`barang`.`hargabeli` AS `hargabeli`,`barang`.`hargajual` AS `hargajual`,`barang`.`stokutuh` AS `stokutuh`,`barang`.`stok` AS `stok`,`satuan`.`namasatuan` AS `namasatuan` from ((`barang` left join `kategori` on((`barang`.`kodekategori` = `kategori`.`kodekategori`))) left join `satuan` on((`barang`.`kodesatuan` = `satuan`.`kodesatuan`))) ;

-- --------------------------------------------------------

--
-- Struktur untuk view `vdetailpembelian`
--
DROP TABLE IF EXISTS `vdetailpembelian`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `vdetailpembelian`  AS  select `barang`.`kodebarang` AS `kodebarang`,`barang`.`namabarang` AS `namabarang`,`barang`.`hargabeli` AS `hargabeli`,`detailpembelian`.`jumlah` AS `jumlah`,(`detailpembelian`.`jumlah` * `barang`.`hargabeli`) AS `total`,`detailpembelian`.`kodepembelian` AS `kodepembelian`,`detailpembelian`.`kodedtpembelian` AS `kodedtpembelian` from (`detailpembelian` left join `barang` on((`detailpembelian`.`kodebarang` = `barang`.`kodebarang`))) ;

-- --------------------------------------------------------

--
-- Struktur untuk view `vpembelian`
--
DROP TABLE IF EXISTS `vpembelian`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `vpembelian`  AS  select `pembelian`.`kodepembelian` AS `kodepembelian`,`pembelian`.`tglpembelian` AS `tglpembelian`,`pembelian`.`uangtunai` AS `uangtunai`,`pembelian`.`totalbayar` AS `totalbayar`,`pembelian`.`status` AS `status`,`pembelian`.`uangmuka` AS `uangmuka`,`pembelian`.`persendiskon` AS `persendiskon`,`pembelian`.`hutang` AS `hutang`,`pembelian`.`sisahutang` AS `sisahutang`,`supplier`.`kodesupplier` AS `kodesupplier`,`supplier`.`namasupplier` AS `namasupplier`,`supplier`.`notelp` AS `notelp`,`user`.`kodeuser` AS `kodeuser`,`user`.`namauser` AS `namauser`,`pembayaranhutang`.`jumlahbayar` AS `jumlahbayar`,sum(`pembayaranhutang`.`jumlahbayar`) AS `jumlahcicilanhutang`,`pembayaranhutang`.`kodepemhutang` AS `kodepemhutang` from (((`pembelian` left join `supplier` on((`pembelian`.`kodesupplier` = `supplier`.`kodesupplier`))) left join `user` on((`pembelian`.`kodeuser` = `user`.`kodeuser`))) left join `pembayaranhutang` on((`pembayaranhutang`.`kodepembelian` = `pembelian`.`kodepembelian`))) group by `pembelian`.`kodepembelian` ;

-- --------------------------------------------------------

--
-- Struktur untuk view `vpenjualan`
--
DROP TABLE IF EXISTS `vpenjualan`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `vpenjualan`  AS  select `penjualan`.`kodepenjualan` AS `kodepenjualan`,`penjualan`.`tglpenjualan` AS `tglpenjualan`,`penjualan`.`uangtunai` AS `uangtunai`,`penjualan`.`total` AS `total`,`penjualan`.`status` AS `status`,`penjualan`.`uangmuka` AS `uangmuka`,`penjualan`.`persenbunga` AS `persenbunga`,`penjualan`.`piutang` AS `piutang`,`penjualan`.`sisapiutang` AS `sisapiutang`,`penjualan`.`tgltagihan` AS `tgltagihan`,(`penjualan`.`tgltagihan` + interval 1 month) AS `tanggaljatuhtempo`,`member`.`kodemember` AS `kodemember`,`member`.`namamember` AS `namamember`,`member`.`notelp` AS `notelp`,`user`.`kodeuser` AS `kodeuser`,`user`.`namauser` AS `namauser`,`pembayaranpiutang`.`jumlahbayar` AS `jumlahbayar`,sum(`pembayaranpiutang`.`jumlahbayar`) AS `jumlahcicilan`,`pembayaranpiutang`.`kodepempiutang` AS `kodepempiutang` from (((`penjualan` left join `member` on((`penjualan`.`kodemember` = `member`.`kodemember`))) left join `user` on((`penjualan`.`kodeuser` = `user`.`kodeuser`))) left join `pembayaranpiutang` on((`pembayaranpiutang`.`kodepenjualan` = `penjualan`.`kodepenjualan`))) group by `penjualan`.`kodepenjualan` ;

-- --------------------------------------------------------

--
-- Struktur untuk view `vretur`
--
DROP TABLE IF EXISTS `vretur`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `vretur`  AS  select `retur`.`koderetur` AS `koderetur`,`barang`.`kodebarang` AS `kodebarang`,`barang`.`namabarang` AS `namabarang`,`retur`.`jumlah` AS `jumlah`,`retur`.`tglambil` AS `tglambil`,`retur`.`jmlkembali` AS `jmlkembali`,`retur`.`ket` AS `ket` from (`retur` join `barang` on((`retur`.`kodebarang` = `barang`.`kodebarang`))) ;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `barang`
--
ALTER TABLE `barang`
  ADD PRIMARY KEY (`kodebarang`);

--
-- Indexes for table `detailpembelian`
--
ALTER TABLE `detailpembelian`
  ADD PRIMARY KEY (`kodedtpembelian`),
  ADD KEY `kodebarang` (`kodebarang`);

--
-- Indexes for table `detailpenjualan`
--
ALTER TABLE `detailpenjualan`
  ADD PRIMARY KEY (`kodedtpenjualan`);

--
-- Indexes for table `kategori`
--
ALTER TABLE `kategori`
  ADD PRIMARY KEY (`kodekategori`);

--
-- Indexes for table `member`
--
ALTER TABLE `member`
  ADD PRIMARY KEY (`kodemember`);

--
-- Indexes for table `pembayaranhutang`
--
ALTER TABLE `pembayaranhutang`
  ADD PRIMARY KEY (`kodepemhutang`);

--
-- Indexes for table `pembayaranpiutang`
--
ALTER TABLE `pembayaranpiutang`
  ADD PRIMARY KEY (`kodepempiutang`);

--
-- Indexes for table `pembelian`
--
ALTER TABLE `pembelian`
  ADD PRIMARY KEY (`kodepembelian`);

--
-- Indexes for table `penjualan`
--
ALTER TABLE `penjualan`
  ADD PRIMARY KEY (`kodepenjualan`);

--
-- Indexes for table `retur`
--
ALTER TABLE `retur`
  ADD PRIMARY KEY (`koderetur`);

--
-- Indexes for table `satuan`
--
ALTER TABLE `satuan`
  ADD PRIMARY KEY (`kodesatuan`);

--
-- Indexes for table `supplier`
--
ALTER TABLE `supplier`
  ADD PRIMARY KEY (`kodesupplier`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`kodeuser`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
