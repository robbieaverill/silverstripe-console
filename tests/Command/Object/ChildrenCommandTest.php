<?php

namespace SilverLeague\Console\Tests\Command\Object;

use SilverLeague\Console\Tests\Command\AbstractCommandTest;

/**
 * @coversDefaultClass \SilverLeague\Console\Command\Object\ChildrenCommand
 * @package silverstripe-console
 * @author  Robbie Averill <robbie@averill.co.nz>
 */
class ChildrenCommandTest extends AbstractCommandTest
{
    /**
     * {@inheritDoc}
     */
    protected function getTestCommand()
    {
        return 'object:children';
    }

    /**
     * Ensure that the Injector's class resolution is returned for a given Object
     *
     * @covers ::execute
     */
    public function testExecute()
    {
        $tester = $this->executeTest(['object' => "SilverStripe\Dev\BuildTask"]);
        $output = $tester->getDisplay();
        $this->assertContains("SilverStripe\Dev\Tasks\CleanupTestDatabasesTask", $output);
        $this->assertContains('silverstripe/framework', $output);
    }

    /**
     * Ensure that the InputArgument for the object is added
     *
     * @covers ::configure
     */
    public function testConfigure()
    {
        $this->assertTrue($this->command->getDefinition()->hasArgument('object'));
    }
}
