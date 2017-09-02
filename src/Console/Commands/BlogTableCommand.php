<?php

namespace Viviniko\Portal\Console\Commands;

use Viviniko\Support\Console\CreateMigrationCommand;

class BlogTableCommand extends CreateMigrationCommand
{
    protected $name = 'blog:table';

    protected $description = 'Create a migration for the portal service table';

    protected $stub = __DIR__.'/stubs/blog.stub';

    protected $migration = 'create_blog_table';
}