<?php

namespace App\Http\Controllers\Admin\Content;

use App\Models\Goroda;
use App\Models\Content\Menu;
use App\Models\Content\MenuType;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Database\Eloquent\ModelNotFoundException;

class MenuController extends Controller
{   // Список обновлённых и  новых пунктов меню
    public function index()
    {
        $menus = Menu::with('types')->where('note', 'new')->orWhere('note', 'update')->get();
        //dd($articles);
        return view('content.menu.index', compact('menus'));
    }
    // Проверка существует ли такой тип меню в "Городах"
    public function show(Menu $menu)
    {
        $menutype = $menu->types;
        $goroda = Goroda::all();
        foreach ($goroda as $gorod) {
            $model = 'App\Models\Goroda\\' . $gorod->model . '\\MenuType';

            try {
                $model::findOrFail($menutype->id);
            } catch (ModelNotFoundException $exception) {

                //return back()->withError('Путь '.$menutype.' не найдена в модели'. $model)->withInput();   
                //$menutype = MenuType::find($menutype)  ;        
                return redirect()->route('content.menu.showmenutype', $menutype->id)->withError('Тип меню ' . $menutype->menutype . ' не найдена в модели' . $model)->withInput();
            }
        }

        //$this->changeImageURL($article); // смена адреса картинки сделана чтобы убедиться, что картинка уже скопирвана img.okeyavto.ru
        //$menu->note = '';
        //$menu->save();        
        //return redirect()->route('content.menu.index');   
        return view('content.menu.show', compact('menu'));
    }

    public function copy(Menu $menu){
        $array = $menu->toArray();
        $goroda = Goroda::all();
        foreach ($goroda as $gorod) {
            $model = 'App\Models\Goroda\\' . $gorod->model . '\\Menu';

            $array['checked_out_time'] = '2042-02-09 13:15:34';
            $model::updateOrCreate($array);
            //$this->addAsset($gorod, $menu->asset);
        }
        //dd('11111');
        $menu->note="Обновлено"; 
        return redirect()->route('content.menu.index');

    }

    public function copyMenuType(MenuType $menutype)
    {
        //dd($menutype->id);
        $array = $menutype->toArray();
        $goroda = Goroda::all();
        foreach ($goroda as $gorod) {
            $model = 'App\Models\Goroda\\' . $gorod->model . '\\MenuType';


            $model::updateOrCreate($array);
            $this->addAsset($gorod, $menutype->asset);
        }
        //$menutype->note=""; 
        return redirect()->route('content.menu.index');
    }



    public function addAsset($gorod, $data)
    {

        $array = $data->toArray();

        $model = 'App\Models\Goroda\\' . $gorod->model . '\\Asset';
        $model::updateOrCreate([
            'id' => $array['id'],
            'parent_id' => $array['parent_id'],
            'lft' => $array['lft'],
            'rgt' => $array['rgt'],
            'level' => $array['level'],
            'name' => $array['name'],
            'title' => $array['title'],
            'rules' => $array['rules'],
        ]);
    }

    public function showMenuType(MenuType $menutype)
    {
        //dd($menutype->connection);
        return view('content.menu.showmenutype', compact('menutype'));
    }
}
