<?php
namespace Fontai\Bundle\BrowscapBundle\Service;

use Crossjoin\Browscap\Browscap as Reader;
use Crossjoin\Browscap\Parser\Sqlite\Parser;
use Crossjoin\Browscap\Source\Ini\BrowscapOrg;
use Crossjoin\Browscap\Type;


class Browscap
{
  protected $reader;

  public function __construct(string $cacheDir)
  {
    $this->reader = new Reader();      
    $this->reader->setParser(new Parser($cacheDir . '/../../'));
  }

  public function getBrowserForUseragent(string $useragent)
  {
    return $this->reader->getBrowser($useragent);
  }

  public function update(int $type = Type::LITE)
  {
    $this->reader->getParser()->setSource(new BrowscapOrg($type));
    $this->reader->update(FALSE);
  }
}