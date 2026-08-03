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

namespace Google\Service\DataManager;

class RemoveAllAudienceMembersRequest extends \Google\Collection
{
  protected $collection_key = 'destinations';
  protected $destinationsType = Destination::class;
  protected $destinationsDataType = 'array';
  /**
   * Optional. The remove as of time. If set, only audience members last added
   * before this time will be removed. If not set, it defaults to current time.
   * The remove as of time must not be in the future.
   *
   * @var string
   */
  public $removeAsOfTime;
  /**
   * Optional. For testing purposes. If `true`, the request is validated but not
   * executed. Only errors are returned, not results.
   *
   * @var bool
   */
  public $validateOnly;

  /**
   * Required. The list of destinations to remove the users from.
   *
   * @param Destination[] $destinations
   */
  public function setDestinations($destinations)
  {
    $this->destinations = $destinations;
  }
  /**
   * @return Destination[]
   */
  public function getDestinations()
  {
    return $this->destinations;
  }
  /**
   * Optional. The remove as of time. If set, only audience members last added
   * before this time will be removed. If not set, it defaults to current time.
   * The remove as of time must not be in the future.
   *
   * @param string $removeAsOfTime
   */
  public function setRemoveAsOfTime($removeAsOfTime)
  {
    $this->removeAsOfTime = $removeAsOfTime;
  }
  /**
   * @return string
   */
  public function getRemoveAsOfTime()
  {
    return $this->removeAsOfTime;
  }
  /**
   * Optional. For testing purposes. If `true`, the request is validated but not
   * executed. Only errors are returned, not results.
   *
   * @param bool $validateOnly
   */
  public function setValidateOnly($validateOnly)
  {
    $this->validateOnly = $validateOnly;
  }
  /**
   * @return bool
   */
  public function getValidateOnly()
  {
    return $this->validateOnly;
  }
}

// Adding a class alias for backwards compatibility with the previous class name.
class_alias(RemoveAllAudienceMembersRequest::class, 'Google_Service_DataManager_RemoveAllAudienceMembersRequest');
