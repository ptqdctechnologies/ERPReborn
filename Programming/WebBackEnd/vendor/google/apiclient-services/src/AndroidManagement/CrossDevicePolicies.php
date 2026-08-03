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

namespace Google\Service\AndroidManagement;

class CrossDevicePolicies extends \Google\Model
{
  /**
   * Unspecified. Defaults to
   * NEARBY_APP_STREAMING_USER_CHOICE_SAME_MANAGED_ACCOUNT.
   */
  public const NEARBY_APP_STREAMING_NEARBY_APP_STREAMING_UNSPECIFIED = 'NEARBY_APP_STREAMING_UNSPECIFIED';
  /**
   * The user is allowed to choose whether to stream apps to nearby devices.
   */
  public const NEARBY_APP_STREAMING_NEARBY_APP_STREAMING_USER_CHOICE = 'NEARBY_APP_STREAMING_USER_CHOICE';
  /**
   * Disables app streaming to nearby devices.
   */
  public const NEARBY_APP_STREAMING_NEARBY_APP_STREAMING_DISABLED = 'NEARBY_APP_STREAMING_DISABLED';
  /**
   * The user is allowed to choose whether to stream apps to other nearby
   * devices which are signed in with the same authenticated managed account.
   */
  public const NEARBY_APP_STREAMING_NEARBY_APP_STREAMING_USER_CHOICE_SAME_MANAGED_ACCOUNT = 'NEARBY_APP_STREAMING_USER_CHOICE_SAME_MANAGED_ACCOUNT';
  /**
   * Unspecified. Defaults to
   * NEARBY_NOTIFICATION_STREAMING_USER_CHOICE_SAME_MANAGED_ACCOUNT.
   */
  public const NEARBY_NOTIFICATION_STREAMING_NEARBY_NOTIFICATION_STREAMING_UNSPECIFIED = 'NEARBY_NOTIFICATION_STREAMING_UNSPECIFIED';
  /**
   * The user is allowed to choose whether to stream notifications to nearby
   * devices.
   */
  public const NEARBY_NOTIFICATION_STREAMING_NEARBY_NOTIFICATION_STREAMING_USER_CHOICE = 'NEARBY_NOTIFICATION_STREAMING_USER_CHOICE';
  /**
   * Disables notification streaming to nearby devices.
   */
  public const NEARBY_NOTIFICATION_STREAMING_NEARBY_NOTIFICATION_STREAMING_DISABLED = 'NEARBY_NOTIFICATION_STREAMING_DISABLED';
  /**
   * The user is allowed to choose whether to stream notifications to other
   * nearby devices which are signed in with the same authenticated managed
   * account.
   */
  public const NEARBY_NOTIFICATION_STREAMING_NEARBY_NOTIFICATION_STREAMING_USER_CHOICE_SAME_MANAGED_ACCOUNT = 'NEARBY_NOTIFICATION_STREAMING_USER_CHOICE_SAME_MANAGED_ACCOUNT';
  /**
   * Optional. Manages video streaming of apps on the device for fully managed
   * devices or in the work profile for devices with work profiles to nearby
   * devices. This is supported on Android 13 and above.
   *
   * @var string
   */
  public $nearbyAppStreaming;
  /**
   * Optional. Manages streaming of notifications from apps on the device for
   * fully managed devices or in the work profile for devices with work profiles
   * to nearby devices. This is supported on Android 13 and above.
   *
   * @var string
   */
  public $nearbyNotificationStreaming;

  /**
   * Optional. Manages video streaming of apps on the device for fully managed
   * devices or in the work profile for devices with work profiles to nearby
   * devices. This is supported on Android 13 and above.
   *
   * Accepted values: NEARBY_APP_STREAMING_UNSPECIFIED,
   * NEARBY_APP_STREAMING_USER_CHOICE, NEARBY_APP_STREAMING_DISABLED,
   * NEARBY_APP_STREAMING_USER_CHOICE_SAME_MANAGED_ACCOUNT
   *
   * @param self::NEARBY_APP_STREAMING_* $nearbyAppStreaming
   */
  public function setNearbyAppStreaming($nearbyAppStreaming)
  {
    $this->nearbyAppStreaming = $nearbyAppStreaming;
  }
  /**
   * @return self::NEARBY_APP_STREAMING_*
   */
  public function getNearbyAppStreaming()
  {
    return $this->nearbyAppStreaming;
  }
  /**
   * Optional. Manages streaming of notifications from apps on the device for
   * fully managed devices or in the work profile for devices with work profiles
   * to nearby devices. This is supported on Android 13 and above.
   *
   * Accepted values: NEARBY_NOTIFICATION_STREAMING_UNSPECIFIED,
   * NEARBY_NOTIFICATION_STREAMING_USER_CHOICE,
   * NEARBY_NOTIFICATION_STREAMING_DISABLED,
   * NEARBY_NOTIFICATION_STREAMING_USER_CHOICE_SAME_MANAGED_ACCOUNT
   *
   * @param self::NEARBY_NOTIFICATION_STREAMING_* $nearbyNotificationStreaming
   */
  public function setNearbyNotificationStreaming($nearbyNotificationStreaming)
  {
    $this->nearbyNotificationStreaming = $nearbyNotificationStreaming;
  }
  /**
   * @return self::NEARBY_NOTIFICATION_STREAMING_*
   */
  public function getNearbyNotificationStreaming()
  {
    return $this->nearbyNotificationStreaming;
  }
}

// Adding a class alias for backwards compatibility with the previous class name.
class_alias(CrossDevicePolicies::class, 'Google_Service_AndroidManagement_CrossDevicePolicies');
