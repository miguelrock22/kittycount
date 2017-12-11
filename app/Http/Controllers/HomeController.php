<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Repositories\PrestamoRepository;

class HomeController extends Controller
{
    /** @var  PrestamoRepository */
    private $prestamoRepository;
    
    public function __construct(PrestamoRepository $prestamoRepo)
    {
        $this->prestamoRepository = $prestamoRepo;
    }
    
    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('home');
    }
}
