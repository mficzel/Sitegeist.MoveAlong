<?php
namespace Sitegeist\MoveAlong\View;

use Neos\Flow\Annotations as Flow;
use Neos\Flow\Mvc\View\AbstractView;
use Neos\Flow\Exception;
use Neos\Flow\Http\Request;

use Sitegeist\MoveAlong\Domain\Service\RuleService;

class NotFoundExceptionView extends AbstractView
{
    /**
     * @Flow\Inject
     * @var RuleService
     */
    protected $rulesService;

    public function render()
    {
        $statusCode = $this->variables['statusCode'];
        $httpRequest = Request::createFromEnvironment();

        $rule = $this->rulesService->findMatchingRules($httpRequest->getUri()->__toString());

        $res = '';
        $res .= \Neos\Flow\var_dump($this->variables);
        $res .= \Neos\Flow\var_dump($rule);

        return $res;
    }
}
