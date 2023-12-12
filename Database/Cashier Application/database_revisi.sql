SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


CREATE TABLE `barang` (
  `kode` char(4) NOT NULL,
  `nama` varchar(50) NOT NULL,
  `harga` float NOT NULL
);

--
-- Dumping data for table `barang`
--

INSERT INTO `barang` (`kode`, `nama`, `harga`) VALUES
('0000', 'ROTI SARI CKLT SML', 3000),
('0001', 'ROTI SARI CKLT MED', 7000),
('0002', 'TELUR 1BTR', 3000),
('0003', 'MIEINDO RDG SPI', 2000),
('0004', 'KELLEGS CREAL 200GR', 24000),
('0005', 'PASTA GGI 50GR', 22000),
('0006', 'DTRJEN DASHYAT 200GR', 42500),
('0007', 'TSSUE SANSO 100PCS', 32000),
('0008', 'PULSA 10000', 10500),
('0009', 'PULSA 50000', 50500),
('0010', 'PULSA 100000', 100200),
('0011', 'TOKEN LISTRIK 10000', 11000),
('0012', 'TOKEN LISTRIK 25000', 26000),
('0013', 'TOKEN LISTRIK 50000', 51000);

-- --------------------------------------------------------

--
-- Table structure for table `debit`
--

CREATE TABLE `debit` (
  `id_pembayaran` int NOT NULL,
  `bank` text NOT NULL,
  `no_kartu` text NOT NULL
);


CREATE TABLE `kas` (
  `id_pembayaran` int NOT NULL,
  `dibayar` float NOT NULL,
  `kembalian` float NOT NULL
);

--
-- Table structure for table `login`
--

CREATE TABLE `login` (
  `username` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL,
  `password_hash` text NOT NULL
);

--
-- Dumping data for table `login`
--

INSERT INTO `login` (`username`, `password_hash`) VALUES
('admin', '8c6976e5b5410415bde908bd4dee15dfb167a9c873fc4bb8a81f6f2ab448a918');

-- --------------------------------------------------------

--
-- Table structure for table `makanan`
--

CREATE TABLE `makanan` (
  `kode` char(4) NOT NULL,
  `kadaluarsa` date NOT NULL
);

--
-- Dumping data for table `makanan`
--

INSERT INTO `makanan` (`kode`, `kadaluarsa`) VALUES
('0000', '2023-06-17'),
('0001', '2023-06-18'),
('0002', '2023-06-30'),
('0003', '2024-09-25'),
('0004', '2027-06-23');

-- --------------------------------------------------------

--
-- Table structure for table `pembayaran`
--

CREATE TABLE `pembayaran` (
  `id_pembayaran` int NOT NULL,
  `total_harga` float NOT NULL,
  `waktu` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `status` enum('PENDING','SUCCESSFUL','CANCELLED') NOT NULL
);

--
-- Dumping data for table `pembayaran`
--

INSERT INTO `pembayaran` (`id_pembayaran`, `total_harga`, `waktu`, `status`) VALUES

-- --------------------------------------------------------

--
-- Table structure for table `pulsa`
--

CREATE TABLE `pulsa` (
  `kode` char(4) NOT NULL,
  `nominal` float NOT NULL
);

--
-- Dumping data for table `pulsa`
--

INSERT INTO `pulsa` (`kode`, `nominal`) VALUES
('0008', 10000),
('0009', 50000),
('0010', 100000);

-- --------------------------------------------------------

--
-- Table structure for table `pulsa_history`
--

CREATE TABLE `pulsa_history` (
  `kode` char(4) NOT NULL,
  `no_telp` varchar(12) NOT NULL,
  `operator` text NOT NULL,
  `id_pembayaran` int NOT NULL
);


-- --------------------------------------------------------

--
-- Table structure for table `qris`
--

CREATE TABLE `qris` (
  `id_pembayaran` int NOT NULL,
  `content` text NOT NULL,
  `request_date` date NOT NULL,
  `invoiceID` char(9) NOT NULL
);

--
-- Table structure for table `token`
--

CREATE TABLE `token` (
  `kode` char(4) NOT NULL,
  `nominal` float NOT NULL
);

--
-- Dumping data for table `token`
--

INSERT INTO `token` (`kode`, `nominal`) VALUES
('0011', 10000),
('0012', 25000),
('0013', 50000);

-- --------------------------------------------------------

--
-- Table structure for table `token_history`
--

CREATE TABLE `token_history` (
  `kode` char(4) NOT NULL,
  `no_meteran` varchar(12) NOT NULL,
  `nominal` float NOT NULL,
  `token` char(23) NOT NULL,
  `id_pembayaran` int NOT NULL
);


