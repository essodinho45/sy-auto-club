<?php

namespace App\Http\Controllers;

use App\Models\Licence;
use Illuminate\Http\Request;

class LicenceAPIController extends Controller
{
    public function getLicence()
    {
        $licence = Licence::query()->where('approved', '=', true)
            ->where('api_read', '=', false)->orderByDesc('created_at')->first();
        if ($licence) {
            $array = $licence->toArray();
            foreach (['personal', 'licence_f', 'licence_b', 'licence1', 'licence2', 'id_f', 'id_b'] as $item) {
                if ($array[$item])
                    $array[$item] = env('APP_URL') . '/' . 'storage' . '/' . $array[$item];
            }
            return json_encode($licence, JSON_UNESCAPED_UNICODE);
        }
        return response('all approved licences read before', 400);
    }
    public function setLicenceRead(Request $request)
    {
        $id = $request->get('id');
        $licence = Licence::query()->find($id);
        if ($licence) {
            $licence->update(['api_read' => true]);
            return response('updated succefully');
        }
        return response('licence not found', 400);
    }
}
