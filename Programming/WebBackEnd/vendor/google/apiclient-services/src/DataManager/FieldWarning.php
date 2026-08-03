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

class FieldWarning extends \Google\Model
{
  /**
   * Unspecified warning reason.
   */
  public const REASON_WARNING_REASON_UNSPECIFIED = 'WARNING_REASON_UNSPECIFIED';
  /**
   * A custom variable in `custom_variables` is not enabled in the account.
   */
  public const REASON_WARNING_REASON_CUSTOM_VARIABLE_NOT_ENABLED = 'WARNING_REASON_CUSTOM_VARIABLE_NOT_ENABLED';
  /**
   * A custom variable value in `custom_variables` is not among the predefined
   * allowed values configured for the custom variable on the destination
   * account.
   */
  public const REASON_WARNING_REASON_CUSTOM_VARIABLE_NOT_PREDEFINED = 'WARNING_REASON_CUSTOM_VARIABLE_NOT_PREDEFINED';
  /**
   * The `cart_data` is not supported with `gbraid` or `wbraid`.
   */
  public const REASON_WARNING_REASON_CART_DATA_NOT_SUPPORTED_WITH_GBRAID_OR_WBRAID = 'WARNING_REASON_CART_DATA_NOT_SUPPORTED_WITH_GBRAID_OR_WBRAID';
  /**
   * The `merchant_product_id` is missing in the cart item.
   */
  public const REASON_WARNING_REASON_CART_DATA_ITEM_MERCHANT_PRODUCT_ID_MISSING = 'WARNING_REASON_CART_DATA_ITEM_MERCHANT_PRODUCT_ID_MISSING';
  /**
   * The `unit_price` is missing in the cart item.
   */
  public const REASON_WARNING_REASON_CART_DATA_ITEM_UNIT_PRICE_MISSING = 'WARNING_REASON_CART_DATA_ITEM_UNIT_PRICE_MISSING';
  /**
   * Generic warning reason for issues that do not fit into other specific
   * categories.
   */
  public const REASON_WARNING_REASON_GENERIC = 'WARNING_REASON_GENERIC';
  /**
   * The `client_id` is invalid.
   */
  public const REASON_WARNING_REASON_INVALID_CLIENT_ID = 'WARNING_REASON_INVALID_CLIENT_ID';
  /**
   * The `subdivision_code` is invalid.
   */
  public const REASON_WARNING_REASON_INVALID_SUBDIVISION_CODE = 'WARNING_REASON_INVALID_SUBDIVISION_CODE';
  /**
   * The `region_code` is invalid.
   */
  public const REASON_WARNING_REASON_INVALID_REGION_CODE = 'WARNING_REASON_INVALID_REGION_CODE';
  /**
   * The `subcontinent_code` is invalid.
   */
  public const REASON_WARNING_REASON_INVALID_SUBCONTINENT_CODE = 'WARNING_REASON_INVALID_SUBCONTINENT_CODE';
  /**
   * The `continent_code` is invalid.
   */
  public const REASON_WARNING_REASON_INVALID_CONTINENT_CODE = 'WARNING_REASON_INVALID_CONTINENT_CODE';
  /**
   * The device `category` is invalid.
   */
  public const REASON_WARNING_REASON_INVALID_DEVICE_CATEGORY = 'WARNING_REASON_INVALID_DEVICE_CATEGORY';
  /**
   * The device `screen_height` or `screen_width` is invalid.
   */
  public const REASON_WARNING_REASON_INVALID_DEVICE_SCREEN_RESOLUTION = 'WARNING_REASON_INVALID_DEVICE_SCREEN_RESOLUTION';
  /**
   * The `merchant_id` is invalid.
   */
  public const REASON_WARNING_REASON_INVALID_MERCHANT_ID = 'WARNING_REASON_INVALID_MERCHANT_ID';
  /**
   * The detailed warning message describing the issue.
   *
   * @var string
   */
  public $description;
  /**
   * The field path that triggered the warning. Uses the same format as
   * google.rpc.BadRequest.FieldViolation.field.
   *
   * @var string
   */
  public $field;
  /**
   * The warning reason.
   *
   * @var string
   */
  public $reason;

  /**
   * The detailed warning message describing the issue.
   *
   * @param string $description
   */
  public function setDescription($description)
  {
    $this->description = $description;
  }
  /**
   * @return string
   */
  public function getDescription()
  {
    return $this->description;
  }
  /**
   * The field path that triggered the warning. Uses the same format as
   * google.rpc.BadRequest.FieldViolation.field.
   *
   * @param string $field
   */
  public function setField($field)
  {
    $this->field = $field;
  }
  /**
   * @return string
   */
  public function getField()
  {
    return $this->field;
  }
  /**
   * The warning reason.
   *
   * Accepted values: WARNING_REASON_UNSPECIFIED,
   * WARNING_REASON_CUSTOM_VARIABLE_NOT_ENABLED,
   * WARNING_REASON_CUSTOM_VARIABLE_NOT_PREDEFINED,
   * WARNING_REASON_CART_DATA_NOT_SUPPORTED_WITH_GBRAID_OR_WBRAID,
   * WARNING_REASON_CART_DATA_ITEM_MERCHANT_PRODUCT_ID_MISSING,
   * WARNING_REASON_CART_DATA_ITEM_UNIT_PRICE_MISSING, WARNING_REASON_GENERIC,
   * WARNING_REASON_INVALID_CLIENT_ID, WARNING_REASON_INVALID_SUBDIVISION_CODE,
   * WARNING_REASON_INVALID_REGION_CODE,
   * WARNING_REASON_INVALID_SUBCONTINENT_CODE,
   * WARNING_REASON_INVALID_CONTINENT_CODE,
   * WARNING_REASON_INVALID_DEVICE_CATEGORY,
   * WARNING_REASON_INVALID_DEVICE_SCREEN_RESOLUTION,
   * WARNING_REASON_INVALID_MERCHANT_ID
   *
   * @param self::REASON_* $reason
   */
  public function setReason($reason)
  {
    $this->reason = $reason;
  }
  /**
   * @return self::REASON_*
   */
  public function getReason()
  {
    return $this->reason;
  }
}

// Adding a class alias for backwards compatibility with the previous class name.
class_alias(FieldWarning::class, 'Google_Service_DataManager_FieldWarning');
