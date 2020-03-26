<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Jobs\TestJob;
use Illuminate\Support\Facades\Artisan;

class TestController extends Controller
{
    public function index($function=null)
    {
        if ($function!==null){
            return $this->$function();
        }else{
            echo 'Tests working';
        }
    }
    public function jobTest()
    {
        dispatch(new TestJob);
        return 'Test Job dispatched.';
    }
    public function debugSentry()
    {
        throw new \Exception('My first Sentry error!');
    }
    public function testPermissions()
    {
        return view('test.message', ['message' => 'only super admin can see this']);
    }
}
