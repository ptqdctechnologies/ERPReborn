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

namespace Google\Service\Aiplatform;

class CloudAiLargeModelsVisionGenerateVideoExperimentsSuperResConfig extends \Google\Model
{
  public const MODE_MODE_UNSPECIFIED = 'MODE_UNSPECIFIED';
  /**
   * Single-pass 4K UDiT.
   */
  public const MODE_MODE_4K = 'MODE_4K';
  /**
   * Single-pass 8K UDiT.
   */
  public const MODE_MODE_8K = 'MODE_8K';
  /**
   * "8K UDiT, downsampled 2x in the decoder.
   */
  public const MODE_MODE_4K_PRO = 'MODE_4K_PRO';
  /**
   * Super Res mode. Required.
   *
   * @var string
   */
  public $mode;

  /**
   * Super Res mode. Required.
   *
   * Accepted values: MODE_UNSPECIFIED, MODE_4K, MODE_8K, MODE_4K_PRO
   *
   * @param self::MODE_* $mode
   */
  public function setMode($mode)
  {
    $this->mode = $mode;
  }
  /**
   * @return self::MODE_*
   */
  public function getMode()
  {
    return $this->mode;
  }
}

// Adding a class alias for backwards compatibility with the previous class name.
class_alias(CloudAiLargeModelsVisionGenerateVideoExperimentsSuperResConfig::class, 'Google_Service_Aiplatform_CloudAiLargeModelsVisionGenerateVideoExperimentsSuperResConfig');
