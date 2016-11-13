<?php
/* ===========================================================================
 * Copyright 2013-2016 The Opis Project
 *
 * Licensed under the Apache License, Version 2.0 (the "License");
 * you may not use this file except in compliance with the License.
 * You may obtain a copy of the License at
 *
 *    http://www.apache.org/licenses/LICENSE-2.0
 *
 * Unless required by applicable law or agreed to in writing, software
 * distributed under the License is distributed on an "AS IS" BASIS,
 * WITHOUT WARRANTIES OR CONDITIONS OF ANY KIND, either express or implied.
 * See the License for the specific language governing permissions and
 * limitations under the License.
 * ============================================================================ */

namespace Opis\Database\ORM\Relation;

use Opis\Database\ORM\DataMapper;
use Opis\Database\ORM\EntityQuery;
use Opis\Database\ORM\Relation;
use Opis\Database\ORM\Query;
use Opis\Database\SQL\SelectStatement;
use Opis\Database\SQL\SQLStatement;

class HasOneOrMany extends Relation
{
    /** @var bool */
    protected $hasMany;

    /**
     * EntityHasOneOrMany constructor.
     * @param string $entityClass
     * @param string|null $foreignKey
     * @param bool $hasMany
     */
    public function __construct(string $entityClass, string $foreignKey = null, bool $hasMany = false)
    {
        parent::__construct($entityClass, $foreignKey);
        $this->hasMany = $hasMany;
    }

    /**
     * @param DataMapper $data
     * @param callable|null $callback
     * @return mixed
     */
    protected function getResult(DataMapper $data, callable $callback = null)
    {
        $manager = $data->getEntityManager();
        $owner = $data->getEntityMapper();
        $related = $manager->resolveEntityMapper($this->entityClass);

        if($this->foreignKey === null){
            $this->foreignKey = $owner->getForeignKey();
        }

        $statement = new SQLStatement();
        $select = new EntityQuery($manager, $related, $statement);

        $select->where($this->foreignKey)->is($data->getColumn($owner->getPrimaryKey()));

        if($this->queryCallback !== null || $callback !== null){
            $query = new Query($statement);
            if($this->queryCallback !== null){
                ($this->queryCallback)($query);
            }
            if($callback !== null){
                $callback($query);
            }
        }

        return $this->hasMany ? $select->all() : $select->get();
    }
}