<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\RfidCard;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;

class RegisterController extends Controller
{
    public function register(Request $request)
    {
        // Validate input
        $validator = Validator::make($request->all(), [
            'rfidcode' => 'required|string',
            'name' => 'required|string|max:255',
            'email' => 'required|email|unique:users,email',
            'nisn' => 'required|string|unique:users,nisn',
            'password' => 'required|string|confirmed|min:6',
        ]);

        if ($validator->fails()) {
            $errorMessages = implode(', ', $validator->errors()->all());
            return back()->with('error', "Validasi gagal. $errorMessages")->withInput();
        }

        // Find RFID card by rfid_code
        $rfidCard = RfidCard::where('rfid_code', $request->rfidcode)->first();

        if (!$rfidCard) {
            // RFID code not found in RfidCard table
            return back()->with('error', 'RFID code tidak ditemukan. Silakan coba lagi.');
        }

        // Check if this RFID card is already used by a user
        $existingUser = User::where('rfid_card_uid', $rfidCard->uid)->first();
        if ($existingUser) {
            return back()->withErrors(['rfidcode' => 'RFID code sudah terdaftar.'])->withInput();
        }

        // Create user
        $user = User::create([
            'name' => $request->name,
            'nisn' => $request->nisn,
            'email' => $request->email,
            'password' => Hash::make($request->password),
            'rfid_card_uid' => $rfidCard->uid,
        ]);

        // Update RFID card status and set rfid_code to null
        $rfidCard->status = 'registered';
        $rfidCard->rfid_code = null;
        $rfidCard->save();

        // Redirect to login with success message
        return redirect()->route('login')->with('success', 'Registrasi berhasil. Silakan login.');
    }
}