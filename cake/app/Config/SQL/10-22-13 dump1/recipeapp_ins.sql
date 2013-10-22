CREATE DATABASE  IF NOT EXISTS `recipeapp` /*!40100 DEFAULT CHARACTER SET utf8mb4 */;
USE `recipeapp`;
-- MySQL dump 10.13  Distrib 5.6.13, for osx10.6 (i386)
--
-- Host: 127.0.0.1    Database: recipeapp
-- ------------------------------------------------------
-- Server version	5.6.11

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;
/*!40103 SET @OLD_TIME_ZONE=@@TIME_ZONE */;
/*!40103 SET TIME_ZONE='+00:00' */;
/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;

--
-- Table structure for table `ins`
--

DROP TABLE IF EXISTS `ins`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `ins` (
  `item_id` int(11) NOT NULL AUTO_INCREMENT,
  `item_name` varchar(150) NOT NULL,
  `item_description` text NOT NULL,
  `item_category` varchar(75) NOT NULL,
  `item_image` longblob NOT NULL,
  `pricing` varchar(45) NOT NULL,
  PRIMARY KEY (`item_id`),
  UNIQUE KEY `item_id_UNIQUE` (`item_id`)
) ENGINE=InnoDB AUTO_INCREMENT=19 DEFAULT CHARSET=utf8mb4;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `ins`
--

