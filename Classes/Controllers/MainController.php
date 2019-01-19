<?php

namespace Classes\Controllers;

use Gui\Components\Div;
use Gui\Components\Button;
use Gui\Components\Label;
use Kingga\Gui\Routing\Request;
use Kingga\Gui\Database\DB;
use Classes\Models\AppInfo;

class MainController
{
    public function main(Request $request)
    {
        $request->getRenderer()->render('main', [
            'info'      => [
                'Version'       => '1.0.0',
                'Licence'       => 'MIT',
                'Author'        => 'Isaac Skelton',
                'Email'         => 'contact@isaacskelton.com',
            ],
        ]);
    }

    public function closeApplication(Request &$request)
    {
        $request->getApp()->terminate();
    }
}
