<?php
/**
 * Created by PhpStorm.
 * User: curtiscrewe
 * Date: 31/10/2018
 * Time: 01:11
 */

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class Positions extends FormRequest {

    public function authorize()
    {
        return auth()->check();
    }

    public function rules()
    {
        return [
            'card_id' => 'required',
            'ps_buy_bin' => 'required|numeric',
            'ps_sell_bin' => 'required|numeric',
            'xb_buy_bin' => 'required|numeric',
            'xb_sell_bin' => 'required|numeric',
            'pc_buy_bin' => 'required|numeric',
            'pc_sell_bin' => 'required|numeric',
        ];
    }

}