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

namespace Google\Service\NetworkSecurity\Resource;

use Google\Service\NetworkSecurity\ListWildfireVerdictChangeRequestsResponse;
use Google\Service\NetworkSecurity\WildfireVerdictChangeRequest;

/**
 * The "wildfireVerdictChangeRequests" collection of methods.
 * Typical usage is:
 *  <code>
 *   $networksecurityService = new Google\Service\NetworkSecurity(...);
 *   $wildfireVerdictChangeRequests = $networksecurityService->projects_locations_firewallEndpoints_wildfireVerdictChangeRequests;
 *  </code>
 */
class ProjectsLocationsFirewallEndpointsWildfireVerdictChangeRequests extends \Google\Service\Resource
{
  /**
   * Create WildfireVerdictChangeRequest in a given Firewall Endpoint in a project
   * and location. (wildfireVerdictChangeRequests.create)
   *
   * @param string $parent Required. Parent value for
   * CreateWildfireVerdictChangeRequestRequest. The parent is a firewall endpoint
   * resource. Format: organizations|projects/{project_or_organization}/locations/
   * {location}/firewallEndpoints/{firewall_endpoint}
   * @param WildfireVerdictChangeRequest $postBody
   * @param array $optParams Optional parameters.
   * @return WildfireVerdictChangeRequest
   * @throws \Google\Service\Exception
   */
  public function create($parent, WildfireVerdictChangeRequest $postBody, $optParams = [])
  {
    $params = ['parent' => $parent, 'postBody' => $postBody];
    $params = array_merge($params, $optParams);
    return $this->call('create', [$params], WildfireVerdictChangeRequest::class);
  }
  /**
   * Get WildfireVerdictChangeRequest in a given Firewall Endpoint in a project
   * and location. (wildfireVerdictChangeRequests.get)
   *
   * @param string $name Required. Name of the WildfireVerdictChangeRequest to
   * retrieve. Format: organizations|projects/{project_or_organization}/locations/
   * {location}/firewallEndpoints/{firewall_endpoint}/wildfireVerdictChangeRequest
   * s/{wildfire_verdict_change_request_id} Where
   * {wildfire_verdict_change_request_id} is the ID in the format:
   * ^[0-9a-fA-F]{8}-[0-9a-fA-F]{4}-[0-9a-fA-F]{4}-[0-9a-fA-F]{4}-[0-9a-fA-F]{12}$
   * @param array $optParams Optional parameters.
   * @return WildfireVerdictChangeRequest
   * @throws \Google\Service\Exception
   */
  public function get($name, $optParams = [])
  {
    $params = ['name' => $name];
    $params = array_merge($params, $optParams);
    return $this->call('get', [$params], WildfireVerdictChangeRequest::class);
  }
  /**
   * Lists WildfireVerdictChangeRequests in a given Firewall Endpoint in a project
   * and location. (wildfireVerdictChangeRequests.listProjectsLocationsFirewallEnd
   * pointsWildfireVerdictChangeRequests)
   *
   * @param string $parent Required. Parent value for
   * ListWildfireVerdictChangeRequestsRequest. The parent is a firewall endpoint
   * resource. Format: organizations|projects/{project_or_organization}/locations/
   * {location}/firewallEndpoints/{firewall_endpoint}
   * @param array $optParams Optional parameters.
   *
   * @opt_param string filter Optional. Filter expression to filter the results.
   * See AIP-160 for filtering syntax. Supported fields are: - `sha256` (string,
   * equality only, e.g. `sha256 = "..."`) - `state` (enum, equality only, e.g.
   * `state = "ACTIVE"`) - `create_time` (timestamp, comparisons, e.g.
   * `create_time > "2026-01-01T00:00:00Z"`)
   * @opt_param int pageSize Optional. Requested page size. Server may return
   * fewer items than requested. If unspecified, server will pick an appropriate
   * default.
   * @opt_param string pageToken Optional. A token identifying a page of results
   * the server should return.
   * @return ListWildfireVerdictChangeRequestsResponse
   * @throws \Google\Service\Exception
   */
  public function listProjectsLocationsFirewallEndpointsWildfireVerdictChangeRequests($parent, $optParams = [])
  {
    $params = ['parent' => $parent];
    $params = array_merge($params, $optParams);
    return $this->call('list', [$params], ListWildfireVerdictChangeRequestsResponse::class);
  }
}

// Adding a class alias for backwards compatibility with the previous class name.
class_alias(ProjectsLocationsFirewallEndpointsWildfireVerdictChangeRequests::class, 'Google_Service_NetworkSecurity_Resource_ProjectsLocationsFirewallEndpointsWildfireVerdictChangeRequests');