CREATE TABLE `transaksi_items` (
  `kode` char(4) NOT NULL,
  `jumlah` int NOT NULL,
  `id_pembayaran` int NOT NULL
);



--
-- Indexes for dumped tables
--

--
-- Indexes for table `barang`
--
ALTER TABLE `barang`
  ADD PRIMARY KEY (`kode`);

--
-- Indexes for table `debit`
--
ALTER TABLE `debit`
  ADD KEY `debit_ibfk_1` (`id_pembayaran`);

--
-- Indexes for table `kas`
--
ALTER TABLE `kas`
  ADD KEY `kas_ibfk_1` (`id_pembayaran`);

--
-- Indexes for table `login`
--
ALTER TABLE `login`
  ADD PRIMARY KEY (`username`);

--
-- Indexes for table `makanan`
--
ALTER TABLE `makanan`
  ADD KEY `makanan_ibfk_1` (`kode`);

--
-- Indexes for table `pembayaran`
--
ALTER TABLE `pembayaran`
  ADD PRIMARY KEY (`id_pembayaran`);

--
-- Indexes for table `pulsa`
--
ALTER TABLE `pulsa`
  ADD KEY `pulsa_ibfk_1` (`kode`);

--
-- Indexes for table `pulsa_history`
--
ALTER TABLE `pulsa_history`
  ADD KEY `pulsa_history_ibfk_2` (`id_pembayaran`),
  ADD KEY `pulsa_history_ibfk_1` (`kode`);

--
-- Indexes for table `qris`
--
ALTER TABLE `qris`
  ADD KEY `qris_ibfk_1` (`id_pembayaran`);

--
-- Indexes for table `token`
--
ALTER TABLE `token`
  ADD KEY `token_ibfk_1` (`kode`);

--
-- Indexes for table `token_history`
--
ALTER TABLE `token_history`
  ADD KEY `token_history_ibfk_1` (`kode`),
  ADD KEY `token_history_ibfk_2` (`id_pembayaran`);

--
-- Indexes for table `transaksi_items`
--
ALTER TABLE `transaksi_items`
  ADD KEY `item_ibfk_1` (`id_pembayaran`),
  ADD KEY `kode` (`kode`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `pembayaran`
--
ALTER TABLE `pembayaran`
  MODIFY `id_pembayaran` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=1;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `debit`
--
ALTER TABLE `debit`
  ADD CONSTRAINT `debit_ibfk_1` FOREIGN KEY (`id_pembayaran`) REFERENCES `pembayaran` (`id_pembayaran`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `kas`
--
ALTER TABLE `kas`
  ADD CONSTRAINT `kas_ibfk_1` FOREIGN KEY (`id_pembayaran`) REFERENCES `pembayaran` (`id_pembayaran`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `makanan`
--
ALTER TABLE `makanan`
  ADD CONSTRAINT `makanan_ibfk_1` FOREIGN KEY (`kode`) REFERENCES `barang` (`kode`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `pulsa`
--
ALTER TABLE `pulsa`
  ADD CONSTRAINT `pulsa_ibfk_1` FOREIGN KEY (`kode`) REFERENCES `barang` (`kode`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `pulsa_history`
--
ALTER TABLE `pulsa_history`
  ADD CONSTRAINT `pulsa_history_ibfk_1` FOREIGN KEY (`kode`) REFERENCES `barang` (`kode`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `pulsa_history_ibfk_2` FOREIGN KEY (`id_pembayaran`) REFERENCES `pembayaran` (`id_pembayaran`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `qris`
--
ALTER TABLE `qris`
  ADD CONSTRAINT `qris_ibfk_1` FOREIGN KEY (`id_pembayaran`) REFERENCES `pembayaran` (`id_pembayaran`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `token`
--
ALTER TABLE `token`
  ADD CONSTRAINT `token_ibfk_1` FOREIGN KEY (`kode`) REFERENCES `barang` (`kode`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `token_history`
--
ALTER TABLE `token_history`
  ADD CONSTRAINT `token_history_ibfk_1` FOREIGN KEY (`kode`) REFERENCES `barang` (`kode`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `token_history_ibfk_2` FOREIGN KEY (`id_pembayaran`) REFERENCES `pembayaran` (`id_pembayaran`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `transaksi_items`
--
ALTER TABLE `transaksi_items`
  ADD CONSTRAINT `transaksi_items_ibfk_3` FOREIGN KEY (`id_pembayaran`) REFERENCES `pembayaran` (`id_pembayaran`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `transaksi_items_ibfk_4` FOREIGN KEY (`kode`) REFERENCES `barang` (`kode`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
