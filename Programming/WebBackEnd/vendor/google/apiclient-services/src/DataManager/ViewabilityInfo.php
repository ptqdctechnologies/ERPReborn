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

class ViewabilityInfo extends \Google\Model
{
  /**
   * Unspecified media quartile.
   */
  public const MEDIA_QUARTILE_MEDIA_QUARTILE_UNSPECIFIED = 'MEDIA_QUARTILE_UNSPECIFIED';
  /**
   * Start.
   */
  public const MEDIA_QUARTILE_MEDIA_QUARTILE_START = 'MEDIA_QUARTILE_START';
  /**
   * First quartile.
   */
  public const MEDIA_QUARTILE_MEDIA_QUARTILE_FIRST_QUARTILE = 'MEDIA_QUARTILE_FIRST_QUARTILE';
  /**
   * Midpoint.
   */
  public const MEDIA_QUARTILE_MEDIA_QUARTILE_MIDPOINT = 'MEDIA_QUARTILE_MIDPOINT';
  /**
   * Third quartile.
   */
  public const MEDIA_QUARTILE_MEDIA_QUARTILE_THIRD_QUARTILE = 'MEDIA_QUARTILE_THIRD_QUARTILE';
  /**
   * Complete.
   */
  public const MEDIA_QUARTILE_MEDIA_QUARTILE_COMPLETE = 'MEDIA_QUARTILE_COMPLETE';
  /**
   * Unspecified view type.
   */
  public const VIEW_TYPE_VIEW_TYPE_UNSPECIFIED = 'VIEW_TYPE_UNSPECIFIED';
  /**
   * MRC viewed.
   */
  public const VIEW_TYPE_VIEW_TYPE_MRC_VIEWED = 'VIEW_TYPE_MRC_VIEWED';
  /**
   * MRC rendered.
   */
  public const VIEW_TYPE_VIEW_TYPE_MRC_RENDERED = 'VIEW_TYPE_MRC_RENDERED';
  /**
   * Optional. The duration of the ad media.
   *
   * @var string
   */
  public $mediaDuration;
  /**
   * Optional. The amount of the media that was played as discrete quartiles.
   *
   * @var string
   */
  public $mediaQuartile;
  /**
   * Optional. Whether the ad media was skippable or not.
   *
   * @var bool
   */
  public $mediaSkippable;
  /**
   * Optional. The numerical percent (0-100) of the volume of the media
   * playback.
   *
   * @var int
   */
  public $mediaVolumePercent;
  /**
   * Optional. The duration of playback of the ad media, regardless of whether
   * it was viewable or not.
   *
   * @var string
   */
  public $playbackDuration;
  /**
   * Required. The type of the event.
   *
   * @var string
   */
  public $viewType;
  /**
   * Optional. The amount of time the ad was viewable for.
   *
   * @var string
   */
  public $viewableDuration;
  /**
   * Optional. The numerical percent (0-100) of the pixels that were viewable.
   *
   * @var int
   */
  public $viewablePercent;

  /**
   * Optional. The duration of the ad media.
   *
   * @param string $mediaDuration
   */
  public function setMediaDuration($mediaDuration)
  {
    $this->mediaDuration = $mediaDuration;
  }
  /**
   * @return string
   */
  public function getMediaDuration()
  {
    return $this->mediaDuration;
  }
  /**
   * Optional. The amount of the media that was played as discrete quartiles.
   *
   * Accepted values: MEDIA_QUARTILE_UNSPECIFIED, MEDIA_QUARTILE_START,
   * MEDIA_QUARTILE_FIRST_QUARTILE, MEDIA_QUARTILE_MIDPOINT,
   * MEDIA_QUARTILE_THIRD_QUARTILE, MEDIA_QUARTILE_COMPLETE
   *
   * @param self::MEDIA_QUARTILE_* $mediaQuartile
   */
  public function setMediaQuartile($mediaQuartile)
  {
    $this->mediaQuartile = $mediaQuartile;
  }
  /**
   * @return self::MEDIA_QUARTILE_*
   */
  public function getMediaQuartile()
  {
    return $this->mediaQuartile;
  }
  /**
   * Optional. Whether the ad media was skippable or not.
   *
   * @param bool $mediaSkippable
   */
  public function setMediaSkippable($mediaSkippable)
  {
    $this->mediaSkippable = $mediaSkippable;
  }
  /**
   * @return bool
   */
  public function getMediaSkippable()
  {
    return $this->mediaSkippable;
  }
  /**
   * Optional. The numerical percent (0-100) of the volume of the media
   * playback.
   *
   * @param int $mediaVolumePercent
   */
  public function setMediaVolumePercent($mediaVolumePercent)
  {
    $this->mediaVolumePercent = $mediaVolumePercent;
  }
  /**
   * @return int
   */
  public function getMediaVolumePercent()
  {
    return $this->mediaVolumePercent;
  }
  /**
   * Optional. The duration of playback of the ad media, regardless of whether
   * it was viewable or not.
   *
   * @param string $playbackDuration
   */
  public function setPlaybackDuration($playbackDuration)
  {
    $this->playbackDuration = $playbackDuration;
  }
  /**
   * @return string
   */
  public function getPlaybackDuration()
  {
    return $this->playbackDuration;
  }
  /**
   * Required. The type of the event.
   *
   * Accepted values: VIEW_TYPE_UNSPECIFIED, VIEW_TYPE_MRC_VIEWED,
   * VIEW_TYPE_MRC_RENDERED
   *
   * @param self::VIEW_TYPE_* $viewType
   */
  public function setViewType($viewType)
  {
    $this->viewType = $viewType;
  }
  /**
   * @return self::VIEW_TYPE_*
   */
  public function getViewType()
  {
    return $this->viewType;
  }
  /**
   * Optional. The amount of time the ad was viewable for.
   *
   * @param string $viewableDuration
   */
  public function setViewableDuration($viewableDuration)
  {
    $this->viewableDuration = $viewableDuration;
  }
  /**
   * @return string
   */
  public function getViewableDuration()
  {
    return $this->viewableDuration;
  }
  /**
   * Optional. The numerical percent (0-100) of the pixels that were viewable.
   *
   * @param int $viewablePercent
   */
  public function setViewablePercent($viewablePercent)
  {
    $this->viewablePercent = $viewablePercent;
  }
  /**
   * @return int
   */
  public function getViewablePercent()
  {
    return $this->viewablePercent;
  }
}

// Adding a class alias for backwards compatibility with the previous class name.
class_alias(ViewabilityInfo::class, 'Google_Service_DataManager_ViewabilityInfo');
