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
INSERT INTO `ins` VALUES (15,'Ghirardelli Chips Semi Sweet Chocolate - 12 Oz','All natural. The luxuriously deep flavor and smooth texture Ghirardelli Premium Baking Chocolate delivers the ultimate chocolate indulgence. We hand-select the world&#39;s finest cocoa beans and roast them to perfection, then blend the purest ingredients to a','Condiments/Spices & Bake','����\0JFIF\0\0_\0_\0\0��\0RExif\0\0II*\0\0\0\0\0i�\0\0\0\0\Z\0\0\0\0\0\0\0\0��\0\0\0\0,\0\0\0\0\0\0\0LEAD Technologies Inc. V1.01\0\0��\0C\0\r	\n\n\r\n\r \' .)10.)-,3:J>36F7,-@WAFLNRSR2>ZaZP`JQRO��\0C&&O5-5OOOOOOOOOOOOOOOOOOOOOOOOOOOOOOOOOOOOOOOOOOOOOOOOOO��\0\0d\0d\"\0��\0\0\0\0\0\0\0\0\0\0\0\0\0��\0:\0\n\0\0\0\0\0\0!1\"AQaq�2��#��%3BSbr��������\0\0\0\0\0\0\0\0\0\0\0\0\0\0��\0$\0\0\0\0\0\0\0\0\0\0Q!1A2\"a��\0\0\0?\0��D@\0DDD@\0DDUʲH&-d��\r�JK�t@��O\'0|C�Q��WK\'ۖ2Z��u�6����#�5I�\0��S�Ò=,�ERo��t���u�<CN9�U�\0`�N�9;�˄Tn�����=��q%n��`=��]��]\"�Q0e����@�\\�v�ݦ^���\Z?�꾷�͜\Z4Y��6<��i1�)8����4�6:|d����Tg��5���6h�ѹϤ��v��O�+��P��N��%�8i`�w��\\z[��_8�����l������i�4.��w�s��\r�+�+5-G�A�*VM�c/!���{�Me��E�k�\\\Zcl��c]x���_BCφ�9s�n}�;$�u�Q/F苘���Z]��؍�0�U^џԍ�-��Zt4I�g5��>[)rFCs�����su����4M����[�������_[�\\H�DRF�ї��n@v�z�=,������\r�L���G3ud0eC�\n����5�1��-�۫�R�~�<�7��KZ��,+�҅���ծ�(&Yd<�Y+�cu�V�ōhhn��\n��jX�z�OM���y��edU����i�\rN=���v��[rh�7E2�m/v]Q��a� �\r������������\n6R�����$FLɥ\r�D�<�o�])+b��Z�R=��#&���t9�e>�ٚ���\0�E�Z�0�����ۛ���U�B)��,�NAsI����\"���8;$h\n��=:_#�\0��,i�8^�^\rAJ��q-��sck������ދ4�P$�(������;z���V���!������ʡ��d$�Z�᯲?O�2;,�BF����dU<��5�m���t��.�8mS���*�.�Sɡ��|z5`g��eul�҆I,Nk\\�yv0<���,�FO�f��J(i���#��Ns���˝tœ@_��������z�]/��>i�v茍����pϚ�Od����D�MMT:M1�\\�q�U�I����,z�\"R�����5,Mv����;�*<�J&��@`��Ӿ{���X��	�4���TZZ\n�:^�4�l\\0�1���\n��$�8���p�cI�!Fn2�%��[�ò�qҾ,���Pg���g�ё�%eo�,�~Od�1��g�\r(���tp�G!��b����A��~�t���\Z�c��B& 5��	Z�e\\�Z��?΢?\"�G\"�����4`\06xލJnR/Z���8xZc�_��8�������/����Z�R�W���L�}Ѹ�h�#�?R��ۯ�����0��X6#+Z��\Z�\'w<�pM{E7��M1���矗����w�?L�� ����D�Ɯc�\0ҽ\r�M��pd[M��CcK@|�=�EE6��$��mC�;!�h=�p���d�21X��@)[�6�n1�������!���1���M����TMN�J�VH$~�^�EFY\r\\��Y�����G���d16(���3�\"�Ab)I<���\")��\"\"\0��\" ��\"\"\0��\" ��\"\"\0��\" ����','4.39'),(16,'Guittard Baking Chips Milk Chocolate - 11.5 Oz','Real vanilla. Smoother texture. The Guittard family has been honored with distinguished with distinctive awards in international chocolate competitions for four generations. International Gold Medal Winner Brussels, Belgium 1987. This bag contains 2 cups.','Condiments/Spices & Bake','����\0JFIF\0\0d\0d\0\0��\0C\0\r	\n\n\r\n\r \' .)10.)-,3:J>36F7,-@WAFLNRSR2>ZaZP`JQRO��\0C&&O5-5OOOOOOOOOOOOOOOOOOOOOOOOOOOOOOOOOOOOOOOOOOOOOOOOOO��\0\0d\0d\"\0��\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0��\07\0\0\0\0\0\0\0!1AQ\"#aq�2B��RSr���3D�����\0\0\0\0\0\0\0\0\0\0\0\0\0\0��\0\0\0\0\0\0\0\0\0\0\0Q!1A\"��\0\0\0?\0�Ȉ��������������]��mҽVz�9��h����8R�KnX� N��������E	?�	\ZB`��!8kr~[�k���9gŌ�d�~`��ȕE��1�	$�;r�n���c\n�x�3�U\\�?��\0D�.(\'x����RRz�K?>YtC���t�����eE�#(ᅀ�\0`?��z����C�������L�DP��{Wt��\"-�A�Oe�S�Y�wE�YCK���\0���&+[�F�;��+���j����{�Y��l��7e�`p=�X>%hsI�.S�FO��ǩ����HS�S��S��`�mZ����~AT�?�=#��;`��`��++�֒hY�>K-$C��X���ror��,�b�����ݥ\rn�;���p�X��t�Fm{��	m�\"��}x��r�p�\0�J����,Va�f��mv��gwc�����̔��Ѡ�osA W�/��{�\0c�\'��>cfq���|����?V,8ٙ�Y\r�Þ\"i%���V\"���Ka���%�Z|������v���|��v����;�����\'��d�J�<���ń��=�|�	h��/*ImO7���5c��q�^��yAѵ�ճpӂ��uZ�*�y�\0\\��7[�^t�\'��� ��F�>�.q��v[���rƑ�U�Kng�y�\\Z~�{\0>�����x�V��b�8�^�O]��SS��lCZ0[1���ǫ�N֗�m���Tm����E��gc=g|rP�\"���:\'y^㱿!���3�&�ef4��A� 1��j\\2���`��s0_��g�=���Q��X�J^�(,�l�#�4�Z�5�}��-�(�@�^�֍�*N�ۄ�ihn}cl�;+�h>ӥh�ѻ��nji�K���-G������\r�\0jߒ���\ZǗ@уAۿU�X��:�:�������P��b$��iY�y���F\Z�#�L�<�;�3\0�:u^��ėٷ���q�����`�Q�j�o�ɮ�՘Kk�q����Y����r�����s�F4�;o���l�\Z�f����jC���d���r�]73ˮϙ#��4�Ҽ7���Z��,�3	��@\0g��χ��ry���i���F�Ff9�n&\\I�l|Q�8�S�9�ᄗu.<�U���WIDE�j^6�������IӾެs��:��]��d����\0q�y��p��Eћ屜��5�\Z��68\0��r^#>��Vg8s��#:8}�����|�%�M�+�1��DQ��+��6_��W(d�\\2���\0Vvg{�*�]��B�0����k�NZ�qM��*�q˨�O\\��O;�k���w��	G�eX�v��};��~�����x�5ק,�-�\'��x#��N>j�قV�i��34��98��O-i���s�һ,SI��9d��.Q�Se�_\n��EF7Ks�aZ\\������������������������������','4.19'),(17,'Safeway Baking Chips Milk Chocolate - 11.5 Oz','0g Trans fat per serving. 0mg Cholesterol per serving.','Condiments/Spices & Bake','����\0JFIF\0\0_\0_\0\0��\0LEAD Technologies Inc. V1.01\0��\0C\0\r	\n\n\r\n\r \' .)10.)-,3:J>36F7,-@WAFLNRSR2>ZaZP`JQRO��\0C&&O5-5OOOOOOOOOOOOOOOOOOOOOOOOOOOOOOOOOOOOOOOOOOOOOOOOOO��\0\0d\0d\"\0��\0\0\0\0\0\0\0\0\0\0\0\0\0\0��\07\0\0\0\0\0\0\0!1AQaq���\"2��6Bb�RScr�s��\0\0\0\0\0\0\0\0\0\0\0\0\0��\0\0\0\0\0\0\0\0\0\0\0!1Q\"A��\0\0\0?\0�Ȉ������������������0\\@��I$�\r��\07^h�Qa(��\\�C�E�kzk��fEd�e�1({��[p�T�V��z�+I򺚩��DEDDE��k��iA��^-�QFd���6����s*�W��n<55�443Ed�d����^�S��69���\rq�oo�G5���n�K��Y�G%_e;	<0��o�{+�)X���A�0�(9�{ZƎ�.���a�1��ȕ�{�x��n։�b6߫�mMKOiH�DKF�{2��o�uG4�WB�+�7����,��je��P�Gpc[��\0N⭱6�t�T��a�������mؽ��b6����r�u�������0۸q[v��^�PVaSů�ֱ����\r��k�Q���3�$iZ��L�[�h$]������\"��ɱ4���>�	�*�C7�I\\�XD,	�s}v�^_�����/,��\ZuXv��o�b�b��W0㕵�C_GWP�b��b�B��\0p}�U�W4�X��\"�;��K#�X�)���\ZC���>a�c\r�\ZJ׽�R�����C�П��N��\"\"J���9��&�`�$��n������Z��v�b��&k���O�s�pɿ�0�\0���Q|ɟ���\0�?qE�/k�^�џlnf��,�����\"\'5��f�W���a�	��S~�(+��2TSC#��ہpvP����l�����Y��]z7����Ip��1���n�X��\r�ۢŢ�&�K���~��uW	�Yw9�F��\\۸u�Zl��Q��KH�\\��^��x��Ƚ���n����=}d8�\ZKih	n�2Hv�p/�9��zV�\'Y[Y	5\r�&js�gM��O��%#�^q��i�z~}A�\",��Gn�\r�\0��+�U�q\n��|ƦM%��,hip�q��u�����X��x��z�I�{�yj�+�8t����#���k�,�Q/��mk��Rؗ(�ҷQ��a�[R�ZI�qk��X)��65�����M����ﮎ��b�=\n��H�<^�X�#�!�����Ds�<��N���)��pA�䮸lQa>6Զy��F���*��(ȯuK#!�nmɮ�X�����/�oퟸ��Ųv\Z?�~⋖^�}V��/_K�IMMA�`����;���ES)0f�S�=����M�YE�}xt�߇���;ܩ\Z�qf��G�s[4��,|ˀ-��]-�Q��iAՈ�G�n<��ir]A߱Yoca��*�ʊ�8�������w�^NAů�`�����(�*(0{?�t�5x��6����m�T�yFz~\'�V�46vܷ��Z�9QH�±zQw�ET���}��Bܧ��fS��cw��ekD�`���RG\Z>P-m�gE(\"\"\" \"\"\" \"\"\" \"\"\" \"\"\" \"\"\" \"\"\" ��','3.29'),(18,'Safeway Pecan Chips - 2 Oz','Recipe ready. Approx 1/2 cup. 0 mg sodium per serving. 0 g trans fat per serving. Product of USA, Mexico.','Condiments/Spices & Bake','����\0JFIF\0\0_\0_\0\0��\0RExif\0\0II*\0\0\0\0\0i�\0\0\0\0\Z\0\0\0\0\0\0\0\0��\0\0\0\0,\0\0\0\0\0\0\0LEAD Technologies Inc. V1.01\0\0��\0C\0\r	\n\n\r\n\r \' .)10.)-,3:J>36F7,-@WAFLNRSR2>ZaZP`JQRO��\0C&&O5-5OOOOOOOOOOOOOOOOOOOOOOOOOOOOOOOOOOOOOOOOOOOOOOOOOO��\0\0d\0d\"\0��\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0��\0B\0	\0\0\0\0\0!1AQaq��\"#2���3RS���6Br���CTbds�����\0\0\0\0\0\0\0\0\0\0\0\0\0\0��\0#\0\0\0\0\0\0\0\0\0\0!1Q23Aq��\0\0\0?\0��QA�@g�1�%�����μq��K��ΩSڨ��\r��~u��l���v�/��wb��m3�g��Τi�H���%��38X��79ܟj笖��ps��R4�V�D��kES� R�	V�����VK�t����y^)��]�)�pG�X�6�3�\'��|�<�{u%���$�Y����2#�U��Z\Z�\Z�]ۍl�;�?�����K�\0wt=�_�U\n[X�\"�#5��Z���<���{bN�������mă�#<뎹���UR��Z]�y�@�L�m_��Bl�$���QE��QEMm*��G����5�Ѭ����n���S��1����5���T�c8�!�L�SɦZ#��?I$o�c6�����F��X�pZ&R�n�g~��On2P�����&e������23���m���G��.3��V������y��\0��rH�e9��F�\Z3J�-7��_ٷ?сq�ҷ��H�1���[^�\"i�O�cd�U�ƟV�s���#���o�����t���\0P@>�V����\Z*���N+�������QE��QEU�|_^���d�T5�s!/)Q��=c[�Ӊo����� �k��,�ō���pd���<qPV��\"Ŵ��GW	*��ϗ�\ny��m�x��IR-N�N�d��{A�o�P���F�;RGMj��h��f�2_���7����\Z4��ޟvmnRL^�=?���%�2���$\'�	<[sL{Rm#�/��EŜ��$���1��\\���Ya��.X��C\"\0��П?��>�#�!�=��pO�\'8~�*s�ח�a�,Y�@�<�¦_Z�[����J�*jr�ې�q�*�h�{�w	W����\0�4�������F�W�������\0&QEt2QE\0q�-�/�L��?qEڝ�zs�!~�ʯ�NHl��[8��6�u�mq&\'܉B���֢\'s�#),�`�v��?\n_&R����.)1���<���J����E,�@\\d���m�n��mn���K8ZUh�۫n�\'l���MW��\0���#���?qIĲ�ʱ�@�3�r\r�t����d�Euԍpr��m\"\r�C��D�oCYX�!�~vU2;;�S�\n�4[t�?j�T`ĉ��S�R ��6���9pH��Nv؍�4�Q2�\"�r�o\nj���.Hu �\\���h�����Pe��__jH�m�]\'*���C�����t�H]�|�Eעk�5��<��v�~��\0�t�B�KKc�\\����1���)��l(��؂�(�M�Ѽz�ĉɗ�l�=3ᚬ�0U�H�&X�\\�=\n�Z��B�����%-�ق�w�w��I��{i#�Ս�v?��R���*Y\'^�P�0� �H;��\\r�7\"�������u�]����Ȝ!h�e5T���$����R�[;B��Vl�*�7���K�_C�I^��[{�`�q���$o��Ǐ��*J��]�Yd����\0(ۦz���{��!�k������!�չ8v�	�<����r���s�B�by#�UU..e2��В��.r6�7�]@KX���FwυT�4;k��Ī �Ы\'��ߕX�գ:��N��pI�\0X���ϳ��/C=8nA��5.����ɿ��U��QE\0QE\0S���\0F�Y-on�).�Iʰ���4����;ȗ ;�RÛp1��*�ҹ栗X\'����������E���j��=�*�O��K�h�%�<��\0�؜t��T�x�E�����u]��ۧ��[���c�Z�����4K�[)�?�%����n<Q��=��|�M�i7v��N��m��88;UX�hG%���\Z�t��)@����k}�{² F�NQ���c>^��u�q�mܝ���\0nN}���֫�J��\0����]&�;ZM����k�L�:��RY�UR2G�4��\0�\\�Cz.ax��r�g�[��T�Sd֒� ��+����(A��=aS�Q��b�\n(��l;��B�\n;���S�Ei�w;oا¼�V��O�Q�=�V��b�\n�Z[���(�\r�4�!�VTQM(��`��','2.79');
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
