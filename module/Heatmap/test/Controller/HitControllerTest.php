<?php

declare(strict_types=1);

namespace HeatmapTest\Controller;

use Application\Controller\IndexController;
use Laminas\Http\Header\Accept;
use Laminas\Stdlib\ArrayUtils;
use Laminas\Test\PHPUnit\Controller\AbstractHttpControllerTestCase;

class HitControllerTest extends AbstractHttpControllerTestCase
{
    public function setUp(): void
    {
        // The module configuration should still be applicable for tests.
        // You can override configuration here with test case specific values,
        // such as sample view templates, path stacks, module_listener_options,
        // etc.
        $configOverrides = [
            'module_listener_options' => [
                'config_cache_enabled' => false,
            ],
        ];

        $this->setApplicationConfig(ArrayUtils::merge(
            include __DIR__ . '/../../../../config/application.config.php',
            $configOverrides
        ));

        parent::setUp();

        // set up headers for API REST calls
        $headers = $this->getRequest()->getHeaders();
        $headers->addHeader(Accept::fromString('application/json'));
    }

    public function testHitActionCanBeAccessed()
    {
        $this->dispatch('/hit', 'GET');
        $this->assertResponseStatusCode(200);
        $this->assertModuleName('rest');
        $this->assertControllerName('Heatmap\\V1\\Rest\\Hit\\Controller'); // as specified in router's controller name alias
        $this->assertControllerClass('RestController');
        $this->assertMatchedRouteName('heatmap.rest.hit');
    }

    public function testHitLinkCountActionCanBeAccessed()
    {
        $this->dispatch('/hit-link-count', 'GET');
        $this->assertResponseStatusCode(200);
        $this->assertModuleName('rest');
        $this->assertControllerName('Heatmap\\V1\\Rest\\Hit\\LinkCount\\Controller'); // as specified in router's controller name alias
        $this->assertControllerClass('RestController');
        $this->assertMatchedRouteName('heatmap.rest.hit-link-count');
    }

    public function testHitLinkTypeCountActionCanBeAccessed()
    {
        $this->dispatch('/hit-link-type-count', 'GET');
        $this->assertResponseStatusCode(200);
        $this->assertModuleName('rest');
        $this->assertControllerName('Heatmap\\V1\\Rest\\Hit\\LinkTypeCount\\Controller'); // as specified in router's controller name alias
        $this->assertControllerClass('RestController');
        $this->assertMatchedRouteName('heatmap.rest.hit-link-type-count');
    }

    public function testHitCustomerJourneyActionCanBeAccessed()
    {
        $this->dispatch('/customer-journey/123', 'GET');
        $this->assertResponseStatusCode(200);
        $this->assertModuleName('rest');
        $this->assertControllerName('Heatmap\\V1\\Rest\\Hit\\CustomerJourney\\Controller'); // as specified in router's controller name alias
        $this->assertControllerClass('RestController');
        $this->assertMatchedRouteName('heatmap.rest.customer-journey');
    }

    public function testHitCustomerSameJourneyActionCanBeAccessed()
    {
        $this->dispatch('/customer-same-journey/123', 'GET');
        $this->assertResponseStatusCode(200);
        $this->assertModuleName('rest');
        $this->assertControllerName('Heatmap\\V1\\Rest\\Hit\\CustomerSameJourney\\Controller'); // as specified in router's controller name alias
        $this->assertControllerClass('RestController');
        $this->assertMatchedRouteName('heatmap.rest.customer-same-journey');
    }

    public function testInvalidRouteDoesNotCrash()
    {
        $this->dispatch('/invalid/route', 'GET');
        $this->assertResponseStatusCode(404);
    }
}
