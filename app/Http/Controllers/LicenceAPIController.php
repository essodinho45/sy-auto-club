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
        if ($licence)
            return json_encode($licence);
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
