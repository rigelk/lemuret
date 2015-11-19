<?php

class AllRoutesTest extends TestCase
{
    protected $admin;
    
    public function setUp()
    {
        parent::setUp();
        $this->admin      = App\User::find(1);
        

    }

    /**
     * test all route
     *
     * @group route
     */

    public function testAllRoute()
    {
        $routeCollection = Route::getRoutes();
        $this->withoutEvents();
        $blacklist = [
            '/',
		'_debugbar/open',
		'images/all',
		'admin/logout'
		
        ];
        $dynamicReg = "/{\\S*}/"; //used for omitting dynamic urls that have {} in uri (http://laravel-tricks.com/tricks/adding-a-sitemap-to-your-laravel-application#comment-1830836789)
        $this->be($this->admin);
        foreach ($routeCollection as $route) {
            if (!preg_match($dynamicReg, $route->getUri()) &&
                in_array('GET', $route->getMethods()) && 
                !in_array($route->getUri(), $blacklist)
            ) {
                $start = $this->microtimeFloat();
                fwrite(STDERR, print_r('test ' . $route->getUri() . "\n", true));
                $response = $this->call('GET', $route->getUri());
                $end   = $this->microtimeFloat();
                $temps = round($end - $start, 3);
                fwrite(STDERR, print_r('time: ' . $temps . "\n", true));
                $this->assertLessThan(15, $temps, "too long time for " . $route->getUri());
                $this->assertEquals(200, $response->getStatusCode(), $route->getUri() . " failed to load");

            }

        }
    }

    public function microtimeFloat()
    {
        list($usec, $asec) = explode(" ", microtime());

        return ((float) $usec + (float) $asec);

    }
}
