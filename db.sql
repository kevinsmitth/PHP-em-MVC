CREATE TABLE IF NOT EXISTS `postagens` (
    `id` int(11) NOT NULL AUTO_INCREMENT,
    `titulo` varchar(50) NOT NULL,
    `subtitulo` varchar(50) NOT NULL,
    `descricao` varchar(300) NOT NULL,
    `linkimg` varchar(300) NOT NULL,
    `categoria` varchar(30) NOT NULL,
    `facebook` varchar(200) NOT NULL,
    `github` varchar(200) NOT NULL,
    `linkedin` varchar(200) NOT NULL,
    `emailcontact` varchar(200) NOT NULL,
    `data` timestamp CURRENT_TIMESTAMP NOT NULL,
    `cor` varchar(20) NOT NULL,
    `destaque` varchar(20) NOT NULL,
PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

CREATE TABLE IF NOT EXISTS `usuarios` (
    `id` int(11) NOT NULL AUTO_INCREMENT,
    `nome` varchar(50) NOT NULL,
    `email` varchar(50) NOT NULL,
    `senha` varchar(50) NOT NULL,
    `nivel` varchar(15) NOT NULL,
PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;
/*
CREATE TABLE IF NOT EXISTS `ref_withdraw` (
    `id` int(11) NOT NULL AUTO_INCREMENT,
    `uid` int(11) NOT NULL,
    `unixTime` int(11) NOT NULL,
    `amount` float NOT NULL,
PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

CREATE TABLE IF NOT EXISTS `tariffs` (
    `id` int(11) NOT NULL AUTO_INCREMENT,
    `uid` int(11) NOT NULL,
    `sumIn` float NOT NULL,
    `sumOut` float NOT NULL,
    `percent` float NOT NULL,
    `unixTimeStart` int(11) NOT NULL,
    `unixTimeFinish` int(11) NOT NULL,
PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;
*/