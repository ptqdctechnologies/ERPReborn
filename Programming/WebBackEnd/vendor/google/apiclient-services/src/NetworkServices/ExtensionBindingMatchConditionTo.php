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

namespace Google\Service\NetworkServices;

class ExtensionBindingMatchConditionTo extends \Google\Model
{
  protected $destinationType = ExtensionBindingMatchConditionToDestination::class;
  protected $destinationDataType = '';
  protected $notDestinationType = ExtensionBindingMatchConditionToDestination::class;
  protected $notDestinationDataType = '';

  /**
   * Optional. Describes properties of destination of a request. Within a
   * destination, the match follows AND semantics across fields and OR semantics
   * within a field, i.e. a match occurs when ANY path matches AND ANY header
   * matches and ANY method matches. At least one of destination or
   * not_destination must be specified.
   *
   * @param ExtensionBindingMatchConditionToDestination $destination
   */
  public function setDestination(ExtensionBindingMatchConditionToDestination $destination)
  {
    $this->destination = $destination;
  }
  /**
   * @return ExtensionBindingMatchConditionToDestination
   */
  public function getDestination()
  {
    return $this->destination;
  }
  /**
   * Optional. Describes the negated properties of the request destination.
   * Extension will not be invoked on requests that match the criteria specified
   * in this field. At least one of destination or not_destination must be
   * specified.
   *
   * @param ExtensionBindingMatchConditionToDestination $notDestination
   */
  public function setNotDestination(ExtensionBindingMatchConditionToDestination $notDestination)
  {
    $this->notDestination = $notDestination;
  }
  /**
   * @return ExtensionBindingMatchConditionToDestination
   */
  public function getNotDestination()
  {
    return $this->notDestination;
  }
}

// Adding a class alias for backwards compatibility with the previous class name.
class_alias(ExtensionBindingMatchConditionTo::class, 'Google_Service_NetworkServices_ExtensionBindingMatchConditionTo');
