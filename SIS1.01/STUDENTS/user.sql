CREATE TABLE `user` (
  `id` int(11) NOT NULL,
  `first_name` varchar(50) NOT NULL,
  `last_name` varchar(50) NOT NULL,
  `email` varchar(50) NOT NULL,
  `password` varchar(50) NOT NULL,
  `gender` enum('male','female') CHARACTER SET utf8 NOT NULL,
  `mobile` varchar(50) NOT NULL,
  `designation` varchar(50) NOT NULL,
  `image` varchar(250) NOT NULL,
  `type` varchar(250) NOT NULL DEFAULT 'general',
  `status` enum('active','pending','deleted','') NOT NULL DEFAULT 'pending',
  `authtoken` varchar(250) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;



INSERT INTO `user` (`id`, `first_name`, `last_name`, `email`, `password`, `gender`, `mobile`, `designation`, `image`, `type`, `status`, `authtoken`) VALUES
(1, 'System', 'Administrator', 'lim@sbit.edu.my', '202cb962ac59075b964b07152d234b70', 'male', '0166808076', 'Admin and Account cum Course Coordinator', '', 'administrator', 'active', ''),
(5, 'Richard', 'Chong', 'richard@sbit.edu.my', '202cb962ac59075b964b07152d234b70', 'male', '0192828055', 'Head of Department (Software Engineering)', '', 'administrator', 'active', '73f66749989c7b09389894f1b27daa7387f9956fa51c87c1ba4fc4684b91acb5'),
(6, 'Dave', 'Chew', 'dave@sbit.edu.my', '202cb962ac59075b964b07152d234b70', 'male', '0182126167', 'Software Engineer', '', 'general', 'active', '73f66749989c7b09389894f1b27daa736156fbd08795da8955fb36cf730f2fb0'),
(7, 'Chevie', 'Chew', 'chevie@sbit.edu.my', '202cb962ac59075b964b07152d234b70', 'female', '0135211505', 'Software Engineer', '', 'general', 'active', '73f66749989c7b09389894f1b27daa738d2775af2555b0d1ed582212a3991144');

ALTER TABLE `user`
  ADD PRIMARY KEY (`id`);

ALTER TABLE `user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;
