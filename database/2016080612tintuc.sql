-- phpMyAdmin SQL Dump
-- version 4.5.1
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Aug 12, 2016 at 05:11 PM
-- Server version: 10.1.13-MariaDB
-- PHP Version: 5.6.21

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `tintuc`
--

-- --------------------------------------------------------

--
-- Table structure for table `category`
--

CREATE TABLE `category` (
  `id` int(11) NOT NULL,
  `name` varchar(200) NOT NULL,
  `parent_id` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `category`
--

INSERT INTO `category` (`id`, `name`, `parent_id`) VALUES
(41, 'Trang Chủ', 0),
(46, 'Thế Giới', 0),
(47, 'Quân Sự', 46),
(48, 'Tư liệu', 46),
(49, 'Phân tích', 46),
(50, 'Kinh Doanh', 0),
(51, 'Doanh Nghiệp', 50),
(52, 'Bất Động Sản', 50),
(53, 'Hàng Hóa', 50),
(54, 'Khởi Nghiệp', 50),
(55, 'Chứng Khoán', 50),
(56, 'Vĩ Mô', 50),
(57, 'Giải Trí', 0),
(58, 'Thời Trang', 57),
(59, 'Phim', 57),
(60, 'Sách', 57),
(61, 'Nhạc', 57),
(62, 'Thể Thao', 0),
(63, 'Bóng Đá', 62),
(64, 'Tennis', 62),
(65, 'Pháp Luật', 0),
(66, 'Hồ Sơ phá án', 65),
(67, 'Tư Vấn', 65),
(68, 'Giáo Dục', 0),
(69, 'Khoa Học', 0),
(70, 'Môi Trường', 69),
(71, 'Công Nghệ Mới', 69),
(72, 'Hỏi - Đáp', 69),
(73, 'Chuyện Lạ', 69),
(74, 'Số Hóa', 0),
(75, 'Sản phẩm', 74),
(76, 'Đánh Giá', 74),
(77, 'Đời Sống Số ', 74),
(78, 'Kinh nghiệm', 74);

-- --------------------------------------------------------

--
-- Table structure for table `news`
--

CREATE TABLE `news` (
  `id` int(11) NOT NULL,
  `title` varchar(200) NOT NULL,
  `author` varchar(200) DEFAULT NULL,
  `intro` text NOT NULL,
  `content` text,
  `image` varchar(200) DEFAULT NULL,
  `status` tinyint(1) NOT NULL DEFAULT '1',
  `time_news` int(10) NOT NULL,
  `category_id` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `news`
--

INSERT INTO `news` (`id`, `title`, `author`, `intro`, `content`, `image`, `status`, `time_news`, `category_id`) VALUES
(17, 'Cận cảnh tiêm kích tàng hình tối tân F-35 Mỹ', 'Vũ Hoàng', '<p>F-35 được nhận x&eacute;t l&agrave; mẫu ti&ecirc;m k&iacute;ch hiện đại v&agrave; đắt gi&aacute; nhất của Mỹ, sở hữu t&iacute;nh năng t&agrave;ng h&igrave;nh ưu việt cũng như năng lực tấn c&ocirc;ng mạnh mẽ.</p>\r\n', '<p>Kh&ocirc;ng qu&acirc;n Mỹ hồi đầu th&aacute;ng th&ocirc;ng b&aacute;o phi đội ti&ecirc;m k&iacute;ch thế hệ thứ 5 F-35A Lightning II đ&atilde; sẵn s&agrave;ng chiến đấu. Mẫu m&aacute;y bay một chỗ ngồi, một động cơ n&agrave;y sở hữu nhiều đặc điểm vượt trội cũng như cải tiến về năng lực nhận thức t&igrave;nh huống, t&agrave;ng h&igrave;nh, tốc độ v&agrave; c&oacute; thể đảm nhận nhiều sứ mệnh kh&aacute;c nhau. Nh&agrave; chức tr&aacute;ch Mỹ khẳng định n&oacute; c&oacute; khả năng tấn c&ocirc;ng những mục ti&ecirc;u kh&oacute; tiếp cận với độ ch&iacute;nh x&aacute;c cao, thậm ch&iacute; x&acirc;m nhập kh&ocirc;ng phận kẻ th&ugrave; m&agrave; kh&ocirc;ng bị ph&aacute;t hiện, theo&nbsp;<em>Fox News</em>. Ảnh:&nbsp;<em>F35.com</em></p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p><img id="vne_slide_image_1" src="http://img.f31.vnecdn.net/2016/08/12/1-wiki-1470985102_660x0.jpg" /><a href="javascript:void(0)">&nbsp;</a></p>\r\n\r\n<p>Phi đội Chiến đấu cơ 34 trực thuộc Phi đo&agrave;n Chiến đấu 388 đ&oacute;ng tại căn cứ kh&ocirc;ng qu&acirc;n Hill ở bang Utah l&agrave; đội ti&ecirc;m k&iacute;ch F-35A đầu ti&ecirc;n của to&agrave;n lực lượng. Để đạt chỉ ti&ecirc;u Năng lực T&aacute;c chiến Sơ bộ, căn cứ Hill phải bi&ecirc;n chế &iacute;t nhất 12 m&aacute;y bay F-35A sẵn s&agrave;ng chiến đấu, triển khai thực hiện nhiệm vụ to&agrave;n cầu, bao gồm yểm trợ hỏa lực tầm gần, đ&aacute;nh chặn, chiếm ưu thế tr&ecirc;n kh&ocirc;ng hạn chế v&agrave; ti&ecirc;u diệt hệ thống ph&ograve;ng kh&ocirc;ng đối phương. Ảnh:&nbsp;<em>Wikipedia</em></p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p><img id="vne_slide_image_2" src="http://img.f30.vnecdn.net/2016/08/12/4-telegraph-1470985103_660x0.jpg" /><a href="javascript:void(0)">&nbsp;</a></p>\r\n\r\n<p>Theo đại &uacute;y James Schmidt từ Phi đo&agrave;n Chiến đấu 388, ti&ecirc;m k&iacute;ch t&agrave;ng h&igrave;nh Lockheed Martin F-35 Lightning II đặc biệt được ph&aacute;t triển để x&acirc;m nhập khu vực an to&agrave;n, tr&aacute;nh sự ph&aacute;t hiện của radar đối phương. Đ&acirc;y l&agrave; điểm cải tiến đ&aacute;ng kể so với những mẫu chiến đấu cơ thế hệ thứ 4.</p>\r\n\r\n<p>&quot;Ch&iacute;nh năng lực t&agrave;ng h&igrave;nh l&agrave;m n&ecirc;n sự độc đ&aacute;o v&agrave; t&iacute;nh hiệu quả của F-35&quot;, Schmidt cho hay. &quot;V&agrave; đ&oacute; chỉ l&agrave; một trong nhiều điểm khiến n&oacute; trở n&ecirc;n độc nhất v&ocirc; nhị&quot;.</p>\r\n\r\n<p>C&aacute;c chuy&ecirc;n gia Mỹ nhắm mục ti&ecirc;u ph&aacute;t triển c&ocirc;ng nghệ t&agrave;ng h&igrave;nh cho F-35 ngay từ những ng&agrave;y đầu, v&igrave; thế tất cả c&aacute;c chi tiết trong thiết kế đều được tối ưu h&oacute;a, từ h&igrave;nh d&aacute;ng, hốc h&uacute;t gi&oacute; cho đến sải c&aacute;nh. B&ecirc;n cạnh đ&oacute;, vật liệu chế tạo m&aacute;y bay cũng c&oacute; khả năng hấp thụ s&oacute;ng radar tối đa. Ảnh:&nbsp;<em>Telegraph</em></p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p><img id="vne_slide_image_3" src="http://img.f31.vnecdn.net/2016/08/12/5-US-Defense-Watch-1470985104_660x0.jpg" /><a href="javascript:void(0)">&nbsp;</a></p>\r\n\r\n<p>Một điểm nhấn kh&aacute;c l&agrave;m n&ecirc;n n&eacute;t độc đ&aacute;o của F-35 nằm ở chiếc mũ phi c&ocirc;ng gi&uacute;p người điều khiển gia tăng khả năng quan s&aacute;t. Phi c&ocirc;ng khi cần c&oacute; thể &quot;nh&igrave;n&quot; xuy&ecirc;n qua m&aacute;y bay xuống mặt đất ph&iacute;a dưới nhờ một cơ chế hỗ trợ mang t&ecirc;n gọi Hệ thống Khẩu độ Ph&acirc;n t&aacute;n (DAS).</p>\r\n\r\n<p>M&aacute;y bay trang bị h&agrave;ng loạt camera, ghi h&igrave;nh mọi hướng. Bộ xử l&yacute; của phi cơ sau đ&oacute; tổng hợp, ph&acirc;n t&iacute;ch những dữ liệu n&agrave;y, sau đ&oacute; tổng hợp ch&uacute;ng với nhau rồi tr&iacute;ch xuất h&igrave;nh ảnh to&agrave;n cảnh m&ocirc;i trường xung quanh ra bộ hiển thị gắn tr&ecirc;n mũ bảo hiểm. Ảnh:&nbsp;<em>US Defense Watch</em></p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p><img id="vne_slide_image_4" src="http://img.f31.vnecdn.net/2016/08/12/F35-Bis-armamento-twitter-1470985102_660x0.jpg" /><a href="javascript:void(0)">&nbsp;</a></p>\r\n\r\n<p>D&agrave;n vũ kh&iacute; m&agrave; c&aacute;c chiến đấu cơ F-35 sở hữu cũng được đ&aacute;nh gi&aacute; l&agrave; v&ocirc; c&ugrave;ng ấn tượng.&nbsp;Nh&agrave; thầu quốc ph&ograve;ng Mỹ&nbsp;Raytheon mới đ&acirc;y đ&atilde; liệt k&ecirc; danh s&aacute;ch những &quot;vũ kh&iacute; khủng&quot; c&oacute; thể lắp đặt cho si&ecirc;u ti&ecirc;m k&iacute;ch n&agrave;y&nbsp;để đ&aacute;nh bại c&aacute;c mối đe dọa mới ph&aacute;t sinh. Ch&uacute;ng bao gồm t&ecirc;n lửa&nbsp;AIM-9X Sidewinder, t&ecirc;n lửa kh&ocirc;ng đối kh&ocirc;ng tầm trung cải tiến (ARMAAM), t&ecirc;n lửa tấn c&ocirc;ng hỗn hợp (JSM), bom liệng JSOW, bom dẫn đường laser Paveway II hay bom đường k&iacute;nh nhỏ SDB II. Ảnh:&nbsp;<em>Twitter</em></p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p><img id="vne_slide_image_5" src="http://img.f29.vnecdn.net/2016/08/12/9-wiki-1470985106_660x0.jpg" /><a href="javascript:void(0)">&nbsp;</a></p>\r\n\r\n<p>Chia sẻ về cảm gi&aacute;c khi điều khiển ti&ecirc;m k&iacute;ch F-35, Schmidt cho hay &quot;việc bay v&agrave; hạ c&aacute;nh tr&ecirc;n mẫu chiến đấu cơ n&agrave;y thật sự tuyệt vời. M&aacute;y bay rất dễ điều khiển&quot;. Schmidt cũng th&ecirc;m rằng mẫu F-35A c&ograve;n sở hữu hệ thống l&aacute;i tự động ti&ecirc;n tiến.</p>\r\n\r\n<p>&quot;T&ocirc;i c&oacute; thể ra lệnh muốn bay ở độ cao n&agrave;y, tốc độ n&agrave;y hay muốn đi từ điểm n&agrave;y tới điểm kia rồi sau đ&oacute; cứ thế thoải m&aacute;i bỏ tay khỏi cần điều khiển v&agrave; m&aacute;y bay sẽ thực hiện ch&iacute;nh x&aacute;c những g&igrave; t&ocirc;i y&ecirc;u cầu&quot;, Schmidt khẳng định. Ảnh:<em>Wikipedia</em></p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p><img id="vne_slide_image_6" src="http://img.f32.vnecdn.net/2016/08/12/8-8-electronicsnews-1470985105_660x0.jpg" /><a href="javascript:void(0)">&nbsp;</a></p>\r\n\r\n<p>F-35 được đ&aacute;nh gi&aacute; l&agrave; si&ecirc;u ti&ecirc;m k&iacute;ch đắt nhất thế giới bởi theo chuy&ecirc;n gia ước t&iacute;nh, Washington phải bỏ ra tổng số tiền khoảng 1.400 tỷ USD để mua v&agrave; duy tr&igrave; hoạt động của một tổ hợp si&ecirc;u ti&ecirc;m k&iacute;ch F-35 gồm khoảng 2.400 chiếc. Ảnh:&nbsp;<em>electronicsnews.com</em></p>\r\n\r\n<p>F-35 được coi l&agrave; xương sống trong qu&aacute; tr&igrave;nh ph&aacute;t triển m&aacute;y bay chiến đấu tương lai của Washington. Đặc biệt, một trong những c&ocirc;ng nghệ gi&uacute;p F-35 thống trị bầu trời v&agrave; trở th&agrave;nh nỗi khiếp sợ đối với bất kỳ lực lượng qu&acirc;n đội n&agrave;o ch&iacute;nh l&agrave; khả năng tiếp nhi&ecirc;n liệu tr&ecirc;n kh&ocirc;ng, gi&uacute;p mở rộng phạm vi hoạt động.</p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p><img id="vne_slide_image_7" src="http://img.f31.vnecdn.net/2016/08/12/2012-12-121020-F-ZZ999-910-1438592547-1200x0-1470985816_660x0.jpg" /><a href="javascript:void(0)">&nbsp;</a></p>\r\n\r\n<p>Một chiếc F-35A đỗ tại căn cứ kh&ocirc;ng qu&acirc;n Edwards ở California. Đ&acirc;y l&agrave; phi&ecirc;n bản nhỏ nhất, nhẹ nhất v&agrave; l&agrave; mẫu duy nhất được trang bị ph&aacute;o GAU-12/U gắn trong th&acirc;n. Khẩu ph&aacute;o 25 mm n&agrave;y được ph&aacute;t triển từ ph&aacute;o M61 Vulcan 20 mm trang bị tr&ecirc;n c&aacute;c loại m&aacute;y bay chiến đấu của kh&ocirc;ng qu&acirc;n Mỹ từ thời F-104 Starfighter c&ograve;n hoạt động v&agrave; cũng được lắp đặt tr&ecirc;n phi cơ AV-8B Harrier II của lực lượng thủy qu&acirc;n lục chiến. F-35A kh&ocirc;ng chỉ vượt trội ở t&iacute;nh cơ động, phản ứng nhanh m&agrave; c&ograve;n thể hiện sự đột ph&aacute; ở khả năng t&agrave;ng h&igrave;nh, tầm bay v&agrave; tải trọng. Ảnh:&nbsp;<em>US Air Force</em></p>\r\n', '1471014364_2-f35-1470985103_660x0.jpg', 1, 1471014364, 47),
(18, 'Đạo quân tình báo đánh thuê cho Mỹ trên chiến trường Syria', 'Hồng Vân', '<h3>Mỹ hiện kh&ocirc;ng chỉ triển khai c&aacute;c chiến dịch oanh k&iacute;ch phiến qu&acirc;n Nh&agrave; nước Hồi gi&aacute;o ở Syria m&agrave; c&ograve;n chi bộn tiền để thu&ecirc; những c&ocirc;ng ty t&igrave;nh b&aacute;o tư nh&acirc;n thu thập th&ocirc;ng tin phục vụ cho cuộc chiến n&agrave;y.</h3>\r\n', '<p>Thường nhật, v&agrave;o l&uacute;c 17h, Lầu Năm G&oacute;c lại c&ocirc;ng bố một danh s&aacute;ch c&aacute;c hợp đồng k&yacute; kết trong ng&agrave;y trị gi&aacute; hơn 7 triệu USD. Ng&agrave;y 27/7, nằm lẫn trong email gửi cho giới b&aacute;o ch&iacute; l&agrave; một nội dung g&acirc;y ch&uacute; &yacute;: C&aacute;c nh&agrave; thầu qu&acirc;n sự sẽ hoạt động ở Syria song song với khoảng 300 binh sĩ Mỹ đ&atilde; được triển khai tới khu vực.</p>\r\n\r\n<p>Đ&acirc;y l&agrave; lần đầu ti&ecirc;n Lầu Năm G&oacute;c c&ocirc;ng khai thừa nhận vai tr&ograve; của c&aacute;c nh&agrave; thầu tư nh&acirc;n trong cuộc chiến chống Nh&agrave; nước Hồi gi&aacute;o (IS) ở Syria. Đ&acirc;y cũng l&agrave; một t&iacute;n hiệu kh&aacute;c cho thấy qu&acirc;n đội Mỹ đang can dự kh&aacute; s&acirc;u v&agrave;o việc quyết định số phận đất nước n&agrave;y, theo<em>&nbsp;</em><em>Daily Beast.</em></p>\r\n\r\n<p>Nh&agrave; thầu t&igrave;nh b&aacute;o tư nh&acirc;n</p>\r\n\r\n<p>Th&ocirc;ng tin mới c&ocirc;ng bố về hợp đồng của Lầu Năm G&oacute;c cho biết Six3 Intelligence Solutions, một nh&agrave; thầu t&igrave;nh b&aacute;o tư nh&acirc;n do c&ocirc;ng ty CACI International, Mỹ, mua lại gần đ&acirc;y, đ&atilde; tr&uacute;ng hợp đồng của lục qu&acirc;n, trị gi&aacute; 10 triệu USD, để &quot;cung cấp c&aacute;c dịch vụ ph&acirc;n t&iacute;ch t&igrave;nh b&aacute;o&quot;. Theo Bộ Quốc ph&ograve;ng Mỹ, c&ocirc;ng việc n&agrave;y sẽ phải ho&agrave;n tất v&agrave;o năm sau ở Đức, Italy v&agrave; đặc biệt l&agrave; Syria. Chi tiết về bản hợp đồng hiện rất &iacute;t ỏi n&ecirc;n kh&oacute; để x&aacute;c định c&oacute; bao nhi&ecirc;u nh&acirc;n vi&ecirc;n Six3 Intelligence Solutions đến Syria.</p>\r\n\r\n<p>Cả Lầu Năm G&oacute;c lẫn CACI International đều kh&ocirc;ng tiết lộ th&ecirc;m về loại h&igrave;nh c&ocirc;ng việc m&agrave; Six3 Intelligence Solutions sẽ đảm nhận, ngo&agrave;i th&ocirc;ng tin chung l&agrave; &quot;thực hiện dịch vụ ph&acirc;n t&iacute;ch t&igrave;nh b&aacute;o&quot; vốn v&ocirc; c&ugrave;ng đa dạng.</p>\r\n\r\n<p>Tuy nhi&ecirc;n, theo gi&aacute;o sư Sean McFate từ Trường Ngoại giao thuộc Đại học Georgetown, Mỹ, t&aacute;c giả của cuốn s&aacute;ch &quot;Cuộc chiến b&oacute;ng đ&ecirc;m&quot; (Shadow War), đ&acirc;y kh&ocirc;ng phải một nh&agrave; thầu b&igrave;nh thường.</p>\r\n\r\n<p>&quot;Six3 Intelligence Solutions l&agrave; một c&ocirc;ng ty t&igrave;nh b&aacute;o tư nh&acirc;n. Khi phải thu&ecirc; người ngo&agrave;i đảm nhận c&ocirc;ng việc ph&acirc;n t&iacute;ch t&igrave;nh b&aacute;o, ch&uacute;ng ta sẽ bị phụ thuộc v&agrave;o khu vực tư nh&acirc;n để tiến h&agrave;nh c&aacute;c hoạt động quan trọng, chiến lược trong thời chiến&quot;, &ocirc;ng McFate nhận định.</p>\r\n\r\n<p>Six3 Intelligence Solutions được cho l&agrave; sẽ g&aacute;nh phần lớn c&ocirc;ng việc từ c&aacute;c cơ quan t&igrave;nh b&aacute;o chuy&ecirc;n về sinh trắc học hay nhận dạng cũng như do th&aacute;m v&agrave; kh&ocirc;ng gian mạng. Cựu gi&aacute;m đốc điều h&agrave;nh Six3 Intelligence Solutions cho hay 95% nh&acirc;n vi&ecirc;n c&ocirc;ng ty đ&atilde; vượt qua mức kiểm tra an ninh cao nhất.</p>\r\n\r\n<p>Website phi&ecirc;n bản cũ của Six3 Intelligence Solutions giới thiệu về bộ phận sinh trắc học thuộc c&ocirc;ng ty như sau: &quot;Chuy&ecirc;n m&ocirc;n của ch&uacute;ng t&ocirc;i trải rộng từ thẩm định ng&oacute;n tay, l&ograve;ng b&agrave;n tay, gương mặt v&agrave; mống mắt cho đến khai th&aacute;c hay ph&acirc;n t&iacute;ch ph&aacute;p y&quot;.</p>\r\n\r\n<p>Những hợp đồng giữa Six3 Intelligence Solutions v&agrave; qu&acirc;n đội Mỹ trước đ&acirc;y rất hiếm hoi, chỉ bao gồm một số hợp đồng cung cấp c&aacute;c dịch vụ t&igrave;nh b&aacute;o ở Afghanistan v&agrave; ch&acirc;u &Acirc;u, trợ gi&uacute;p Chương tr&igrave;nh chống Nổi loạn (CITP) hay hỗ trợ hoạt động cho Trung t&acirc;m T&igrave;nh b&aacute;o Mặt đất Quốc gia của lục qu&acirc;n c&ugrave;ng c&aacute;c lực lượng Mỹ ở Afghanistan.</p>\r\n\r\n<p>CACI International mua lại Six3 Intelligence Solutions với gi&aacute; 820 triệu USD hồi năm 2013 v&agrave; m&ocirc; tả đ&acirc;y l&agrave; &quot;thương vụ lớn nhất&quot; trong lịch sử 51 năm của c&ocirc;ng ty n&agrave;y.</p>\r\n\r\n<p>Thời điểm đ&oacute;, gi&aacute;m đốc điều h&agrave;nh CACI International Ken Asbury n&oacute;i &ocirc;ng tin rằng Six3 Intelligence Solutions sẽ mở ra th&ecirc;m c&aacute;c cơ hội k&yacute; kết hợp đồng mới với gi&aacute; trị l&ecirc;n tới 15 tỷ USD.</p>\r\n\r\n<p>Thực tế, CACI International đ&atilde; cung cấp dịch vụ hỗ trợ cho qu&acirc;n đội Mỹ suốt nhiều năm qua, bao gồm cắt cử nh&acirc;n vi&ecirc;n thẩm vấn l&agrave;m việc tại nh&agrave; t&ugrave; Abu Ghraib ở Iraq v&agrave;o năm 2004, thời điểm vụ b&ecirc; bối ngược đ&atilde;i t&ugrave; nh&acirc;n tại đ&acirc;y bị bại lộ.</p>\r\n\r\n<p>&quot;Nh&acirc;n vi&ecirc;n thầu l&agrave;m nhiều c&ocirc;ng việc kh&aacute;c nhau, kh&ocirc;ng chỉ l&aacute;i xe tải v&agrave; nấu ăn. Họ thu thập th&ocirc;ng tin t&igrave;nh b&aacute;o, cầm s&uacute;ng chiến đấu v&agrave; hỗ trợ c&aacute;c chiến dịch đặc biệt&quot;, gi&aacute;o sư McFate n&oacute;i.</p>\r\n\r\n<p>Gấp đ&ocirc;i số lượng</p>\r\n\r\n<p>Tới nay, người ta vẫn chưa nắm được nhiều th&ocirc;ng tin về những nh&acirc;n vi&ecirc;n trực thuộc nh&agrave; thầu tư nh&acirc;n đang cộng t&aacute;c với c&aacute;c binh sĩ Mỹ ở Syria. Song theo những chuy&ecirc;n gia về c&aacute;c chiến dịch đặc biệt v&agrave; hợp đồng qu&acirc;n sự, Six3 Intelligence Solutions kh&ocirc;ng phải nh&agrave; thầu tư nh&acirc;n đầu ti&ecirc;n hiện diện ở Syria.</p>\r\n\r\n<p>&quot;L&acirc;u nay t&ocirc;i vẫn n&oacute;i qu&acirc;n đội Mỹ phụ thuộc v&agrave;o c&aacute;c nh&agrave; thầu chuy&ecirc;n nghiệp giống như thẻ t&iacute;n dụng American Express vậy. Họ chẳng d&aacute;m rời khỏi nh&agrave; m&agrave; kh&ocirc;ng mang theo ch&uacute;ng&quot;, David Isenberg, t&aacute;c giả cuốn s&aacute;ch &quot;Lực lượng v&ocirc; h&igrave;nh: C&aacute;c nh&agrave; thầu an ninh tư nh&acirc;n ở Iraq&quot; (Shadow Force: Private Security contractors in Iraq), b&igrave;nh luận. &Ocirc;ng nhấn mạnh cộng đồng t&igrave;nh b&aacute;o Mỹ hiện phụ thuộc rất nhiều v&agrave;o c&aacute;c nh&agrave; thầu tư nh&acirc;n.</p>\r\n\r\n<p>Tuy nhi&ecirc;n, v&igrave; t&iacute;nh chất nguy hiểm v&agrave; cực kỳ nhạy cảm của sứ mệnh ở Syria, rất &iacute;t th&ocirc;ng tin về nh&agrave; thầu tư nh&acirc;n được giải mật. Tại Iraq, nơi hơn 4.000 l&iacute;nh bộ binh Mỹ đ&oacute;ng qu&acirc;n, Lầu Năm G&oacute;c cung cấp th&ocirc;ng tin minh bạch hơn. Kể từ m&ugrave;a h&egrave; năm ngo&aacute;i, số nh&acirc;n vi&ecirc;n của c&aacute;c nh&agrave; thầu tư nh&acirc;n l&agrave;m việc cho Bộ Quốc ph&ograve;ng Mỹ đ&atilde; tăng gần gấp đ&ocirc;i từ 1.300 l&ecirc;n 2.500 người.</p>\r\n\r\n<p>Những c&ocirc;ng ty tư cung cấp mọi thứ, từ bữa ăn cho đến an ninh v&ograve;ng ngo&agrave;i ở căn cứ Besmaya hay căn cứ Camp Taji, địa điểm m&agrave; c&aacute;c binh sĩ Mỹ huấn luyện l&iacute;nh Iraq chiến đấu chống IS. Năm 2015, chỉ 98 người tham gia những dịch vụ hỗ trợ c&aacute;c căn cứ n&agrave;y. Đến nay, con số tăng l&ecirc;n 390 người, bao gồm nh&acirc;n vi&ecirc;n thầu Mỹ, những c&ocirc;ng d&acirc;n từ nước thứ ba v&agrave; người Iraq, theo một b&aacute;o c&aacute;o từ Bộ Chỉ huy Trung ương Mỹ c&ocirc;ng bố th&aacute;ng trước.</p>\r\n\r\n<p>Song đ&acirc;y chỉ l&agrave; dữ liệu Lầu Năm G&oacute;c đưa ra. Con số nh&acirc;n vi&ecirc;n từ c&aacute;c nh&agrave; thầu tư nh&acirc;n m&agrave; ch&iacute;nh phủ Mỹ sử dụng c&ograve;n cao hơn nhiều. B&aacute;o c&aacute;o của Bộ Chỉ huy Trung ương cho biết gần 7.000 nh&acirc;n vi&ecirc;n thầu đang hỗ trợ hoạt động của ch&iacute;nh phủ Mỹ ở Iraq.</p>\r\n\r\n<p>Hồi th&aacute;ng 11 năm ngo&aacute;i, Lầu Năm G&oacute;c lần đầu ti&ecirc;n th&ocirc;ng b&aacute;o điều l&iacute;nh đặc nhiệm Mỹ đến bắc Syria để tư vấn cho c&aacute;c lực lượng chống phiến qu&acirc;n IS tại đ&acirc;y. Trước đ&oacute;, Cục T&igrave;nh b&aacute;o Trung ương Mỹ (CIA) được cho l&agrave; đ&atilde; triển khai một chương tr&igrave;nh b&iacute; mật ở Syria nhằm tăng cường vũ trang cho những nh&oacute;m nổi dậy. Nếu c&aacute;c nh&agrave; thầu tư nh&acirc;n hỗ trợ sứ mệnh của CIA, chi tiết về nhiệm vụ n&agrave;y sẽ nằm trong danh s&aacute;ch những th&ocirc;ng tin tuyệt mật.</p>\r\n\r\n<p>Hồi th&aacute;ng 4, Mỹ ch&iacute;nh thức mở rộng hiện diện qu&acirc;n sự ở Syria sau khi Tổng thống Barack Obama tuy&ecirc;n bố sẽ gửi 250 l&iacute;nh đặc nhiệm tới hỗ trợ c&aacute;c tay s&uacute;ng địa phương chống IS.</p>\r\n\r\n<p>Với số binh sĩ mặt đất tăng l&ecirc;n, c&aacute;c cơ sở hạ tầng ở địa phương được &acirc;m thầm tu bổ hoặc x&acirc;y mới để hỗ trợ họ cũng như c&aacute;c tay s&uacute;ng m&agrave; họ cố vấn. V&iacute; dụ, chiều d&agrave;i đường băng ở thị trấn Hasakah, bắc Syria, đang nằm dưới sự kiểm so&aacute;t của lực lượng người Kurd, đ&atilde; được tăng gấp đ&ocirc;i để c&oacute; thể tiếp nhận c&aacute;c loại m&aacute;y bay lớn hơn.</p>\r\n\r\n<p>Khi m&agrave; cuộc chiến chống IS vẫn k&eacute;o d&agrave;i, Iraq v&agrave; Syria sẽ tiếp tục l&agrave; mảnh đất kinh doanh b&eacute;o bở cho những nh&agrave; thầu quốc ph&ograve;ng. Nhưng c&aacute;c hợp đồng gi&aacute; trị nhất chỉ thực sự đến khi qu&aacute; tr&igrave;nh t&aacute;i thiết bắt đầu. Mỹ đ&atilde; chi 60 tỷ USD cho c&aacute;c nỗ lực t&aacute;i thiết ở Iraq v&agrave; con số n&agrave;y tại Afghanistan l&agrave; 110 tỷ USD.</p>\r\n\r\n<p>Bộ trưởng Quốc ph&ograve;ng Mỹ Ashton Carter tuần trước ph&aacute;t t&iacute;n hiệu rằng sau khi IS bị đ&aacute;nh bật khỏi c&aacute;c thị trấn v&agrave; th&agrave;nh phố ở Iraq v&agrave; Syria, cơ hội cho c&aacute;c nh&agrave; thầu tư nh&acirc;n l&agrave; rất lớn.</p>\r\n\r\n<p>&quot;Sẽ c&oacute; nhiều thị trấn cần t&aacute;i thiết, c&aacute;c dịch vụ cần được thiết lập lại v&agrave; những cộng đồng phải được kh&ocirc;i phục&quot;, &ocirc;ng Carter n&oacute;i h&ocirc;m 27/7 tại Fort Bragg, bang Bắc Carolina.</p>\r\n\r\n<p>&quot;Đ&oacute; kh&ocirc;ng phải c&ocirc;ng việc ch&iacute;nh của người Mỹ. Ch&uacute;ng ta sẽ đ&oacute;ng vai tr&ograve; nhất định trong nỗ lực n&agrave;y nhưng h&atilde;y nhớ rằng hơn hai tỷ USD từ c&aacute;c cam kết t&aacute;i thiết m&agrave; ch&uacute;ng ta nhận v&agrave;o tuần trước phần lớn sẽ được thực hiện th&ocirc;ng qua c&aacute;c cơ quan d&acirc;n sự v&agrave; theo lệ thường, họ sẽ sử dụng những nh&agrave; thầu tư nh&acirc;n để l&agrave;m điều n&agrave;y&quot;, &ocirc;ng Carter n&oacute;i trước c&aacute;c ph&oacute;ng vi&ecirc;n.</p>\r\n', '1471014430_anh-2-6451-1470826182.jpg', 1, 1471014430, 48),
(19, 'Siu Black được khen gầy hơn khi đi tập nhạc', 'Kiên Trinh', '<h3>Nữ ca sĩ nhận nhiều lời &quot;c&oacute; c&aacute;nh&quot; khi tới buổi duyệt trước liveshow của Nguyễn Cường ở H&agrave; Nội.</h3>\r\n', '<p><img alt="Siu Black được khen gầy hơn khi đi tập nhạc" id="vne_slide_image_0" src="http://img.f11.giaitri.vnecdn.net/2016/08/12/IMG-8678-1470992397_660x0.jpg" />&nbsp;</p>\r\n\r\n<p>Vừa trở về H&agrave; Nội, Siu Black đ&atilde; đến địa điểm tập luyện v&agrave; chuẩn bị cho liveshow của nhạc sĩ Nguyễn Cường.</p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p><img alt="Siu Black được khen gầy hơn khi đi tập nhạc" id="vne_slide_image_1" src="http://img.f10.giaitri.vnecdn.net/2016/08/12/IMG-8687-1470992397_660x0.jpg" />&nbsp;</p>\r\n\r\n<p>C&ocirc; cho biết đ&acirc;y l&agrave; đ&ecirc;m nhạc ri&ecirc;ng đầu ti&ecirc;n của người đ&atilde; gi&uacute;p m&igrave;nh ghi dấu trong l&agrave;ng nhạc Việt n&ecirc;n khi được ngỏ lời, nữ ca sĩ đ&atilde; đồng &yacute; ngay.</p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p><img alt="Siu Black được khen gầy hơn khi đi tập nhạc" id="vne_slide_image_2" src="http://img.f11.giaitri.vnecdn.net/2016/08/12/IMG-8742-1470992398_660x0.jpg" />&nbsp;</p>\r\n\r\n<p>Siu Black được những người c&oacute; mặt tại buổi tập khen l&agrave; gầy v&agrave; trẻ trung hơn trước. Chị mặc &aacute;o đỏ xẻ cổ tr&aacute;i tim v&agrave; trang điểm nhẹ, son m&ocirc;i c&ugrave;ng t&ocirc;ng với &aacute;o.</p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p><img alt="Siu Black được khen gầy hơn khi đi tập nhạc" id="vne_slide_image_3" src="http://img.f9.giaitri.vnecdn.net/2016/08/12/IMG-8745-1470990487_660x0.jpg" />&nbsp;</p>\r\n\r\n<p>Nguyễn Cường từng t&acirc;m sự &ocirc;ng v&agrave; Siu Black l&agrave; tri kỷ trong &acirc;m nhạc bởi nữ ca sĩ thể hiện được trọn vẹn t&acirc;m hồn T&acirc;y Nguy&ecirc;n, c&ugrave;ng sự khao kh&aacute;t v&agrave; cuồng nhiệt của nhạc sĩ trong mỗi t&aacute;c phẩm.</p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p><img alt="Siu Black được khen gầy hơn khi đi tập nhạc" id="vne_slide_image_4" src="http://img.f12.giaitri.vnecdn.net/2016/08/12/IMG-8318-1470990483_660x0.jpg" />&nbsp;</p>\r\n\r\n<p>T&ugrave;ng Dương sẽ h&aacute;t bốn ca kh&uacute;c trong đ&ecirc;m nhạc. Anh t&acirc;m sự số lượng b&agrave;i cho m&igrave;nh như vậy &quot;vẫn hơi &iacute;t&quot; v&agrave; muốn tr&igrave;nh diễn nhiều s&aacute;ng t&aacute;c của Nguyễn Cường hơn.</p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p><img alt="Siu Black được khen gầy hơn khi đi tập nhạc" id="vne_slide_image_5" src="http://img.f10.giaitri.vnecdn.net/2016/08/12/IMG-8365-1470990484_660x0.jpg" />&nbsp;</p>\r\n\r\n<p>&Ecirc;k&iacute;p muốn đưa ch&acirc;n dung &acirc;m nhạc của Nguyễn Cường vừa dữ dội v&agrave; dịu &ecirc;m đến kh&aacute;n giả.</p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p><img alt="Siu Black được khen gầy hơn khi đi tập nhạc" id="vne_slide_image_6" src="http://img.f12.giaitri.vnecdn.net/2016/08/12/IMG-8588-1470990484_660x0.jpg" />&nbsp;</p>\r\n\r\n<p>Trong buổi tập, nữ ca sĩ Thanh Lam cũng khiến nhạc sĩ Nguyễn Cường hạnh ph&uacute;c bởi sự nồng n&agrave;n, say đắm của chị trong từng ca kh&uacute;c.</p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p><img alt="Siu Black được khen gầy hơn khi đi tập nhạc" id="vne_slide_image_7" src="http://img.f11.giaitri.vnecdn.net/2016/08/12/IMG-8611-1470990485_660x0.jpg" />&nbsp;</p>\r\n\r\n<p>Nguyễn Cường b&agrave;y tỏ sự n&ocirc;n n&oacute;ng chờ đến liveshow đầu ti&ecirc;n.</p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p><img alt="Siu Black được khen gầy hơn khi đi tập nhạc" id="vne_slide_image_8" src="http://img.f12.giaitri.vnecdn.net/2016/08/12/IMG-8651-1470992397_660x0.jpg" />&nbsp;</p>\r\n\r\n<p>Đ&ecirc;m nhạc&nbsp;<em>Tuổi thơ t&ocirc;i H&agrave; Nội&nbsp;</em>của Nguyễn Cường sẽ tổ chức v&agrave;o tối 13 v&agrave; 14/8 tại H&agrave; Nội.</p>\r\n', '1471014508_img-8678-1470992397_660x0.jpg', 1, 1471014508, 61),
(20, 'Hakan Sukur bị truy nã sau cuộc đảo chính bất thành', 'Quang Huy', '<h3>Cầu thủ nổi danh nhất trong lịch sử b&oacute;ng đ&aacute; Thổ Nhĩ Kỳ đang bị giới cầm quyền nước n&agrave;y truy bắt v&igrave; tội phản động.</h3>\r\n', '<p>Hakan Sukur, đội trưởng tuyển Thổ Nhĩ Kỳ gi&agrave;nh HC đồng World Cup 2002, tham gia v&agrave;o cuộc đảo ch&iacute;nh v&agrave;o ng&agrave;y 15/7 với mục đ&iacute;ch lật đổ tổng thống&nbsp;Recep Tayyip Erdogan.</p>\r\n\r\n<table align="center" border="0" cellpadding="3" cellspacing="0">\r\n	<tbody>\r\n		<tr>\r\n			<td><img alt="hakan-sukur-bi-truy-na-sau-cuoc-dao-chinh-bat-thanh" src="http://img.f1.thethao.vnecdn.net/2016/08/12/Untitled-1-1820-1470992867.jpg" /></td>\r\n		</tr>\r\n		<tr>\r\n			<td>\r\n			<p>Sukur thời c&ograve;n thi đấu cho Galatasaray. Ảnh:&nbsp;<em>AFP</em>.</p>\r\n			</td>\r\n		</tr>\r\n	</tbody>\r\n</table>\r\n\r\n<p>Hồi th&aacute;ng hai, Sukur từng bị buộc tội sỉ nhục Tổng thống Recep Tayyip Erdogan tr&ecirc;n&nbsp;<em>Twitter</em>&nbsp;,v&agrave; d&ugrave; cựu tiền đạo n&agrave;y n&oacute;i anh kh&ocirc;ng &aacute;m chỉ đến vị l&atilde;nh đạo đất nước, c&aacute;c c&ocirc;ng tố vi&ecirc;n vẫn tuy&ecirc;n bố rằng những d&ograve;ng anh viết tr&ecirc;n mạng x&atilde; hội &quot;r&otilde; r&agrave;ng li&ecirc;n quan&quot; đến &ocirc;ng Erdogan. Sukur v&agrave; gia đ&igrave;nh được cho l&agrave; đ&atilde; sang Mỹ sống từ năm ngo&aacute;i.</p>\r\n\r\n<p>Hakan Sukur thi đấu b&oacute;ng đ&aacute; chuy&ecirc;n nghiệp từ năm 1987 đến 2007. Anh l&agrave; tiền đạo hay nhất trong lịch sử đội tuyển Thổ Nhĩ Kỳ, ghi 51 b&agrave;n sau 112 lần ra s&acirc;n. Từng đoạt h&agrave;ng loạt danh hiệu quốc nội v&agrave; Cup UEFA trong m&agrave;u &aacute;o Galatasaray, Sukur c&ograve;n kho&aacute;c &aacute;o c&aacute;c CLB nước ngo&agrave;i như Torino, Inter Milan, Parma v&agrave; Blackburn.</p>\r\n\r\n<p>Tại World Cup 2002, Sukur đeo băng đội trưởng, đưa đội tuyển Thổ Nhĩ Kỳ đến vị tr&iacute; thứ ba, th&agrave;nh t&iacute;ch tốt nhất của b&oacute;ng đ&aacute; nước n&agrave;y. Năm 2008, sau khi giải nghệ,&nbsp;anh bắt đầu tham gia hoạt động ch&iacute;nh trị, từng được bầu l&agrave;m nghị sĩ quốc hội Thổ Nhĩ Kỳ trong cuộc tổng tuyển cử 2011.</p>\r\n', '1471014607_untitled-1-1820-1470992867.jpg', 1, 1471014607, 63);

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `id` int(10) NOT NULL,
  `user` varchar(200) NOT NULL,
  `pass` varchar(100) NOT NULL,
  `level` tinyint(3) NOT NULL DEFAULT '2'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `category`
--
ALTER TABLE `category`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id` (`id`);

--
-- Indexes for table `news`
--
ALTER TABLE `news`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `category`
--
ALTER TABLE `category`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=79;
--
-- AUTO_INCREMENT for table `news`
--
ALTER TABLE `news`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;
--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
