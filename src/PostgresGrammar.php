<?php

namespace RishiRamawat\PostgresSchema;

use Illuminate\Support\Fluent;
use Illuminate\Database\Schema\Blueprint as BaseBlueprint;
use Illuminate\Database\Schema\Grammars\PostgresGrammar as BasePostgresGrammar;

class PostgresGrammar extends BasePostgresGrammar
{
    /**
     * Compile a create table command.
     *
     * @param  BaseBlueprint $blueprint
     * @param  \Illuminate\Support\Fluent $command
     *
     * @return string
     */
    public function compileCreate(BaseBlueprint $blueprint, Fluent $command)
    {
        $inheritedTables = implode(', ', $this->getInheritedTables($blueprint));
        $sql = parent::compileCreate($blueprint, $command);

        if (!empty($inheritedTables)) {
            return $sql." inherits ({$inheritedTables})";
        }

        return $sql;
    }

    /**
     * Compile the blueprint's inherits definitions.
     *
     * @param  BaseBlueprint $blueprint
     *
     * @return array
     */
    protected function getInheritedTables(BaseBlueprint $blueprint)
    {
        $tables = [];

        foreach ($blueprint->getInheritedTables() as $table) {
            //$sql = $this->wrapTable($table);
            $tables[] = $table;
        }

        return $tables;
    }
}
