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

namespace Google\Service\CloudDataplex;

class GoogleCloudDataplexV1RequestBatchMetadataChangeRequest extends \Google\Model
{
  protected $changePayloadType = GoogleCloudDataplexV1BatchChangeMetadataRequest::class;
  protected $changePayloadDataType = '';
  /**
   * Optional. Justification for the metadata change request.
   *
   * @var string
   */
  public $justification;
  /**
   * Optional. User-defined labels for the metadata change request.
   *
   * @var string[]
   */
  public $labels;

  /**
   * Required. The detailed specification of the proposed changes. This payload
   * is intended to be embedded as the change_payload in the resulting
   * ChangeRequest.
   *
   * @param GoogleCloudDataplexV1BatchChangeMetadataRequest $changePayload
   */
  public function setChangePayload(GoogleCloudDataplexV1BatchChangeMetadataRequest $changePayload)
  {
    $this->changePayload = $changePayload;
  }
  /**
   * @return GoogleCloudDataplexV1BatchChangeMetadataRequest
   */
  public function getChangePayload()
  {
    return $this->changePayload;
  }
  /**
   * Optional. Justification for the metadata change request.
   *
   * @param string $justification
   */
  public function setJustification($justification)
  {
    $this->justification = $justification;
  }
  /**
   * @return string
   */
  public function getJustification()
  {
    return $this->justification;
  }
  /**
   * Optional. User-defined labels for the metadata change request.
   *
   * @param string[] $labels
   */
  public function setLabels($labels)
  {
    $this->labels = $labels;
  }
  /**
   * @return string[]
   */
  public function getLabels()
  {
    return $this->labels;
  }
}

// Adding a class alias for backwards compatibility with the previous class name.
class_alias(GoogleCloudDataplexV1RequestBatchMetadataChangeRequest::class, 'Google_Service_CloudDataplex_GoogleCloudDataplexV1RequestBatchMetadataChangeRequest');
