<?php namespace Phprest\Service\RequestFilter;

use Phprest\Service\Configurable;
use Phprest\Service\RequestFilter\Contract\ObtainStrategy;
use Phprest\Service\RequestFilter\Contract\Query;
use Phprest\Service\RequestFilter\Contract\Sort;
use Phprest\Service\RequestFilter\Contract\Offset;
use Phprest\Service\RequestFilter\Contract\Limit;
use Phprest\Service\RequestFilter\Implementation\Query\Obtainer\QueryInHeaderOrQuery;
use Phprest\Service\RequestFilter\Implementation\Query\Parser\CommaSmartAnd;
use Phprest\Service\RequestFilter\Implementation\Sort\Obtainer\SortInHeaderOrQuery;
use Phprest\Service\RequestFilter\Implementation\Sort\Parser\CommaMinus;
use Phprest\Service\RequestFilter\Implementation\Offset\Parser\Simple as OffsetSimple;
use Phprest\Service\RequestFilter\Implementation\Offset\Obtainer\OffsetInHeaderOrQuery;
use Phprest\Service\RequestFilter\Implementation\Limit\Obtainer\LimitInHeaderOrQuery;
use Phprest\Service\RequestFilter\Implementation\Limit\Parser\Simple as LimitSimple;

class Config implements Configurable
{
    /**
     * @var ObtainStrategy
     */
    public $queryObtainer;

    /**
     * @var Query\ParseStrategy
     */
    public $queryParser;

    /**
     * @var ObtainStrategy
     */
    public $sortObtainer;

    /**
     * @var Sort\ParseStrategy
     */
    public $sortParser;

    /**
     * @var ObtainStrategy
     */
    public $offsetObtainser;

    /**
     * @var Offset\ParseStrategy
     */
    public $offsetParser;

    /**
     * @var ObtainStrategy
     */
    public $limitObtainer;

    /**
     * @var Limit\ParseStrategy
     */
    public $limitParser;


    public function __construct()
    {
        $this->queryObtainer = new QueryInHeaderOrQuery();
        $this->queryParser = new CommaSmartAnd();

        $this->sortObtainer = new SortInHeaderOrQuery();
        $this->sortParser = new CommaMinus();

        $this->offsetObtainser = new OffsetInHeaderOrQuery();
        $this->offsetParser = new OffsetSimple();

        $this->limitObtainer = new LimitInHeaderOrQuery();
        $this->limitParser = new LimitSimple();
    }

    /**
     * @return string
     */
    static public function getServiceName()
    {
        return 'request-filter';
    }
}
