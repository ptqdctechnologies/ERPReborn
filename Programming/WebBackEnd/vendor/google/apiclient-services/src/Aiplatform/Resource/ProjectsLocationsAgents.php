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

namespace Google\Service\Aiplatform\Resource;

use Google\Service\Aiplatform\GoogleCloudAiplatformV1Agent;
use Google\Service\Aiplatform\GoogleCloudAiplatformV1ListAgentsResponse;
use Google\Service\Aiplatform\GoogleLongrunningOperation;

/**
 * The "agents" collection of methods.
 * Typical usage is:
 *  <code>
 *   $aiplatformService = new Google\Service\Aiplatform(...);
 *   $agents = $aiplatformService->projects_locations_agents;
 *  </code>
 */
class ProjectsLocationsAgents extends \Google\Service\Resource
{
  /**
   * Creates an agent. (agents.create)
   *
   * @param string $parent Required. The resource name of the location to create
   * the agent in. Format: `projects/{project}/locations/{location}`.
   * @param GoogleCloudAiplatformV1Agent $postBody
   * @param array $optParams Optional parameters.
   * @return GoogleLongrunningOperation
   * @throws \Google\Service\Exception
   */
  public function create($parent, GoogleCloudAiplatformV1Agent $postBody, $optParams = [])
  {
    $params = ['parent' => $parent, 'postBody' => $postBody];
    $params = array_merge($params, $optParams);
    return $this->call('create', [$params], GoogleLongrunningOperation::class);
  }
  /**
   * Deletes an agent. (agents.delete)
   *
   * @param string $name Required. The resource name of the agent to delete.
   * Format: `projects/{project}/locations/{location}/agents/{agent}`.
   * @param array $optParams Optional parameters.
   * @return GoogleLongrunningOperation
   * @throws \Google\Service\Exception
   */
  public function delete($name, $optParams = [])
  {
    $params = ['name' => $name];
    $params = array_merge($params, $optParams);
    return $this->call('delete', [$params], GoogleLongrunningOperation::class);
  }
  /**
   * Retrieves an agent. (agents.get)
   *
   * @param string $name Required. The resource name of the agent to retrieve.
   * Format: `projects/{project}/locations/{location}/agents/{agent}`.
   * @param array $optParams Optional parameters.
   * @return GoogleCloudAiplatformV1Agent
   * @throws \Google\Service\Exception
   */
  public function get($name, $optParams = [])
  {
    $params = ['name' => $name];
    $params = array_merge($params, $optParams);
    return $this->call('get', [$params], GoogleCloudAiplatformV1Agent::class);
  }
  /**
   * Lists agents in a location. (agents.listProjectsLocationsAgents)
   *
   * @param string $parent Required. The resource name of the location to list
   * agents from. Format: `projects/{project}/locations/{location}`.
   * @param array $optParams Optional parameters.
   *
   * @opt_param string orderBy Optional. A comma-separated list of fields to order
   * by. Supported fields: * `created` * `updated` Use `desc` after a field name
   * for descending order. Example: `created desc`.
   * @opt_param int pageSize Optional. The maximum number of agents to return. The
   * service may return fewer than this value. The maximum page size is 100;
   * values above 100 will be coerced to 100. If unspecified, the default page
   * size is 10.
   * @opt_param string pageToken Optional. A page token, received from a previous
   * AgentService.ListAgents call. Provide this to retrieve the subsequent page.
   * @return GoogleCloudAiplatformV1ListAgentsResponse
   * @throws \Google\Service\Exception
   */
  public function listProjectsLocationsAgents($parent, $optParams = [])
  {
    $params = ['parent' => $parent];
    $params = array_merge($params, $optParams);
    return $this->call('list', [$params], GoogleCloudAiplatformV1ListAgentsResponse::class);
  }
  /**
   * Updates an agent. (agents.patch)
   *
   * @param string $name Identifier. The resource name of the agent. Format:
   * `projects/{project}/locations/{location}/agents/{agent}`.
   * @param GoogleCloudAiplatformV1Agent $postBody
   * @param array $optParams Optional parameters.
   *
   * @opt_param string updateMask Optional. The list of fields to update. If not
   * present, all fields are updated.
   * @return GoogleCloudAiplatformV1Agent
   * @throws \Google\Service\Exception
   */
  public function patch($name, GoogleCloudAiplatformV1Agent $postBody, $optParams = [])
  {
    $params = ['name' => $name, 'postBody' => $postBody];
    $params = array_merge($params, $optParams);
    return $this->call('patch', [$params], GoogleCloudAiplatformV1Agent::class);
  }
}

// Adding a class alias for backwards compatibility with the previous class name.
class_alias(ProjectsLocationsAgents::class, 'Google_Service_Aiplatform_Resource_ProjectsLocationsAgents');
