<?php

namespace App\Http\Middleware\Application\BackEnd\API\Authentication
    {
    class TerminateHandler
        {
        public function handle(\Illuminate\Http\Request $request, \Closure $next)
            {
            return $next($request);
            }
            
        public function terminate($request, $response)
            {
            //echo "<br>".getcwd().'./../tmp/1.txt'."<br>";
            //file_put_contents(getcwd().'./../tmp/1.txt', 'hello terminate');
            //echo "TERMINATE";
            }
        }
    }

?>