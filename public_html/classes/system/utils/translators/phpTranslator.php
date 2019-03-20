<?php
 namespace UmiCms\Classes\System\Translators;class PhpTranslator {const SYMBOL_DELIMITER = ':';private static $shortSymbolList = [   '@',   '#',   '+',   '%',   '*'  ];private static $fullSymbolList = [   'attr',   'attribute',   'list',   'nodes',   'node',   'void',   'xml',   'full',   'xlink',   '@xlink',   'comment',   'subnodes'  ];private static $redundantSymbolList = [   '%',   'xlink',   '@xlink',   'xml'  ];private static $autoSubNodeSymbol = 'items';private $allKeysAreUseless = true;public function translate($v8d777f385d3dfec8815d20f7496026dc) {if (!$this->isTranslatable($v8d777f385d3dfec8815d20f7496026dc)) {return $v8d777f385d3dfec8815d20f7496026dc;}$result = [];foreach ($v8d777f385d3dfec8815d20f7496026dc as $v3c6e0b8a9c15224a8228b9a98ca1531d => $v9603a224b40d7b67210b78f2e390d00f) {if ($this->isRedundant($v3c6e0b8a9c15224a8228b9a98ca1531d)) {continue;}$v9603a224b40d7b67210b78f2e390d00f = $this->collapse($v9603a224b40d7b67210b78f2e390d00f);$v7beb21fa5895a20d2dc1876a6afa8deb = $this->cleanKey($v3c6e0b8a9c15224a8228b9a98ca1531d);$result[$v7beb21fa5895a20d2dc1876a6afa8deb] = $this->translateBranch($v9603a224b40d7b67210b78f2e390d00f);}return $result;}public function setAllKeysAreUseless($v327a6c4304ad5938eaf0efb6cc3e53dc = true) {$this->allKeysAreUseless = (bool) $v327a6c4304ad5938eaf0efb6cc3e53dc;return $this;}private function translateBranch($v8d777f385d3dfec8815d20f7496026dc) {if (is_array($v8d777f385d3dfec8815d20f7496026dc)) {return $this->translate($v8d777f385d3dfec8815d20f7496026dc);}return $v8d777f385d3dfec8815d20f7496026dc;}private function collapse($v8d777f385d3dfec8815d20f7496026dc) {if (!$this->isCollapsible($v8d777f385d3dfec8815d20f7496026dc)) {return $v8d777f385d3dfec8815d20f7496026dc;}$v24fb4587807bc3ca815b416bf57d1399 = $this->getFirstKey($v8d777f385d3dfec8815d20f7496026dc);$v6adffc3a96d2784031d5a42d46d1fa49 = $v8d777f385d3dfec8815d20f7496026dc[$v24fb4587807bc3ca815b416bf57d1399];if ($this->isKeyUseless($v24fb4587807bc3ca815b416bf57d1399)) {return $this->collapse($v6adffc3a96d2784031d5a42d46d1fa49);}if ($this->isCollapsible($v6adffc3a96d2784031d5a42d46d1fa49)) {$v3c74a092e2d787d8ad14af67e9309ead = $this->getFirstKey($v6adffc3a96d2784031d5a42d46d1fa49);$v8d777f385d3dfec8815d20f7496026dc[$v24fb4587807bc3ca815b416bf57d1399] = $this->collapse($v6adffc3a96d2784031d5a42d46d1fa49[$v3c74a092e2d787d8ad14af67e9309ead]);}return $v8d777f385d3dfec8815d20f7496026dc;}private function isKeyUseless($v3c6e0b8a9c15224a8228b9a98ca1531d) {if ($this->allKeyAreUseless()) {return true;}$v93e36fb98d3ce6160522f4bd6d2e1f14 = $this->cleanKey($v3c6e0b8a9c15224a8228b9a98ca1531d);return ($v93e36fb98d3ce6160522f4bd6d2e1f14 !== $v3c6e0b8a9c15224a8228b9a98ca1531d || $v3c6e0b8a9c15224a8228b9a98ca1531d === self::$autoSubNodeSymbol);}private function allKeyAreUseless() {return $this->allKeysAreUseless;}private function getFirstKey(array $v8d777f385d3dfec8815d20f7496026dc) {$v9098cc480e245328b338214fa84adc2e = array_keys($v8d777f385d3dfec8815d20f7496026dc);return array_shift($v9098cc480e245328b338214fa84adc2e);}private function isCollapsible($v8d777f385d3dfec8815d20f7496026dc) {if (!is_array($v8d777f385d3dfec8815d20f7496026dc)) {return false;}if (umiCount(array_keys($v8d777f385d3dfec8815d20f7496026dc)) !== 1) {return false;}$v24fb4587807bc3ca815b416bf57d1399 = $this->getFirstKey($v8d777f385d3dfec8815d20f7496026dc);if (!is_string($v24fb4587807bc3ca815b416bf57d1399)) {return false;}return true;}private function cleanKey($v3c6e0b8a9c15224a8228b9a98ca1531d) {$v4f09daa9d95bcb166a302407a0e0babe = $this->getShortSymbol($v3c6e0b8a9c15224a8228b9a98ca1531d);if ($v4f09daa9d95bcb166a302407a0e0babe) {return mb_substr($v3c6e0b8a9c15224a8228b9a98ca1531d, 1);}$ve9dc924f238fa6cc29465942875fe8f0 = $this->getFullSymbol($v3c6e0b8a9c15224a8228b9a98ca1531d);if ($ve9dc924f238fa6cc29465942875fe8f0) {return mb_substr($v3c6e0b8a9c15224a8228b9a98ca1531d, mb_strlen($ve9dc924f238fa6cc29465942875fe8f0) + mb_strlen(self::SYMBOL_DELIMITER));}return $v3c6e0b8a9c15224a8228b9a98ca1531d;}private function isRedundant($v3c6e0b8a9c15224a8228b9a98ca1531d) {$v97bff26855a8bfa63e05d5477e794b24 = $this->getSymbolFromKey($v3c6e0b8a9c15224a8228b9a98ca1531d);return in_array($v97bff26855a8bfa63e05d5477e794b24, self::$redundantSymbolList);}private function getSymbolFromKey($v3c6e0b8a9c15224a8228b9a98ca1531d) {$ve9dc924f238fa6cc29465942875fe8f0 = $this->getFullSymbol($v3c6e0b8a9c15224a8228b9a98ca1531d);if ($ve9dc924f238fa6cc29465942875fe8f0) {return $ve9dc924f238fa6cc29465942875fe8f0;}return $this->getShortSymbol($v3c6e0b8a9c15224a8228b9a98ca1531d);}private function getShortSymbol($v3c6e0b8a9c15224a8228b9a98ca1531d) {$vd0d61d17ff485c944806bc25fdf6377e = mb_substr($v3c6e0b8a9c15224a8228b9a98ca1531d, 0, 1);$vb29d475f34335d4f0a74291cb54c1620 = array_search($vd0d61d17ff485c944806bc25fdf6377e, self::$shortSymbolList);if ($vb29d475f34335d4f0a74291cb54c1620 === false) {return null;}return self::$shortSymbolList[$vb29d475f34335d4f0a74291cb54c1620];}private function getFullSymbol($v3c6e0b8a9c15224a8228b9a98ca1531d) {$v296e0d4111f8b5a961e2599862d1ba65 = mb_strpos($v3c6e0b8a9c15224a8228b9a98ca1531d, self::SYMBOL_DELIMITER);if ($v296e0d4111f8b5a961e2599862d1ba65 === false) {return null;}$ve195c39e545a61ad99a11095559f413d = mb_substr($v3c6e0b8a9c15224a8228b9a98ca1531d, 0, $v296e0d4111f8b5a961e2599862d1ba65);if (!in_array($ve195c39e545a61ad99a11095559f413d, self::$fullSymbolList)) {return null;}return $ve195c39e545a61ad99a11095559f413d;}private function isTranslatable($v8d777f385d3dfec8815d20f7496026dc) {return is_array($v8d777f385d3dfec8815d20f7496026dc);}}