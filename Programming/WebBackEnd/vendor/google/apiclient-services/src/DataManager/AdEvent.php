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

class AdEvent extends \Google\Model
{
  /**
   * Unspecified ad format.
   */
  public const AD_FORMAT_AD_FORMAT_UNSPECIFIED = 'AD_FORMAT_UNSPECIFIED';
  /**
   * AR ad.
   */
  public const AD_FORMAT_AD_FORMAT_AR = 'AD_FORMAT_AR';
  /**
   * Audio ad.
   */
  public const AD_FORMAT_AD_FORMAT_AUDIO = 'AD_FORMAT_AUDIO';
  /**
   * Banner ad.
   */
  public const AD_FORMAT_AD_FORMAT_BANNER = 'AD_FORMAT_BANNER';
  /**
   * Bumper ad.
   */
  public const AD_FORMAT_AD_FORMAT_BUMPER = 'AD_FORMAT_BUMPER';
  /**
   * Carousel ad.
   */
  public const AD_FORMAT_AD_FORMAT_CAROUSEL = 'AD_FORMAT_CAROUSEL';
  /**
   * Collection ad.
   */
  public const AD_FORMAT_AD_FORMAT_COLLECTION = 'AD_FORMAT_COLLECTION';
  /**
   * Image ad.
   */
  public const AD_FORMAT_AD_FORMAT_IMAGE = 'AD_FORMAT_IMAGE';
  /**
   * Interactive ad.
   */
  public const AD_FORMAT_AD_FORMAT_INTERACTIVE = 'AD_FORMAT_INTERACTIVE';
  /**
   * Interstitial ad.
   */
  public const AD_FORMAT_AD_FORMAT_INTERSTITIAL = 'AD_FORMAT_INTERSTITIAL';
  /**
   * In-feed ad.
   */
  public const AD_FORMAT_AD_FORMAT_IN_FEED = 'AD_FORMAT_IN_FEED';
  /**
   * In-stream ad.
   */
  public const AD_FORMAT_AD_FORMAT_IN_STREAM = 'AD_FORMAT_IN_STREAM';
  /**
   * In-stream skippable ad.
   */
  public const AD_FORMAT_AD_FORMAT_IN_STREAM_SKIPPABLE = 'AD_FORMAT_IN_STREAM_SKIPPABLE';
  /**
   * In-stream non-skippable ad.
   */
  public const AD_FORMAT_AD_FORMAT_IN_STREAM_NON_SKIPPABLE = 'AD_FORMAT_IN_STREAM_NON_SKIPPABLE';
  /**
   * Native ad.
   */
  public const AD_FORMAT_AD_FORMAT_NATIVE = 'AD_FORMAT_NATIVE';
  /**
   * Shorts ad.
   */
  public const AD_FORMAT_AD_FORMAT_SHORTS = 'AD_FORMAT_SHORTS';
  /**
   * Story ad.
   */
  public const AD_FORMAT_AD_FORMAT_STORY = 'AD_FORMAT_STORY';
  /**
   * Sponsored ad.
   */
  public const AD_FORMAT_AD_FORMAT_SPONSORED = 'AD_FORMAT_SPONSORED';
  /**
   * Video ad.
   */
  public const AD_FORMAT_AD_FORMAT_VIDEO = 'AD_FORMAT_VIDEO';
  /**
   * Unspecified ad placement.
   */
  public const AD_PLACEMENT_AD_PLACEMENT_UNSPECIFIED = 'AD_PLACEMENT_UNSPECIFIED';
  /**
   * Discover placement.
   */
  public const AD_PLACEMENT_AD_PLACEMENT_DISCOVER = 'AD_PLACEMENT_DISCOVER';
  /**
   * Feed placement.
   */
  public const AD_PLACEMENT_AD_PLACEMENT_FEED = 'AD_PLACEMENT_FEED';
  /**
   * Footer placement.
   */
  public const AD_PLACEMENT_AD_PLACEMENT_FOOTER = 'AD_PLACEMENT_FOOTER';
  /**
   * Header placement.
   */
  public const AD_PLACEMENT_AD_PLACEMENT_HEADER = 'AD_PLACEMENT_HEADER';
  /**
   * Home placement.
   */
  public const AD_PLACEMENT_AD_PLACEMENT_HOME = 'AD_PLACEMENT_HOME';
  /**
   * In-content placement.
   */
  public const AD_PLACEMENT_AD_PLACEMENT_IN_CONTENT = 'AD_PLACEMENT_IN_CONTENT';
  /**
   * Promoted placement.
   */
  public const AD_PLACEMENT_AD_PLACEMENT_PROMOTED = 'AD_PLACEMENT_PROMOTED';
  /**
   * Search placement.
   */
  public const AD_PLACEMENT_AD_PLACEMENT_SEARCH = 'AD_PLACEMENT_SEARCH';
  /**
   * Story placement.
   */
  public const AD_PLACEMENT_AD_PLACEMENT_STORY = 'AD_PLACEMENT_STORY';
  /**
   * Unspecified ad type.
   */
  public const AD_TYPE_AD_TYPE_UNSPECIFIED = 'AD_TYPE_UNSPECIFIED';
  /**
   * Display ad.
   */
  public const AD_TYPE_AD_TYPE_DISPLAY = 'AD_TYPE_DISPLAY';
  /**
   * Text ad.
   */
  public const AD_TYPE_AD_TYPE_TEXT = 'AD_TYPE_TEXT';
  /**
   * Image ad.
   */
  public const AD_TYPE_AD_TYPE_IMAGE = 'AD_TYPE_IMAGE';
  /**
   * Rich media ad.
   */
  public const AD_TYPE_AD_TYPE_RICH_MEDIA = 'AD_TYPE_RICH_MEDIA';
  /**
   * HTML ad.
   */
  public const AD_TYPE_AD_TYPE_HTML = 'AD_TYPE_HTML';
  /**
   * Audio ad.
   */
  public const AD_TYPE_AD_TYPE_AUDIO = 'AD_TYPE_AUDIO';
  /**
   * Video ad.
   */
  public const AD_TYPE_AD_TYPE_VIDEO = 'AD_TYPE_VIDEO';
  /**
   * Unknown attribution status.
   */
  public const ATTRIBUTION_HINT_ATTRIBUTION_HINT_UNSPECIFIED = 'ATTRIBUTION_HINT_UNSPECIFIED';
  /**
   * Converted status.
   */
  public const ATTRIBUTION_HINT_ATTRIBUTION_HINT_CONVERTED = 'ATTRIBUTION_HINT_CONVERTED';
  /**
   * Not converted status.
   */
  public const ATTRIBUTION_HINT_ATTRIBUTION_HINT_NOT_CONVERTED = 'ATTRIBUTION_HINT_NOT_CONVERTED';
  /**
   * Unspecified event subtype.
   */
  public const EVENT_SUBTYPE_EVENT_SUBTYPE_UNSPECIFIED = 'EVENT_SUBTYPE_UNSPECIFIED';
  /**
   * Impression event.
   */
  public const EVENT_SUBTYPE_EVENT_SUBTYPE_IMPRESSION = 'EVENT_SUBTYPE_IMPRESSION';
  /**
   * Engaged view event.
   */
  public const EVENT_SUBTYPE_EVENT_SUBTYPE_ENGAGED_VIEW = 'EVENT_SUBTYPE_ENGAGED_VIEW';
  /**
   * Onsite click event.
   */
  public const EVENT_SUBTYPE_EVENT_SUBTYPE_ONSITE_CLICK = 'EVENT_SUBTYPE_ONSITE_CLICK';
  /**
   * Outbound click event.
   */
  public const EVENT_SUBTYPE_EVENT_SUBTYPE_OUTBOUND_CLICK = 'EVENT_SUBTYPE_OUTBOUND_CLICK';
  /**
   * Unspecified event type.
   */
  public const EVENT_TYPE_EVENT_TYPE_UNSPECIFIED = 'EVENT_TYPE_UNSPECIFIED';
  /**
   * View event.
   */
  public const EVENT_TYPE_EVENT_TYPE_VIEW = 'EVENT_TYPE_VIEW';
  /**
   * Click event.
   */
  public const EVENT_TYPE_EVENT_TYPE_CLICK = 'EVENT_TYPE_CLICK';
  /**
   * Unspecified platform.
   */
  public const PLATFORM_PLATFORM_UNSPECIFIED = 'PLATFORM_UNSPECIFIED';
  /**
   * iOS platform.
   */
  public const PLATFORM_PLATFORM_IOS = 'PLATFORM_IOS';
  /**
   * Android platform.
   */
  public const PLATFORM_PLATFORM_ANDROID = 'PLATFORM_ANDROID';
  /**
   * Web platform.
   */
  public const PLATFORM_PLATFORM_WEB = 'PLATFORM_WEB';
  /**
   * Unspecified platform type.
   */
  public const PLATFORM_TYPE_PLATFORM_TYPE_UNSPECIFIED = 'PLATFORM_TYPE_UNSPECIFIED';
  /**
   * Mobile platform.
   */
  public const PLATFORM_TYPE_PLATFORM_TYPE_MOBILE = 'PLATFORM_TYPE_MOBILE';
  /**
   * Desktop platform.
   */
  public const PLATFORM_TYPE_PLATFORM_TYPE_DESKTOP = 'PLATFORM_TYPE_DESKTOP';
  /**
   * CTV platform.
   */
  public const PLATFORM_TYPE_PLATFORM_TYPE_CTV = 'PLATFORM_TYPE_CTV';
  /**
   * Phone platform.
   */
  public const PLATFORM_TYPE_PLATFORM_TYPE_PHONE = 'PLATFORM_TYPE_PHONE';
  /**
   * Tablet platform.
   */
  public const PLATFORM_TYPE_PLATFORM_TYPE_TABLET = 'PLATFORM_TYPE_TABLET';
  /**
   * Unspecified targeting type.
   */
  public const TARGETING_TYPE_TARGETING_TYPE_UNSPECIFIED = 'TARGETING_TYPE_UNSPECIFIED';
  /**
   * Audience targeting.
   */
  public const TARGETING_TYPE_TARGETING_TYPE_AUDIENCE = 'TARGETING_TYPE_AUDIENCE';
  /**
   * Contextual targeting.
   */
  public const TARGETING_TYPE_TARGETING_TYPE_CONTEXTUAL = 'TARGETING_TYPE_CONTEXTUAL';
  /**
   * Demographic targeting.
   */
  public const TARGETING_TYPE_TARGETING_TYPE_DEMOGRAPHIC = 'TARGETING_TYPE_DEMOGRAPHIC';
  /**
   * Device targeting.
   */
  public const TARGETING_TYPE_TARGETING_TYPE_DEVICE = 'TARGETING_TYPE_DEVICE';
  /**
   * Geo targeting.
   */
  public const TARGETING_TYPE_TARGETING_TYPE_GEO = 'TARGETING_TYPE_GEO';
  /**
   * Interest targeting.
   */
  public const TARGETING_TYPE_TARGETING_TYPE_INTEREST = 'TARGETING_TYPE_INTEREST';
  /**
   * Purchase intent targeting.
   */
  public const TARGETING_TYPE_TARGETING_TYPE_PURCHASE_INTENT = 'TARGETING_TYPE_PURCHASE_INTENT';
  /**
   * Remarketing targeting.
   */
  public const TARGETING_TYPE_TARGETING_TYPE_REMARKETING = 'TARGETING_TYPE_REMARKETING';
  /**
   * Enum value for ad format.
   *
   * @var string
   */
  public $adFormat;
  /**
   * String value for ad format.
   *
   * @var string
   */
  public $adFormatString;
  /**
   * Optional. The ID of the associated ad group.
   *
   * @var string
   */
  public $adGroupId;
  /**
   * Optional. The height of the ad in pixels.
   *
   * @var int
   */
  public $adHeight;
  /**
   * Optional. The ID of the associated ad within the group.
   *
   * @var string
   */
  public $adId;
  /**
   * Enum value for ad placement.
   *
   * @var string
   */
  public $adPlacement;
  /**
   * String value for ad placement.
   *
   * @var string
   */
  public $adPlacementString;
  /**
   * Enum value for ad type.
   *
   * @var string
   */
  public $adType;
  /**
   * String value for ad type.
   *
   * @var string
   */
  public $adTypeString;
  /**
   * Optional. The width of the ad in pixels.
   *
   * @var int
   */
  public $adWidth;
  /**
   * Required. The ID of the advertiser for the ad event. This must match the ID
   * sent in the linking flow.
   *
   * @var string
   */
  public $advertiserId;
  /**
   * Optional. The partner-assumed attribution status for this ad event. This
   * acts only as a signal for how the partner assumed attribution played out,
   * and does not force an end result in final reports.
   *
   * @var string
   */
  public $attributionHint;
  /**
   * Required. The ID of the associated campaign.
   *
   * @var string
   */
  public $campaignId;
  /**
   * Required. The name of the associated campaign.
   *
   * @var string
   */
  public $campaignName;
  protected $deviceInfoType = DeviceInfo::class;
  protected $deviceInfoDataType = '';
  /**
   * Optional. An ID created and managed by the caller that uniquely identifies
   * this event. Required if you want to deduplicate ad events that are included
   * in multiple requests. Otherwise, this field is optional.
   *
   * @var string
   */
  public $eventId;
  /**
   * Enum value for event subtype.
   *
   * @var string
   */
  public $eventSubtype;
  /**
   * String value for event subtype.
   *
   * @var string
   */
  public $eventSubtypeString;
  /**
   * Required. The type of the event.
   *
   * @var string
   */
  public $eventType;
  /**
   * Optional. Represents if the row is allowed to be used for measurement
   * purposes, as governed by applicable privacy laws within regional
   * jurisdiction.
   *
   * @var bool
   */
  public $measurementAllowed;
  /**
   * Required. The medium of the ad, akin to the Google Analytics medium.
   *
   * @var string
   */
  public $medium;
  /**
   * Optional. The device ID of the device that the ad was served to.
   *
   * @var string
   */
  public $mobileDeviceId;
  /**
   * Enum value for platform.
   *
   * @var string
   */
  public $platform;
  /**
   * String value for platform.
   *
   * @var string
   */
  public $platformString;
  /**
   * Enum value for platform type.
   *
   * @var string
   */
  public $platformType;
  /**
   * String value for platform type.
   *
   * @var string
   */
  public $platformTypeString;
  /**
   * Required. The ISO 3166-2 country plus subdivision.
   *
   * @var string
   */
  public $regionCode;
  /**
   * Required. The platform source of the ad, akin to the Google Analytics
   * source.
   *
   * @var string
   */
  public $source;
  /**
   * Enum value for targeting type.
   *
   * @var string
   */
  public $targetingType;
  /**
   * String value for targeting type.
   *
   * @var string
   */
  public $targetingTypeString;
  /**
   * Required. The time the event occurred.
   *
   * @var string
   */
  public $timestamp;
  protected $userDataType = UserData::class;
  protected $userDataDataType = '';
  protected $viewabilityInfoType = ViewabilityInfo::class;
  protected $viewabilityInfoDataType = '';

