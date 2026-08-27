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

class ExtensionBindingMatchConditionToDestinationHeaderSet extends \Google\Collection
{
  protected $collection_key = 'headers';
  protected $headersType = ExtensionBindingMatchConditionHeaderMatch::class;
  protected $headersDataType = 'array';

  /**
   * Required. A list of headers to match against in http header. If multiple
   * header matches are provided, they will be evaluated as an AND, i.e. all
   * header matches must match for the request to match.
   *
   * @param ExtensionBindingMatchConditionHeaderMatch[] $headers
   */
  public function setHeaders($headers)
  {
    $this->headers = $headers;
  }
  /**
   * @return ExtensionBindingMatchConditionHeaderMatch[]
   */
  public function getHeaders()
  {
    return $this->headers;
  }
}

// Adding a class alias for backwards compatibility with the previous class name.
class_alias(ExtensionBindingMatchConditionToDestinationHeaderSet::class, 'Google_Service_NetworkServices_ExtensionBindingMatchConditionToDestinationHeaderSet');
