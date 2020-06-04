<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class homeController extends Controller
{
    //
    public function dashboard()
    {
        $this->data['title'] = trans('backpack::base.dashboard'); // set the page title
        $this->data['widgets']['before_content'] = [
            [
                'type' => 'card',
                'wrapperClass' => 'col-sm-6 col-md-4',
                'content' => [
                    'header' => 'Some card title',
                    'body' => 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Duis non mi nec orci euismod venenatis. Integer quis sapien et diam facilisis facilisis ultricies quis justo. Phasellus sem <b>turpis</b>.',
                ]
            ],
        ];

        return view(backpack_view('dashboard'), $this->data);
    }
}
