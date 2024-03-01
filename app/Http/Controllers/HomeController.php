<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Service;
use App\Models\SubService;
use Illuminate\Http\Request;
use App\Mail\ContactFormMail;
use App\Settings\GeneralSettings;
use Illuminate\Support\Facades\Mail;
use App\Http\Integrations\Calendly\CalendlyService;
use App\Notifications\AdminContactFormNotification;
use App\Notifications\UserContactFormResponseNotification;

class HomeController extends Controller
{
    protected $settings;

    public function __construct(GeneralSettings $settings)
    {
        $this->settings = $settings;
    }

    public function index()
    {
        return view('home.landing', [
            'services' => Service::all(),
            'settings' => $this->settings
        ]);
    }

    public function getAllSubservices(string $slug)
    {
        return view('home.services', [
            'services' => Service::where('slug', $slug)->with('subService')->first(),
            'settings' => $this->settings
        ]);
    }

    public function contactForm(Request $request)
    {
        $input = $request->validate([
            'name' => 'required|string',
            'email' => 'required|email',
            'subject' => 'required|string',
            'message' => 'required|string'
        ]);

        User::where('role_id', 3)->each(
            function ($admin) use ($request) {
                $admin->notify(new AdminContactFormNotification($request->input('name'),
                    $request->input('email'),
                    $request->input('subject'),
                    $request->input('message')));
            }
        );

        Mail::to($request->input('email'))->send(new ContactFormMail($input));
        return redirect()->back()->with('success', 'Your message has been sent successfully!');
    }


    public function calendly()
    {
        $calendlyService = new CalendlyService();
        $calendlyService->eventTypes();
    }
}
