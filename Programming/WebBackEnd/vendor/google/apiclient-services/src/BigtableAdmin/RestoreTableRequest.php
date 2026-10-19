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

namespace Google\Service\BigtableAdmin;

class RestoreTableRequest extends \Google\Model
{
  /**
   * Name of the backup from which to restore. Values are of the form
   * `projects//instances//clusters//backups/`.
   *
   * @var string
   */
  public $backup;
  protected $tableType = Table::class;
  protected $tableDataType = '';
  /**
   * Required. The id of the table to create and restore to. This table must not
   * already exist. The `table_id` appended to `parent` forms the full table
   * name of the form `projects//instances//tables/`.
   *
   * @var string
   */
  public $tableId;
  /**
   * Optional. The list of fields to set on the new table. A mask specifying
   * which fields (e.g. `deletion_protection`) in the `table` field should be
   * set. This mask is relative to the `table` field, not to the request
   * message. The wildcard (*) path is currently not supported. Currently
   * RestoreTable only supports the following fields for modification: *
   * `deletion_protection`: Defaults to `false` if not set. *
   * `automated_backup_policy`: Defaults to no automated backup policy if not
   * set. Output-only fields in the mask will be ignored. If any other field not
   * listed above is included in `update_mask`, it will result in an
   * INVALID_ARGUMENT error.
   *
   * @var string
   */
  public $updateMask;

  /**
   * Name of the backup from which to restore. Values are of the form
   * `projects//instances//clusters//backups/`.
   *
   * @param string $backup
   */
  public function setBackup($backup)
  {
    $this->backup = $backup;
  }
  /**
   * @return string
   */
  public function getBackup()
  {
    return $this->backup;
  }
  /**
   * Optional. Properties of the table to be restored. Only the fields specified
   * in update_mask will be used to set the restored table's properties.
   *
   * @param Table $table
   */
  public function setTable(Table $table)
  {
    $this->table = $table;
  }
  /**
   * @return Table
   */
  public function getTable()
  {
    return $this->table;
  }
  /**
   * Required. The id of the table to create and restore to. This table must not
   * already exist. The `table_id` appended to `parent` forms the full table
   * name of the form `projects//instances//tables/`.
   *
   * @param string $tableId
   */
  public function setTableId($tableId)
  {
    $this->tableId = $tableId;
  }
  /**
   * @return string
   */
  public function getTableId()
  {
    return $this->tableId;
  }
  /**
   * Optional. The list of fields to set on the new table. A mask specifying
   * which fields (e.g. `deletion_protection`) in the `table` field should be
   * set. This mask is relative to the `table` field, not to the request
   * message. The wildcard (*) path is currently not supported. Currently
   * RestoreTable only supports the following fields for modification: *
   * `deletion_protection`: Defaults to `false` if not set. *
   * `automated_backup_policy`: Defaults to no automated backup policy if not
   * set. Output-only fields in the mask will be ignored. If any other field not
   * listed above is included in `update_mask`, it will result in an
   * INVALID_ARGUMENT error.
   *
   * @param string $updateMask
   */
  public function setUpdateMask($updateMask)
  {
    $this->updateMask = $updateMask;
  }
  /**
   * @return string
   */
  public function getUpdateMask()
  {
    return $this->updateMask;
  }
}

// Adding a class alias for backwards compatibility with the previous class name.
class_alias(RestoreTableRequest::class, 'Google_Service_BigtableAdmin_RestoreTableRequest');
