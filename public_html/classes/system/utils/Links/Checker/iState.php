<?php
 namespace UmiCms\Classes\System\Utils\Links\Checker;interface iState {const OFFSET_KEY = 'offset';const LIMIT_KEY = 'limit';const COMPLETE_KEY = 'complete';public function __construct(array $v9ed39e2ea931586b6a985a6942ef573e);public function setOffset($v7a86c157ee9713c34fbd7a1ee40f0c5a);public function getOffset();public function setLimit($vaa9f73eea60a006820d0f8768bc8a3fc);public function getLimit();public function setCompleteStatus($vf94c28463eca606eda684e34af8244cf);public function isComplete();public function export();}