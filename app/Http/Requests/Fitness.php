<?php
/**
 * Created by PhpStorm.
 * User: Marinov
 * Date: 26/12/2018
 * Time: 11:40
 */

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class Fitness extends FormRequest {

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