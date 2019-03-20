<?php
 class databaseCacheEngine implements iCacheEngine {private $connection;private $configuration;const NAME = 'database';public function __construct() {$this->connection = ConnectionPool::getInstance()    ->getConnection();$this->configuration = mainConfiguration::getInstance();}public function getName() {return self::NAME;}public function getIsConnected() {return $this->getConnection() instanceof IConnection;}public function saveRawData($v3c6e0b8a9c15224a8228b9a98ca1531d, $v8d777f385d3dfec8815d20f7496026dc, $vcd91e7679d575a2c548bd2c889c23b9e) {$v4717d53ebfdfea8477f780ec66151dcb = $this->getConnection();$v3cefd9aef386420529ff9dac810270e0 = $v4717d53ebfdfea8477f780ec66151dcb->escape($v3c6e0b8a9c15224a8228b9a98ca1531d);$v8d777f385d3dfec8815d20f7496026dc = $v4717d53ebfdfea8477f780ec66151dcb->escape(serialize($v8d777f385d3dfec8815d20f7496026dc));$v1ed2e1b19b6e55d52d2473be17a4afd9 = time();$vcd91e7679d575a2c548bd2c889c23b9e = time() + $this->normaliseExpire($vcd91e7679d575a2c548bd2c889c23b9e);$vac5c74b64b4b8352ef2f181affb5ac2a = <<<sql
INSERT INTO `cms3_data_cache` (`key`, `value`, `create_time`, `expire_time`, `entry_time`, `entries_number`)
	VALUES('$v3cefd9aef386420529ff9dac810270e0', '$v8d777f385d3dfec8815d20f7496026dc', $v1ed2e1b19b6e55d52d2473be17a4afd9, $vcd91e7679d575a2c548bd2c889c23b9e, 0, 0)
		ON DUPLICATE KEY UPDATE `value` = '$v8d777f385d3dfec8815d20f7496026dc', `create_time` = $v1ed2e1b19b6e55d52d2473be17a4afd9, `expire_time` = $vcd91e7679d575a2c548bd2c889c23b9e;
sql;
SELECT `value`, `expire_time`
	FROM `cms3_data_cache`
		WHERE `key` = '$v3cefd9aef386420529ff9dac810270e0';
SQL;
DELETE FROM `cms3_data_cache`
	WHERE `key` = '$v3cefd9aef386420529ff9dac810270e0';
SQL;
TRUNCATE TABLE `cms3_data_cache`;
SQL;
UPDATE `cms3_data_cache`
	SET `entry_time` = $vef852f572bc3e815ebf3e44c4f9ef42f, `entries_number` = `entries_number` + 1
		WHERE `key` = '$v3cefd9aef386420529ff9dac810270e0';
SQL;
DELETE FROM `cms3_data_cache`
	WHERE `expire_time` < $v07cc694b9b3fc636710fa08b6922c42b;
SQL;
OPTIMIZE TABLE `cms3_data_cache`;
SQL;