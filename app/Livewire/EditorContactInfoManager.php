<?php
namespace App\Livewire;

use Livewire\Component;
use App\Models\ContactInfo;

class EditorContactInfoManager extends Component {
    public $editorName;
    public $address;
    public $fax;
    public $phone;
    public $email;
    public $contactInfos = [];
    public $editingId = null;
    public $isEditing = false;
    public $editId; // To store the ID of the record being edited

    protected $rules = [
        'editorName' => 'required',
        'address' => 'required',
        'fax' => 'required',
        'phone' => 'required',
        'email' => 'required|email',
    ];

    public function mount() {
        $this->contactInfos = ContactInfo::all();
    }

    public function submit() {
        // Apply validation based on editing state
        $this->validate();

        // Check if email already exists when creating a new record
        if (!$this->isEditing) {
            $existingContact = ContactInfo::where('email', $this->email)->first();
            if ($existingContact) {
                // If record exists, return an error
                session()->flash('error', 'Contact information with this email already exists.');
                return; // Exit the method early
            }
        }

        if ($this->isEditing) {
            // Update existing contact info
            $info = ContactInfo::find($this->editId);
            $info->update([
                'editorName' => $this->editorName,
                'address' => $this->address,
                'fax' => $this->fax,
                'phone' => $this->phone,
                'email' => $this->email,
            ]);
            session()->flash('message', 'Contact information updated successfully!');
        } else {
            // Create new contact info
            ContactInfo::create([
                'editorName' => $this->editorName,
                'address' => $this->address,
                'fax' => $this->fax,
                'phone' => $this->phone,
                'email' => $this->email,
            ]);
            session()->flash('message', 'Contact information added successfully!');
        }

        $this->resetFields();
        $this->contactInfos = ContactInfo::all(); // Refresh the list
        $this->isEditing = false; // Reset editing state
    }

    public function edit($id) {
        $info = ContactInfo::find($id);
        $this->editorName = $info->editorName;
        $this->address = $info->address;
        $this->fax = $info->fax;
        $this->phone = $info->phone;
        $this->email = $info->email;
        $this->editId = $id; // Store the ID of the info being edited
        $this->isEditing = true; // Set editing state to true
    }

    public function delete($id) {
        ContactInfo::destroy($id);
        session()->flash('message', 'Contact information deleted successfully!');
        $this->contactInfos = ContactInfo::all();
    }

    public function render() {
        return view('livewire.editor-contact-info-manager');
    }

    private function resetFields() {
        $this->editorName = '';
        $this->address = '';
        $this->fax = '';
        $this->phone = '';
        $this->email = '';
        $this->isEditing = false; // Reset editing state
        $this->editId = null; // Reset edit ID
    }
}
