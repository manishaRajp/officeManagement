<?php

namespace App\Repositories;


use App\Contracts\systemContract;
use App\Models\System;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;



class systemRepository implements systemContract
{

    public function store(array $request)
    {
        $image = uploadFile($request['image'], 'SystemImage');
        $input = $request;
        $input['image'] = $image;
        System::create($input);
        return response()->json(["statusCode" => 200]);
    }
    public function update(array $request)
    {
        $system = System::find($request['id']);
        if (isset($request['image'])) {
            $image = uploadFile($request['image'], 'SystemImage');
        } else {
            $image = $system->getRawOriginal('image');
        }
        $input = $request;
        $input['image'] = $image;
        $system->update($input);
        return response()->json(['success' => 'System updated successfully']);
    }
}