LOCK TABLES `ins` WRITE;
/*!40000 ALTER TABLE `ins` DISABLE KEYS */;
INSERT INTO `ins` VALUES (15,'Ghirardelli Chips Semi Sweet Chocolate - 12 Oz','All natural. The luxuriously deep flavor and smooth texture Ghirardelli Premium Baking Chocolate delivers the ultimate chocolate indulgence. We hand-select the world&#39;s finest cocoa beans and roast them to perfection, then blend the purest ingredients to a','Condiments/Spices & Bake','ÿØÿà\0JFIF\0\0_\0_\0\0ÿá\0RExif\0\0II*\0\0\0\0\0i‡\0\0\0\0\Z\0\0\0\0\0\0\0\0†’\0\0\0\0,\0\0\0\0\0\0\0LEAD Technologies Inc. V1.01\0\0ÿÛ\0C\0\r	\n\n\r\n\r \' .)10.)-,3:J>36F7,-@WAFLNRSR2>ZaZP`JQROÿÛ\0C&&O5-5OOOOOOOOOOOOOOOOOOOOOOOOOOOOOOOOOOOOOOOOOOOOOOOOOOÿÀ\0\0d\0d\"\0ÿÄ\0\0\0\0\0\0\0\0\0\0\0\0\0ÿÄ\0:\0\n\0\0\0\0\0\0!1\"AQaqÑ2‘¡#±%3BSbr’Áð‚ƒ“ÿÄ\0\0\0\0\0\0\0\0\0\0\0\0\0\0ÿÄ\0$\0\0\0\0\0\0\0\0\0\0Q!1A2\"aÿÚ\0\0\0?\0ôäD@\0DDD@\0DDUÊ²H&-dÁ›\r¶JK©t@ËžO\'0|CÑQ¸‡WK\'Û–2Z¢¯uÖ6ó§¨þÁî¹›Ô#•5Iÿ\0€÷SîÃ’=,´ERo°Žt•ùuù<CN9ÓUÿ\0`÷Nì9;ÐË„TnâŠœªðÒ=×èq%n®Ž`=î£¸¯’]©ð]\"£Q0eÐÔãÇ@÷\\Æv¨Ý¦^•‡ž\Z?Êê¾·éŽÍœ\Z4YŸ·6<é¥i1Ô)8š¢ªó4³6:|dà³¾Tg¨„5§±ü6h¸Ñ¹Ï¤‰ïv§‚OŠ+¢ò²PÖÇNØï%¯8i`Ýw´ç\\z[±ö_8…´¦­ælé¥œ¬ºÝiß4.¿w¯sŽà\r€+µ+5-G“AÉ*VMó¤c/!¡»’{•MeþßEìkª\\\Zcløç¹c]xâ´‰_BCÏ† 9sßn}ê;$»uÃQ/Fè‹˜âÆöZ]¿ˆØÏ0¶U^ÑŸÔµ-âÙZt4Iƒg5íÆ>[)rFCsšý²óêsu†µòÃ4M™úšâ[Ù¥ü³ýïï_[Ä\\HÒDRFáÑ—ƒÐn@vœz®=,¤ü¤‹™¤\ržL·›ŠG3ud0eC¶\nêçÎê§5ò1±¿-øÛ«†R¶~¡<º7¹ò¿KZÌú,+ôÒ…®·ìÕ®Õ(&Yd<±Y+ÛcuÞV¹ÅhhnÙî\né÷jXêz¾OMŒèØyäí²ªedU•ÒÆæi”\rN=ÇýÙvŠç[rhº7E2¢m/v]Q¬·aÙ ­\r…ñõ¹¦˜†±€¢úê\n6R™¤§‘£$FLÉ¥\rDÜ<—oÉ])+bÒðZßR=šÑ#&µÓÉt9»e>ÏÙšóèÿ\0ÉE«ZÄ0¬ý²¯ˆÛ›“ŽØUB)ßä†,ãNAsIžàŒ«\"•­¼8;$h\nó²=:_#œ\0ø¹,iÙ8^Ü^\rAJ¤™q-’ÉsckÆØëØíüÞ‹4ëP$™(œõ§Œóö;z®æýVáÕå!¤àéç…õ×Ê¡ŸÕd$šZ´á¯²?OÓ2;,µBF‡¾ídU<éç5¢m£‡Þtˆ¥.Á8mSóëñ*È.•SÉ¡´Ó|z5`gçËeul‘Ò†I,Nk\\Íyv0<ŽüÔ,þFOÛfŠÚJ(iä‘ÖÑ#¶½Ns¶ÆäªËtÅ“@_­íÝÁ­ä§¯zÑ]/ÖË>içvèŒ­ø‡pÏšÊOd™³ºéD×MMT:M1’\\ßqê¼U¹I¹Ùôô,zŠ\"R¾ž±òË5,Mv¬¹»;Á*<óJ&¢@`ýÒÓ¾{þ«åX¨’	Ó4‡æTZZ\nÝ:^Ç4¸l\\0½1–ÇÜ\nšÉ$Ž8Ìò–ÂpücIõ!Fn2¿%§Í[ÁÃ²ŠqÒ¾,ÉçòPg¢ŽžgÄÑ‘Ì%eoÂ,®~Odá1Ž·gø\r(ºðëtpýG!Ñ¶bŒéþ™AÄÑ~µt™ÐÜ\ZÝc¨¸B& 5„	Zê›e\\¢Zˆµ?Î¢?\"¥G\"±ÆÐÖ4`\06xÞJnR/Z‡¨£8xZcš_¶ç8Êâþ‚ÙÛÝ/ý£óZ´RÙWþÜLË}Ñ¸èhÛ#ï?R¹ÔÛ¯•òÂøû0°€X6#+Z‹›\Z×\'w<ØpM{E7ÝÌM1ì™¹çŸ——šíöwˆ?Lºæ •ÌèËDŒÆœcÿ\0Ò½\r¯Mí³ùpd[MŠœCcK@|=ÞEE6‹ëœ$ª§mC°;!Ìh=ëpŠ½d·21X®’@)[Ç6ên1ø‘¨¶Ôõù!œÈÌ1ŽõìªMª†ª TMN×J§VH$~Ô^EFY\r\\—èY™ÑÙéáGÑ¨¢d16(ÆÁ€3È\"öAb)I<¶ÏÚ\")ˆ€\"\"\0ˆˆ\" ˆ€\"\"\0ˆˆ\" ˆ€\"\"\0ˆˆ\" ˆ€ÿÙ','4.39'),(16,'Guittard Baking Chips Milk Chocolate - 11.5 Oz','Real vanilla. Smoother texture. The Guittard family has been honored with distinguished with distinctive awards in international chocolate competitions for four generations. International Gold Medal Winner Brussels, Belgium 1987. This bag contains 2 cups.','Condiments/Spices & Bake','ÿØÿà\0JFIF\0\0d\0d\0\0ÿÛ\0C\0\r	\n\n\r\n\r \' .)10.)-,3:J>36F7,-@WAFLNRSR2>ZaZP`JQROÿÛ\0C&&O5-5OOOOOOOOOOOOOOOOOOOOOOOOOOOOOOOOOOOOOOOOOOOOOOOOOOÿÀ\0\0d\0d\"\0ÿÄ\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0ÿÄ\07\0\0\0\0\0\0\0!1AQ\"#aqÑ2B‘±RSr¡ð3DƒÁáÿÄ\0\0\0\0\0\0\0\0\0\0\0\0\0\0ÿÄ\0\0\0\0\0\0\0\0\0\0\0Q!1A\"ÿÚ\0\0\0?\0éÈˆ€ˆˆˆ€ˆˆˆ€ˆˆˆ€‹]ãÖmÒ½Vzó9‘¸h‘¼Ûð8R’KnXï Nƒ¤ëù ÎE	?’	\ZB`Âà!8kr~[¯k—¯Õ9gÅŒëdÀ~`”È•E­Ÿ1	$£;rínÜôõc\næx¦3U\\Ò?­ÿ\0DÌ.(\'x‰¡š›RRzŽK?>YtCÃÞ÷tûþ‰”ÃeEÞ#(á…€ÿ\0`?è§»z¤ñÐûCù¹±¼íý·L‰DPÐñ{WtŽá¶\"-âA€OeS‰Y³wE‰YCKœÈÆ\0í—»ü&+[÷Fý;¢¢+Çéj™Á¬Ô{˜Yõ¤lôâ–7e¯`p=öX>%hsIÀ.SÃFOØƒÇ©€°çàHSôSŽñS®È`®mZ±–Çâ~AT¿?=#ä–;`ßå`çó++ÅÖ’hYå>K-$CåÈXìõÜrorµØ,ÏbÁŒˆ¤¨Ý¥\rnÓ;¶£êpÉX´ût¬Fm{µï¾	mÄ\"Ù}xÜârãpÆ\0ìJ¬±ðÓ,VaªfÉÄmv¡¨gwc ÆùÂ‚–ßÌ”£‹Ñ ùosA W£/ðÇ{ÿ\0c³\'–Ý>cfqÔÞÇ|™ÇÓ?V,8Ù™ÑY\r§Ãž\"i%ýÎåV\"ú¥òKaì™Íó%ŠZ|±Üí±ÇæµÓv“¤Ž|˜Èv°Ð÷û;þŠ™«\'¯d°J×<û¸‘Å„þ÷=Ö|—	h¯²/*ImO7Ú·’5c÷°qõ^îâyAÑµïÕ³pÓ‚îÏuZ´*×yž\0\\÷´7[ž^tô\'’·ì ¯ Fã>è.qÇÀv[þ™þrÆ‘²Uá²KngºyŽ\\Z~î{\0>ª­¨ÛâxèV‰šb‡8ä^¢O]öSSÈÙlCZ0[1¶“²Ç«åŸNÖ—Ÿm¼ÇÅTmˆ´Ë‰E”œgc=g|rP¼\"ó¬ð‡:\'y^ã±¿!•Þ3â&§ef4ÚËAÏ 1ŸÕj\\2ããó`•s0_ùg—=ÖãŠóQ™ÙXœJ^õ(,Øl¶#ô4‚Zò5Ç}Âó-’(Û@Ž^Ö»*N—Û„Øihn}cl;+™h>Ó¥h°Ñ»›§nji¿K²½¼-G®›„ÑÈÇ\r÷\0jß’Š°ù\ZÇ—@ÑƒAÛ¿U±X½¤: :‰Àõù…ŠëP¼b$ã¼iYÑyœá¨æ¬F\Zè°#ÌL¬<×;ý3\0Æ:u^ÔæµÄ—Ù··œ€qÏà¥üšä`¶QØjÛoŠÉ®êÕ˜Kk€qŒ—ŸýYÑ“º¿ršð­ÆÍâsÆF4ö;o…ŸÅl¶\Z­f¡—‡ÕjCˆˆÜd„˜Ürá]73Ë®Ï™#€Ø4àÒ¼7ˆÆžZÌç,Ú3	®’@\0g¾«Ï‡ÚÅryô¸i»ŽÉFÜFf9þn&\\Ièl|Q”8ÅSä9î™á„—u.<“UçðÙWIDE•j^6¯• °âàøIÓ¾Þ¬sü”:­³]ÓÕd²¹˜\0që‚y­ëˆpºüEÑ›å±œèß5ï\Z°´68\0å²Ôr^#>™šVg8s—ž#:8}–ŸäÏè±|Î%M«+×1•ÕDQ·î±£ú+ôŽÁ6_´×W(d·\\2úÒÿ\0Vvg{ð*Î]×ÐBê˜0ª®Ëök¯NZÆqMéè*ñqË¨ÌO\\…ÔO;ök«—šwû	GüeXêvÛê};¿´~‹©¢±Éxý5×§,¯-É\'òªÔx#øƒN>jïÙ‚VŠiœ×34Ž¸98ü—O-iæù…sƒÒ»,SI‰¡9d±.QóSeû_\nô“EF7KsÈaZ\\ˆˆˆ€ˆˆˆ€ˆˆˆ€ˆˆˆ€ˆˆˆ€ˆˆˆ€ˆˆˆƒÿÙ','4.19'),(17,'Safeway Baking Chips Milk Chocolate - 11.5 Oz','0g Trans fat per serving. 0mg Cholesterol per serving.','Condiments/Spices & Bake','ÿØÿà\0JFIF\0\0_\0_\0\0ÿþ\0LEAD Technologies Inc. V1.01\0ÿÛ\0C\0\r	\n\n\r\n\r \' .)10.)-,3:J>36F7,-@WAFLNRSR2>ZaZP`JQROÿÛ\0C&&O5-5OOOOOOOOOOOOOOOOOOOOOOOOOOOOOOOOOOOOOOOOOOOOOOOOOOÿÀ\0\0d\0d\"\0ÿÄ\0\0\0\0\0\0\0\0\0\0\0\0\0\0ÿÄ\07\0\0\0\0\0\0\0!1AQaq‘¡\"2±²6BbÁRScrÑsÿÄ\0\0\0\0\0\0\0\0\0\0\0\0\0ÿÄ\0\0\0\0\0\0\0\0\0\0\0!1Q\"AÿÚ\0\0\0?\0éÈˆ€ˆˆˆ€ˆˆˆ€ˆˆˆ€Š·Žæø0\\@ÑÉI$®\rÔ×\07^hó¾Qa(šÒ\\ÝCÓE®kzkõfEdÁeù1({­õ[pâTÐVÓÈz›+Iòºš©ªÚDEDDEñÎkÜàiAõ•^-‡QFdª­‚6Ž·‹ùs*µWí†n<55¸443Edµd·ÅÉž^ÌS‚º69™·\rqÜooáG5ö¾nÐK¬èY³G%_e;	<0öØoÓ{+´)XÜÎæAá0Ü(9í{ZÆŽ·.ëíºöa®1èÇÈ•†{©xŠá„nÖ‰î±b6ß«©mMKOiHŒDKF{2ý€oßuG4œWBè+ž7µú,¸‹je—‹PÇGpc[ªÿ\0Nâ­±6ÚtÕT¬ãa¸Œñ‰­´mØ½Óç¬b6†šÀûrÕuûöº…ž™ü0Û¸q[vôÜ^ßPVaSÅ¯ŒÖ±¡äéä\r­õkžQœªò3Þ$iZæÁLç[æh$]–„¹×Ù\"„ƒÉ±4ßÎê>—	†*áC7á‚I\\ÇXD,	¿s}ví^_„½¬•ï/,Òˆ\ZuXvÝÍob’bÌÒW0ã•µÑC_GWPÊbÀÉbŽBÞÿ\0p}±UŸW4³Xºî\"÷;•K#ÂXù)çø®\ZC­¥í>aÃc\r–\ZJ×½ÓR½‘Îí¸øC¿ÐŸ¡õN¢Ë\"\"J‡ÇØ9¹Ö&ç¡`¦$ÏÒnª¨ÞÉßØZðãv‘b˜ì&kµ¹Oës×pÉ¿•0ÿ\0üÏÜQ|ÉŸ”ðÿ\0ô?qEÃ/kŽ^©ÑŸlnf´ó, ¨õµÔ\"\'5š˜fšW•€‘aà	òêS~Ñ(+¤Ì2TSC#˜è˜ÛpvPàœÔíl„•œY¤ö]z7ùÛÔIpéÙ1®÷ÎnÚXæü\rÀÛ¢Å¢Ý&ýKá«Ãâ~™¤uW	úYw9ÂFÛÈ\\Û¸užZlËõQ€×KHè\\úµ^¨—xêèÈ½œãný”ëë=}d8Ë\ZKih	n“2HvØp/Ð9þ¢zV†\'Y[Y	5\rŠ&jsˆgMÍúO¯‡%#ø^q»ëiÃz~}A–\",ÒìGn¡\rÿ\0”Þ+¼Uùq\n¹ã|Æ¦M%¡,hipÖqöÛuø„¦šX„Ïx˜zÜIÛ{øyj“+²8t¶¼ŸÒ#çÛÍk·,³Q/«³mk‡ýRØ—(­Ò·Q»¡aö[RÊZIÕqkéÉX)òä65²ÚßÐò±M–àÐóï®ŽîæbÔ=\nÔÊH³<^é¸XÖ#ª!®€–‰µDsý<ù¥N…¡“)ÒápAëä®¸lQa>6Ô¶yû’F›µˆ*½˜(È¯uK#!“nmÉ®éX—µÂöë™/ò–oíŸ¸¢ó‘Å²v\Z?Æ~â‹–^±}V³®/_KŽIMMAÆ`…¯±;žå³ES)0f·Sµ=æúîM—YE®}xtåß‡³„„;Ü©\Zöqf¡ê³G–s[4ðÅ,|Ë€-êî]-åQÏæiAÕˆÓGÜn<š¤ir]Aß±Yoca¶þ*â‰ÊŠÈ8®½³ôÜÛàwý^NAÅ¯¶`‘Ýú‚è(§*(0{?®tÌ5xôü6›‘«ŸmèTœyFz~\'’V46vÜ·ÄáZÑ9QHªÂ±zQwÑETÏÕÃ}ïàBÜ§ÃîŽfS¹ŽcwçÙekD”`¢‰°RG\Z>P-mÑgE(\"\"\" \"\"\" \"\"\" \"\"\" \"\"\" \"\"\" \"\"\" ÿÙ','3.29'),(18,'Safeway Pecan Chips - 2 Oz','Recipe ready. Approx 1/2 cup. 0 mg sodium per serving. 0 g trans fat per serving. Product of USA, Mexico.','Condiments/Spices & Bake','ÿØÿà\0JFIF\0\0_\0_\0\0ÿá\0RExif\0\0II*\0\0\0\0\0i‡\0\0\0\0\Z\0\0\0\0\0\0\0\0†’\0\0\0\0,\0\0\0\0\0\0\0LEAD Technologies Inc. V1.01\0\0ÿÛ\0C\0\r	\n\n\r\n\r \' .)10.)-,3:J>36F7,-@WAFLNRSR2>ZaZP`JQROÿÛ\0C&&O5-5OOOOOOOOOOOOOOOOOOOOOOOOOOOOOOOOOOOOOOOOOOOOOOOOOOÿÀ\0\0d\0d\"\0ÿÄ\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0ÿÄ\0B\0	\0\0\0\0\0!1AQaq‘Ñ\"#2¡á3RS¢²Á6Br‚ÒðCTbds’±ñÿÄ\0\0\0\0\0\0\0\0\0\0\0\0\0\0ÿÄ\0#\0\0\0\0\0\0\0\0\0\0!1Q23AqÿÚ\0\0\0?\0éÔQAé@gã1¯%ÁÁÇèÇÎ¼q¦žKŸüÎ©SÚ¨•ƒ\rÃí~uŠÅl£ Ÿv¯/åÑwbÈãm3õgÏ÷Î¤iÜHšž¡%½œ38XÃ¢79ÜŸjç¬–¸ÙpsáÍR4­VãDº’kESÚ R®	V§©¦ü±VKÁt›Œ´ûy^)–á]«)pGßXŽ6Ó3‚\'û|ê‰<í{u%ÄÉÍ$ŒY±¶æ³®2#üU—ÕZ\ZÁ\Zò]ÛlÚ;¢?í¯ù«ÕãKÿ\0wt=ã_óU\n[Xœ\"ç#5‚ØZ…Ùì<óµª­{bN­£êöú²ÊmÄƒ²#<ëŽ¹õô¦URàÂZ]Ùy•@ÇLó«m_†Bl—$©¦QEÔÀQEMm*ÍÞG•ò»ôŽø5áÑ¬€ÊÛçn¥ÛçSŽ×1’íÛõ5ˆçùTäc8¯!ÂLµSÉ¦Z#ö§?I$oc6™§˜¡F ìXšpZ&R•n„g~†£On2PÀùõßò¬¹&eÃúŒ¶²É23€øÁm¶‘¡Gý‚.3áVÀ·¹‡™yˆæ\0ûÕrH£e9™ÕFä\Z3Já-7Éì_Ù·?ÑqëÒ·¥ºH¸1¢ùÓ[^îŒ\"i–O…cd¡UŠÆŸVs•ßû#Çò®¶o÷ƒ¡ìtûÿ\0P@>V¬Ÿ…À\Z*ñ‘ÏïN+ÚÀµäü˜QEØÀQEU»|_^ ëÚd¸T5½s!/)QÔÔ=c[ŠÓ‰oíš«®ãû ÔkËé®,ûÅ„ÍÊpd›Üì<qPVí\"Å´êGW	*¾ÛÏ—ú\ny¶ím÷xçIR-NïNíd‚é{AõoÊPœ°FÇ;RGMj”·h¯–f’2_™½†7Çò¡ô¹\Z4¶ËÞŸvmnRL^Ž=?ûüª%ì2éúƒ$\'š	<[sL{Rm#ˆ/­ÑEÅœ³Æ$ìÙÖ1±ð\\ø·¥YaÕì.XÙÜC\"\0ÙÐŸ?˜¬>—#ž!å=èÓpO“\'8~§*sø×—¤a¥,Y•@û<£Â¦_ZÞ[²œÜJ£*Â•jròÛìqð©*øhÒ{ò‹w	Wàþóÿ\0§4—„«–ÞïüFW³‡õ¯ð†ÿ\0&QEt2QE\0qî-”/êLÜÈ?qEÚÌzs·!~°Ê¯€NHlôé[8žÒ6×uƒmq&\'Ü‰Bƒá°ëÖ¢\'sŠ#),‹`“vŒ¨?\n_&RâÑèÍ.)1þ©<¶ÖóJ¶Ö÷¸E,Ý@\\dŽãm©n¡ÝmnÞâÊK8ZUh²Û«nÙ\'løÔMW¼Ã\0š×ë#êç”æ?qIÄ²ÜÊ±Û@ò3œr\rÀtû°ýñ¯d¼EuÔpr½Çm\"\rÒC€ÞDŽoCYXê!æ~vU2;;·Sœ\nØ4[t?jÎT`Ä‰ŸSåR áû6Œ™ã’9pHúÒNvØ¾4—Q2ü\"…r‹o\njÁÉÓ.Hu ö\\Ûû­hâÄö€˜Peãý__jHm¥]\'*ö’ÂC£Üãýí½túH]°|ë–E×¢k®5Éø<ƒÃvÄ~³ÿ\0§t»B¶KKc‰\\¨òç1­Âã)ÓÛl(¢ŠØ‚Š( MÅÑ¼z¥Ä‰É—¸lî=3áš¬Þ0UÊH’&XŽ\\å=\néZÏBâéæ¾äí%-ËÙ‚¡wÆwëëI¦à{i#þÕìv?½ëR¨­ú*Y\'^ÄPÜ0ò‡ òH;¿Ø\\r¶7\"‰îî£™–ÎÑä•íuó]¼ÈûªÈœ!h³e5TÀ¡˜$“¿‰ëRÇ[;BÝúVl *€7ðòéKµ_CîI^´¸[{Ž`¥q³•ç$oô·Ç‡†*JÝÝ]–Yd‰•¾°\0(Û¦zŒƒš{ý´!žkùŒ„ìåè!¶Õ¹8vÆ	©<¯ÌÃô„rçÃÛsáBÇby#øUU..e2¤ìÐ’ìà.r6ê7é]@KXÎüåFwÏ…Tî4;k¦ÍÄª æÐ«\'Ÿ¾ß•XÅÕ£:ÇÔNÇì¨pIÿ\0X®ØåÏ³×/C=8nAÏÚ5.¢ØÆãÉ¿©UÔâQE\0QE\0Sø‚ÿ\0FžY-on×).áIÊ°Èð÷4¿¾ðâ;È— ;…RÃ›p1·á½*¿Ò¹ï§šX\'“µ‘˜œš‹ýÆE´ãîj‡å=ú*ìOØÖK¾hù%»< ’\0çØœtÛÐTÈx“E²·ŠÞ§u]ìÛ§®Õ[“†Äc˜ZÊÄûšŽ4K[)ˆ?òš%°ìÏÙn<Q¤ã=ì‘é|«MÏi7vâÞNÑâmÈä88;UXè·hG%”ãÜ\ZÍt»Ö)@Ðó×ðk}–{Â² F·NQŒÄàc>^æ¶ÇuÃq´mÜ˜Âò‡\0nN}þ‘ßÖ«ƒJ¾ÿ\0„˜†½]&û;ZMð¬÷ëèk¯Lê:í­ìRY–UR2G…4ª\0Ú\\ÚCz.axùŠróg­[ª¼TêSdÖ’­ ¢Š+¡€¢Š(A´·=aS÷QÜí¿bŸ\n(¬él;¶BŸ\n;·ìSáEiØw;oØ§Â¼îV¿°O…Q¤=îVÙÏbŸ\nôZ[Ž§ÂŠ(Ò\r›4!ùVTQM(¢Š`ÿÙ','2.79');
/*!40000 ALTER TABLE `ins` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2013-10-22 10:20:40
