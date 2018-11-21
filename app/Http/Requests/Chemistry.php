<?php
/**
 * Created by PhpStorm.
 * User: curtiscrewe
 * Date: 01/11/2018
 * Time: 15:23
 */

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class Chemistry extends FormRequest {

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