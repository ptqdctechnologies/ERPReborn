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

namespace Google\Service\AccessContextManager;

class Principal extends \Google\Model
{
  /**
   * Immutable. IAM federated principal name to assign policies to
   * workforce/workload federated identities. Can be principal set or single
   * principal, here are some examples: Single principal: principal://iam.google
   * apis.com/projects/{project_number}/locations/global/workloadIdentityPools/{
   * pool_id}/subject/{subject_attribute_value} PrincipalSet: principalSet://iam
   * .googleapis.com/projects/{project_number}/locations/global/workloadIdentity
   * Pools/{pool_id}
   *
   * @var string
   */
  public $federatedPrincipal;
  /**
   * Immutable. Service account email used to assign policies to a specific
   * service account. If a service account is subject to multiple policies
   * (e.g., if there is a policy for all service accounts in a project and a
   * policy for the service account), the closest (i.e. the most specific) dry-
   * run policy will be used for the dry-run functionality and the closest
   * enforcement policy will be used for the enforcement.
   *
   * @var string
   */
  public $serviceAccount;
  /**
   * Immutable. Cloud project number used to assign policies to all service
   * accounts owned by the project.
   *
   * @var string
   */
  public $serviceAccountProjectNumber;

  /**
   * Immutable. IAM federated principal name to assign policies to
   * workforce/workload federated identities. Can be principal set or single
   * principal, here are some examples: Single principal: principal://iam.google
   * apis.com/projects/{project_number}/locations/global/workloadIdentityPools/{
   * pool_id}/subject/{subject_attribute_value} PrincipalSet: principalSet://iam
   * .googleapis.com/projects/{project_number}/locations/global/workloadIdentity
   * Pools/{pool_id}
   *
   * @param string $federatedPrincipal
   */
  public function setFederatedPrincipal($federatedPrincipal)
  {
    $this->federatedPrincipal = $federatedPrincipal;
  }
  /**
   * @return string
   */
  public function getFederatedPrincipal()
  {
    return $this->federatedPrincipal;
  }
  /**
   * Immutable. Service account email used to assign policies to a specific
   * service account. If a service account is subject to multiple policies
   * (e.g., if there is a policy for all service accounts in a project and a
   * policy for the service account), the closest (i.e. the most specific) dry-
   * run policy will be used for the dry-run functionality and the closest
   * enforcement policy will be used for the enforcement.
   *
   * @param string $serviceAccount
   */
  public function setServiceAccount($serviceAccount)
  {
    $this->serviceAccount = $serviceAccount;
  }
  /**
   * @return string
   */
  public function getServiceAccount()
  {
    return $this->serviceAccount;
  }
  /**
   * Immutable. Cloud project number used to assign policies to all service
   * accounts owned by the project.
   *
   * @param string $serviceAccountProjectNumber
   */
  public function setServiceAccountProjectNumber($serviceAccountProjectNumber)
  {
    $this->serviceAccountProjectNumber = $serviceAccountProjectNumber;
  }
  /**
   * @return string
   */
  public function getServiceAccountProjectNumber()
  {
    return $this->serviceAccountProjectNumber;
  }
}

// Adding a class alias for backwards compatibility with the previous class name.
class_alias(Principal::class, 'Google_Service_AccessContextManager_Principal');
