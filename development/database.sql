-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: db
-- Generation Time: Mar 01, 2024 at 06:57 PM
-- Server version: 8.3.0
-- PHP Version: 8.2.8

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `nickspaarg_demi`
--

-- --------------------------------------------------------

--
-- Table structure for table `afbeeldingen`
--

CREATE TABLE `afbeeldingen` (
  `id` int UNSIGNED NOT NULL,
  `omschrijving` varchar(100) DEFAULT NULL,
  `link` varchar(100) DEFAULT NULL,
  `uploaddatum` varchar(50) DEFAULT NULL,
  `bestandsgrootte` varchar(100) DEFAULT NULL,
  `gebruiker` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3;

-- --------------------------------------------------------

--
-- Table structure for table `formulier`
--

CREATE TABLE `formulier` (
  `id` int UNSIGNED NOT NULL,
  `naam` varchar(50) DEFAULT NULL,
  `email` varchar(100) DEFAULT NULL,
  `bericht` varchar(1000) DEFAULT NULL,
  `tijd` varchar(50) DEFAULT NULL,
  `ip` varchar(50) DEFAULT NULL,
  `gelezen` int DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `inlogpogingen`
--

CREATE TABLE `inlogpogingen` (
  `id` int UNSIGNED NOT NULL,
  `gebruikersnaam` varchar(50) DEFAULT NULL,
  `wachtwoord` varchar(50) DEFAULT NULL,
  `tijd` varchar(50) DEFAULT NULL,
  `ip` varchar(50) DEFAULT NULL,
  `verwijderd` int DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `instellingen`
--

CREATE TABLE `instellingen` (
  `id` int UNSIGNED NOT NULL,
  `projectnaam` varchar(30) DEFAULT NULL,
  `auteur` varchar(100) DEFAULT NULL,
  `zoomen` int DEFAULT NULL,
  `email` varchar(100) DEFAULT NULL,
  `analytics` varchar(500) DEFAULT NULL,
  `footer` varchar(1000) DEFAULT NULL,
  `siteonline` int DEFAULT NULL,
  `afbeeldingentonen` int DEFAULT NULL,
  `headertonen` int DEFAULT NULL,
  `hotjar` varchar(500) DEFAULT NULL,
  `description` varchar(500) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `instellingen`
--

INSERT INTO `instellingen` (`id`, `projectnaam`, `auteur`, `zoomen`, `email`, `analytics`, `footer`, `siteonline`, `afbeeldingentonen`, `headertonen`, `hotjar`, `description`) VALUES
(1, 'Demi Spaargaren', 'Demi Spaargaren', 0, 'email@email.com', '', '<p>dit is de footrrrr.</p>\r\n', 1, 0, 0, '', '                    Demi Spaargaren                    ');

-- --------------------------------------------------------

--
-- Table structure for table `links`
--

CREATE TABLE `links` (
  `id` int UNSIGNED NOT NULL,
  `link` varchar(100) DEFAULT NULL,
  `naam` varchar(60) DEFAULT NULL,
  `clicks` varchar(10) DEFAULT NULL,
  `url` varchar(100) DEFAULT NULL,
  `doel` int DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3;

--
-- Dumping data for table `links`
--

INSERT INTO `links` (`id`, `link`, `naam`, `clicks`, `url`, `doel`) VALUES
(1, 'facebook', 'Facebook', '99', '', 0),
(2, 'twitter', 'Twitter', '1', '', 0),
(3, 'googleplus', 'Google Plus', '0', '', 0),
(4, 'instagram', 'Instagram', '89', '', 0);

-- --------------------------------------------------------

--
-- Table structure for table `paginas`
--

CREATE TABLE `paginas` (
  `id` int UNSIGNED NOT NULL,
  `volgorde` int DEFAULT NULL,
  `titel` varchar(50) DEFAULT NULL,
  `meta_description` varchar(200) NOT NULL,
  `link` varchar(200) DEFAULT NULL,
  `header` varchar(10000) DEFAULT NULL,
  `content` mediumtext,
  `speciale_button` varchar(10) DEFAULT NULL,
  `aanmaakdatum` varchar(50) DEFAULT NULL,
  `timestamp` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `paginas`
--

INSERT INTO `paginas` (`id`, `volgorde`, `titel`, `meta_description`, `link`, `header`, `content`, `speciale_button`, `aanmaakdatum`, `timestamp`) VALUES
(1, 0, 'Home', '', 'home', '', '<p style=\"text-align:right\">&nbsp;</p>\r\n\r\n<p style=\"text-align:right\">&nbsp;</p>\r\n\r\n<p style=\"text-align:right\"><img alt=\"\" src=\"https://demispaargaren.nl/uploads/Demi_home_2.png\" style=\"height:750px; width:1000px\" /></p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p>Ik ben Demi Spaargaren; een Grafisch Vormgever &amp; student Communication &amp; Multimedia Design aan de Hogeschool Utrecht. Tijdens mijn studie heb ik de minor Datavisualisatie &amp; Infographics en de profilering Human-Centered Design succesvol afgerond, waarna ik nu druk ben met een afstudeerproject bij Jellow!<br />\r\n&nbsp;</p>\r\n\r\n<p>Al meer dan 9&nbsp;jaar werk ik bijna dagelijks met programma&#39;s zoals Photoshop, Illustrator en InDesign. Daarnaast heb ik ook ervaring met After Effects, Premiere Pro en Lightroom en werk ik graag met programma&#39;s zoals Sketch, Figma, Framer en ProtoPie.</p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p><img alt=\"\" src=\"https://demispaargaren.nl/uploads/Ik%20met%20apps.png\" style=\"height:530px; width:250px\" /></p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p>Ik houd ervan om nieuwe dingen te leren en wil graag over alles een beetje te weten komen. Ik ben graag breed inzetbaar, maar hoop mijzelf ook te gaan specialiseren.</p>\r\n\r\n<p><br />\r\nVoor meer werk van mij kun je altijd op een van mijn Instagram kanalen kijken.</p>\r\n\r\n<h4><a href=\"https://www.instagram.com/demispaargaren.nl/\" target=\"_blank\"><span style=\"color:#febc11\"><strong>@demispaargaren.nl</strong></span></a><span style=\"color:#000000\"><a href=\"https://www.instagram.com/demispaargaren.nl/\" target=\"_blank\"> </a>(Graphic Design)</span><br />\r\n<a href=\"https://www.instagram.com/demispaargaren/\" target=\"_blank\"><span style=\"color:#febc11\"><strong>@demispaargaren</strong></span></a><span style=\"color:#000000\"> (Fotografie)</span><br />\r\n<strong><a href=\"https://www.instagram.com/yellowprint.nl/\" target=\"_blank\"><span style=\"color:#febc11\">@yellowprint.nl</span></a></strong><span style=\"color:#febc11\"><strong> </strong></span><span style=\"color:#000000\">(Stickers en prints)</span><br />\r\n&nbsp;</h4>\r\n\r\n<p><img alt=\"\" src=\"https://demispaargaren.nl/uploads/Ik%20met%20plant.png\" style=\"height:228px; width:500px\" /></p>\r\n', '0', 'Woensdag 18 Maart 2015 21:33', '2015-03-18 21:33:54'),
(7, 6, 'Fotografie', '', 'fotografie', '', '<h1>FOTOGRAFIE</h1>\r\n\r\n<h2>DIEREN</h2>\r\n\r\n<div>Het leukste onderwerp om te fotograferen vind ik dieren. Voornamelijk&nbsp;in de dierentuin. Het is atlijd weer&nbsp;een uitdaging om de bewegende beesten goed op de foto te krijgen. Hieronder zie je een aantal van mijn favoriete foto&#39;s.&nbsp;</div>\r\n\r\n<div>&nbsp;</div>\r\n\r\n<div><img alt=\"\" src=\"https://www.demispaargaren.nl/uploads/Vis.png\" style=\"height:534px; width:800px\" /></div>\r\n\r\n<div>&nbsp;</div>\r\n\r\n<div><img alt=\"\" src=\"https://www.demispaargaren.nl/uploads/Rendier.png\" style=\"height:534px; width:800px\" /></div>\r\n\r\n<div>&nbsp;</div>\r\n\r\n<div><img alt=\"\" src=\"https://www.demispaargaren.nl/uploads/Foto_1.png\" style=\"height:535px; width:800px\" /></div>\r\n\r\n<div>&nbsp;</div>\r\n\r\n<div>&nbsp;</div>\r\n\r\n<div><img alt=\"\" src=\"https://www.demispaargaren.nl/uploads/Foto_2.png\" style=\"height:535px; width:800px\" /></div>\r\n\r\n<div>&nbsp;</div>\r\n\r\n<div><img alt=\"\" src=\"https://www.demispaargaren.nl/uploads/Foto_3.png\" style=\"height:535px; width:800px\" /></div>\r\n\r\n<div>&nbsp;</div>\r\n\r\n<div><img alt=\"\" src=\"https://www.demispaargaren.nl/uploads/Foto_4.png\" style=\"height:535px; width:800px\" /></div>\r\n\r\n<div>&nbsp;</div>\r\n\r\n<div>Meer foto&#39;s zien? Kijk dan op <strong><a href=\"https://www.instagram.com/demispaargaren/\"><span style=\"color:#febc11\">mijn instagram!</span></a></strong></div>\r\n\r\n<div><a href=\"https://www.instagram.com/demispaargaren/\" target=\"_blank\"><img alt=\"\" src=\"https://www.demispaargaren.nl/uploads/Insta_promotie_3.png\" style=\"height:400px; width:400px\" /></a></div>\r\n<style type=\"text/css\">.tb_button {padding:1px;cursor:pointer;border-right: 1px solid #8b8b8b;border-left: 1px solid #FFF;border-bottom: 1px solid #fff;}.tb_button.hover {borer:2px outset #def; background-color: #f8f8f8 !important;}.ws_toolbar {z-index:100000} .ws_toolbar .ws_tb_btn {cursor:pointer;border:1px solid #555;padding:3px}   .tb_highlight{background-color:yellow} .tb_hide {visibility:hidden} .ws_toolbar img {padding:2px;margin:0px}\r\n</style>\r\n', '0', 'Zondag 06 December 2015 12:36', '2015-12-06 12:36:54'),
(8, 7, 'Contact', '', 'contact', '', '<p><iframe frameborder=\"0\" height=\"600\" scrolling=\"no\" src=\"http://localhost:8000/template/form.php\" width=\"500\"></iframe></p>\r\n\r\n<h2><strong>demispaargaren@gmail.com</strong></h2>\r\n', '0', 'Woensdag 18 Maart 2015 21:33', '2015-03-18 21:33:52'),
(11, 4, 'Kinderboek', '', 'kinderboek', '', '<h1>KINDERBOEK</h1>\r\n\r\n<h3>Context</h3>\r\n\r\n<div>Grafieken kunnen veel invloed hebben op het koopgedrag van de klant. Maar ze&nbsp;kunnen ook mensen misleiden in belangrijke keuzes zoals in hun&nbsp;politieke keuzes. Het is van belang dat mensen leren om te gaan met grafieken en cijfers.</div>\r\n\r\n<div>&nbsp;</div>\r\n\r\n<div><img alt=\"\" src=\"https://www.demispaargaren.nl/uploads/Quote_1.png\" style=\"height:443px; width:900px\" /></div>\r\n\r\n<div>&nbsp;</div>\r\n\r\n<h3>Relevantie</h3>\r\n\r\n<p>Cijfers, grafieken en andere statistieken zijn overal om ons heen te vinden om bepaalde standpunten te bewijzen. Maar bijna geen van deze spreken helemaal de waarheid. Het is erg gemakkelijk om&nbsp;statistieken te manipuleren.</p>\r\n\r\n<div>&nbsp;</div>\r\n\r\n<h3>Concept: Kinderboek</h3>\r\n\r\n<div>Een van de redenen waarom ik voor een kinderboek als medium heb gekozen is omdat Richard Feynman zegt dat de beste manier om iets te begrijpen is door het uit te leggen. Doe alsof je het onderwerp uitlegt aan een kind van acht. Als dat lukt, begrijp je het pas echt.&nbsp;<strong><span style=\"color:#FF0000\">(Nanna Vium, 2017.)</span></strong><br />\r\n&nbsp;</div>\r\n\r\n<div><img alt=\"\" src=\"https://www.demispaargaren.nl/uploads/Einstein.png\" style=\"height:301px; width:900px\" /></div>\r\n\r\n<div>&nbsp;</div>\r\n\r\n<div>Het kinderboek gaat over het verkeerde gebruik van statistieken. In het boek gaat vanalles fout, waarna wordt uitgelegd waarom het niet klopt. De verkeerde statistieken gaan bijvoorbeeld over:<br />\r\n&bull; Correlatie en causaliteit door elkaar te halen.<br />\r\n&bull; Expres verkeerd gekozen cijfers op de x- of y-as.<br />\r\n&bull; &#39;&#39;Lurking&#39;&#39; variable.<br />\r\n&bull; Cherrypicking: Expres verkeerd ingezoomd op maar een klein onderdeel van de grafiek.<br />\r\n&bull; Oorzaak gevolg door elkaar halen.<br />\r\n&bull; Feiten uit een niet representatieve steekproef halen.<br />\r\n<br />\r\nOm tot een goed verhaal te komen, heb ik onderzoek gedaan naar storytelling. Ik heb onder andere gekeken naar &#39;The hero&#39;s journey&#39; van Joseph Campbell, Freytag&#39;s pyramid en Aristoteles.</div>\r\n\r\n<div>&nbsp;</div>\r\n\r\n<div>&nbsp;</div>\r\n\r\n<div>&nbsp;</div>\r\n\r\n<div style=\"text-align:center\"><img alt=\"\" src=\"https://www.demispaargaren.nl/uploads/The%20heros%20journey.png\" style=\"height:541px; width:600px\" /></div>\r\n\r\n<div style=\"text-align:center\">&nbsp;</div>\r\n\r\n<div style=\"text-align:center\">The Hero&#39;s Journey van Joseph Campbell. <strong><span style=\"color:#FF0000\">(Mieke Bouma, 2012.)</span></strong></div>\r\n\r\n<div style=\"text-align:center\">&nbsp;</div>\r\n\r\n<div style=\"text-align:center\">&nbsp;</div>\r\n\r\n<div style=\"text-align:center\">&nbsp;</div>\r\n\r\n<div style=\"text-align:center\">&nbsp;</div>\r\n\r\n<div style=\"text-align:center\">&nbsp;</div>\r\n\r\n<div style=\"text-align:center\"><img alt=\"\" src=\"https://www.demispaargaren.nl/uploads/Freytag.png\" style=\"height:300px; width:500px\" /></div>\r\n\r\n<div>&nbsp;</div>\r\n\r\n<div style=\"text-align:center\">Freytag&#39;s piramide. <span style=\"color:#FF0000\"><strong>(Kelly Meulenberg, 2018)</strong></span></div>\r\n\r\n<div>&nbsp;</div>\r\n\r\n<h3>&nbsp;</h3>\r\n\r\n<h3>&nbsp;</h3>\r\n\r\n<h3>Het kinderboek</h3>\r\n\r\n<h3><img alt=\"\" src=\"https://www.demispaargaren.nl/uploads/k1.png\" style=\"height:592px; width:800px\" /></h3>\r\n\r\n<h3><img alt=\"\" src=\"https://www.demispaargaren.nl/uploads/k2.png\" style=\"height:592px; width:800px\" /></h3>\r\n\r\n<h3><img alt=\"\" src=\"https://www.demispaargaren.nl/uploads/k3.png\" style=\"height:592px; width:800px\" /></h3>\r\n\r\n<div><img alt=\"\" src=\"https://www.demispaargaren.nl/uploads/k4.png\" style=\"height:592px; width:800px\" /></div>\r\n\r\n<div><img alt=\"\" src=\"https://www.demispaargaren.nl/uploads/k5.png\" style=\"height:242px; width:800px\" /></div>\r\n\r\n<div><img alt=\"\" src=\"https://www.demispaargaren.nl/uploads/Mockup_gif_1.gif\" style=\"height:576px; width:700px\" /></div>\r\n\r\n<div><img alt=\"\" src=\"https://www.demispaargaren.nl/uploads/k6-2.png\" style=\"height:352px; width:700px\" /></div>\r\n\r\n<div><img alt=\"\" src=\"https://www.demispaargaren.nl/uploads/k7.png\" style=\"height:592px; width:800px\" /></div>\r\n\r\n<div><img alt=\"\" src=\"https://www.demispaargaren.nl/uploads/k8.png\" style=\"height:406px; width:800px\" /></div>\r\n\r\n<div><img alt=\"\" src=\"https://www.demispaargaren.nl/uploads/j.gif\" style=\"height:356px; width:600px\" /></div>\r\n\r\n<div><img alt=\"\" src=\"https://www.demispaargaren.nl/uploads/k9.png\" style=\"height:592px; width:800px\" /></div>\r\n\r\n<div><img alt=\"\" src=\"https://www.demispaargaren.nl/uploads/k10.png\" style=\"height:592px; width:800px\" /></div>\r\n\r\n<div><img alt=\"\" src=\"https://www.demispaargaren.nl/uploads/k11.png\" style=\"height:592px; width:800px\" /></div>\r\n\r\n<div><img alt=\"\" src=\"https://www.demispaargaren.nl/uploads/k12.png\" style=\"height:410px; width:800px\" /></div>\r\n\r\n<div>&nbsp;</div>\r\n\r\n<div>&nbsp;</div>\r\n\r\n<div>&nbsp;</div>\r\n\r\n<div>Mijn uitgebreide onderzoeksverslag kun je<span style=\"color:#febc11\"> </span><a href=\"https://drive.google.com/file/d/1zOZsg8YSXLiAnzjjCKTRrKd0XeoDZ7aY/view\"><span style=\"color:#febc11\">hier</span></a><span style=\"color:#febc11\"> </span>lezen.</div>\r\n\r\n<div>Het hele kinderboek in PDF vorm kun je <a href=\"https://drive.google.com/file/d/1rGVOjdOiUMaPwJH6AsTYxdLlBpykpAQN/view\"><span style=\"color:#febc11\">hier</span></a> bekijken.</div>\r\n\r\n<div>&nbsp;</div>\r\n\r\n<h3>Bronvermelding</h3>\r\n\r\n<div>&bull;&nbsp;Huff, D. (1954.). How to lie with statistics. New York . W. W. Norton &amp; Company.</div>\r\n\r\n<div>&bull; Vium, N. (2017.). 4 stappen om een onderwerp onder de knie te krijgen. Geraadpleegd op 15 juli 2020, van<span style=\"color:#0000FF\"> https://wibnet.nl/mens/hersenen/intelligentie/4-stappen-om-een-onderwerp-onder-de-knie-te-krijgen</span></div>\r\n\r\n<div>&bull; Bouma, M. (2012.). Storytelling in 12 stappen. Geraadpleegd op 16 juli 2020, van <span style=\"color:#0000FF\">https://www.duynsteepolak.nl/storytelling-in-12-stappen</span></div>\r\n\r\n<div>&bull; Meulenberg, K. (2018.). Versterk je spanningsboog met de Piramide van Freytag. Geraadpleegd op 15 juli 2020, van <span style=\"color:#0000FF\">http://kellymeulenberg.com/spanningsboog-freytag-piramide</span></div>\r\n\r\n<div>&bull; Wikipedia. (2020.) Florence Nightingale. Geraadpleegd op 27 juli 2020, van <span style=\"color:#0000FF\">https://nl.wikipedia.org/wiki/Florence_Nightingale</span></div>\r\n\r\n<div>&nbsp;</div>\r\n', '0', 'Zaterdag 15 Augustus 2020 14:49', '2020-08-15 14:49:27'),
(13, 3, 'Yellowprint', '', 'yellowprint', '', '<h1>Yellowprint</h1>\r\n\r\n<div>Via <strong><a href=\"https://www.etsy.com/shop/Yellowprintnl\" target=\"_blank\"><span style=\"color:#febc11\">Etsy </span></a></strong>en <strong><a href=\"https://www.redbubble.com/people/JohanHegg/shop?asc=u&amp;ref=account-nav-dropdown\" target=\"_blank\"><span style=\"color:#febc11\">RedBubble</span></a></strong> verkoop ik o.a. stickers en ansichtkaarten. Hieronder staan een aantal voorbeelden van de producten die ik verkoop.</div>\r\n\r\n<div>&nbsp;</div>\r\n\r\n<div><img alt=\"\" src=\"https://www.demispaargaren.nl/uploads/Logo_small.png\" style=\"height:126px; width:300px\" /></div>\r\n\r\n<div>&nbsp;</div>\r\n\r\n<h2>Stickers</h2>\r\n\r\n<h3><a href=\"https://www.etsy.com/listing/1003469552/three-potted-plants-stickers-basil?ref=shop_home_feat_1&amp;frs=1\" target=\"_blank\"><strong>Potted plants</strong></a></h3>\r\n\r\n<h4><img alt=\"\" src=\"https://demispaargaren.nl/uploads/1.jpg\" style=\"height:800px; width:800px\" /></h4>\r\n\r\n<div>&nbsp;</div>\r\n\r\n<h3><a href=\"https://www.etsy.com/listing/1042019485/3x-vegetable-shopping-sticker?click_key=16dc3ebb3165cb1e3a56d17a3a651653e4b9c1fe%3A1042019485&amp;click_sum=487406eb&amp;ref=shop_home_active_8&amp;frs=1\" target=\"_blank\">Vegetable shopping</a></h3>\r\n\r\n<div><img alt=\"\" src=\"https://demispaargaren.nl/uploads/YP1.jpg\" style=\"height:800px; width:800px\" /></div>\r\n\r\n<div>&nbsp;</div>\r\n\r\n<div>\r\n<h3><a href=\"https://www.etsy.com/listing/1017456811/woodland-animals-sticker-set-bear-fox?ref=shop_home_feat_3&amp;frs=1\" target=\"_blank\">Woodland animals sticker set (Bear, Fox &amp; Moose)</a></h3>\r\n</div>\r\n\r\n<h3><img alt=\"\" src=\"https://demispaargaren.nl/uploads/2.jpg\" style=\"height:800px; width:800px\" /></h3>\r\n\r\n<div>&nbsp;</div>\r\n\r\n<div>&nbsp;</div>\r\n\r\n<div>\r\n<h3><a href=\"https://www.etsy.com/listing/1004570562/vegetable-stickers-spring-onion-pumpkin?click_key=bd5291ac61622f4f2fdced331d61c4496abd09b0%3A1004570562&amp;click_sum=76642a02&amp;ref=shop_home_active_12&amp;frs=1\" target=\"_blank\">Vegetable Stickers (Spring Onion, Pumpkin, Beets &amp; Leek)</a></h3>\r\n</div>\r\n\r\n<div><img alt=\"\" src=\"https://demispaargaren.nl/uploads/YP2.jpg\" style=\"height:800px; width:800px\" /></div>\r\n\r\n<div>&nbsp;</div>\r\n\r\n<div>&nbsp;</div>\r\n\r\n<div>\r\n<h3><a href=\"https://www.etsy.com/listing/1017468705/vegetable-stickers-carrot-onions-beets?click_key=8a0f7df23d58ef71bdce3cc567c28387ca793f44%3A1017468705&amp;click_sum=39c64591&amp;ref=shop_home_active_10&amp;frs=1\" target=\"_blank\">Vegetable Stickers (Carrot, Onions &amp; Beets)</a></h3>\r\n</div>\r\n\r\n<div><img alt=\"\" src=\"https://demispaargaren.nl/uploads/YP3.jpg\" style=\"height:800px; width:800px\" /></div>\r\n\r\n<div>&nbsp;</div>\r\n\r\n<div>&nbsp;</div>\r\n\r\n<div>&nbsp;</div>\r\n', '0', 'Donderdag 22 Oktober 2020 13:39', '2020-10-22 13:39:53'),
(16, 2, 'Identity Playground', 'hai', 'identity-playground', '', '<h1>Identity Playground</h1>\r\n\r\n<p>Tijdens het project Identity Playground binnen de profilering Human-Centered Design <span style=\"background-color:#febc11\">(UX/UI)</span> heb ik ervoor gekozen om te gaan specialiseren in <span style=\"background-color:#febc11\">Visual Design</span> (UI). In 4 weken heb ik onderzoek gedaan naar <span style=\"background-color:#febc11\">Micro-Animations</span> en hoe deze binnen een User Interface kunnen passen. Hiervoor heb ik een app ontworpen in Sketch. Ik heb organische <span style=\"background-color:#febc11\">illustraties</span> gekoppeld aan een <span style=\"background-color:#febc11\">pixel-perfect</span> ontwerp. Dit project heb ik afgesloten met een interactieve workshop.</p>\r\n\r\n<p>Het proces heb ik bijgehouden via<span style=\"color:#febc11\"> </span><strong><a href=\"https://www.instagram.com/demispaargaren_hcd_ip/\" target=\"_blank\"><span style=\"color:#febc11\">Instagram</span></a><span style=\"color:#febc11\">.</span><span style=\"color:#FFD700\">&nbsp;</span></strong></p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p><strong><span style=\"color:#FFD700\"><img alt=\"\" src=\"https://demispaargaren.nl/uploads/Me-ZW.png\" style=\"height:439px; width:250px\" /></span></strong></p>\r\n\r\n<h3>&nbsp;</h3>\r\n\r\n<h2>De App</h2>\r\n\r\n<h3>Log-in scherm</h3>\r\n\r\n<div><img alt=\"\" src=\"https://demispaargaren.nl/uploads/IP1.png\" style=\"height:596px; width:1000px\" /></div>\r\n\r\n<h3>Hoe werkt het?</h3>\r\n\r\n<h3><img alt=\"\" src=\"https://demispaargaren.nl/uploads/IP2.png\" style=\"height:596px; width:1000px\" /></h3>\r\n\r\n<h3>Dashboard</h3>\r\n\r\n<div><img alt=\"\" src=\"https://demispaargaren.nl/uploads/IP3.png\" style=\"height:596px; width:1000px\" /></div>\r\n\r\n<h3>Product toevoegen</h3>\r\n\r\n<div><img alt=\"\" src=\"https://demispaargaren.nl/uploads/IP4.png\" /></div>\r\n\r\n<h3>Informatie en reminder instellen</h3>\r\n\r\n<div><img alt=\"\" src=\"https://demispaargaren.nl/uploads/IP5.png\" /></div>\r\n\r\n<div><img alt=\"\" src=\"https://demispaargaren.nl/uploads/IPQ.png\" style=\"height:596px; width:1000px\" /></div>\r\n\r\n<h2>De Workshop</h2>\r\n\r\n<div>Aan het eind van dit project heb ik een <span style=\"background-color:#febc11\">interactieve workshop</span> gegeven waarin o.a. wordt uitgelegd wat Micro-animaties zijn, welke soorten er zijn, waarom je ze gebruikt en wanneer je ze beter niet kan gebruiken. Tussen de informatie door zijn er een aantal opdrachten gegeven. Bij een opdracht liet ik een animatie zien die hoorde bij structurele-, functionele- of emotionele micro-animaties, waar de groep een sticker moest plakken bij de juiste categorie.</div>\r\n\r\n<p><strong><span style=\"color:#FFD700\"><img alt=\"\" src=\"https://demispaargaren.nl/uploads/WS.png\" style=\"height:596px; width:1000px\" /></span></strong></p>\r\n', '0', 'Zondag 10 Juli 2022 12:17', '2022-07-10 12:17:32'),
(17, 5, 'Illustraties', '', 'illustraties', '', '<h1>Illustraties</h1>\r\n\r\n<div><img alt=\"\" src=\"https://demispaargaren.nl/uploads/Hand_bg_1.png\" style=\"height:789px; width:640px\" /></div>\r\n', '0', 'Zaterdag 16 Juli 2022 21:43', '2022-07-16 21:43:43'),
(18, 1, 'UX/UI', '', 'uxui', '', '<h1>UX/UI</h1>\r\n\r\n<h3>Planten verzorging</h3>\r\n\r\n<p><img alt=\"\" src=\"https://demispaargaren.nl/uploads/Portfolio.png\" style=\"height:422px; width:700px\" /></p>\r\n\r\n<h3>Informatie</h3>\r\n\r\n<p><img alt=\"\" src=\"https://demispaargaren.nl/uploads/Portfolio%202.png\" style=\"height:477px; width:790px\" /></p>\r\n', '0', 'Vrijdag 12 Augustus 2022 11:18', '2022-08-12 11:18:50');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int UNSIGNED NOT NULL,
  `username` varchar(20) DEFAULT NULL,
  `password` varchar(100) DEFAULT NULL,
  `firstname` varchar(30) DEFAULT NULL,
  `lastname` varchar(30) DEFAULT NULL,
  `activated` int DEFAULT NULL,
  `email` varchar(50) DEFAULT NULL,
  `laatst_bewerkt` varchar(50) DEFAULT NULL,
  `admin` int DEFAULT NULL,
  `twitteraccount` varchar(50) DEFAULT NULL,
  `dashb_facebook` int DEFAULT NULL,
  `dashb_suggesties` int DEFAULT NULL,
  `dashb_socialclicks` int DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `username`, `password`, `firstname`, `lastname`, `activated`, `email`, `laatst_bewerkt`, `admin`, `twitteraccount`, `dashb_facebook`, `dashb_suggesties`, `dashb_socialclicks`) VALUES
(1, 'nick', '$2y$10$kzbc4ZwOfg.jHW/AFvxdkuwAqOprt7VufDVC3/KqZPCvVgGS8twLe', 'Nick', 'Spaargaren', 1, 'email@email.com', 'Friday 1 March 2024 19:56', 1, NULL, 0, 0, 0);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `afbeeldingen`
--
ALTER TABLE `afbeeldingen`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `formulier`
--
ALTER TABLE `formulier`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `inlogpogingen`
--
ALTER TABLE `inlogpogingen`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `instellingen`
--
ALTER TABLE `instellingen`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `id` (`id`);

--
-- Indexes for table `links`
--
ALTER TABLE `links`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `paginas`
--
ALTER TABLE `paginas`
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
-- AUTO_INCREMENT for table `afbeeldingen`
--
ALTER TABLE `afbeeldingen`
  MODIFY `id` int UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=378;

--
-- AUTO_INCREMENT for table `formulier`
--
ALTER TABLE `formulier`
  MODIFY `id` int UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=80;

--
-- AUTO_INCREMENT for table `inlogpogingen`
--
ALTER TABLE `inlogpogingen`
  MODIFY `id` int UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3763;

--
-- AUTO_INCREMENT for table `instellingen`
--
ALTER TABLE `instellingen`
  MODIFY `id` int UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `links`
--
ALTER TABLE `links`
  MODIFY `id` int UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `paginas`
--
ALTER TABLE `paginas`
  MODIFY `id` int UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
