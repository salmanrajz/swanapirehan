<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Seshac\Otp\Otp;
use Faker\Factory as Faker;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\ValidationException;
use Validator;
use Illuminate\Support\Facades\Session;



class ApiController extends Controller
{
    //
    public function NumberVerify(Request $request)
    {
        $validator = Validator::make($request->all(), [ // <---
            // 'name' => 'required',
            // 'email' => 'required',
            'phone' => 'required|unique:users,phone',
            // 'phone' => 'required',
            // 'privacy_terms' => 'required',
            // 'password' => ['required', 'string', 'min:8', 'confirmed'],
        ]);
        if ($validator->fails()) {
            // here we return all the errors message
            // return response()->json(['errors' => $validator->errors()], 422);
            return [
                'ResponseCode' => '0',
                'ResponseMessage' => 'error',
                'ResponseData' => $validator->errors(),
            ];
        }


        $faker = Faker::create();
        $otp_phone =  Otp::setValidity(30)  // otp validity time in mins
            ->setLength(4)  // Lenght of the generated otp
            ->setMaximumOtpsAllowed(10) // Number of times allowed to regenerate otps
            ->setOnlyDigits(true)  // generated otp contains mixed characters ex:ad2312
            ->setUseSameToken(true) // if you re-generate OTP, you will get same token
            ->generate($request->phone . $faker->email);
        // return $otp =  Otp::generate($request->email);
        // return $verify = Otp::validate($request->email, 578091);
        // return $otp_email;
        // return $otp_email_phone;
        // return "zoom";
        $data = User::create([
            'name' => $faker->sentence(5),
            'email' => $faker->email,
            'phone' => $request->phone,
            // 'privacy_terms'=>$req,
            // 'password'=>,
            'password' => Hash::make($request['password']),
            // 'phone_code' => $otp_email_phone,
            // 'email_code' => $otp_email,
            // 'is_email_validated' => 0,
            'is_phone_validated' => 0,
            // 'choosen_package' => 1

        ]);
        $details = [
            'mobile_otp' => $otp_phone->token,
            // 'email_otp' => $otp_email->token,
            // 'Plan' => $number,
            // 'AlternativeNumber' => $alternativeNumber,
        ];
        // $subject = 'MOBILE OTP CODE';
        // $to = 'parhakooo@gmail.com';
        // \Mail::to($data->email)
        //     ->cc(['salmanahmed334@gmail.com', 'parhakooo@gmail.com'])
        //     ->send(new \App\Mail\SendOTP($details));
        // Session::put('email', $request->email);
        // Session::put('email_phone', $request->phone . $request->email);
        // return "1";
        return [
            'code' => '200',
            'message' => 'OTP sent successfully',
            'otp' => $otp_phone->token,
        ];
    }
    //
    public function OTPResend(Request $request)
    {
        $validator = Validator::make($request->all(), [ // <---
            // 'name' => 'required',
            // 'email' => 'required',
            'number' => 'required',
            // 'phone' => 'required',
            // 'privacy_terms' => 'required',
            // 'password' => ['required', 'string', 'min:8', 'confirmed'],
        ]);
        if ($validator->fails()) {
            // here we return all the errors message
            // return response()->json(['errors' => $validator->errors()], 422);
            return [
                'ResponseCode' => '0',
                'ResponseMessage' => 'error',
                'ResponseData' => $validator->errors(),
            ];
        }

        Session::put('phone', $request->phone);

        $faker = Faker::create();
        $otp_phone =  Otp::setValidity(30)  // otp validity time in mins
            ->setLength(4)  // Lenght of the generated otp
            ->setMaximumOtpsAllowed(10) // Number of times allowed to regenerate otps
            ->setOnlyDigits(true)  // generated otp contains mixed characters ex:ad2312
            ->setUseSameToken(true) // if you re-generate OTP, you will get same token
            ->generate($request->phone . $faker->email);
        // return $otp =  Otp::generate($request->email);
        // return $verify = Otp::validate($request->email, 578091);
        // return $otp_email;
        // return $otp_email_phone;
        // return "zoom";
        // $data = User::create([
        //     'name' => $faker->sentence(5),
        //     'email' => $faker->email,
        //     'phone' => $request->phone,
        //     // 'privacy_terms'=>$req,
        //     // 'password'=>,
        //     'password' => Hash::make($request['password']),
        //     // 'phone_code' => $otp_email_phone,
        //     // 'email_code' => $otp_email,
        //     // 'is_email_validated' => 0,
        //     'is_phone_validated' => 0,
        //     // 'choosen_package' => 1

        // ]);
        // $details = [
        //     'mobile_otp' => $otp_phone->token,
        //     // 'email_otp' => $otp_email->token,
        //     // 'Plan' => $number,
        //     // 'AlternativeNumber' => $alternativeNumber,
        // ];
        // $subject = 'MOBILE OTP CODE';
        // $to = 'parhakooo@gmail.com';
        // \Mail::to($data->email)
        //     ->cc(['salmanahmed334@gmail.com', 'parhakooo@gmail.com'])
        //     ->send(new \App\Mail\SendOTP($details));
        // Session::put('email', $request->email);
        // Session::put('email_phone', $request->phone . $request->email);
        // return "1";
        return [
            'code' => '200',
            'message' => 'OTP resent successfully',
            'otp' => $otp_phone->token,
        ];
    }
    //
    public function ProfileGenerate(Request $request)
    {
        $validator = Validator::make($request->all(), [ // <---
            // 'name' => 'required',
            // 'email' => 'required',
            'firstName' => 'required',
            'lastName' => 'required',
            'gender' => 'required',
            'dob' => 'required',
            // 'image' => 'required',
            // 'phone' => 'required',
            // 'privacy_terms' => 'required',
            // 'password' => ['required', 'string', 'min:8', 'confirmed'],
        ]);
        if ($validator->fails()) {
            // here we return all the errors message
            // return response()->json(['errors' => $validator->errors()], 422);
            return [
                'ResponseCode' => '0',
                'ResponseMessage' => 'error',
                'ResponseData' => $validator->errors(),
            ];
        }
        //
        // $data = User::

        // $faker = Faker::create();
        // $otp_phone =  Otp::setValidity(30)  // otp validity time in mins
        //     ->setLength(4)  // Lenght of the generated otp
        //     ->setMaximumOtpsAllowed(10) // Number of times allowed to regenerate otps
        //     ->setOnlyDigits(true)  // generated otp contains mixed characters ex:ad2312
        //     ->setUseSameToken(true) // if you re-generate OTP, you will get same token
        //     ->generate($request->phone . $faker->email);
        // return $otp =  Otp::generate($request->email);
        // return $verify = Otp::validate($request->email, 578091);
        // return $otp_email;
        // return $otp_email_phone;
        // return "zoom";
        // $data = User::create([
        //     'name' => $faker->sentence(5),
        //     'email' => $faker->email,
        //     'phone' => $request->phone,
        //     // 'privacy_terms'=>$req,
        //     // 'password'=>,
        //     'password' => Hash::make($request['password']),
        //     // 'phone_code' => $otp_email_phone,
        //     // 'email_code' => $otp_email,
        //     // 'is_email_validated' => 0,
        //     'is_phone_validated' => 0,
        //     // 'choosen_package' => 1

        // ]);
        // $details = [
        //     'mobile_otp' => $otp_phone->token,
        //     // 'email_otp' => $otp_email->token,
        //     // 'Plan' => $number,
        //     // 'AlternativeNumber' => $alternativeNumber,
        // ];
        // $subject = 'MOBILE OTP CODE';
        // $to = 'parhakooo@gmail.com';
        // \Mail::to($data->email)
        //     ->cc(['salmanahmed334@gmail.com', 'parhakooo@gmail.com'])
        //     ->send(new \App\Mail\SendOTP($details));
        // Session::put('email', $request->email);
        // Session::put('email_phone', $request->phone . $request->email);
        // return "1";
        return [
            'code' => '200',
            'message' => 'Profile created successfully',
            // 'otp' => $otp_phone->token,
        ];
    }
    //
    public function OTPVerify(Request $request){
        // return
        $validator = Validator::make($request->all(), [ // <---
            // 'name' => 'required',
            // 'email' => 'required',
            'otp' => 'required',
            // 'phone' => 'required',
            // 'privacy_terms' => 'required',
            // 'password' => ['required', 'string', 'min:8', 'confirmed'],
        ]);
        if ($validator->fails()) {
            // here we return all the errors message
            // return response()->json(['errors' => $validator->errors()], 422);
            return [
                'ResponseCode' => '0',
                'ResponseMessage' => 'error',
                'ResponseData' => $validator->errors(),
            ];
        }
        //
        $phone = Session::get('phone');
        // $verify_email = Otp::setAllowedAttempts(100) // number of times they can allow to attempt with wrong token
            // ->validate($email, $request->email_code);
        $verify_phone = Otp::setAllowedAttempts(100) // number of times they can allow to attempt with wrong token
            ->validate($phone, $request->otp);
        // return $verify_email['status'];
        // if($verify_email->)
        // foreach($verify_email as $em){
        // return $em[];
        // }
        // return $verify_email;
        // return $verify_email;
        // if ($verify_email->status == false) {
        //     return response()->json(['error' => ['Error' => 'Email ' . $verify_email->message]], 200);
        // }
        if ($verify_phone->status == false) {
            return response()->json(['error' => ['Error' => 'Phone ' . $verify_phone->message]], 200);
        }
        //
       return [
            'code' => '200',
            'message' => 'Otp verified successfully',
            // 'otp' => $otp_phone->token,
        ];
        // if ($verify_email->status == false || $verify_phone->status == false) {
        //     // return $verify_email[0];
        //     // $mc = json_decode($verify_email)
        //     // return $verify_email
        //     // if($verify_email){
        //     return response()->json(['error' => ['Error' => 'Email and Phone => ' . $verify_email->message]], 200);
        // }
    }
}
