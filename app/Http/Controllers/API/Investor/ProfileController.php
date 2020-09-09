<?php

namespace App\Http\Controllers\API\Investor;

use App\Bank;
use App\Http\Controllers\Controller;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Http;
use Intervention\Image\Facades\Image;

class ProfileController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $user = auth('api')->user();
        $bank = Bank::whereUserId($user->id)->first();
        $banks = Http::withHeaders([
            'accept' => 'application/json'
        ])
            ->get('https://api.paystack.co/bank')
            ->json();
        return response()->json(['user'=>$user, 'bank' => $bank, 'banks'=>$banks['data']]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

//        get list of banks at https://api.paystack.co/bank

        $curl = curl_init();

        curl_setopt_array($curl, array(
            CURLOPT_URL => "https://api.paystack.co/bank/resolve?account_number=".
                $request->account_number."&bank_code=".$request->bank_code,
            CURLOPT_RETURNTRANSFER => true,
            CURLOPT_ENCODING => "",
            CURLOPT_MAXREDIRS => 10,
            CURLOPT_TIMEOUT => 30,
            CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
            CURLOPT_CUSTOMREQUEST => "GET",
            CURLOPT_HTTPHEADER => array(
                "Authorization: Bearer sk_live_4c76c4a7a68a01844c44219118f11ad88fd02870",
                "Cache-Control: no-cache",
            ),
        ));

        $response = curl_exec($curl);
        $err = curl_error($curl);

        curl_close($curl);

        if ($err) {
            return response($err, 404);
        } else {
            return $response;
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $user = auth('api')->user();

        $currentPhoto = $user->photo;
        if($request->photo != $currentPhoto){
            $name = time().'.'.explode('/', explode(':', substr($request->photo, 0,
                    strpos($request->photo, ';')))[1])[1];
            Image::make($request->photo)->save(public_path('uploads/').$name);
            $request->merge(['photo' => $name]);

            $userPhoto = public_path('uploads/').$currentPhoto;
            if(file_exists($userPhoto)){
                @unlink($userPhoto);
            }
        }


        if($request->account_number && $user->bank()->count() < 1)
        {
            $banks = Http::withHeaders([
                'accept' => 'application/json'
            ])
                ->get('https://api.paystack.co/bank')
                ->json();
            $bank = collect($banks['data']);
            $bank_name = $bank->where('code', $request->bank_code)->first()['name'];
            $request->merge(['bank_name' => $bank_name, 'bank_code'=>$request->bank_code]);
            $user->bank()->create($request->all());
        }

        $user->update($request->all());
        $bank = Bank::whereUserId($user->id)->first();
        return response()->json('Profile updated successfully.');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $user = auth('api')->user();
        return response()->json($user);
    }

    public function getUser()
    {
        $user = auth('api')->user();
        $admin = collect(User::where('is_admin', 1)->with('bank')->get())->shuffle()->first();
        return response()->json(['user'=>$user, 'admin'=>$admin]);
    }

    public function activate_account(Request $request)
    {
        $user = auth('api')->user();
        $proof_array = array();
        if($request->proof_document)
        {
            foreach($request->proof_document as $key => $proof)
            {
                $file = $proof['path'];
                $name = time().$key.'.'.explode('/', explode(':', substr($file, 0,
                        strpos($file, ';')))[1])[1];
                Image::make($file)->save(public_path('uploads/').$name);
                array_push($proof_array, $name);
            }
            $user->proof_document = implode(',', $proof_array);

            $referrals = User::where('referred_by', $user->referred_by)->count();
            //if the investor
            if($referrals == 14)
            {
                User::where('referral_id', $user->referred_by)->update(['is_guider'=>1]);
            }

            $user->save();
            return response()->json('Success');
        }else{
            return response()->json('Error', 404);
        }

    }

    public function changePassword(Request $request)
    {
        $user = auth('api')->user();
        if (!password_verify($request->old_password, $user->password))
        {
            return response()->json('Ooppss... Wrong Old password...' , 404);
        }
        if($request->new_password != $request->c_new_password)
        {
            return response()->json('New Passwords do not match...', 404);
        }
        if(strlen($request->new_password) < 6)
        {
            return response()->json('Your password must be at least 6 characters.', 404);
        }
        $password = $request->new_password;
        $data = ['password'=>Hash::make($password)];
        $user->update($data);

        return response()->json('Password Changed...', 200);
    }
}
