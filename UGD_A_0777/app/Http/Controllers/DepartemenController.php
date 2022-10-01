<?php
namespace App\Http\Controllers;
/* Import Model */
use App\Models\Departemen;
use Illuminate\Http\Request;
class DepartemenController extends Controller
{
    /**
    * index
    *
    * @return void
    */
    public function index()
    {
            //get posts
        $departemen = Departemen::get();
        //render view with posts
        return view('departemen.index', compact('departemen'));
    }
}