  /**
   * Enum value for ad format.
   *
   * Accepted values: AD_FORMAT_UNSPECIFIED, AD_FORMAT_AR, AD_FORMAT_AUDIO,
   * AD_FORMAT_BANNER, AD_FORMAT_BUMPER, AD_FORMAT_CAROUSEL,
   * AD_FORMAT_COLLECTION, AD_FORMAT_IMAGE, AD_FORMAT_INTERACTIVE,
   * AD_FORMAT_INTERSTITIAL, AD_FORMAT_IN_FEED, AD_FORMAT_IN_STREAM,
   * AD_FORMAT_IN_STREAM_SKIPPABLE, AD_FORMAT_IN_STREAM_NON_SKIPPABLE,
   * AD_FORMAT_NATIVE, AD_FORMAT_SHORTS, AD_FORMAT_STORY, AD_FORMAT_SPONSORED,
   * AD_FORMAT_VIDEO
   *
   * @param self::AD_FORMAT_* $adFormat
   */
  public function setAdFormat($adFormat)
  {
    $this->adFormat = $adFormat;
  }
  /**
   * @return self::AD_FORMAT_*
   */
  public function getAdFormat()
  {
    return $this->adFormat;
  }
  /**
   * String value for ad format.
   *
   * @param string $adFormatString
   */
  public function setAdFormatString($adFormatString)
  {
    $this->adFormatString = $adFormatString;
  }
  /**
   * @return string
   */
  public function getAdFormatString()
  {
    return $this->adFormatString;
  }
  /**
   * Optional. The ID of the associated ad group.
   *
   * @param string $adGroupId
   */
  public function setAdGroupId($adGroupId)
  {
    $this->adGroupId = $adGroupId;
  }
  /**
   * @return string
   */
  public function getAdGroupId()
  {
    return $this->adGroupId;
  }
  /**
   * Optional. The height of the ad in pixels.
   *
   * @param int $adHeight
   */
  public function setAdHeight($adHeight)
  {
    $this->adHeight = $adHeight;
  }
  /**
   * @return int
   */
  public function getAdHeight()
  {
    return $this->adHeight;
  }
  /**
   * Optional. The ID of the associated ad within the group.
   *
   * @param string $adId
   */
  public function setAdId($adId)
  {
    $this->adId = $adId;
  }
  /**
   * @return string
   */
  public function getAdId()
  {
    return $this->adId;
  }
  /**
   * Enum value for ad placement.
   *
   * Accepted values: AD_PLACEMENT_UNSPECIFIED, AD_PLACEMENT_DISCOVER,
   * AD_PLACEMENT_FEED, AD_PLACEMENT_FOOTER, AD_PLACEMENT_HEADER,
   * AD_PLACEMENT_HOME, AD_PLACEMENT_IN_CONTENT, AD_PLACEMENT_PROMOTED,
   * AD_PLACEMENT_SEARCH, AD_PLACEMENT_STORY
   *
   * @param self::AD_PLACEMENT_* $adPlacement
   */
  public function setAdPlacement($adPlacement)
  {
    $this->adPlacement = $adPlacement;
  }
  /**
   * @return self::AD_PLACEMENT_*
   */
  public function getAdPlacement()
  {
    return $this->adPlacement;
  }
  /**
   * String value for ad placement.
   *
   * @param string $adPlacementString
   */
  public function setAdPlacementString($adPlacementString)
  {
    $this->adPlacementString = $adPlacementString;
  }
  /**
   * @return string
   */
  public function getAdPlacementString()
  {
    return $this->adPlacementString;
  }
  /**
   * Enum value for ad type.
   *
   * Accepted values: AD_TYPE_UNSPECIFIED, AD_TYPE_DISPLAY, AD_TYPE_TEXT,
   * AD_TYPE_IMAGE, AD_TYPE_RICH_MEDIA, AD_TYPE_HTML, AD_TYPE_AUDIO,
   * AD_TYPE_VIDEO
   *
   * @param self::AD_TYPE_* $adType
   */
  public function setAdType($adType)
  {
    $this->adType = $adType;
  }
  /**
   * @return self::AD_TYPE_*
   */
  public function getAdType()
  {
    return $this->adType;
  }
  /**
   * String value for ad type.
   *
   * @param string $adTypeString
   */
  public function setAdTypeString($adTypeString)
  {
    $this->adTypeString = $adTypeString;
  }
  /**
   * @return string
   */
  public function getAdTypeString()
  {
    return $this->adTypeString;
  }
  /**
   * Optional. The width of the ad in pixels.
   *
   * @param int $adWidth
   */
  public function setAdWidth($adWidth)
  {
    $this->adWidth = $adWidth;
  }
  /**
   * @return int
   */
  public function getAdWidth()
  {
    return $this->adWidth;
  }
  /**
   * Required. The ID of the advertiser for the ad event. This must match the ID
   * sent in the linking flow.
   *
   * @param string $advertiserId
   */
  public function setAdvertiserId($advertiserId)
  {
    $this->advertiserId = $advertiserId;
  }
  /**
   * @return string
   */
  public function getAdvertiserId()
  {
    return $this->advertiserId;
  }
  /**
   * Optional. The partner-assumed attribution status for this ad event. This
   * acts only as a signal for how the partner assumed attribution played out,
   * and does not force an end result in final reports.
   *
   * Accepted values: ATTRIBUTION_HINT_UNSPECIFIED, ATTRIBUTION_HINT_CONVERTED,
   * ATTRIBUTION_HINT_NOT_CONVERTED
   *
   * @param self::ATTRIBUTION_HINT_* $attributionHint
   */
  public function setAttributionHint($attributionHint)
  {
    $this->attributionHint = $attributionHint;
  }
  /**
   * @return self::ATTRIBUTION_HINT_*
   */
  public function getAttributionHint()
  {
    return $this->attributionHint;
  }
  /**
   * Required. The ID of the associated campaign.
   *
   * @param string $campaignId
   */
  public function setCampaignId($campaignId)
  {
    $this->campaignId = $campaignId;
  }
  /**
   * @return string
   */
  public function getCampaignId()
  {
    return $this->campaignId;
  }
  /**
   * Required. The name of the associated campaign.
   *
   * @param string $campaignName
   */
  public function setCampaignName($campaignName)
  {
    $this->campaignName = $campaignName;
  }
  /**
   * @return string
   */
  public function getCampaignName()
  {
    return $this->campaignName;
  }
  /**
   * Optional. Information gathered about the device being used when the ad
   * event happened.
   *
   * @param DeviceInfo $deviceInfo
   */
  public function setDeviceInfo(DeviceInfo $deviceInfo)
  {
    $this->deviceInfo = $deviceInfo;
  }
  /**
   * @return DeviceInfo
   */
  public function getDeviceInfo()
  {
    return $this->deviceInfo;
  }
  /**
   * Optional. An ID created and managed by the caller that uniquely identifies
   * this event. Required if you want to deduplicate ad events that are included
   * in multiple requests. Otherwise, this field is optional.
   *
   * @param string $eventId
   */
  public function setEventId($eventId)
  {
    $this->eventId = $eventId;
  }
  /**
   * @return string
   */
  public function getEventId()
  {
    return $this->eventId;
  }
  /**
   * Enum value for event subtype.
   *
   * Accepted values: EVENT_SUBTYPE_UNSPECIFIED, EVENT_SUBTYPE_IMPRESSION,
   * EVENT_SUBTYPE_ENGAGED_VIEW, EVENT_SUBTYPE_ONSITE_CLICK,
   * EVENT_SUBTYPE_OUTBOUND_CLICK
   *
   * @param self::EVENT_SUBTYPE_* $eventSubtype
   */
  public function setEventSubtype($eventSubtype)
  {
    $this->eventSubtype = $eventSubtype;
  }
  /**
   * @return self::EVENT_SUBTYPE_*
   */
  public function getEventSubtype()
  {
    return $this->eventSubtype;
  }
  /**
   * String value for event subtype.
   *
   * @param string $eventSubtypeString
   */
  public function setEventSubtypeString($eventSubtypeString)
  {
    $this->eventSubtypeString = $eventSubtypeString;
  }
  /**
   * @return string
   */
  public function getEventSubtypeString()
  {
    return $this->eventSubtypeString;
  }
  /**
   * Required. The type of the event.
   *
   * Accepted values: EVENT_TYPE_UNSPECIFIED, EVENT_TYPE_VIEW, EVENT_TYPE_CLICK
   *
   * @param self::EVENT_TYPE_* $eventType
   */
  public function setEventType($eventType)
  {
    $this->eventType = $eventType;
  }
  /**
   * @return self::EVENT_TYPE_*
   */
  public function getEventType()
  {
    return $this->eventType;
  }
  /**
   * Optional. Represents if the row is allowed to be used for measurement
   * purposes, as governed by applicable privacy laws within regional
   * jurisdiction.
   *
   * @param bool $measurementAllowed
   */
  public function setMeasurementAllowed($measurementAllowed)
  {
    $this->measurementAllowed = $measurementAllowed;
  }
  /**
   * @return bool
   */
  public function getMeasurementAllowed()
  {
    return $this->measurementAllowed;
  }
  /**
   * Required. The medium of the ad, akin to the Google Analytics medium.
   *
   * @param string $medium
   */
  public function setMedium($medium)
  {
    $this->medium = $medium;
  }
  /**
   * @return string
   */
  public function getMedium()
  {
    return $this->medium;
  }
  /**
   * Optional. The device ID of the device that the ad was served to.
   *
   * @param string $mobileDeviceId
   */
  public function setMobileDeviceId($mobileDeviceId)
  {
    $this->mobileDeviceId = $mobileDeviceId;
  }
  /**
   * @return string
   */
  public function getMobileDeviceId()
  {
    return $this->mobileDeviceId;
  }
  /**
   * Enum value for platform.
   *
   * Accepted values: PLATFORM_UNSPECIFIED, PLATFORM_IOS, PLATFORM_ANDROID,
   * PLATFORM_WEB
   *
   * @param self::PLATFORM_* $platform
   */
  public function setPlatform($platform)
  {
    $this->platform = $platform;
  }
  /**
   * @return self::PLATFORM_*
   */
  public function getPlatform()
  {
    return $this->platform;
  }
  /**
   * String value for platform.
   *
   * @param string $platformString
   */
  public function setPlatformString($platformString)
  {
    $this->platformString = $platformString;
  }
  /**
   * @return string
   */
  public function getPlatformString()
  {
    return $this->platformString;
  }
  /**
   * Enum value for platform type.
   *
   * Accepted values: PLATFORM_TYPE_UNSPECIFIED, PLATFORM_TYPE_MOBILE,
   * PLATFORM_TYPE_DESKTOP, PLATFORM_TYPE_CTV, PLATFORM_TYPE_PHONE,
   * PLATFORM_TYPE_TABLET
   *
   * @param self::PLATFORM_TYPE_* $platformType
   */
  public function setPlatformType($platformType)
  {
    $this->platformType = $platformType;
  }
  /**
   * @return self::PLATFORM_TYPE_*
   */
  public function getPlatformType()
  {
    return $this->platformType;
  }
  /**
   * String value for platform type.
   *
   * @param string $platformTypeString
   */
  public function setPlatformTypeString($platformTypeString)
  {
    $this->platformTypeString = $platformTypeString;
  }
  /**
   * @return string
   */
  public function getPlatformTypeString()
  {
    return $this->platformTypeString;
  }
  /**
   * Required. The ISO 3166-2 country plus subdivision.
   *
   * @param string $regionCode
   */
  public function setRegionCode($regionCode)
  {
    $this->regionCode = $regionCode;
  }
  /**
   * @return string
   */
  public function getRegionCode()
  {
    return $this->regionCode;
  }
  /**
   * Required. The platform source of the ad, akin to the Google Analytics
   * source.
   *
   * @param string $source
   */
  public function setSource($source)
  {
    $this->source = $source;
  }
  /**
   * @return string
   */
  public function getSource()
  {
    return $this->source;
  }
  /**
   * Enum value for targeting type.
   *
   * Accepted values: TARGETING_TYPE_UNSPECIFIED, TARGETING_TYPE_AUDIENCE,
   * TARGETING_TYPE_CONTEXTUAL, TARGETING_TYPE_DEMOGRAPHIC,
   * TARGETING_TYPE_DEVICE, TARGETING_TYPE_GEO, TARGETING_TYPE_INTEREST,
   * TARGETING_TYPE_PURCHASE_INTENT, TARGETING_TYPE_REMARKETING
   *
   * @param self::TARGETING_TYPE_* $targetingType
   */
  public function setTargetingType($targetingType)
  {
    $this->targetingType = $targetingType;
  }
  /**
   * @return self::TARGETING_TYPE_*
   */
  public function getTargetingType()
  {
    return $this->targetingType;
  }
  /**
   * String value for targeting type.
   *
   * @param string $targetingTypeString
   */
  public function setTargetingTypeString($targetingTypeString)
  {
    $this->targetingTypeString = $targetingTypeString;
  }
  /**
   * @return string
   */
  public function getTargetingTypeString()
  {
    return $this->targetingTypeString;
  }
  /**
   * Required. The time the event occurred.
   *
   * @param string $timestamp
   */
  public function setTimestamp($timestamp)
  {
    $this->timestamp = $timestamp;
  }
  /**
   * @return string
   */
  public function getTimestamp()
  {
    return $this->timestamp;
  }
  /**
   * Optional. Multiple pieces of user-provided data, representing the user the
   * event is associated with. It is possible to provide multiple instances of
   * the same type of data (e.g. email address). The more data provided, the
   * more likely a match will be found.
   *
   * @param UserData $userData
   */
  public function setUserData(UserData $userData)
  {
    $this->userData = $userData;
  }
  /**
   * @return UserData
   */
  public function getUserData()
  {
    return $this->userData;
  }
  /**
   * Required. Details of the viewability of the ad served.
   *
   * @param ViewabilityInfo $viewabilityInfo
   */
  public function setViewabilityInfo(ViewabilityInfo $viewabilityInfo)
  {
    $this->viewabilityInfo = $viewabilityInfo;
  }
  /**
   * @return ViewabilityInfo
   */
  public function getViewabilityInfo()
  {
    return $this->viewabilityInfo;
  }
}

// Adding a class alias for backwards compatibility with the previous class name.
class_alias(AdEvent::class, 'Google_Service_DataManager_AdEvent');
