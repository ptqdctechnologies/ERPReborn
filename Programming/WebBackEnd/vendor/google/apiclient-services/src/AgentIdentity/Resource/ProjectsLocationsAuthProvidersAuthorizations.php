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

namespace Google\Service\AgentIdentity\Resource;

use Google\Service\AgentIdentity\AgentidentityEmpty;
use Google\Service\AgentIdentity\Authorization;
use Google\Service\AgentIdentity\ListAuthorizationsResponse;

/**
 * The "authorizations" collection of methods.
 * Typical usage is:
 *  <code>
 *   $agentidentityService = new Google\Service\AgentIdentity(...);
 *   $authorizations = $agentidentityService->projects_locations_authProviders_authorizations;
 *  </code>
 */
class ProjectsLocationsAuthProvidersAuthorizations extends \Google\Service\Resource
{
  /**
   * Deletes a single authorization. (authorizations.delete)
   *
   * @param string $name Required. The resource name of the authorization to
   * delete. Format: projects/{project}/locations/{location}/authProviders/{auth_p
   * rovider}/authorizations/{authorization}
   * @param array $optParams Optional parameters.
   *
   * @opt_param string requestId Optional. An optional request ID to identify
   * requests. Specify a unique request ID so that if you must retry your request,
   * the server will know to ignore the request if it has already been completed.
   * The server will guarantee that for at least 60 minutes after the first
   * request. For example, consider a situation where you make an initial request
   * and the request times out. If you make the request again with the same
   * request ID, the server can check if original operation with the same request
   * ID was received, and if so, will ignore the second request. This prevents
   * clients from accidentally creating duplicate commitments. The request ID must
   * be a valid UUID with the exception that zero UUID is not supported
   * (00000000-0000-0000-0000-000000000000).
   * @return AgentidentityEmpty
   * @throws \Google\Service\Exception
   */
  public function delete($name, $optParams = [])
  {
    $params = ['name' => $name];
    $params = array_merge($params, $optParams);
    return $this->call('delete', [$params], AgentidentityEmpty::class);
  }
  /**
   * Gets details of a single authorization. (authorizations.get)
   *
   * @param string $name Required. The resource name of the authorization.
   * @param array $optParams Optional parameters.
   * @return Authorization
   * @throws \Google\Service\Exception
   */
  public function get($name, $optParams = [])
  {
    $params = ['name' => $name];
    $params = array_merge($params, $optParams);
    return $this->call('get', [$params], Authorization::class);
  }
  /**
   * Lists authorizations in a given project and location.
   * (authorizations.listProjectsLocationsAuthProvidersAuthorizations)
   *
   * @param string $parent Required. The parent resource where the search is
   * performed. Format:
   * projects/{project}/locations/{location}/authProviders/{auth_provider}
   * @param array $optParams Optional parameters.
   *
   * @opt_param string filter Optional. Filter string to restrict the results.
   * Currently supports filtering by `client_user_id` only. Format:
   * `client_user_id=""`
   * @opt_param string orderBy Optional. This field is currently ignored. Defaults
   * to ordering by authorization_id in ascending order.
   * @opt_param int pageSize Optional. Requested page size. Server may return
   * fewer items than requested. If unspecified, server will pick an appropriate
   * default. The maximum page size is 1000.
   * @opt_param string pageToken Optional. A page token, received from a previous
   * `ListAuthorizations` call. Provide this to retrieve the subsequent page. When
   * paginating, all other parameters provided to `ListAuthorizations` must match
   * the call that provided the page token.
   * @return ListAuthorizationsResponse
   * @throws \Google\Service\Exception
   */
  public function listProjectsLocationsAuthProvidersAuthorizations($parent, $optParams = [])
  {
    $params = ['parent' => $parent];
    $params = array_merge($params, $optParams);
    return $this->call('list', [$params], ListAuthorizationsResponse::class);
  }
}

// Adding a class alias for backwards compatibility with the previous class name.
class_alias(ProjectsLocationsAuthProvidersAuthorizations::class, 'Google_Service_AgentIdentity_Resource_ProjectsLocationsAuthProvidersAuthorizations');
