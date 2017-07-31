CREATE TABLE IF NOT EXISTS `arquivos` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `link_arquivo` varchar(250) DEFAULT '',
  `chave_de_acesso` varchar(350) DEFAULT '',
  `criado` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;