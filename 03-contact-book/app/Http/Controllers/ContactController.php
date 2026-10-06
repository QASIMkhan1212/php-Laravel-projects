<?php

namespace App\Http\Controllers;

use App\Models\Contact;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;

class ContactController extends Controller
{
    public function index(Request $request)
    {
        $query = Contact::query();

        if ($q = $request->query('q')) {
            $query->where(function ($w) use ($q) {
                $w->where('name', 'like', "%{$q}%")
                    ->orWhere('phone', 'like', "%{$q}%")
                    ->orWhere('email', 'like', "%{$q}%");
            });
        }

        $items = $query->orderBy('name')->paginate(10)->withQueryString();

        return view('contacts.index', compact('items'));
    }

    public function create()
    {
        return view('contacts.create');
    }

    public function store(Request $request)
    {
        Contact::create($this->validated($request));

        return redirect()->route('contacts.index')->with('success', 'Contact created successfully.');
    }

    public function edit(Contact $contact)
    {
        return view('contacts.edit', ['item' => $contact]);
    }

    public function update(Request $request, Contact $contact)
    {
        $contact->update($this->validated($request, $contact));

        return redirect()->route('contacts.index')->with('success', 'Contact updated successfully.');
    }

    public function destroy(Contact $contact)
    {
        $contact->delete();

        return redirect()->route('contacts.index')->with('success', 'Contact deleted successfully.');
    }

    private function validated(Request $request, ?Contact $contact = null): array
    {
        $data = $request->validate([
            'name' => 'required|string|max:100',
            'phone' => 'required|string|max:20',
            'email' => ['nullable', 'email', 'max:255', Rule::unique('contacts', 'email')->ignore($contact?->id)],
            'address' => 'nullable|string|max:500',
        ]);

        return $data;
    }
}
