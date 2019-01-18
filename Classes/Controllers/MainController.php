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
    protected function getAppInfo()
    {
        $name = env('APP_NAME');
        $version = env('APP_VERSION');

        if (!$name) {
            $name = DB::table('app_info')
                ->select()
                ->where('key = :key', [':key' => 'app_name'])
                ->orderBy('id ASC')
                ->one()
                ->run()
                ->value;
        }

        if (!$version) {
            $version = DB::table('app_info')
                ->select()
                ->where('key = :key', [':key' => 'version'])
                ->orderBy('id ASC')
                ->one()
                ->run()
                ->value;
        }

        return (object) [
            'name'      => $name,
            'version'   => $version,
        ];
    }

    public function showMainWindow(Request $request)
    {
        $app_info = $this->getAppInfo();
        $container = (new Div)
            ->setLeft(100)
            ->setTop(100);
        (new Label([], $container))->setText("Name: {$app_info->name}");
        (new Label([], $container))->setText("Version: {$app_info->version}")
            ->setTop(15);

        $btn = (new Button())
            ->setLeft(10)
            ->setTop(10)
            ->setWidth(200)
            ->setValue('Click me!');

        $btn->on('click', function () use ($btn, $request) {
            $btn->setValue('You clicked me!');
            $request->getRouter()->handle('show_info_modal');
        });
    }

    public function showInfoModal(Request $request)
    {
        $request->getRenderer()->render('infobox');
    }
}
