-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Anamakine: 127.0.0.1:3306
-- Üretim Zamanı: 07 Eki 2024, 11:36:57
-- Sunucu sürümü: 5.7.40
-- PHP Sürümü: 8.1.13

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Veritabanı: `mydb`
--

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `about`
--

DROP TABLE IF EXISTS `about`;
CREATE TABLE IF NOT EXISTS `about` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(191) COLLATE utf8_turkish_ci DEFAULT NULL,
  `content` longtext COLLATE utf8_turkish_ci,
  `skills` text COLLATE utf8_turkish_ci,
  `date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=2 DEFAULT CHARSET=utf8 COLLATE=utf8_turkish_ci;

--
-- Tablo döküm verisi `about`
--

INSERT INTO `about` (`id`, `name`, `content`, `skills`, `date`) VALUES
(1, 'Tamir KARAHAN', 'İhsan Mermerci Mesleki ve Teknik Anadolu Lisesi’nde 20 yıldır bilişim teknolojileri öğretmeni olarak görev yapıyorum. Yazılım alanındaki uzmanlığımı öğrencilerime aktarmaktan büyük bir keyif alıyorum. Mesleğe adım attığımdan bu yana birçok teknolojik değişime tanıklık ettim ve kendimi bu değişimlere adapte etmeye özen gösterdim. Bilgisayar programlama dillerinin sürekli gelişen dünyasında, öğrencilere temel yazılım becerilerini kazandırmanın yanı sıra analitik düşünme yeteneklerini de geliştirmeyi amaçlıyorum.\r\n\r\nYazılım dersleri verirken en çok üzerinde durduğum nokta, öğrencilere yalnızca kod yazmayı öğretmek değil, aynı zamanda problem çözme ve algoritmik düşünme yeteneği kazandırmak. Eğitimde yenilikçi yaklaşımları benimsemek ve öğrencilerin güncel teknolojilere olan ilgisini canlı tutmak için sürekli kendimi geliştirmeye çalışıyorum. Hem klasik programlama dillerine hâkimiyet kazandırırken hem de güncel yazılım trendlerine uygun ders içerikleri oluşturarak onların geleceğin dünyasına hazır olmalarını sağlamayı hedefliyorum.\r\n\r\nÖğretmenlik hayatım boyunca birçok öğrencimin yazılım dünyasında başarılı kariyerler inşa ettiğini görmek en büyük gurur kaynaklarımdan biri oldu. Eğitim sürecinde sadece teorik bilgilerin değil, pratik uygulamaların da büyük önem taşıdığını düşünüyorum. Bu nedenle sınıf ortamında öğrencilere gerçek dünya projeleri üzerinden deneyim kazandırmaya çalışıyorum. Öğrencilerimin yaratıcı projeler üretebilmeleri için onları teşvik ediyorum ve onları gelecekte karşılaşabilecekleri mesleki zorluklara hazırlıyorum.\r\n\r\nTeknoloji sürekli değişen ve gelişen bir alan olduğu için, öğretmen olarak da kendimi güncel tutmak adına düzenli olarak seminerler, kurslar ve konferanslara katılmayı önemsiyorum. Bu sayede hem kendi bilgi birikimimi güncel tutuyor hem de öğrencilere en yeni teknolojik trendleri aktarmayı amaçlıyorum. Ayrıca, teknolojinin sadece bir araç değil, aynı zamanda bir çözüm ortağı olduğunu anlatmaya çalışarak öğrencilere mesleki etik ve sorumluluk bilincini de aşılamaya özen gösteriyorum.\r\n\r\nMeslek hayatım boyunca aldığım deneyimlerle, öğrencilerimin kişisel gelişimlerini desteklemeye ve onları geleceğin bilişim uzmanları olarak yetiştirmeye kararlıyım. Eğitim hayatımın her gününü öğrencilerim için yeni bir kapı açma fırsatı olarak görüyorum ve onların hayatlarında kalıcı izler bırakabilmek için tutkuyla çalışmaya devam ediyorum.', 'Grafik, Tasarım, Mobil, Web, Masaüstü Yazılım,', '2024-09-30 11:01:12');

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `blogs`
--

DROP TABLE IF EXISTS `blogs`;
CREATE TABLE IF NOT EXISTS `blogs` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `header` varchar(200) COLLATE utf8_turkish_ci NOT NULL,
  `content` longtext COLLATE utf8_turkish_ci NOT NULL,
  `imageurl` varchar(200) COLLATE utf8_turkish_ci NOT NULL,
  `date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `status` int(11) NOT NULL DEFAULT '1' COMMENT '1 ise yayında, 0 ise yayından kaldırılmış.',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_turkish_ci;

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `messages`
--

DROP TABLE IF EXISTS `messages`;
CREATE TABLE IF NOT EXISTS `messages` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(200) COLLATE utf8_turkish_ci NOT NULL,
  `email` varchar(200) COLLATE utf8_turkish_ci NOT NULL,
  `subject` varchar(200) COLLATE utf8_turkish_ci NOT NULL,
  `message` text COLLATE utf8_turkish_ci NOT NULL,
  `status` int(11) NOT NULL DEFAULT '0' COMMENT '0 ise okunmadı, 1 ise okundu, 2 ise cevaplandı',
  `date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_turkish_ci;

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `users`
--

DROP TABLE IF EXISTS `users`;
CREATE TABLE IF NOT EXISTS `users` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(200) COLLATE utf8_turkish_ci DEFAULT NULL,
  `email` varchar(200) COLLATE utf8_turkish_ci NOT NULL,
  `password` varchar(200) COLLATE utf8_turkish_ci NOT NULL,
  `date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `who` int(11) NOT NULL DEFAULT '0' COMMENT '0 kullanıcı, 1 yönetici,',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_turkish_ci;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
