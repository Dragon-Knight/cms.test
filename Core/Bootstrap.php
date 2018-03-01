<?php

class Bootstrap
{
    public static function execute( $page, $mode = null )
    {
        $response = Response::json([
            'message' => 'ok'
        ], 200);

        try
        {
            $class = '\Page\\' . static::normalizePage( $page );

            if( !class_exists( $class ) )
            {
                throw new \Exception( 'Controller class ' . $class . ' not found!' );
            }

            $instance = new $class();

            if( ! ( $instance instanceof Controller ) )
            {
                throw new \Exception( $class . ' must be an instance of \Controller' );
            }

            $reflection = new ReflectionClass( $instance );
            $method     = static::normalizeMethod( Request::getInstance()->getMethod(), $mode );

            if( !$reflection->hasMethod( $method ) )
            {
                throw new \Exception( $class . ' must implement [' . $method . '] method for correct work.' );
            }

            $reflectionMethod = $reflection->getMethod( $method );
            $parameters = [];
            $request = Request::getInstance();

            foreach( $reflectionMethod->getParameters() as $parameter )
            {
                $value = $request->get( $parameter->getName() );

                if( $value !== null )
                {
                    $parameters[] = $value;
                }
                else
                {
                    try
                    {
                        $default      = $parameter->getDefaultValue();
                        $parameters[] = $default;
                    }
                    catch( \Exception $e )
                    {
                        throw new \Exception( 'Parameter [' . $parameter->getName() . '] must exist in request.' );
                    }
                }
            }

            $response = call_user_func_array([
                $class, $reflectionMethod->getName()
            ], $parameters );

            if( ! $response instanceof Response )
            {
                throw new \Exception( '[' . $reflectionMethod->getName() . '] must return an instance of \Response' );
            }

        }
        catch( \Exception $e )
        {
            $response = Response::json([
                'message' => $e->getMessage()
            ], 502);
        }
    }

    private static function response( Response $response )
    {

    }

    private static function normalizePage( $page )
    {
        $page = str_replace('_', ' ', $page );
        $page = ucwords( $page );

        return str_replace( ' ', '', $page );
    }

    private static function normalizeMethod( $method, $mode = null )
    {
        $method = strtolower( $method );

        if( $mode !== null )
        {
            $mode = str_replace('_', ' ', $mode );
            $mode = ucwords( $mode );

            $method .= $mode;
        }

        return str_replace(' ', '', $method );
    }
}