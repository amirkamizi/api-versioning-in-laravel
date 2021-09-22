<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;



/* Original */
Route::get('/users', function (Request $request) {
   $users = \App\Models\User::factory()->count(2)->make();
   $xml = new DOMDocument("1.0", "UTF-8");
   $root = $xml->createElement('Users');
   $xml->appendChild($root);
   foreach($users as $user){
       $userNode = $xml->createElement('User');
       $root->appendChild($userNode);
       $nameNode = $xml->createElement('Name',$user->name);
       $userNode->appendChild($nameNode);
       $emailNode = $xml->createElement('Email',$user->email);
       $userNode->appendChild($emailNode);
   }
   return response($xml->saveXML(), 200)
       ->header('Content-Type', 'text/xml');
});















/* scenario one */
//Route::get('/users', function (Request $request) {
//    $users = \App\Models\User::factory()->count(2)->make();
//    return response()->json($users);
//});




















/* scenario two */
//Route::get('/users', function (Request $request) {
//    $users = \App\Models\User::factory()->count(2)->make();
//    $xml = new DOMDocument("1.0", "UTF-8");
//    $root = $xml->createElement('Users');
//    $xml->appendChild($root);
//    foreach($users as $user){
//        $userNode = $xml->createElement('User');
//        $root->appendChild($userNode);
//        $nameNode = $xml->createElement('Name',$user->name);
//        $userNode->appendChild($nameNode);
//        $nameNode->setAttribute('email', $user->email);
//    }
//    $xml->preserveWhiteSpace = false;
//    $xml->formatOutput = true;
//    return response($xml->saveXML(), 200)
//        ->header('Content-Type', 'text/xml');
//});





















/* scenario three */
//Route::get('/users', function (Request $request) {
//    $users = \App\Models\User::factory()->count(2)->make();
//    $xml = new DOMDocument("1.0", "UTF-8");
//    $root = $xml->createElement('Users');
//    $xml->appendChild($root);
//    foreach($users as $user){
//        $userNode = $xml->createElement('User');
//        $root->appendChild($userNode);
//        $nameNode = $xml->createElement('Name',$user->name);
//        $userNode->appendChild($nameNode);
//        $emailNode = $xml->createElement('Email',$user->email);
//        $userNode->appendChild($emailNode);
//        $ageNode = $xml->createElement('Age',rand(18,50));
//        $userNode->appendChild($ageNode);
//    }
//    $xml->preserveWhiteSpace = false;
//    $xml->formatOutput = true;
//    return response($xml->saveXML(), 200)
//        ->header('Content-Type', 'text/xml');
//});





















/* scenario four */
//Route::get('/users', function (Request $request) {
//    $users = \App\Models\User::factory()->count(2)->make();
//    if((strpos($request->header('accept'), 'application/json') !== false)){
//        return response()->json($users);
//    }
//    $xml = new DOMDocument("1.0", "UTF-8");
//    $root = $xml->createElement('Users');
//    $xml->appendChild($root);
//    foreach($users as $user){
//        $userNode = $xml->createElement('User');
//        $root->appendChild($userNode);
//        $nameNode = $xml->createElement('Name',$user->name);
//        $userNode->appendChild($nameNode);
//        $emailNode = $xml->createElement('Email',$user->email);
//        $userNode->appendChild($emailNode);
//    }
//    $xml->preserveWhiteSpace = false;
//    $xml->formatOutput = true;
//    return response($xml->saveXML(), 200)
//        ->header('Content-Type', 'text/xml');
//});













//Route::get('/v1/users', function (Request $request) {
//    // version 1
//    $users = \App\Models\User::factory()->count(2)->make();
//    $xml = new DOMDocument("1.0", "UTF-8");
//    $root = $xml->createElement('Users');
//    $xml->appendChild($root);
//    foreach($users as $user){
//        $userNode = $xml->createElement('User');
//        $root->appendChild($userNode);
//        $nameNode = $xml->createElement('Name',$user->name);
//        $userNode->appendChild($nameNode);
//        $emailNode = $xml->createElement('Email',$user->email);
//        $userNode->appendChild($emailNode);
//    }
//    return response($xml->saveXML(), 200)
//        ->header('Content-Type', 'text/xml');
//});
//
//Route::get('/v2/users', function (Request $request) {
//    // version 2
//    $users = \App\Models\User::factory()->count(2)->make();
//    return response()->json($users);
//});

//Route::prefix('v1')->group(function () {
//    Route::get('/users', function (Request $request) {
//        // version 1
//        $users = \App\Models\User::factory()->count(2)->make();
//        $xml = new DOMDocument("1.0", "UTF-8");
//        $root = $xml->createElement('Users');
//        $xml->appendChild($root);
//        foreach($users as $user){
//            $userNode = $xml->createElement('User');
//            $root->appendChild($userNode);
//            $nameNode = $xml->createElement('Name',$user->name);
//            $userNode->appendChild($nameNode);
//            $emailNode = $xml->createElement('Email',$user->email);
//            $userNode->appendChild($emailNode);
//        }
//        return response($xml->saveXML(), 200)
//            ->header('Content-Type', 'text/xml');
//    });
//});







//Route::get('/users', function (Request $request) {
//    if((strpos($request->header('accept'), 'v1') !== false)){
//        // version 1
//        $users = \App\Models\User::factory()->count(2)->make();
//        $xml = new DOMDocument("1.0", "UTF-8");
//        $root = $xml->createElement('Users');
//        $xml->appendChild($root);
//        foreach($users as $user){
//            $userNode = $xml->createElement('User');
//            $root->appendChild($userNode);
//            $nameNode = $xml->createElement('Name',$user->name);
//            $userNode->appendChild($nameNode);
//            $emailNode = $xml->createElement('Email',$user->email);
//            $userNode->appendChild($emailNode);
//        }
//        return response($xml->saveXML(), 200)
//            ->header('Content-Type', 'text/xml');
//    }else if((strpos($request->header('accept'), 'v2') !== false)){
//        // version 2
//        $users = \App\Models\User::factory()->count(2)->make();
//        return response()->json($users);
//    }
//});











//Route::get('/users', function (Request $request) {
//    if ($request->hasHeader('accept-version')) {
//        if($request->header('accept-version') == '1'){
//            // version 1
//            $users = \App\Models\User::factory()->count(2)->make();
//            $xml = new DOMDocument("1.0", "UTF-8");
//            $root = $xml->createElement('Users');
//            $xml->appendChild($root);
//            foreach($users as $user){
//                $userNode = $xml->createElement('User');
//                $root->appendChild($userNode);
//                $nameNode = $xml->createElement('Name',$user->name);
//                $userNode->appendChild($nameNode);
//                $emailNode = $xml->createElement('Email',$user->email);
//                $userNode->appendChild($emailNode);
//            }
//            return response($xml->saveXML(), 200)
//                ->header('Content-Type', 'text/xml');
//        }else if($request->header('accept-version') == '2'){
//            // version 2
//            $users = \App\Models\User::factory()->count(2)->make();
//            return response()->json($users);
//        }
//    }
//});


