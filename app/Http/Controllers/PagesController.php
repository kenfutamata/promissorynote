<?php

namespace App\Http\Controllers;
use App\Models\User;
use App\Models\PromissoryNote;
use App\Models\Assessment;
use Illuminate\Support\Facades\Auth;

use Illuminate\Http\Request;

class PagesController extends Controller
{
    public function login()
    {
        return view('login');
    }

    public function contactInfo()
    {
        return view('contactInfo'); 
    }

    public function forgotPass()
    {
        return view('forgotPass'); 
    }

    public function dashboard()
    {
        $user = auth()->user(); 
        $assessmentsSubmitted = Assessment::where('user_id', $user->id)->count();
        $promissoryNotesCount = PromissoryNote::where('user_id', $user->id)->count();

        return view('user.dashboard', compact('assessmentsSubmitted', 'promissoryNotesCount'));
    }

    public function notifications()
    {
        $user = auth()->user(); 
        return view('user.notifications', compact('user'));
    }

    public function history()
    {
        $user = auth()->user();
    
        $promissoryNotes = PromissoryNote::with('cads')  
            ->where('user_id', $user->id)  
            ->get();
        
        return view('user.history', compact('user', 'promissoryNotes'));
    }

    public function settings()
    {
        $user = auth()->user(); 
        return view('user.settings', compact('user'));
    }

    public function profile()
    {
        $user = auth()->user(); 
        return view('user.profile', compact('user'));
    }

    public function viewStudents() {
        $students = User::all(); 
        $students = User::where('role', 'student')->get(); 
        return view('admin.viewStudents', compact('students'));
    }
}
