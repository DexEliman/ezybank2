<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PlanController extends Controller
{
        // Page Basique
        public function basique()
        {
            return view('inscription');
        }
    
        // Page Premium
        public function premium()
        {
            //return view('plan.premium');
        }
}
