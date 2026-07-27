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

namespace Google\Service\Assuredworkloads\Resource;

use Google\Service\Assuredworkloads\GoogleCloudAssuredworkloadsV1ListDbControlComplianceSummariesResponse;

/**
 * The "dbControlComplianceSummaries" collection of methods.
 * Typical usage is:
 *  <code>
 *   $assuredworkloadsService = new Google\Service\Assuredworkloads(...);
 *   $dbControlComplianceSummaries = $assuredworkloadsService->projects_locations_dbFrameworkComplianceReports_dbControlComplianceSummaries;
 *  </code>
 */
class ProjectsLocationsDbFrameworkComplianceReportsDbControlComplianceSummaries extends \Google\Service\Resource
{
  /**
   * Lists the control compliance summary for a given scope. (dbControlComplianceS
   * ummaries.listProjectsLocationsDbFrameworkComplianceReportsDbControlCompliance
   * Summaries)
   *
   * @param string $parent Required. The parent scope for the framework overview
   * page. Format: organizations/{organization}/locations/{location}/dbFrameworkCo
   * mplianceReports/{db_framework_compliance_report} folders/{folder}/locations/{
   * location}/dbFrameworkComplianceReports/{db_framework_compliance_report} proje
   * cts/{project}/locations/{location}/dbFrameworkComplianceReports/{db_framework
   * _compliance_report}
   * @param array $optParams Optional parameters.
   *
   * @opt_param string filter Optional. The filtering results.
   * @opt_param int pageSize Optional. The requested page size. The server might
   * return fewer items than requested. If unspecified, the default page size is
   * 50. The maximum value is 1000.
   * @opt_param string pageToken Optional. A token that identifies the page of
   * results that the server should return.
   * @return GoogleCloudAssuredworkloadsV1ListDbControlComplianceSummariesResponse
   * @throws \Google\Service\Exception
   */
  public function listProjectsLocationsDbFrameworkComplianceReportsDbControlComplianceSummaries($parent, $optParams = [])
  {
    $params = ['parent' => $parent];
    $params = array_merge($params, $optParams);
    return $this->call('list', [$params], GoogleCloudAssuredworkloadsV1ListDbControlComplianceSummariesResponse::class);
  }
}

// Adding a class alias for backwards compatibility with the previous class name.
class_alias(ProjectsLocationsDbFrameworkComplianceReportsDbControlComplianceSummaries::class, 'Google_Service_Assuredworkloads_Resource_ProjectsLocationsDbFrameworkComplianceReportsDbControlComplianceSummaries');
