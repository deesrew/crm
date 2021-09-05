<?php

namespace App\Modules\Admin\Dashboard\Classes;

use App\Http\Controllers\Controller;
use Illuminate\Support\Arr;
use Illuminate\Support\Facades\Auth;

class Base extends Controller
{
    /**
     * @var string
     */
    private $template;
    private $user;
    private $title;
    private $content;
    private $vars;

    public function __construct()
    {
        $this->template = "Admin::Dashboard.dashboard";

        $this->middleware(function ($request, $next) {
            $this->user = Auth::user();
            return $next($request);
        });
    }

    protected function renderOutPut()
    {
        $this->vars = Arr::add($this->vars, 'content', $this->content);

        dd($this->vars);

        return view($this->template)->with($this->vars);
    }

    protected function getMenu()
    {

    }
}
