<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Game;
use Illuminate\Support\Facades\DB;

class GameController extends Controller
{
    public function index()
    {
        return view('front');
    }

    public function play(Request $request)
    {
        $rand_id = rand(1,50);
        $request->session()->put('id',$rand_id);

        if($request->session()->has('id'))
        {
            // echo $request->session()->get('id');
            $data = new Game();
            $data->amount_avail = 100;
            $data->amount_pending =  $data->amount_avail-10;
            $data->user_id = $request->session()->get('id');
            $data->save();

            $amt = $data->amount_pending;
            $dice1 = rand(1,6);
            $dice2 = rand(1,6);
            $sum = $dice1 + $dice2;
            return view('front',compact('amt','dice1','dice2','sum'));
        }
    }

    public function play_again(Request $request)
    {
        if ($request->session()->has('id')) {
            $id = $request->session()->get('id');
        
            // Fetch the existing game data for the user
            $gameData = Game::where('user_id', $id)->first();
            
            // Check if game data exists for the user
            if ($gameData) {
                // Update amount_pending by reducing 10
                $set_amt = $gameData->amount_pending;
                $gameData->amount_pending = $set_amt - 10;
        
                // Save the updated game data
                $gameData->save();
            } else {
                // If no existing data, initialize new game data
                $gameData = new Game();
                $gameData->amount_avail = 100;
                $gameData->amount_pending = $gameData->amount_avail - 10;
                $gameData->user_id = $id;
                $gameData->save();
                
                // Set initial pending amount
                $set_amt = $gameData->amount_pending;
            }
        
            // Get the updated pending amount
            $amt = $gameData->amount_pending;
        
            // Roll dice
            $dice1 = rand(1, 6);
            $dice2 = rand(1, 6);
            $sum = $dice1 + $dice2;
        
            // Return data to the view
            return view('front', compact('amt', 'set_amt', 'dice1', 'dice2', 'sum'));
        }
        
    } 

    public function reset(Request $request)
    {
        $request->session()->flush();
        $dice1 = "";
        $dice2 = "";
        $sum = "";
        $amt = "";
        $set_amt = "";
        return view('front',compact('amt','set_amt','dice1','dice2','sum'));
    }
}
