<?php
 namespace UmiCms\System\Data\Object\Property\Value;class OfferIdList extends \umiObjectProperty {protected function loadValue() {$v16b2b26000987faccb260b9d39df1269 = (int) $this->getObjectId();$v945100186b119048837b9859c2c46410 = (int) $this->getFieldId();$v80071f37861c360a27b7327e132c911a = $this->getTableName();$v1b1cc7f086b3f074da452bc3129981eb = <<<SQL
SELECT `offer_id` FROM `$v80071f37861c360a27b7327e132c911a` 
WHERE `obj_id` = $v16b2b26000987faccb260b9d39df1269 AND `field_id` = $v945100186b119048837b9859c2c46410
SQL;
INSERT INTO `$v80071f37861c360a27b7327e132c911a` (`obj_id`, `field_id`, `offer_id`) VALUES
SQL;