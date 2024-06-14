<?php

namespace App\Http\Controllers;
use App\Models\Exopet;
use Illuminate\Support\Facades\Storage;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class PageController extends Controller
{
    public function home()
    {
        return view("home", ["key" => "home"]);
    }

    public function masterdata()
    {
        $exopet = Exopet::orderBy('id', 'desc')->get();
        return view("masterdata", ["key" => "masterdata" , "ex" => $exopet]);
        
    }

    public function addexopet()
    {
        return view("formadd",["key" => "masterdata"]);
    }

    public function saveexopet(Request $request)
    {
        $file_name = time().'-'.$request->file('picture')->getClientOriginalName();
        $path = $request->file('picture')->storeAs('picture', $file_name, 'public');

        Exopet::create([
            'ownerName'      => $request->ownerName,
            'animalType'     => $request->animalType,
            'animalAge'      => $request->animalAge,
            'animalPrice'    => $request->animalPrice,
            'location'       => $request->location,
            'picture'         => $path
        ]);

        return redirect("masterdata")->with('alert', 'Data Berhasil Disimpan');
    }

    public function editexopet($id)
    {
        $exopet = Exopet::find($id);
        return view("formedit", ["key" => "masterdata", "ex" => $exopet]);
    }

    public function updateexopet($id, Request$request)
    {
        $exopet = Exopet::find($id);

        $exopet->ownerName = $request->ownerName;
        $exopet->animalType = $request->animalType;
        $exopet->animalAge = $request->animalAge;
        $exopet->animalPrice = $request->animalPrice;
        $exopet->location = $request->location;

        if ($request->picture)
        {
            if($exopet->picture)
            {
                Storage::disk('public')->delete($exopet->picture);
            }

            $file_name = time().'-'.$request->file('picture')->getClientOriginalName();
            $path = $request->file('picture')->storeAs('picture', $file_name, 'public');
            $exopet->picture = $path;
        }
        $exopet->save();
        return redirect("/masterdata")->with('alert', 'Data Berhasil di Ubah');
    }

    public function deleteexopet($id)
    {
        $exopet = Exopet::find($id);

        if ($exopet->picture)
        {
            Storage::disk('public')->delete($exopet->picture);
        }

        $exopet->delete();

        return redirect("/masterdata")->with('alert', 'Data Berhasil di Hapus');
    }

    public function login()
    {
        return view("login");
    }

    public function edituser()
    {
        return view("edituser", ["key"=>""]);
    }

    public function updateuser(Request $request)
    {
        if ($request->password_baru == $request->konfirmasi_password)
        {
            $user = Auth::user();

            $user->password = bcrypt($request->password_baru);
            
            $user->save();

            return redirect("/user")->with("info", "Password Berhasil di ubah");
        }
        else
        {
            return redirect("/user")->with("info", "Password Gagal di ubah");
        }   
    }
}
