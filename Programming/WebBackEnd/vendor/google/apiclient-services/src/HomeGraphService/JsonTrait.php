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

namespace Google\Service\HomeGraphService;

class JsonTrait extends \Google\Model
{
  /**
   * Optional. Trait attribute map conforming to the trait's registered JSON
   * Schema.
   *
   * @var array[]
   */
  public $data;
  /**
   * Required. Canonical symbolic trait ID per `json_trait_schema.md`: -
   * Standard Matter (Cat 1): `matter.` (e.g., `matter.thermostat`) - Google /
   * vendor Matter (Cat 1/2): `matter..` (e.g., `matter.google.`,
   * `matter.eve.utility`) - Non-Matter (Cat 3, any provider incl. Google):
   * `ghp..` (e.g., `ghp.acme.warranty`, `ghp.google.`)
   *
   * @var string
   */
  public $id;

  /**
   * Optional. Trait attribute map conforming to the trait's registered JSON
   * Schema.
   *
   * @param array[] $data
   */
  public function setData($data)
  {
    $this->data = $data;
  }
  /**
   * @return array[]
   */
  public function getData()
  {
    return $this->data;
  }
  /**
   * Required. Canonical symbolic trait ID per `json_trait_schema.md`: -
   * Standard Matter (Cat 1): `matter.` (e.g., `matter.thermostat`) - Google /
   * vendor Matter (Cat 1/2): `matter..` (e.g., `matter.google.`,
   * `matter.eve.utility`) - Non-Matter (Cat 3, any provider incl. Google):
   * `ghp..` (e.g., `ghp.acme.warranty`, `ghp.google.`)
   *
   * @param string $id
   */
  public function setId($id)
  {
    $this->id = $id;
  }
  /**
   * @return string
   */
  public function getId()
  {
    return $this->id;
  }
}

// Adding a class alias for backwards compatibility with the previous class name.
class_alias(JsonTrait::class, 'Google_Service_HomeGraphService_JsonTrait');
