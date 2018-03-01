<?php

class Response
{
    private $variables;
    private $statusCode = 200;

    private function __construct( $statusCode = 200 )
    {
        $this->statusCode = $statusCode;
    }

    protected function setVariables( $variables )
    {
        $this->variables = $variables;

        return $this;
    }

    public function getVariables()
    {
        return $this->variables;
    }

    /**
     * @param array $response
     * @param int $statusCode
     * @return Response
     */

    public static function json( array $response = [], $statusCode = 200 )
    {
        return ( new static( $statusCode ) )->setVariables( $response );
    }
}