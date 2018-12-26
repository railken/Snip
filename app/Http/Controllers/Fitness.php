<?php
/**
 * Created by PhpStorm.
 * User: curtiscrewe
 * Date: 01/11/2018
 * Time: 15:11
 */

namespace App\Http\Controllers;

use App\Http\Requests\Fitness as StoreRequest;
use Backpack\CRUD\app\Http\Controllers\CrudController;

class Fitness extends CrudController
{

    public function setup()
    {
        $this->crud->setModel("App\Models\Players");
        $this->crud->setRoute("admin/fitness");
        $this->crud->setEntityNameStrings('Fitness', 'Fitness');
        $this->crud->setColumns([
            [
                'label' => "Card",
                'type' => 'select',
                'name' => 'card_id', // the db column for the foreign key
                'entity' => 'fitness_rel', // the method that defines the relationship in your Model
                'attribute' => 'fitness_name', // foreign key attribute that is shown to user
            ],
            [
                'name' => 'ps_buy_bin',
                'label' => 'PS Buy',
                'type' => 'closure',
                'function' => function ($entry) {
                    return number_format($entry->ps_buy_bin);
                }
            ],
            [
                'name' => 'ps_sell_bin',
                'label' => 'PS Sell',
                'type' => 'closure',
                'function' => function ($entry) {
                    return number_format($entry->ps_sell_bin);
                }
            ],
            [
                'name' => 'xb_buy_bin',
                'label' => 'Xbox Buy',
                'type' => 'closure',
                'function' => function ($entry) {
                    return number_format($entry->xb_buy_bin);
                }
            ],
            [
                'name' => 'xb_sell_bin',
                'label' => 'Xbox Sell',
                'type' => 'closure',
                'function' => function ($entry) {
                    return number_format($entry->xb_sell_bin);
                }
            ],
            [
                'name' => 'pc_buy_bin',
                'label' => 'PC Buy',
                'type' => 'closure',
                'function' => function ($entry) {
                    return number_format($entry->pc_buy_bin);
                }
            ],
            [
                'name' => 'pc_sell_bin',
                'label' => 'PC Sell',
                'type' => 'closure',
                'function' => function ($entry) {
                    return number_format($entry->pc_sell_bin);
                }
            ],
            [
                'label' => 'Today Profit',
                'type' => 'model_function',
                'function_name' => 'getProfitToday'
            ]
        ]);
        $this->crud->addField([
            'label' => 'Card',
            'type' => 'select',
            'name' => 'card_id',
            'entity' => 'fitness_rel',
            'attribute' => 'fitness_name',
        ]);

        $this->crud->addField([
            'name' => 'ps_buy_bin',
            'label' => 'PS Buy BIN',
            'type' => 'number',
            'default' => 0
        ]);

        $this->crud->addField([
            'name' => 'ps_sell_bin',
            'label' => 'PS Sell BIN',
            'type' => 'number',
            'default' => 0
        ]);

        $this->crud->addField([
            'name' => 'xb_buy_bin',
            'label' => 'Xbox Buy BIN',
            'type' => 'number',
            'default' => 0
        ]);

        $this->crud->addField([
            'name' => 'xb_sell_bin',
            'label' => 'Xbox Sell BIN',
            'type' => 'number',
            'default' => 0
        ]);

        $this->crud->addField([
            'name' => 'pc_buy_bin',
            'label' => 'PC Buy BIN',
            'type' => 'number',
            'default' => 0
        ]);

        $this->crud->addField([
            'name' => 'pc_sell_bin',
            'label' => 'PC Sell BIN',
            'type' => 'number',
            'default' => 0
        ]);
        $this->crud->query->where('card_type', 'fitness');
    }

    public function store(StoreRequest $request) {
        if($request->ps_sell_bin > 0) {
            $request->request->add([
                'ps_sell_bid' => ($request->ps_sell_bin - 100)
            ]);
        }
        if($request->xb_sell_bin > 0) {
            $request->request->add([
                'xb_sell_bid' => ($request->xb_sell_bin - 100)
            ]);
        }
        if($request->pc_sell_bin > 0) {
            $request->request->add([
                'pc_sell_bid' => ($request->pc_sell_bin - 100)
            ]);
        }
        $request->request->add([
            'name' => 'fitness_card',
            'auto_pricing' => '0',
            'rating' => '0',
            'league_id' => '0',
            'club_id' => '0',
            'nation_id' => '0',
            'card_type' => 'fitness'
        ]);
        return parent::storeCrud($request);
    }

}