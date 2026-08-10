<?php
/*
 * Copyright 2014 Google Inc.
 *
 * Licensed under the Apache License, Version 2.0 (the "License"); you may not
 * use this file except in compliance with the License. You may obtain a copy of
 * the License at
 *
 * http://www.apache.org/licenses/LICENSE-2.0
 *
 * Unless required by applicable law or agreed to in writing, software
 * distributed under the License is distributed on an "AS IS" BASIS, WITHOUT
 * WARRANTIES OR CONDITIONS OF ANY KIND, either express or implied. See the
 * License for the specific language governing permissions and limitations under
 * the License.
 */

namespace Google\Service\ThreatIntelligenceService;

class CustomThreatScenarioConfig extends \Google\Model
{
  /**
   * Required. The condition driving the scenario, stored as a stringified JSON.
   * This is used to query/filter documents.
   *
   * @var string
   */
  public $documentCondition;

  /**
   * Required. The condition driving the scenario, stored as a stringified JSON.
   * This is used to query/filter documents.
   *
   * @param string $documentCondition
   */
  public function setDocumentCondition($documentCondition)
  {
    $this->documentCondition = $documentCondition;
  }
  /**
   * @return string
   */
  public function getDocumentCondition()
  {
    return $this->documentCondition;
  }
}

// Adding a class alias for backwards compatibility with the previous class name.
class_alias(CustomThreatScenarioConfig::class, 'Google_Service_ThreatIntelligenceService_CustomThreatScenarioConfig');
