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
        // ...
    }

    public function showInfoModal(Request $request)
    {
        $request->getRenderer()->render('infobox');
    }
}
