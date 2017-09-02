<?php

namespace Viviniko\Portal\Console\Commands;

use Viviniko\Support\Console\CreateMigrationCommand;

class PortalTableCommand extends CreateMigrationCommand
{
    protected $name = 'portal:table';

    protected $description = 'Create a migration for the portal service table';

    protected $stub = __DIR__.'/stubs/portal.stub';

    protected $migration = 'create_portal_table';
}