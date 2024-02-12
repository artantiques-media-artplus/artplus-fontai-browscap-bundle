<?php
namespace Fontai\Bundle\BrowscapBundle\Command;

use Symfony\Component\Console\Command\Command;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Output\OutputInterface;
use Fontai\Bundle\BrowscapBundle\Service\Browscap;


class UpdateCommand extends Command
{
  protected $browscap;

  public function __construct(Browscap $browscap)
  {
    $this->browscap = $browscap;

    parent::__construct();
  }

  protected function configure()
  {
    $this
    ->setDescription('Updates Browscap database.')
    ->setHelp('This command allows you to update Browscap database.');
  }

  protected function execute(InputInterface $input, OutputInterface $output)
  {
    try
    {
      $this->browscap->update();
      $output->writeln('Browscap database successfully updated.');
    }
    catch (Exception $e)
    {
      $output->writeln('Cannot update Browscap database.');

      return 1;
    }

    return 0;
  }
}