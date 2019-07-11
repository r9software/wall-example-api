<?php

namespace Tests;

use Illuminate\Contracts\Debug\ExceptionHandler;
use Illuminate\Foundation\Exceptions\Handler;
use Illuminate\Foundation\Testing\TestCase as BaseTestCase;

abstract class TestCase extends BaseTestCase
{
    use CreatesApplication;
    /**
     * Setup the test environment.
     *
     * @return void
     */
    protected function setUp(): void
    {
        /**
         * This disables the exception handling to display the stacktrace on the console
         * the same way as it shown on the browser
         */
        parent::setUp();
        $this->disableExceptionHandling();
    }


    /**
     * Disables the exception handling
     */
    protected function disableExceptionHandling()
    {
        $this->app->instance(ExceptionHandler::class, new class extends Handler {
            public function __construct() {}

            public function report(\Exception $e)
            {
                // no-op
            }

            /**
             * @param \Illuminate\Http\Request $request
             * @param \Exception $e
             * @return \Illuminate\Http\Response|\Symfony\Component\HttpFoundation\Response|void
             * @throws \Exception
             */
            public function render($request, \Exception $e) {
                throw $e;
            }
        });
    }
}
