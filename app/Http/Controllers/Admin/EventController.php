<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\EventType;
use App\Models\UserEvent;
use App\Models\EventTraning;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;

class EventController extends Controller
{

    public function create()
    {

        $Event = UserEvent::where('type', 2)->get();
        return view('AdminPenal.create_event', compact('Event')); // Create a view for the event creation form
    }

    public function showcreateevent()
    {

        $EventType = EventType::get();
        return view('AdminPenal.event', compact('EventType'));
    }
    public function upload_event_video()
    {
        $EventType = UserEvent::where('type', 2)->get();

        // dd($EventType);

        return view('AdminPenal.upload_event_video', compact('EventType'));
    }

    public function uploadVideo(Request $request)
    {
        try {
            $request->validate([
                'image' => 'required|mimes:mp4,mov,avi',
                'event_name' => 'required|string',
                'event_type' => 'required|integer',
            ]);

            $videoPath = $request->file('image')->store('assets/Event_traning', 'public');

            $latestOrder = EventTraning::where('event_id', $request->event_type)
                ->orderBy('order_id', 'desc')
                ->first();

            $orderId = $latestOrder ? $latestOrder->order_id + 1 : 1;
            // dd($orderId);
            EventTraning::create([
                'title' => $request->event_name,
                'event_id' => $request->event_type,
                'video_type' => $videoPath,
                'order_id' => $orderId,
            ]);

            return back()->with('success', 'Video uploaded successfully!');
        } catch (\Exception $e) {
            return back()->with('error', 'Error uploading video: ' . $e->getMessage());
        }
    }

    public function create_event(Request $request)
    {
        $request->validate([
            'event_name' => 'required|string|max:255',
            'event_date' => 'required|date',
            'location' => 'required|string|max:255',
            'event_type' => 'required|string|max:255',
            'image' => 'required|file|image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);

        // dd($request->all());

        // Handle image upload
        if ($request->hasFile('image')) {
            // Ensure directory exists
            Storage::disk('public')->makeDirectory('event_images');

            // Handle file upload
            $file = $request->file('image');
            $originalName = $file->getClientOriginalName();
            $shortenedName = substr(pathinfo($originalName, PATHINFO_FILENAME), 0, 12) . '.' . $file->getClientOriginalExtension();

            // Save the file with a shortened name
            $storedPath = $file->storeAs('event_images', $shortenedName, 'public');


            UserEvent::create([
                'user_id' => Auth::id(),
                'event_name' => $request->event_name,
                'event_date' => $request->event_date,
                'guest_names' => $request->guest_names,
                'speaker_name' => $request->speaker_name,
                'location' => $request->location,
                'type' => 2,
                'status' => 2,
                'event_type' => $request->event_type,
                'description' => $request->description,
                'image_path' => $shortenedName,  // Store the image name in the database
            ]);
            return redirect()->route('admin.eventcreate')->with('success', 'Event created successfully.');
        }
        return redirect()->route('admin.eventcreate')->with('error', 'Event created successfully.');
    }
    public function pending_event(Request $request)
    {
        $user_event = UserEvent::with('user', 'EventType')
            ->where('type', 1)
            ->where('status', 1)
            ->paginate(10);
        return view('AdminPenal.pending_event', compact('user_event'));
    }

    public function event_accept($id)
    {
        $UserEvent = UserEvent::findOrFail($id);

        $UserEvent->status = 2; // Example: 1 for accepted
        $UserEvent->save();

        return redirect()->back()->with('success', 'Event accepted successfully!');
    }

    public function event_reject($id)
    {
        $UserEvent = UserEvent::findOrFail($id);
        $UserEvent->status = 3; // Example: 0 for rejected
        $UserEvent->save();

        return redirect()->back()->with('success', 'Event rejected successfully!');
    }
}
