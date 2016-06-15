-- phpMyAdmin SQL Dump
-- version 4.4.14
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Jun 14, 2016 at 10:43 PM
-- Server version: 5.6.26
-- PHP Version: 5.6.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `skripsi_db`
--

-- --------------------------------------------------------

--
-- Table structure for table `anak_asuh`
--

CREATE TABLE IF NOT EXISTS `anak_asuh` (
  `kode_anak_asuh` varchar(4) NOT NULL DEFAULT '',
  `kode_calon` varchar(4) NOT NULL DEFAULT '',
  `status` varchar(6) NOT NULL DEFAULT 'tetap'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `anak_asuh`
--

INSERT INTO `anak_asuh` (`kode_anak_asuh`, `kode_calon`, `status`) VALUES
('A001', 'C001', 'keluar'),
('A002', 'C002', 'keluar'),
('A003', 'C003', 'keluar'),
('A004', 'C005', 'keluar'),
('A005', 'C004', 'keluar'),
('A006', 'C006', 'keluar'),
('A007', 'C007', 'keluar'),
('A008', 'C008', 'keluar'),
('A009', 'C009', 'keluar'),
('A010', 'C011', 'keluar'),
('A011', 'C010', 'keluar'),
('A012', 'C012', 'keluar'),
('A013', 'C014', 'tetap'),
('A014', 'C013', 'tetap');

-- --------------------------------------------------------

--
-- Table structure for table `calon`
--

CREATE TABLE IF NOT EXISTS `calon` (
  `kode_calon` varchar(4) NOT NULL DEFAULT '',
  `nama_calon` varchar(50) DEFAULT '',
  `tempat_lahir` varchar(20) DEFAULT '',
  `tgl_lahir` date DEFAULT '0000-00-00',
  `pendidikan_terakhir` varchar(10) DEFAULT '',
  `status_anak` varchar(10) DEFAULT '',
  `anak_ke` int(2) DEFAULT '0',
  `dari` int(2) DEFAULT '0',
  `alamat` varchar(50) DEFAULT '',
  `nama_bapak` varchar(50) DEFAULT '',
  `alamat_bapak` varchar(50) DEFAULT '',
  `pekerjaan_bapak` varchar(20) DEFAULT '',
  `tgl_meninggal_bapak` date DEFAULT '0000-00-00',
  `nama_ibu` varchar(50) DEFAULT '',
  `alamat_ibu` varchar(50) DEFAULT '',
  `pekerjaan_ibu` varchar(20) DEFAULT '',
  `tgl_meninggal_ibu` date DEFAULT '0000-00-00',
  `nama_wali` varchar(50) DEFAULT '',
  `alamat_wali` varchar(50) DEFAULT '',
  `pekerjaan_wali` varchar(20) DEFAULT '',
  `status_ketentuan` varchar(11) DEFAULT 'belum_lolos'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `calon`
--

INSERT INTO `calon` (`kode_calon`, `nama_calon`, `tempat_lahir`, `tgl_lahir`, `pendidikan_terakhir`, `status_anak`, `anak_ke`, `dari`, `alamat`, `nama_bapak`, `alamat_bapak`, `pekerjaan_bapak`, `tgl_meninggal_bapak`, `nama_ibu`, `alamat_ibu`, `pekerjaan_ibu`, `tgl_meninggal_ibu`, `nama_wali`, `alamat_wali`, `pekerjaan_wali`, `status_ketentuan`) VALUES
('C001', 'mudhofah', 'jakarta', '2007-03-08', 'SD', 'Miskin', 1, 1, 'rawamangun muka no.2', 'samsul', 'rawamangun muka no.2', 'satpam', '0000-00-00', 'surti', 'rawamangun muka no.2', 'PRT', '1970-01-01', '', '', '', 'lolos'),
('C002', 'bobo', 'bandung', '2016-05-07', 'sltp', 'Miskin', 2, 2, 'rawa bunga', 'ardi', 'rawa bunga', 'buruh', '1970-01-01', 'siti', 'rawa bunga', 'menganggur', '1970-01-01', '', '', '', 'lolos'),
('C003', 'bolo', 'bandung', '2016-05-07', 'sltp', 'Miskin', 2, 2, 'pramuka', 'ardi', 'rawa bunga', 'buruh', '1970-01-01', 'siti', 'rawa bunga', 'menganggur', '1970-01-01', '', '', '', 'lolos'),
('C004', 'bayu', 'bandung', '2016-04-27', 'sltp', 'Miskin', 2, 2, 'pramuka', 'ardi', 'rawa bunga', 'assdf', '0000-00-00', 'siti', 'rawa bunga', 'PRT', '0000-00-00', 'asff', 'sss', 'aaa', 'lolos'),
('C005', 'banu', 'bandung', '2016-05-13', 'sltp', 'Miskin', 2, 2, 'pramuka', 'ardi', 'rawa bunga', 'buruh', '0000-00-00', 'siti', 'rawa bunga', 'menganggur', '0000-00-00', 'asff', 'sss', 'aaa', 'lolos'),
('C006', 'ardi', 'maluku', '2016-04-25', 'smp', 'Miskin', 2, 2, 'pulogadung', 'wasa', 'bulungan', 'buruh', '0000-00-00', 'wiwi', 'bulungan', 'buruh', '0000-00-00', '', '', '', 'lolos'),
('C007', 'rio', 'jkt', '2016-06-10', 'smp', 'Miskin', 2, 2, 'BTI', 'yudi', 'malang', 'buruh', '0000-00-00', 'siri', 'jkt', '-', '0000-00-00', '', '', '', 'lolos'),
('C008', 'budimana', 'jkt', '2016-06-10', 'smp', 'Yatim', 1, 1, 'pulogadung', 'yudi', 'malang', 'buruh', '2010-01-19', 'siri', 'jkt', '-', '0000-00-00', '', '', '', 'lolos'),
('C009', 'suparman', 'bandung', '2016-06-08', 'smp', 'Miskin', 2, 2, 'pulogadung', 'sudi', 'pulogadung', 'pns', '0000-00-00', 'dina', 'pulogadung', '-', '0000-00-00', '-', '-', '-', 'lolos'),
('C010', 'bily', 'bandung', '2016-05-30', 'sd', 'Miskin', 1, 2, 'jakarta', 'tio', 'jakarta', 'serabutan', '0000-00-00', 'yuna', 'jakarta', '-', '0000-00-00', '-', '-', '-', 'lolos'),
('C011', 'dono', 'bandung', '2016-05-30', 'sd', 'Yatim', 1, 1, 'jakarta', 'tio', 'jakarta', 'serabutan', '2009-10-14', 'yuna', 'jakarta', '-', '0000-00-00', '', '', '', 'lolos'),
('C012', 'didi', 'padang', '2016-06-08', 'sltp', 'Miskin', 2, 4, 'jalan imam bonjol', 'sudi', 'jalan imam bonjol', '-', '0000-00-00', 'nini', 'jalan imam bonjol', 'buruh', '0000-00-00', '', '', '', 'lolos'),
('C013', 'dodo', 'jakarta', '2016-06-02', 'smp', 'Miskin', 2, 2, 'pramuka', 'baba', 'pramuka', 'supir', '0000-00-00', 'dinu', 'pramuka', 'buruh', '0000-00-00', '', '', '', 'lolos'),
('C014', 'joki', 'jakarta', '2016-06-02', 'smp', 'Miskin', 2, 4, 'pramuka', 'bilo', 'pramuka', 'supir', '0000-00-00', 'dinu', 'pramuka', 'buruh', '0000-00-00', '', '', '', 'lolos');

-- --------------------------------------------------------

--
-- Table structure for table `calon_keluarga_asuh`
--

CREATE TABLE IF NOT EXISTS `calon_keluarga_asuh` (
  `kode_calon_keluarga_asuh` varchar(4) NOT NULL DEFAULT '',
  `nama` varchar(50) DEFAULT '',
  `jenis_kelamin` varchar(9) DEFAULT '',
  `pekerjaan` varchar(20) DEFAULT '',
  `alamat` varchar(50) DEFAULT '',
  `telepon` varchar(15) DEFAULT ''
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `calon_keluarga_asuh`
--

INSERT INTO `calon_keluarga_asuh` (`kode_calon_keluarga_asuh`, `nama`, `jenis_kelamin`, `pekerjaan`, `alamat`, `telepon`) VALUES
('K001', 'Bella', 'Perempuan', 'Karyawati', 'pulogadung', '021111'),
('K002', 'Usman', 'Laki-laki', 'karyawan', 'pramuka', '012222'),
('K003', 'pak sovan', 'Laki-laki', 'sysadmin', 'BTI', '192.168.0.0/24');

-- --------------------------------------------------------

--
-- Table structure for table `detil_voucher`
--

CREATE TABLE IF NOT EXISTS `detil_voucher` (
  `no_voucher` varchar(4) NOT NULL DEFAULT '',
  `kode_anak_asuh` varchar(4) NOT NULL DEFAULT '',
  `kategori` varchar(15) NOT NULL DEFAULT '',
  `keperluan` varchar(20) DEFAULT '',
  `jumlah` int(11) DEFAULT '0',
  `ref_kwitansi` varchar(10) DEFAULT '',
  `tgl_bayar` date DEFAULT '0000-00-00'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `detil_voucher`
--

INSERT INTO `detil_voucher` (`no_voucher`, `kode_anak_asuh`, `kategori`, `keperluan`, `jumlah`, `ref_kwitansi`, `tgl_bayar`) VALUES
('V001', 'A008', 'Akademis', 'spp', 50000, 'b770', '2016-06-01'),
('V001', 'A009', 'Akademis', 'spp', 50000, 'aghaj1', '2016-06-14'),
('V002', 'A008', 'Akademis', 'bayar', 20000, '-', '2016-06-01'),
('V002', 'A009', 'Lain-lain', 'biaya', 30000, '-', '2016-06-05'),
('V003', 'A008', 'Akademis', 'bayar', 20000, '', '2016-06-15'),
('V004', 'A008', 'Akademis', 'spp', 10000, '', '2016-06-25'),
('V005', 'A008', 'Kesehatan', 'obat', 5000, 'aaaaa', '2016-06-05'),
('V006', 'A008', 'Akademis', 'aaa', 1000, '', '2016-06-05'),
('V007', 'A008', 'Akademis', 'aaa', 1000, '', '2016-06-13'),
('V008', 'A008', 'Akademis', 'aaa', 1000, '', '2016-06-15'),
('V009', 'A008', 'Akademis', 'asdfdg', 100, '', '2016-06-29'),
('V010', 'A008', 'Akademis', 'asdfdg', 100, '', '2016-06-20'),
('V011', 'A008', 'Kesehatan', 'asdfdg', 100, '', '2016-06-26'),
('V012', 'A008', 'Akademis', 'aaa', 20000, 'aaaaa', '2016-06-08'),
('V013', 'A008', 'Akademis', 'aaa', 20000, 'aaa', '2016-06-01'),
('V013', 'A009', 'Akademis', 'aaa', 20000, 'aaaaa', '2016-06-02'),
('V014', 'A008', 'Kesehatan', 'obat', 5000, 'aaa', '2016-06-02'),
('V014', 'A009', 'Kesehatan', 'obat', 20000, '---', '2016-06-01'),
('V015', 'A008', 'Kesehatan', 'obat', 5000, 'g00456', '2016-06-22'),
('V015', 'A009', 'Akademis', 'SPP', 100000, '', '0000-00-00'),
('V016', 'A008', 'Akademis', 'SPP', 50000, 'tk001', '2016-06-28'),
('V016', 'A010', 'Lain-lain', 'keperluan', 10000, 'robek', '2016-06-26'),
('V017', 'A008', 'Lain-lain', 'keperluan', 50000, 'gtr90', '2016-06-16'),
('V018', 'A009', 'Akademis', 'keperluan dadakan', 50000, 'a34', '2016-06-30'),
('V019', 'A013', 'Akademis', 'SPP', 5000, '-', '2016-06-23'),
('V019', 'A013', 'Kesehatan', 'obat', 10000, '09876', '2016-06-24'),
('V019', 'A014', 'Akademis', 'SPP', 50000, '-', '2016-07-01'),
('V020', 'A013', 'Akademis', 'spp', 5000, '', '0000-00-00'),
('V020', 'A013', 'Kesehatan', 'obat', 5000, '', '0000-00-00'),
('V021', 'A013', 'Akademis', 'spp', 50000, '', '0000-00-00'),
('V021', 'A014', 'Kesehatan', 'obat', 70000, '', '0000-00-00');

-- --------------------------------------------------------

--
-- Table structure for table `donatur`
--

CREATE TABLE IF NOT EXISTS `donatur` (
  `kode_donatur` varchar(4) NOT NULL DEFAULT '',
  `nama_donatur` varchar(50) DEFAULT '',
  `alamat` varchar(50) DEFAULT '',
  `telepon` varchar(15) DEFAULT ''
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `donatur`
--

INSERT INTO `donatur` (`kode_donatur`, `nama_donatur`, `alamat`, `telepon`) VALUES
('D002', 'ra''ys', 'pondok cabe No.X Gang.X RT X RW X', '55'),
('D003', 'syam', 'localhost', '127'),
('D009', 'Hamba Allah', 'Jakarta', '+628888'),
('D010', 'agha', 'fti 3', '127001');

-- --------------------------------------------------------

--
-- Table structure for table `ketentuan`
--

CREATE TABLE IF NOT EXISTS `ketentuan` (
  `kode_calon` varchar(4) NOT NULL,
  `rapor` varchar(10) NOT NULL,
  `ijazah` varchar(10) NOT NULL,
  `surat_kematian_ortu` varchar(10) NOT NULL,
  `surat_keterangan_sehat` varchar(10) NOT NULL,
  `akte_kelahiran` varchar(10) NOT NULL,
  `kartu_keluarga` varchar(10) NOT NULL,
  `foto` varchar(10) NOT NULL,
  `surat_pengantar_rt_rw` varchar(10) NOT NULL,
  `surat_rek_muh` varchar(10) NOT NULL,
  `wawancara` varchar(10) NOT NULL,
  `surat_ketersediaan_anak` varchar(10) NOT NULL,
  `surat_pernyataan_wali` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `ketentuan`
--

INSERT INTO `ketentuan` (`kode_calon`, `rapor`, `ijazah`, `surat_kematian_ortu`, `surat_keterangan_sehat`, `akte_kelahiran`, `kartu_keluarga`, `foto`, `surat_pengantar_rt_rw`, `surat_rek_muh`, `wawancara`, `surat_ketersediaan_anak`, `surat_pernyataan_wali`) VALUES
('C001', 'ada', 'ada', 'ada', 'ada', 'ada', 'ada', 'ada', 'ada', 'ada', 'lolos', 'ada', 'ada'),
('C002', 'ada', 'ada', 'ada', 'ada', 'ada', 'ada', 'ada', 'ada', 'ada', 'lolos', 'ada', 'ada'),
('C003', 'ada', 'ada', 'ada', 'ada', 'ada', 'ada', 'ada', 'ada', 'ada', 'lolos', 'ada', 'ada'),
('C004', 'ada', 'ada', 'ada', 'ada', 'ada', 'ada', 'ada', 'ada', 'ada', 'lolos', 'ada', 'ada'),
('C005', 'ada', 'ada', 'ada', 'ada', 'ada', 'ada', 'ada', 'ada', 'ada', 'lolos', 'ada', 'ada'),
('C006', 'ada', 'ada', 'ada', 'ada', 'ada', 'ada', 'ada', 'ada', 'ada', 'lolos', 'ada', 'ada'),
('C007', 'ada', 'ada', 'ada', 'ada', 'ada', 'ada', 'ada', 'ada', 'ada', 'lolos', 'ada', 'ada'),
('C008', 'ada', 'ada', 'ada', 'ada', 'ada', 'ada', 'ada', 'ada', 'ada', 'lolos', 'ada', 'ada'),
('C009', 'ada', 'ada', 'ada', 'ada', 'ada', 'ada', 'ada', 'ada', 'ada', 'lolos', 'ada', 'ada'),
('C010', 'ada', 'ada', 'ada', 'ada', 'ada', 'ada', 'ada', 'ada', 'ada', 'lolos', 'ada', 'ada'),
('C011', 'ada', 'ada', 'ada', 'ada', 'ada', 'ada', 'ada', 'ada', 'ada', 'lolos', 'ada', 'ada'),
('C012', 'ada', 'ada', 'tidak', 'ada', 'ada', 'ada', 'ada', 'ada', 'ada', 'lolos', 'ada', 'ada'),
('C013', 'ada', 'ada', 'ada', 'ada', 'ada', 'ada', 'ada', 'ada', 'ada', 'lolos', 'ada', 'ada'),
('C014', 'ada', 'ada', 'tidak', 'ada', 'ada', 'ada', 'ada', 'ada', 'ada', 'lolos', 'ada', 'ada');

-- --------------------------------------------------------

--
-- Table structure for table `pengurus`
--

CREATE TABLE IF NOT EXISTS `pengurus` (
  `kode_pengurus` varchar(4) NOT NULL DEFAULT '',
  `nama_pengurus` varchar(50) DEFAULT '',
  `pekerjaan` varchar(20) DEFAULT '',
  `alamat` varchar(50) DEFAULT '',
  `telepon` varchar(15) DEFAULT '',
  `jabatan` varchar(10) DEFAULT '-',
  `jenis_kelamin` varchar(9) NOT NULL,
  `username` varchar(20) NOT NULL,
  `password` varchar(20) NOT NULL DEFAULT ''
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `pengurus`
--

INSERT INTO `pengurus` (`kode_pengurus`, `nama_pengurus`, `pekerjaan`, `alamat`, `telepon`, `jabatan`, `jenis_kelamin`, `username`, `password`) VALUES
('P001', 'tiyo', 'guru', 'mangga dua', '021', 'Sekretaris', 'Laki-laki', 'tiyo', 'asdf'),
('P002', 'yusuf', 'staff', 'pulogadung', '021', 'Ketua', 'Laki-laki', 'yusuf', 'yusuf'),
('P003', 'mansur Abdul', 'pns', 'rumah', '12345', 'Bendahara', 'Laki-laki', 'mansur', 'mansur'),
('P004', 'adi', 'guru', 'jakarta', '021', 'Ketua', 'Laki-laki', 'adi', 'adi'),
('P005', 'waluyo', 'karyawan', 'pulogadung', '12777', 'Bendahara', 'Laki-laki', 'waluyo', 'waluyo');

-- --------------------------------------------------------

--
-- Table structure for table `perkembangan`
--

CREATE TABLE IF NOT EXISTS `perkembangan` (
  `kode_anak_asuh` varchar(4) NOT NULL DEFAULT '',
  `tanggal` datetime NOT NULL DEFAULT '0000-00-00 00:00:00',
  `keterangan` varchar(50) NOT NULL DEFAULT '',
  `kategori` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `perkembangan`
--

INSERT INTO `perkembangan` (`kode_anak_asuh`, `tanggal`, `keterangan`, `kategori`) VALUES
('A001', '2016-05-20 00:00:02', 'sakit demam', 'Kesehatan'),
('A001', '2016-05-23 00:00:01', 'juara kelas 10 besar', 'Akademis'),
('A001', '2016-05-23 00:00:03', 'pulang malam', 'Lain-lain'),
('A006', '2016-05-30 00:00:04', 'naik kelas 2 SMP', 'Akademis'),
('A008', '2016-06-11 00:00:05', 'sakit tifus', 'Kesehatan'),
('A008', '2016-06-11 00:00:06', 'naik kelas', 'Akademis'),
('A008', '2016-06-11 00:00:07', 'sakit', 'Kesehatan'),
('A008', '2016-06-16 14:06:03', 'juara umum catur', 'Lain-lain'),
('A009', '2016-06-08 00:00:10', 'juara kelas ke 5', 'Akademis'),
('A009', '2016-06-09 00:00:09', 'sakit DBD', 'Kesehatan'),
('A009', '2016-06-12 00:00:08', 'juara lomba cerdas cermat', 'Akademis'),
('A011', '2016-06-07 00:00:00', 'sakit', 'Kesehatan'),
('A011', '2016-06-09 00:59:00', 'pulang malam', 'Lain-lain'),
('A011', '2016-06-12 00:00:00', 'naik kelas', 'Akademis'),
('A011', '2016-06-27 15:06:38', 'juara kelas', 'Akademis'),
('A013', '2016-06-14 22:18:11', 'naik kelas', 'Akademis');

-- --------------------------------------------------------

--
-- Table structure for table `ska`
--

CREATE TABLE IF NOT EXISTS `ska` (
  `no_ska` varchar(6) NOT NULL,
  `tgl_ska` date NOT NULL,
  `kode_calon_keluarga_asuh` varchar(4) NOT NULL DEFAULT '',
  `kode_anak_asuh` varchar(4) NOT NULL DEFAULT ''
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `ska`
--

INSERT INTO `ska` (`no_ska`, `tgl_ska`, `kode_calon_keluarga_asuh`, `kode_anak_asuh`) VALUES
('SKA001', '2016-05-23', 'K002', 'A001'),
('SKA002', '2016-05-23', 'K002', 'A002'),
('SKA003', '2016-05-27', 'K001', 'A003'),
('SKA004', '2016-06-06', 'K003', 'A005'),
('SKA005', '2016-06-08', 'K003', 'A006'),
('SKA006', '2016-06-08', 'K001', 'A007'),
('SKA007', '2016-06-09', 'K002', 'A004'),
('SKA008', '2016-06-12', 'K002', 'A011'),
('SKA009', '2016-06-12', 'K001', 'A008'),
('SKA010', '2016-06-12', 'K002', 'A010'),
('SKA011', '2016-06-13', 'K002', 'A009'),
('SKA012', '2016-06-13', 'K003', 'A012');

-- --------------------------------------------------------

--
-- Table structure for table `skpaa`
--

CREATE TABLE IF NOT EXISTS `skpaa` (
  `no_skpaa` varchar(8) NOT NULL,
  `tgl_skpaa` date NOT NULL,
  `no_ska` varchar(6) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `skpaa`
--

INSERT INTO `skpaa` (`no_skpaa`, `tgl_skpaa`, `no_ska`) VALUES
('SKPAA001', '2016-04-23', 'SKA001'),
('SKPAA002', '2016-05-23', 'SKA002'),
('SKPAA003', '2016-05-27', 'SKA003'),
('SKPAA004', '2016-06-06', 'SKA004'),
('SKPAA005', '2016-06-08', 'SKA005'),
('SKPAA006', '2016-06-08', 'SKA006'),
('SKPAA007', '2016-06-09', 'SKA007'),
('SKPAA008', '2016-06-12', 'SKA008'),
('SKPAA009', '2016-06-13', 'SKA009'),
('SKPAA010', '2016-06-13', 'SKA010'),
('SKPAA011', '2016-06-13', 'SKA011'),
('SKPAA012', '2016-06-13', 'SKA012');

-- --------------------------------------------------------

--
-- Table structure for table `tanda_terima`
--

CREATE TABLE IF NOT EXISTS `tanda_terima` (
  `no_tanda_terima` varchar(4) NOT NULL DEFAULT '',
  `tgl_terima` date NOT NULL,
  `banyaknya_uang` int(11) NOT NULL DEFAULT '0',
  `untuk_pembayaran` varchar(25) NOT NULL,
  `kode_donatur` varchar(4) NOT NULL DEFAULT '',
  `kode_pengurus` varchar(4) NOT NULL DEFAULT ''
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `tanda_terima`
--

INSERT INTO `tanda_terima` (`no_tanda_terima`, `tgl_terima`, `banyaknya_uang`, `untuk_pembayaran`, `kode_donatur`, `kode_pengurus`) VALUES
('T001', '2016-05-23', 100000, 'infaq', 'D002', 'P003'),
('T002', '2016-05-23', 500000, 'shadaqah', 'D003', 'P003'),
('T003', '2016-05-23', 100000, 'infaq', 'D010', 'P003'),
('T004', '2016-05-23', 1000000, 'shdaqah', 'D009', 'P003'),
('T005', '2016-05-25', 500000, 'infaq', 'D003', 'P004'),
('T006', '2016-05-27', 500000, 'infaq', 'D002', 'P003'),
('T007', '2016-05-27', 500000, 'infaq', 'D002', 'P004'),
('T008', '2016-05-27', 100000, 'infaq', 'D009', 'P003'),
('T009', '2016-05-27', 100000, 'asdf', 'D002', 'P004'),
('T010', '2016-05-28', 50000, 'infaq', 'D009', 'P004'),
('T011', '2016-06-06', 100000, 'shadaqah', 'D002', 'P003'),
('T012', '2016-06-08', 100000, 'asdf', 'D003', 'P004'),
('T013', '2016-06-08', 100000, 'asdf', 'D009', 'P004'),
('T014', '2016-06-09', 90000000, 'fgfgf', 'D002', 'P003'),
('T015', '2016-06-13', 50000, 'shadaqah', 'D009', 'P004'),
('T016', '2016-06-13', 500000, 'infaq', 'D002', 'P004'),
('T017', '2016-06-13', 50000, 'aaa', 'D002', 'P004'),
('T018', '2016-06-13', 600000, 'aa', 'D003', 'P004'),
('T019', '2016-06-13', 60000, 'aaa', 'D002', 'P004'),
('T020', '2016-06-13', 900000, 'aaa', 'D003', 'P004'),
('T021', '2016-06-13', 50000, 'wqqedd', 'D002', 'P004'),
('T022', '2016-06-13', 500000, 'asdf', 'D002', 'P004'),
('T023', '2016-06-13', 500000, 'aaa', 'D003', 'P004'),
('T024', '2016-06-13', 600000, 'aaaqssxd', 'D002', 'P004'),
('T025', '2016-06-13', 20000, 'aaa', 'D009', 'P004'),
('T026', '2016-06-13', 50000, 'sss', 'D002', 'P004'),
('T027', '2016-06-13', 40000, 'aaaa', 'D002', 'P004'),
('T028', '2016-06-13', 500000, 'a', 'D002', 'P004'),
('T029', '2016-06-13', 40000, 'sdfdds', 'D002', 'P004'),
('T030', '2016-06-13', 40000, 'asddddxxd', 'D003', 'P004'),
('T031', '2016-06-13', 500000, 'aaaa', 'D002', 'P004');

-- --------------------------------------------------------

--
-- Table structure for table `voucher`
--

CREATE TABLE IF NOT EXISTS `voucher` (
  `no_voucher` varchar(4) NOT NULL DEFAULT '',
  `tgl_voucher` date DEFAULT '0000-00-00',
  `kode_pengurus` varchar(4) DEFAULT ''
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `voucher`
--

INSERT INTO `voucher` (`no_voucher`, `tgl_voucher`, `kode_pengurus`) VALUES
('V001', '2016-06-10', 'P004'),
('V002', '2016-06-10', 'P004'),
('V003', '2016-06-10', 'P004'),
('V004', '2016-06-09', 'P004'),
('V005', '2016-06-09', 'P004'),
('V006', '2016-06-08', 'P004'),
('V007', '2016-06-08', 'P004'),
('V008', '2016-06-11', 'P004'),
('V009', '2016-06-11', 'P004'),
('V010', '2016-06-11', 'P004'),
('V011', '2016-06-11', 'P004'),
('V012', '2016-06-11', 'P004'),
('V013', '2016-06-11', 'P004'),
('V014', '2016-06-11', 'P003'),
('V015', '2016-06-12', 'P003'),
('V016', '2016-06-13', 'P004'),
('V017', '2016-06-13', 'P004'),
('V018', '2016-06-13', 'P003'),
('V019', '2016-06-13', 'P004'),
('V020', '2016-06-13', 'P003'),
('V021', '2016-06-13', 'P004');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `anak_asuh`
--
ALTER TABLE `anak_asuh`
  ADD PRIMARY KEY (`kode_anak_asuh`);

--
-- Indexes for table `calon`
--
ALTER TABLE `calon`
  ADD PRIMARY KEY (`kode_calon`);

--
-- Indexes for table `calon_keluarga_asuh`
--
ALTER TABLE `calon_keluarga_asuh`
  ADD PRIMARY KEY (`kode_calon_keluarga_asuh`);

--
-- Indexes for table `detil_voucher`
--
ALTER TABLE `detil_voucher`
  ADD PRIMARY KEY (`no_voucher`,`kode_anak_asuh`,`kategori`);

--
-- Indexes for table `donatur`
--
ALTER TABLE `donatur`
  ADD PRIMARY KEY (`kode_donatur`);

--
-- Indexes for table `ketentuan`
--
ALTER TABLE `ketentuan`
  ADD PRIMARY KEY (`kode_calon`);

--
-- Indexes for table `pengurus`
--
ALTER TABLE `pengurus`
  ADD PRIMARY KEY (`kode_pengurus`);

--
-- Indexes for table `perkembangan`
--
ALTER TABLE `perkembangan`
  ADD PRIMARY KEY (`kode_anak_asuh`,`tanggal`);

--
-- Indexes for table `ska`
--
ALTER TABLE `ska`
  ADD PRIMARY KEY (`no_ska`);

--
-- Indexes for table `skpaa`
--
ALTER TABLE `skpaa`
  ADD PRIMARY KEY (`no_skpaa`);

--
-- Indexes for table `tanda_terima`
--
ALTER TABLE `tanda_terima`
  ADD PRIMARY KEY (`no_tanda_terima`);

--
-- Indexes for table `voucher`
--
ALTER TABLE `voucher`
  ADD PRIMARY KEY (`no_voucher`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
