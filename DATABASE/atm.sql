--
-- Database: `atm`
--

-- --------------------------------------------------------

--
-- Table structure for table `passbook`
--

CREATE TABLE IF NOT EXISTS `passbook` (
`id` int(30) NOT NULL,
  `details` text NOT NULL,
  `amount` bigint(255) NOT NULL,
  `user` varchar(30) NOT NULL,
  `date_transaction` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `passbook`
--

INSERT INTO `passbook` (`id`, `details`, `amount`, `user`, `date_transaction`) VALUES
(1, 'demo', 56000, 'admin', '0000-00-00 00:00:00'),
(2, '', 52000, 'admin', '0000-00-00 00:00:00');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE IF NOT EXISTS `users` (
`id` int(30) NOT NULL,
  `username` varchar(30) NOT NULL,
`accountno` varchar(30) NOT NULL,
  `password` varchar(30) NOT NULL,
   `phnno` bigint(30) NOT NULL,
  `date_transaction` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `username`, `accountno`, `password`, `phnno`, `date_transaction`) VALUES
(1, 'admin','987060102345', 'admin','9876543210', '2019-11-28 12:31:56');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `passbook`
--
ALTER TABLE `passbook`
 ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
 ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `passbook`
--
ALTER TABLE `passbook`
MODIFY `id` int(30) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
MODIFY `id` int(30) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=2;
--
--
