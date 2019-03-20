<?php
 namespace UmiCms\Classes\System\Utils\Links\Grabber;class State implements iState {private $statesOfSteps;private $currentStepName;private $isComplete;public function __construct(array $v9ed39e2ea931586b6a985a6942ef573e) {if (!isset($v9ed39e2ea931586b6a985a6942ef573e[iState::STEPS_KEY])) {throw new \wrongParamException('Cant detect current step');}$vfa0a2cbac18253f95960cc1fded8594e = $v9ed39e2ea931586b6a985a6942ef573e[iState::STEPS_KEY];if (!isset($v9ed39e2ea931586b6a985a6942ef573e[iState::CURRENT_STEP_KEY])) {throw new \wrongParamException('Cant detect current step');}$v6e422d769b360a2b8fab6ecfd903f037 = $v9ed39e2ea931586b6a985a6942ef573e[iState::CURRENT_STEP_KEY];if (!isset($v9ed39e2ea931586b6a985a6942ef573e[iState::COMPLETE_KEY])) {throw new \wrongParamException('Cant detect complete status');}$vf94c28463eca606eda684e34af8244cf = $v9ed39e2ea931586b6a985a6942ef573e[iState::COMPLETE_KEY];$this->setCurrentStepName($v6e422d769b360a2b8fab6ecfd903f037)    ->setStepsState($vfa0a2cbac18253f95960cc1fded8594e)    ->setCompleteStatus($vf94c28463eca606eda684e34af8244cf);}public function export() {return [    iState::CURRENT_STEP_KEY => (string) $this->getCurrentStepName(),    iState::STEPS_KEY => (array) $this->getStatesOfSteps(),    iState::COMPLETE_KEY => (bool) $this->isComplete(),   ];}public function setCurrentStepName($vc2a4cfd1efe2fcc567e41922b33e8d28) {if (!is_string($vc2a4cfd1efe2fcc567e41922b33e8d28) || $vc2a4cfd1efe2fcc567e41922b33e8d28 === '') {throw new \wrongParamException('Wrong step name given');}$this->currentStepName = $vc2a4cfd1efe2fcc567e41922b33e8d28;return $this;}public function setStepsState($v22e78a59f7d37214aa9fcccd8b1c1236) {if (!is_array($v22e78a59f7d37214aa9fcccd8b1c1236) || umiCount($v22e78a59f7d37214aa9fcccd8b1c1236) === 0) {throw new \wrongParamException('Wrong states of steps given');}$this->statesOfSteps = $v22e78a59f7d37214aa9fcccd8b1c1236;return $this;}public function isComplete() {if ($this->isComplete === null) {throw new \wrongParamException('You should set is complete status first');}return $this->isComplete;}public function getCurrentStepName() {if ($this->currentStepName === null) {throw new \wrongParamException('You should set current step name first');}return $this->currentStepName;}public function getStepsNames() {if ($this->statesOfSteps === null) {throw new \wrongParamException('You should set steps state first');}return array_keys($this->statesOfSteps);}public function getStatesOfSteps() {if ($this->statesOfSteps === null) {throw new \wrongParamException('You should set steps state first');}return $this->statesOfSteps;}public function getStateOfStep(Steps\iStep $v2764ca9d34e90313978d044f27ae433b) {if ($this->statesOfSteps === null) {throw new \wrongParamException('You should set steps state first');}$vc2a4cfd1efe2fcc567e41922b33e8d28 = $v2764ca9d34e90313978d044f27ae433b->getName();if (!isset($this->statesOfSteps[$vc2a4cfd1efe2fcc567e41922b33e8d28])) {throw new \wrongParamException('Unsupported step given');}return $this->statesOfSteps[$vc2a4cfd1efe2fcc567e41922b33e8d28];}public function setStateOfStep(Steps\iStep $v2764ca9d34e90313978d044f27ae433b) {if ($this->statesOfSteps === null) {$this->statesOfSteps = [];}$this->statesOfSteps[$v2764ca9d34e90313978d044f27ae433b->getName()] = $v2764ca9d34e90313978d044f27ae433b->getState();return $this;}public function setCompleteStatus($vf94c28463eca606eda684e34af8244cf) {if (!is_bool($vf94c28463eca606eda684e34af8244cf)) {throw new \wrongParamException('Wrong complete status given');}$this->isComplete = $vf94c28463eca606eda684e34af8244cf;return $this;}}