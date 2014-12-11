<?php namespace Phprest\Service\RequestFilter;

use Phprest\Service\RequestFilter\Contract\ObtainStrategy;
use Phprest\Service\RequestFilter\Contract\Query;
use Phprest\Service\RequestFilter\Contract\Sort;
use Phprest\Service\RequestFilter\Contract\Offset;
use Phprest\Service\RequestFilter\Contract\Limit;
use Symfony\Component\HttpFoundation\Request;

class RequestFilter
{
    /**
     * @var ObtainStrategy
     */
    protected $queryObtainer;

    /**
     * @var Query\ParseStrategy
     */
    protected $queryParser;

    /**
     * @var ObtainStrategy
     */
    protected $sortObtainer;

    /**
     * @var Sort\ParseStrategy
     */
    protected $sortParser;

    /**
     * @var ObtainStrategy
     */
    protected $offsetObtainer;

    /**
     * @var Offset\ParseStrategy
     */
    protected $offsetParser;

    /**
     * @var ObtainStrategy
     */
    protected $limitObtainer;

    /**
     * @var Limit\ParseStrategy
     */
    protected $limitParser;

    /**
     * @param Config $config
     */
    public function __construct(Config $config)
    {
        $this->queryObtainer = $config->queryObtainer;
        $this->queryParser = $config->queryParser;

        $this->sortObtainer = $config->sortObtainer;
        $this->sortParser = $config->sortParser;

        $this->offsetObtainer = $config->offsetObtainser;
        $this->offsetParser = $config->offsetParser;

        $this->limitObtainer = $config->limitObtainer;
        $this->limitParser = $config->limitParser;
    }

    /**
     * @param Request $request
     * @param object $processor
     *
     * @return void
     */
    public function process(Request $request, $processor)
    {
        $this->processQuery($request, $processor);
        $this->processSort($request, $processor);
        $this->processOffset($request, $processor);
        $this->processLimit($request, $processor);
    }

    /**
     * @param Request $request
     * @param object $processor
     *
     * @return mixed
     */
    public function processQuery(Request $request, $processor)
    {
        if ( ! is_null($query = $this->queryObtainer->get($request)) and
            $processor instanceof Query\ProcessStrategy) {

            return $processor->query(
                $this->queryParser->parse($query)
            );
        }
    }

    /**
     * @param Request $request
     * @param object $processor
     *
     * @return mixed
     */
    public function processSort(Request $request, $processor)
    {
        if ( ! is_null($sort = $this->sortObtainer->get($request)) and
            $processor instanceof Sort\ProcessStrategy) {

            return $processor->sort(
                $this->sortParser->parse($sort)
            );
        }
    }

    /**
     * @param Request $request
     * @param object $processor
     *
     * @return mixed
     */
    public function processOffset(Request $request, $processor)
    {
        if ( ! is_null($offset = $this->offsetObtainer->get($request)) and
            $processor instanceof Offset\ProcessStrategy) {

            return $processor->offset(
                $this->offsetParser->parse($offset)
            );
        }
    }

    /**
     * @param Request $request
     * @param object $processor
     *
     * @return mixed
     */
    public function processLimit(Request $request, $processor)
    {
        if ( ! is_null($limit = $this->limitObtainer->get($request)) and
            $processor instanceof Limit\ProcessStrategy) {

            return $processor->limit(
                $this->limitParser->parse($limit)
            );
        }
    }

    /**
     * @param ObtainStrategy $obtainer
     */
    public function setQueryObtainer(ObtainStrategy $obtainer)
    {
        $this->queryObtainer = $obtainer;
    }

    /**
     * @param Query\ParseStrategy $parser
     */
    public function setQueryParser(Query\ParseStrategy $parser)
    {
        $this->queryParser = $parser;
    }

    /**
     * @param ObtainStrategy $obtainer
     */
    public function setSortObtainer(ObtainStrategy $obtainer)
    {
        $this->sortObtainer = $obtainer;
    }

    /**
     * @param Sort\ParseStrategy $parser
     */
    public function setSortParser(Sort\ParseStrategy $parser)
    {
        $this->sortParser = $parser;
    }

    /**
     * @param ObtainStrategy $obtainer
     */
    public function setOffsetObtainer(ObtainStrategy $obtainer)
    {
        $this->offsetObtainer = $obtainer;
    }

    /**
     * @param Offset\ParseStrategy $parser
     */
    public function setOffsetParser(Offset\ParseStrategy $parser)
    {
        $this->offsetParser = $parser;
    }

    /**
     * @param ObtainStrategy $obtainer
     */
    public function setLimitObtainer(ObtainStrategy $obtainer)
    {
        $this->limitObtainer = $obtainer;
    }

    /**
     * @param Limit\ParseStrategy $parser
     */
    public function setLimitParser(Limit\ParseStrategy $parser)
    {
        $this->limitParser = $parser;
    }
}
