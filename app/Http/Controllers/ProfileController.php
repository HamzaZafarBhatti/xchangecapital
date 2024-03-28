<?php

namespace App\Http\Controllers;

use App\Models\Bank;
use App\Models\BankUser;
use App\Models\DocumentType;
use App\Rules\MatchOldPassword;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Redirect;
use Image;
use Throwable;
use Illuminate\Validation\Rule;
use Illuminate\Validation\Rules;

class ProfileController extends Controller
{
    /**
     * Display the user's profile form.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\View\View
     */
    public function edit(Request $request)
    {
        $user = $request->user();
        $user_document_url = asset($user->get_user_document);
        $ext = pathinfo($user_document_url);
        if (isset($ext['extension'])) {
            $ext = $ext['extension'];
        } else {
            $ext = null;
        }
        return view('user.profile.edit', [
            'user' => $user,
            'ext' => $ext,
            'user_document_url' => $user_document_url,
        ]);
    }

    /**
     * Update the user's profile information.
     *
     * @param  \App\Http\Requests\ProfileUpdateRequest  $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function update(Request $request)
    {
        $request->validate([
            // 'name' => 'required',
            // 'phone' => 'required',
            'whatsapp_number' => 'required',
            'image' => 'mimes:png,jpg,jpeg|max:200',
        ]);
        $user = $request->user();
        $data = $request->only('name', 'phone', 'whatsapp_number');
        if ($image = $request->file('image')) {
            $oldImage = $user->image;
            $ext = $request->image->getClientOriginalExtension();
            $filename = 'image_' . time() . '.' . $ext;
            $location =  $user->getPhotoPath() . $filename;
            Image::make($image)->save($location);
            $data['image'] = $filename;
            if ($oldImage && File::exists($user->getPhotoPath() . $oldImage)) {
                unlink($user->getPhotoPath() . $oldImage);
            }
        }
        // return $data;
        $request->user()->fill($data);

        $request->user()->save();

        return Redirect::route('user.profile.edit')->with('success', 'Profile updated.');
    }
    public function edit_password()
    {
        return view('user.profile.edit_password');
    }

    public function update_password(Request $request)
    {
        $request->validate([
            'old_password' => ['required', 'string', new MatchOldPassword],
            'password' => ['required', 'confirmed', Rules\Password::defaults()],
        ]);
        try {
            $user = auth()->user();
            $password = bcrypt($request->password);
            $user->update([
                'password' => $password
            ]);
            return back()->with('success', 'Password Changed Successfully.');
        } catch (\Throwable $e) {
            Log::error($e->getMessage());
            return back()->with('error', 'Something went wrong!');
        }
    }
    public function create_bank_details()
    {
        $banks = Bank::where('is_active', 1)->get();
        $user_bank = BankUser::where('user_id', auth()->user()->id)->first();
        if ($user_bank) {
            return Redirect::route('user.edit_bank_details', $user_bank->id);
        }
        return view('user.profile.bank_details', [
            'banks' => $banks,
            'user_bank' => $user_bank,
        ]);
    }
    public function edit_bank_details($id)
    {
        $banks = Bank::where('is_active', 1)->get();
        $user_bank = BankUser::find($id);
        if ($user_bank->user_id != auth()->user()->id) {
            return back()->with('warning', 'Please edit your bank details');
        }
        return view('user.profile.edit_bank_details', [
            'banks' => $banks,
            'user_bank' => $user_bank,
        ]);
    }

    /**
     * Update the user's profile information.
     *
     * @param  \App\Http\Requests\ProfileUpdateRequest  $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function store_bank_details(Request $request)
    {
        $request->validate([
            'bank_id' => 'required',
            'account_type' => 'required',
            'account_name' => 'required',
            'pin' => 'required',
            'account_number' => 'required|unique:bank_users,account_number',
        ]);
        if ($request->user()->pin != $request->pin) {
            return back()->with('error', 'Pin not same');
        }
        try {
            $data = $request->except('_token');
            $data['user_id'] = $request->user()->id;
            $bank_user = BankUser::create($data);
            return redirect()->route('user.edit_bank_details', $bank_user->id)->with('success', 'Bank Details added.');
        } catch (Throwable $th) {
            Log::error($th->getMessage());
            return back()->with('error', 'Something went wrong!');
        }
    }
    public function update_bank_details(Request $request, $id)
    {
        $request->validate([
            'bank_id' => 'required',
            'account_type' => 'required',
            'account_name' => 'required',
            'pin' => 'required',
            'account_number' => ['required', Rule::unique('bank_users', 'account_number')->ignore($id)],
        ]);
        if ($request->user()->pin != $request->pin) {
            return back()->with('error', 'Pin not same');
        }
        try {
            $data = $request->except('_token', '_method');
            $bank_user = BankUser::find($id);
            if ($bank_user->user_id != auth()->user()->id) {
                return back()->with('warning', 'Please update your bank details');
            }
            $bank_user->update($data);
            return redirect()->route('user.edit_bank_details', $bank_user->id)->with('success', 'Bank Details added.');
        } catch (Throwable $th) {
            Log::error($th->getMessage());
            return back()->with('error', 'Something went wrong!');
        }
    }

    /**
     * Delete the user's account.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function destroy(Request $request)
    {
        $request->validateWithBag('userDeletion', [
            'password' => ['required', 'current-password'],
        ]);

        $user = $request->user();

        Auth::logout();

        $user->delete();

        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return Redirect::to('/');
    }

    public function verify_account()
    {
        $documentTypes = DocumentType::whereIsActive(1)->get();
        return view('user.profile.verify_account', compact('documentTypes'));
    }

    public function do_verify_account(Request $request)
    {
        try {
            $user = $request->user();
            $data = $request->only('birthdate', 'document_type_id');
            if ($image = $request->file('document_pic')) {
                $oldDocumentPic = $user->document_pic;
                $ext = $request->document_pic->getClientOriginalExtension();
                $filename = 'document_pic_' . time() . '.' . $ext;
                $location =  $user->getPhotoPath() . $filename;
                if ($ext == 'pdf') {
                    move_uploaded_file($request->document_pic, $location);
                } else {
                    Image::make($image)->save($location);
                }
                $data['document_pic'] = $filename;
                if ($oldDocumentPic && File::exists($user->getPhotoPath() . $oldDocumentPic)) {
                    unlink($user->getPhotoPath() . $oldDocumentPic);
                }
            }
            if ($image = $request->file('selfie')) {
                $oldSelfie = $user->selfie;
                $ext = $request->selfie->getClientOriginalExtension();
                $filename = 'selfie_' . time() . '.' . $ext;
                $location =  $user->getPhotoPath() . $filename;
                Image::make($image)->save($location);
                $data['selfie'] = $filename;
                if ($oldSelfie && File::exists($user->getPhotoPath() . $oldSelfie)) {
                    unlink($user->getPhotoPath() . $oldSelfie);
                }
            }
            $user->update($data);
            return back()->with('success', 'Request Submitted for Account Verification!');
        } catch (\Throwable $th) {
            Log::error($th->getMessage());
            return back()->with('error', 'Something went wrong!');
        }
    }
}
