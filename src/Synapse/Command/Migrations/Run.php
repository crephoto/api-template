<?php

namespace Synapse\Command\Migrations;

use Symfony\Component\Console\Command\Command;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Output\OutputInterface;
use Zend\Db\Adapter\Adapter as DbAdapter;
use DirectoryIterator;
use Exception;

/**
 * Console command to run all new migrations on the database
 */
class Run extends Command
{
    /**
     * Database adapter
     *
     * @var Zend\Db\Adapter\Adapter
     */
    protected $db;

    /**
     * Set the database adapter
     *
     * @param \Zend\Db\Adapter\Adapter $db
     */
    public function setDatabaseAdapter(DbAdapter $db)
    {
        $this->db = $db;
    }

    /**
     * Set the console command's name and description
     */
    protected function configure()
    {
        $this->setName('migrations:run')
            ->setDescription('Run all new database migrations');
    }

    /**
     * Execute this console command
     *
     * @param  InputInterface  $input
     * @param  OutputInterface $output
     */
    protected function execute(InputInterface $input, OutputInterface $output)
    {
        $migrations = $this->migrationsToRun();

        foreach ($migrations as $migration) {
            $class = 'Application\\Migrations\\'.$migration;

            $migration = new $class;

            $migration->execute($this->db);
        }
    }

    /**
     * Determine all migrations that have not yet been run on the database
     *
     * @return array
     */
    protected function migrationsToRun()
    {
        // Get all migrations
        $path = APPDIR.'/src/Application/Migrations';
        $dir  = new DirectoryIterator($path);

        $migrations = [];
        foreach ($dir as $file) {
            // Only run migration files in the root migrations folder
            if (! $file->isFile() or substr($file->getBasename(), 0, 1) === '.') {
                continue;
            }

            $migrations[] = $file->getBasename('.php');
        }

        // Determine which migrations have already been run
        $oldMigrations = [];

        return array_diff($migrations, $oldMigrations);
    }
}
