<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\User;
use App\Models\Fund;
use App\Models\Container;
use Illuminate\Http\Request;

class ContainerController extends Controller
{
    
    public function container($id){
        $user = User::find($id);
        $containers = $user->Container ;
        $totalProfit = (float)collect($containers)->sum('profit');
        return view("users.container", compact('user' ,'containers','totalProfit'));
    }


    public function storeFund($id , Request $request){
        $user = User::find($id) ;
        Fund::create([
        'user_id'=>$id ,
        'amount' => $request['amount'] ,
        ]);
        return redirect()->route('users.container',$id)->with("success","Fund added successflly");

    }

    public function containerCreate($id , Request $request){
        $user = User::find($id);
        return view("users.create-container", compact('user'));
    }

    public function storeContainer($id , Request $request){
        $user = User::find($id);
        $currentYear = \Carbon\Carbon::now()->year;
        $currentYear = date('Y');
        $containerUser = Container::where('user_id',$id)->where('month',$request['month'])->where('year',$currentYear)->first();
        if($containerUser){
            return redirect()->route('users.container',$id)->with("error","Profit Added Already For this Month");
        }
        Container::create([
            'user_id' => $user->id ,
            'profit_percent' => $request['profit_percent'] ,
            'month' => $request['month'] ,
            'year' => $currentYear ,
            'profit' => $user->fund->amount * $request['profit_percent'] ,
        ]);
        return redirect()->route('users.container',$id)->with("success","Profit Added Successfully");
    }

    public function deleteContainer($id){
        $container = Container::find($id) ;
        $container->delete() ;
        return redirect()->route('users.container',$container->user->id)->with("success","Profit Deleted Successfully from Container");

    }
}
