-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Máy chủ: 127.0.0.1
-- Thời gian đã tạo: Th5 11, 2025 lúc 05:21 AM
-- Phiên bản máy phục vụ: 10.4.32-MariaDB
-- Phiên bản PHP: 8.0.30

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Cơ sở dữ liệu: `dating_app`
--

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `account`
--

CREATE TABLE `account` (
  `ID` int(11) NOT NULL,
  `UserID` int(11) NOT NULL,
  `Email` varchar(50) NOT NULL,
  `PasswordHash` varchar(255) NOT NULL,
  `IsActive` bit(1) NOT NULL DEFAULT b'0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Đang đổ dữ liệu cho bảng `account`
--

INSERT INTO `account` (`ID`, `UserID`, `Email`, `PasswordHash`, `IsActive`) VALUES
(1, 1, 'minhthuan2604@gmail.com', 'minhthuan1', b'1'),
(10, 2, 'minhthuan2005@gmail.com', 'minhthuan2', b'1'),
(11, 3, 'tuankiet778@gmail.com', 'tuankiet1', b'1'),
(12, 4, 'ducmanh678@gmail.com', 'ducmanh1', b'1'),
(13, 5, 'Giabao1278@gmail.com', 'giabao1', b'1'),
(14, 6, 'Myhoang635@gmail.com', 'myhoang1', b'1');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `bin`
--

CREATE TABLE `bin` (
  `ID` int(11) NOT NULL,
  `UserID` int(11) NOT NULL,
  `DeleteTime` datetime DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `chat`
--

CREATE TABLE `chat` (
  `ID` int(11) NOT NULL,
  `MatchID` int(11) NOT NULL,
  `SenderID` int(11) NOT NULL,
  `Messager` varchar(1000) NOT NULL,
  `SendTime` datetime DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `followers`
--

CREATE TABLE `followers` (
  `ID` int(11) NOT NULL,
  `FollowerID` int(11) NOT NULL,
  `FollowingID` int(11) NOT NULL
) ;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `hobbylist`
--

CREATE TABLE `hobbylist` (
  `ID` int(11) NOT NULL,
  `HobbyName` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Đang đổ dữ liệu cho bảng `hobbylist`
--

INSERT INTO `hobbylist` (`ID`, `HobbyName`) VALUES
(1, 'Reading'),
(2, 'Traveling'),
(3, 'Cooking'),
(4, 'Photography'),
(5, 'Drawing'),
(6, 'Gaming'),
(7, 'Listening to Music'),
(8, 'Watching Movies'),
(9, 'Hiking'),
(10, 'Cycling'),
(11, 'Dancing'),
(12, 'Swimming'),
(13, 'Running'),
(14, 'Yoga'),
(15, 'Gardening'),
(16, 'Writing'),
(17, 'Fishing'),
(18, 'Singing'),
(19, 'Playing Guitar'),
(20, 'Volunteering');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `images`
--

CREATE TABLE `images` (
  `ID` int(11) NOT NULL,
  `UserID` int(11) NOT NULL,
  `imgPath` varchar(255) NOT NULL,
  `IsActive` bit(1) NOT NULL DEFAULT b'1'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Đang đổ dữ liệu cho bảng `images`
--

INSERT INTO `images` (`ID`, `UserID`, `imgPath`, `IsActive`) VALUES
(1, 1, 'https://example.com/images/user1.jpg', b'1'),
(2, 1, 'http://localhost/photto/hinh1.avif', b'1');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `joblist`
--

CREATE TABLE `joblist` (
  `ID` int(11) NOT NULL,
  `JobName` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Đang đổ dữ liệu cho bảng `joblist`
--

INSERT INTO `joblist` (`ID`, `JobName`) VALUES
(1, 'Student'),
(2, 'worker'),
(3, 'retire');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `looking`
--

CREATE TABLE `looking` (
  `ID` int(11) NOT NULL,
  `LookingName` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Đang đổ dữ liệu cho bảng `looking`
--

INSERT INTO `looking` (`ID`, `LookingName`) VALUES
(1, 'Single'),
(2, 'In a Relationship'),
(3, 'Married'),
(4, 'Engaged'),
(5, 'It\'s Complicated'),
(6, 'Separated'),
(7, 'Divorced'),
(8, 'Widowed'),
(9, 'Open Relationship'),
(10, 'Prefer Not to Say');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `matches`
--

CREATE TABLE `matches` (
  `ID` int(11) NOT NULL,
  `User1ID` int(11) NOT NULL,
  `User2ID` int(11) NOT NULL
) ;

--
-- Đang đổ dữ liệu cho bảng `matches`
--

INSERT INTO `matches` (`ID`, `User1ID`, `User2ID`) VALUES
(6, 1, 2),
(4, 1, 3),
(8, 1, 4),
(9, 2, 3),
(10, 3, 6),
(11, 4, 5);

--
-- Bẫy `matches`
--
DELIMITER $$
CREATE TRIGGER `change_match_order` BEFORE INSERT ON `matches` FOR EACH ROW begin
  if new.User1ID > new.User2ID then
    set @temp = new.User1ID;
    set new.User1ID = new.User2ID;
    set new.User2ID = @temp;
  end if;
end
$$
DELIMITER ;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `personallylist`
--

CREATE TABLE `personallylist` (
  `ID` int(11) NOT NULL,
  `PersonallyName` varchar(80) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Đang đổ dữ liệu cho bảng `personallylist`
--

INSERT INTO `personallylist` (`ID`, `PersonallyName`) VALUES
(1, 'Friendly'),
(2, 'Introverted'),
(3, 'Extroverted'),
(4, 'Shy'),
(5, 'Talkative'),
(6, 'Funny'),
(7, 'Romantic'),
(8, 'Adventurous'),
(9, 'Calm'),
(10, 'Confident'),
(11, 'Honest'),
(12, 'Kind'),
(13, 'Loyal'),
(14, 'Open-minded'),
(15, 'Sensitive'),
(16, 'Creative'),
(17, 'Optimistic'),
(18, 'Pessimistic'),
(19, 'Hardworking'),
(20, 'Easygoing');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `userhobbby`
--

CREATE TABLE `userhobbby` (
  `ID` int(11) NOT NULL,
  `UserID` int(11) NOT NULL,
  `HobbyID` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `userinformation`
--

CREATE TABLE `userinformation` (
  `ID` int(11) NOT NULL,
  `UserName` varchar(100) NOT NULL,
  `Email` varchar(100) NOT NULL,
  `PhoneNumber` varchar(15) NOT NULL,
  `BirthDate` date NOT NULL,
  `Age` int(11) NOT NULL,
  `Gender` enum('Men','Women','Other') NOT NULL,
  `IsActive` bit(1) NOT NULL DEFAULT b'0',
  `Avt` varchar(255) NOT NULL,
  `UserAddress` varchar(50) NOT NULL,
  'bio' varchar(255) NULL
) ;

--
-- Đang đổ dữ liệu cho bảng `userinformation`
--

INSERT INTO `userinformation` (`ID`, `UserName`, `Email`, `PhoneNumber`, `BirthDate`, `Age`, `Gender`, `IsActive`, `Avt`, `UserAddress`) VALUES
(1, 'Nguyen Minh Thuan', 'minhthuan2604@gmail.com', '0337760280', '2005-04-26', 20, 'Men', b'1', 'hinhanh.jpg', 'quan 7'),
(2, 'Nemo Nguyễn', 'minhthuan2005@gmail.com', '01298945279', '2003-09-19', 21, 'Men', b'1', 'hinhanh1.jpg', 'quan 1'),
(3, 'Lê Tuấn Kiệt', 'tuankiet778@gmail.com', '0836278240', '2005-01-26', 20, 'Men', b'1', 'hinhanh2.jpg', 'quan 9'),
(4, 'Nguyễn Đức Mạnh', 'ducmanh678@gmail.com', '0678264670', '2002-12-17', 22, 'Men', b'1', 'hinhanh3.jpg', 'quan 6'),
(5, 'Nguyễn Gia Bảo', 'Giabao1278@gmail.com', '0625478190', '2001-07-25', 23, 'Men', b'1', 'hinhanh4.jpg', 'quan 3'),
(6, 'Mỹ Hoàng', 'Myhoang635@gmail.com', '0735117399', '2003-09-17', 21, 'Women', b'1', 'hinhanh5.jpg', 'quan 2');

--
-- Bẫy `userinformation`
--
DELIMITER $$
CREATE TRIGGER `Caculate_Age_Insert` BEFORE INSERT ON `userinformation` FOR EACH ROW begin
set new.age = timestampdiff(year, new.BirthDate,curdate());
if new.Age < 18 Then
signal sqlState '45000'
set message_text = 'Tuổi của người dùng phải lớn hơn hoặc bằng 18';
end if;
end
$$
DELIMITER ;
DELIMITER $$
CREATE TRIGGER `Caculate_Age_Update` BEFORE UPDATE ON `userinformation` FOR EACH ROW begin
set new.age = timestampdiff(year, new.BirthDate,curdate());
if new.Age < 18 Then
signal sqlState '45000'
set message_text = 'Tuổi của người dùng phải lớn hơn hoặc bằng 18';
end if;
end
$$
DELIMITER ;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `userjob`
--

CREATE TABLE `userjob` (
  `ID` int(11) NOT NULL,
  `UserID` int(11) NOT NULL,
  `JobID` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Đang đổ dữ liệu cho bảng `userjob`
--

INSERT INTO `userjob` (`ID`, `UserID`, `JobID`) VALUES
(1, 1, 2);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `userlooking`
--

CREATE TABLE `userlooking` (
  `ID` int(11) NOT NULL,
  `UserID` int(11) NOT NULL,
  `LookingID` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Đang đổ dữ liệu cho bảng `userlooking`
--

INSERT INTO `userlooking` (`ID`, `UserID`, `LookingID`) VALUES
(1, 2, 5);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `userpersonally`
--

CREATE TABLE `userpersonally` (
  `ID` int(11) NOT NULL,
  `UserID` int(11) NOT NULL,
  `PersonallyID` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Cấu trúc đóng vai cho view `view_account`
-- (See below for the actual view)
--
CREATE TABLE `view_account` (
`ID Người dùng` int(11)
,`Tên tài khoản` varchar(50)
,`Mật khẩu` varchar(255)
);

-- --------------------------------------------------------

--
-- Cấu trúc đóng vai cho view `view_chat_usend&ureceive`
-- (See below for the actual view)
--
CREATE TABLE `view_chat_usend&ureceive` (
`MatchID` int(11)
,`User1ID` int(11)
,`người gửi` varchar(100)
,`User2ID` int(11)
,`người nhận` varchar(100)
);

-- --------------------------------------------------------

--
-- Cấu trúc đóng vai cho view `view_match`
-- (See below for the actual view)
--
CREATE TABLE `view_match` (
`MatchID` int(11)
,`User1ID` int(11)
,`User1Name` varchar(100)
,`User2ID` int(11)
,`User2Name` varchar(100)
);

-- --------------------------------------------------------

--
-- Cấu trúc đóng vai cho view `view_userjob`
-- (See below for the actual view)
--
CREATE TABLE `view_userjob` (
`UserID` int(11)
,`UserName` varchar(100)
,`JobName` varchar(50)
);

-- --------------------------------------------------------

--
-- Cấu trúc đóng vai cho view `view_userlooking`
-- (See below for the actual view)
--
CREATE TABLE `view_userlooking` (
`UserID` int(11)
,`UserName` varchar(100)
,`LookingName` varchar(50)
);

-- --------------------------------------------------------

--
-- Cấu trúc đóng vai cho view `view_user_img`
-- (See below for the actual view)
--
CREATE TABLE `view_user_img` (
`UserID` int(11)
,`UserName` varchar(100)
,`ImageURL` varchar(255)
);

-- --------------------------------------------------------

--
-- Cấu trúc cho view `view_account`
--
DROP TABLE IF EXISTS `view_account`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `view_account`  AS SELECT `account`.`ID` AS `ID Người dùng`, `account`.`Email` AS `Tên tài khoản`, `account`.`PasswordHash` AS `Mật khẩu` FROM `account` ;

-- --------------------------------------------------------

--
-- Cấu trúc cho view `view_chat_usend&ureceive`
--
DROP TABLE IF EXISTS `view_chat_usend&ureceive`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `view_chat_usend&ureceive`  AS SELECT `m`.`ID` AS `MatchID`, `u1`.`ID` AS `User1ID`, `u1`.`UserName` AS `người gửi`, `u2`.`ID` AS `User2ID`, `u2`.`UserName` AS `người nhận` FROM ((`matches` `m` join `userinformation` `u1` on(`m`.`User1ID` = `u1`.`ID`)) join `userinformation` `u2` on(`m`.`User2ID` = `u2`.`ID`)) ;

-- --------------------------------------------------------

--
-- Cấu trúc cho view `view_match`
--
DROP TABLE IF EXISTS `view_match`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `view_match`  AS SELECT `m`.`ID` AS `MatchID`, `u1`.`ID` AS `User1ID`, `u1`.`UserName` AS `User1Name`, `u2`.`ID` AS `User2ID`, `u2`.`UserName` AS `User2Name` FROM ((`matches` `m` join `userinformation` `u1` on(`m`.`User1ID` = `u1`.`ID`)) join `userinformation` `u2` on(`m`.`User2ID` = `u2`.`ID`)) ;

-- --------------------------------------------------------

--
-- Cấu trúc cho view `view_userjob`
--
DROP TABLE IF EXISTS `view_userjob`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `view_userjob`  AS SELECT `uj`.`UserID` AS `UserID`, `ui`.`UserName` AS `UserName`, `jl`.`JobName` AS `JobName` FROM ((`userjob` `uj` join `userinformation` `ui` on(`uj`.`UserID` = `ui`.`ID`)) join `joblist` `jl` on(`uj`.`JobID` = `jl`.`ID`)) ;

-- --------------------------------------------------------

--
-- Cấu trúc cho view `view_userlooking`
--
DROP TABLE IF EXISTS `view_userlooking`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `view_userlooking`  AS SELECT `ul`.`UserID` AS `UserID`, `ui`.`UserName` AS `UserName`, `l`.`LookingName` AS `LookingName` FROM ((`userlooking` `ul` join `userinformation` `ui` on(`ul`.`UserID` = `ui`.`ID`)) join `looking` `l` on(`ul`.`LookingID` = `l`.`ID`)) ;

-- --------------------------------------------------------

--
-- Cấu trúc cho view `view_user_img`
--
DROP TABLE IF EXISTS `view_user_img`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `view_user_img`  AS SELECT `ui`.`ID` AS `UserID`, `ui`.`UserName` AS `UserName`, `i`.`imgPath` AS `ImageURL` FROM (`userinformation` `ui` join `images` `i` on(`ui`.`ID` = `i`.`UserID`)) WHERE `i`.`IsActive` = 1 ;

--
-- Chỉ mục cho các bảng đã đổ
--

--
-- Chỉ mục cho bảng `account`
--
ALTER TABLE `account`
  ADD PRIMARY KEY (`ID`),
  ADD UNIQUE KEY `Email` (`Email`),
  ADD KEY `UserID` (`UserID`);

--
-- Chỉ mục cho bảng `bin`
--
ALTER TABLE `bin`
  ADD PRIMARY KEY (`ID`),
  ADD KEY `UserID` (`UserID`);

--
-- Chỉ mục cho bảng `chat`
--
ALTER TABLE `chat`
  ADD PRIMARY KEY (`ID`),
  ADD KEY `SenderID` (`SenderID`),
  ADD KEY `MatchID` (`MatchID`);

--
-- Chỉ mục cho bảng `followers`
--
ALTER TABLE `followers`
  ADD PRIMARY KEY (`ID`),
  ADD UNIQUE KEY `FollowerID` (`FollowerID`),
  ADD UNIQUE KEY `FollowingID` (`FollowingID`);

--
-- Chỉ mục cho bảng `hobbylist`
--
ALTER TABLE `hobbylist`
  ADD PRIMARY KEY (`ID`);

--
-- Chỉ mục cho bảng `images`
--
ALTER TABLE `images`
  ADD PRIMARY KEY (`ID`),
  ADD KEY `UserID` (`UserID`);

--
-- Chỉ mục cho bảng `joblist`
--
ALTER TABLE `joblist`
  ADD PRIMARY KEY (`ID`);

--
-- Chỉ mục cho bảng `looking`
--
ALTER TABLE `looking`
  ADD PRIMARY KEY (`ID`);

--
-- Chỉ mục cho bảng `matches`
--
ALTER TABLE `matches`
  ADD PRIMARY KEY (`ID`),
  ADD UNIQUE KEY `User1ID` (`User1ID`,`User2ID`),
  ADD KEY `User2ID` (`User2ID`);

--
-- Chỉ mục cho bảng `personallylist`
--
ALTER TABLE `personallylist`
  ADD PRIMARY KEY (`ID`);

--
-- Chỉ mục cho bảng `userhobbby`
--
ALTER TABLE `userhobbby`
  ADD PRIMARY KEY (`ID`),
  ADD KEY `UserID` (`UserID`),
  ADD KEY `HobbyID` (`HobbyID`);

--
-- Chỉ mục cho bảng `userinformation`
--
ALTER TABLE `userinformation`
  ADD PRIMARY KEY (`ID`),
  ADD UNIQUE KEY `Email` (`Email`),
  ADD UNIQUE KEY `PhoneNumber` (`PhoneNumber`);

--
-- Chỉ mục cho bảng `userjob`
--
ALTER TABLE `userjob`
  ADD PRIMARY KEY (`ID`),
  ADD UNIQUE KEY `UserID` (`UserID`),
  ADD UNIQUE KEY `JobID` (`JobID`);

--
-- Chỉ mục cho bảng `userlooking`
--
ALTER TABLE `userlooking`
  ADD PRIMARY KEY (`ID`),
  ADD UNIQUE KEY `UserID` (`UserID`),
  ADD UNIQUE KEY `LookingID` (`LookingID`);

--
-- Chỉ mục cho bảng `userpersonally`
--
ALTER TABLE `userpersonally`
  ADD PRIMARY KEY (`ID`),
  ADD UNIQUE KEY `UserID` (`UserID`),
  ADD UNIQUE KEY `PersonallyID` (`PersonallyID`);

--
-- AUTO_INCREMENT cho các bảng đã đổ
--

--
-- AUTO_INCREMENT cho bảng `account`
--
ALTER TABLE `account`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT cho bảng `bin`
--
ALTER TABLE `bin`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT cho bảng `chat`
--
ALTER TABLE `chat`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT cho bảng `followers`
--
ALTER TABLE `followers`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT cho bảng `hobbylist`
--
ALTER TABLE `hobbylist`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT cho bảng `images`
--
ALTER TABLE `images`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT cho bảng `joblist`
--
ALTER TABLE `joblist`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT cho bảng `looking`
--
ALTER TABLE `looking`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT cho bảng `matches`
--
ALTER TABLE `matches`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT cho bảng `personallylist`
--
ALTER TABLE `personallylist`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT cho bảng `userhobbby`
--
ALTER TABLE `userhobbby`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT cho bảng `userinformation`
--
ALTER TABLE `userinformation`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT cho bảng `userjob`
--
ALTER TABLE `userjob`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT cho bảng `userlooking`
--
ALTER TABLE `userlooking`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT cho bảng `userpersonally`
--
ALTER TABLE `userpersonally`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT;

--
-- Các ràng buộc cho các bảng đã đổ
--

--
-- Các ràng buộc cho bảng `account`
--
ALTER TABLE `account`
  ADD CONSTRAINT `account_ibfk_1` FOREIGN KEY (`UserID`) REFERENCES `userinformation` (`ID`);

--
-- Các ràng buộc cho bảng `bin`
--
ALTER TABLE `bin`
  ADD CONSTRAINT `bin_ibfk_1` FOREIGN KEY (`UserID`) REFERENCES `userinformation` (`ID`);

--
-- Các ràng buộc cho bảng `chat`
--
ALTER TABLE `chat`
  ADD CONSTRAINT `chat_ibfk_1` FOREIGN KEY (`SenderID`) REFERENCES `userinformation` (`ID`),
  ADD CONSTRAINT `chat_ibfk_2` FOREIGN KEY (`MatchID`) REFERENCES `matches` (`ID`);

--
-- Các ràng buộc cho bảng `followers`
--
ALTER TABLE `followers`
  ADD CONSTRAINT `followers_ibfk_1` FOREIGN KEY (`FollowerID`) REFERENCES `userinformation` (`ID`),
  ADD CONSTRAINT `followers_ibfk_2` FOREIGN KEY (`FollowingID`) REFERENCES `userinformation` (`ID`);

--
-- Các ràng buộc cho bảng `images`
--
ALTER TABLE `images`
  ADD CONSTRAINT `images_ibfk_1` FOREIGN KEY (`UserID`) REFERENCES `userinformation` (`ID`);

--
-- Các ràng buộc cho bảng `matches`
--
ALTER TABLE `matches`
  ADD CONSTRAINT `matches_ibfk_1` FOREIGN KEY (`User1ID`) REFERENCES `userinformation` (`ID`),
  ADD CONSTRAINT `matches_ibfk_2` FOREIGN KEY (`User2ID`) REFERENCES `userinformation` (`ID`);

--
-- Các ràng buộc cho bảng `userhobbby`
--
ALTER TABLE `userhobbby`
  ADD CONSTRAINT `userhobbby_ibfk_1` FOREIGN KEY (`UserID`) REFERENCES `userinformation` (`ID`),
  ADD CONSTRAINT `userhobbby_ibfk_2` FOREIGN KEY (`HobbyID`) REFERENCES `hobbylist` (`ID`);

--
-- Các ràng buộc cho bảng `userjob`
--
ALTER TABLE `userjob`
  ADD CONSTRAINT `userjob_ibfk_1` FOREIGN KEY (`UserID`) REFERENCES `userinformation` (`ID`),
  ADD CONSTRAINT `userjob_ibfk_2` FOREIGN KEY (`JobID`) REFERENCES `joblist` (`ID`);

--
-- Các ràng buộc cho bảng `userlooking`
--
ALTER TABLE `userlooking`
  ADD CONSTRAINT `userlooking_ibfk_1` FOREIGN KEY (`UserID`) REFERENCES `userinformation` (`ID`),
  ADD CONSTRAINT `userlooking_ibfk_2` FOREIGN KEY (`LookingID`) REFERENCES `looking` (`ID`);

--
-- Các ràng buộc cho bảng `userpersonally`
--
ALTER TABLE `userpersonally`
  ADD CONSTRAINT `userpersonally_ibfk_1` FOREIGN KEY (`UserID`) REFERENCES `userinformation` (`ID`),
  ADD CONSTRAINT `userpersonally_ibfk_2` FOREIGN KEY (`PersonallyID`) REFERENCES `personallylist` (`ID`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
