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

namespace Google\Service\RecaptchaEnterprise;

class GoogleCloudRecaptchaenterpriseV1ProtectedEndpoint extends \Google\Model
{
  /**
   * Required. Action name to be used for token generation for this endpoint.
   * The action name is not case-sensitive and can only contain alphanumeric
   * characters, slashes, and underscores.
   *
   * @var string
   */
  public $action;
  /**
   * Required. URI path of the API endpoint to protect. Must start with '/'.
   * Supports glob characters '*' to match a single path segment and '**' to
   * match multiple path segments. Standalone root catch-alls ('' and '*') are
   * invalid because it would hurt performance to trigger reCAPTCHA on every
   * single request to your backend. Matching is evaluated against the URL path
   * only (domain, scheme, and query parameters are ignored). Examples: -
   * `/login` matches `/login`, `https://example.com/login`, and
   * `/login?query=1`, but not `/login/step1`. - `/products` matches
   * `/products/123`, but not `/products/123/456`. - `/content*` matches
   * `/content/articles/2024/01/01`.
   *
   * @var string
   */
  public $path;

  /**
   * Required. Action name to be used for token generation for this endpoint.
   * The action name is not case-sensitive and can only contain alphanumeric
   * characters, slashes, and underscores.
   *
   * @param string $action
   */
  public function setAction($action)
  {
    $this->action = $action;
  }
  /**
   * @return string
   */
  public function getAction()
  {
    return $this->action;
  }
  /**
   * Required. URI path of the API endpoint to protect. Must start with '/'.
   * Supports glob characters '*' to match a single path segment and '**' to
   * match multiple path segments. Standalone root catch-alls ('' and '*') are
   * invalid because it would hurt performance to trigger reCAPTCHA on every
   * single request to your backend. Matching is evaluated against the URL path
   * only (domain, scheme, and query parameters are ignored). Examples: -
   * `/login` matches `/login`, `https://example.com/login`, and
   * `/login?query=1`, but not `/login/step1`. - `/products` matches
   * `/products/123`, but not `/products/123/456`. - `/content*` matches
   * `/content/articles/2024/01/01`.
   *
   * @param string $path
   */
  public function setPath($path)
  {
    $this->path = $path;
  }
  /**
   * @return string
   */
  public function getPath()
  {
    return $this->path;
  }
}

// Adding a class alias for backwards compatibility with the previous class name.
class_alias(GoogleCloudRecaptchaenterpriseV1ProtectedEndpoint::class, 'Google_Service_RecaptchaEnterprise_GoogleCloudRecaptchaenterpriseV1ProtectedEndpoint');
