<?php
namespace App\Livewire;

use Livewire\Component;
use App\Models\ContactInfo;
use Livewire\WithFileUploads;
use Illuminate\Support\Facades\Storage;

class EditorContactInfoManager extends Component {
    use WithFileUploads;

    public $editorName;
    public $address;
    public $fax;
    public $phone;
    public $email;
    public $logo;
    public $publishing;
    public $contactInfos = [];
    public $editingId = null;
    public $isEditing = false;
    public $editId;

    protected $rules = [
        'editorName' => 'required',
        'address' => 'required',
        'fax' => 'required',
        'phone' => 'required',
        'publishing' => 'required',
        'email' => 'required|email',
        'logo' => 'nullable|image|max:1024',  // Ensure the file is an image and has a size limit
    ];

    public function mount() {
        $this->contactInfos = ContactInfo::all();
    }

    public function submit() {
        $this->validate();

        if ( $this->isEditing ) {
            // Update existing contact info
            $info = ContactInfo::find( $this->editId );

            // Handle logo upload if a new logo is provided
            if ( $this->logo ) {
                // Delete the old logo if exists
                if ( $info->logo ) {
                    Storage::delete( $info->logo );
                }
                // Store the new logo
                $logoPath = $this->logo->store( 'logos', 'public' );
            } else {
                $logoPath = $info->logo;
                // Keep the existing logo
            }

            $info->update( [
                'editorName' => $this->editorName,
                'address' => $this->address,
                'fax' => $this->fax,
                'phone' => $this->phone,
                'email' => $this->email,
                'logo' => $logoPath,
                'publishing' => $this->publishing,
            ] );

            session()->flash( 'message', 'Contact information updated successfully!' );
        } else {
            // Create new contact info
            $logoPath = $this->logo ? $this->logo->store( 'logos', 'public' ) : null;

            ContactInfo::create( [
                'editorName' => $this->editorName,
                'address' => $this->address,
                'fax' => $this->fax,
                'phone' => $this->phone,
                'email' => $this->email,
                'logo' => $logoPath,
                'publishing' => $this->publishing,
            ] );

            session()->flash( 'message', 'Contact information added successfully!' );
        }

        $this->resetFields();
        $this->contactInfos = ContactInfo::all();
        $this->isEditing = false;
    }

    public function edit( $id ) {
        $info = ContactInfo::find( $id );
        $this->editorName = $info->editorName;
        $this->address = $info->address;
        $this->fax = $info->fax;
        $this->phone = $info->phone;
        $this->email = $info->email;
        $this->publishing = $info->publishing;
        $this->logo = null;
        // Do not populate the logo field with the file path
        $this->editId = $id;
        $this->isEditing = true;
    }

    public function delete( $id ) {
        $info = ContactInfo::find( $id );

        // Delete the logo file if it exists
        if ( $info->logo ) {
            Storage::delete( $info->logo );
        }

        $info->delete();

        session()->flash( 'message', 'Contact information deleted successfully!' );
        $this->contactInfos = ContactInfo::all();
    }

    public function render() {
        return view( 'livewire.editor-contact-info-manager' );
    }

    private function resetFields() {
        $this->editorName = '';
        $this->address = '';
        $this->fax = '';
        $this->phone = '';
        $this->email = '';
        $this->publishing = '';
        $this->logo = '';
        $this->isEditing = false;
        $this->editId = null;
    }
}
