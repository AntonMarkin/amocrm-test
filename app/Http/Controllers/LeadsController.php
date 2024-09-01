<?php

namespace App\Http\Controllers;

use AmoCRM\Collections\ContactsCollection;
use AmoCRM\Collections\CustomFieldsValuesCollection;
use AmoCRM\Exceptions\AmoCRMApiException;
use AmoCRM\Models\ContactModel;
use AmoCRM\Models\LeadModel;
use Illuminate\Http\Request;
use Illuminate\View\View;

class LeadsController extends Controller
{
    public function index(): View
    {
        $client = \AmoCrm::getClient();
        $leads = $client->leads()->get();
        return view('index', compact('leads'));
    }
    public function create(Request $request)
    {
        $data = $request->validate([
            'price'               => 'required|int',
            'name'                => 'required|string',
            'email'               => 'required|email',
            'phone'               => 'required|string',
            'half_minute_trigger' => 'required|bool',
        ]);
        $client = \AmoCrm::getClient();

        $contact = new ContactModel();
        $contactsCollection = new ContactsCollection();
        $contactsCustomFieldsCollection = new CustomFieldsValuesCollection();

        $contact->setName($data['name']);
        $phoneFieldId = config('amocrm.custom_fields_ids.contacts.phone');
        $emailFieldId = config('amocrm.custom_fields_ids.contacts.email');
        \AmoCrm::addCustomField($contactsCustomFieldsCollection, $phoneFieldId, $data['phone']);
        \AmoCrm::addCustomField($contactsCustomFieldsCollection, $emailFieldId, $data['email']);
        $contact->setCustomFieldsValues($contactsCustomFieldsCollection);

        $contactsCollection->add($contact);

        $lead = new LeadModel();
        $lead->setPrice($data['price']);

        $leadsCustomFieldsCollection = new CustomFieldsValuesCollection();
        $halfMinuteTriggerFieldId = config('amocrm.custom_fields_ids.leads.half_minute_trigger');
        \AmoCrm::addCustomField($leadsCustomFieldsCollection, $halfMinuteTriggerFieldId, (bool)$data['half_minute_trigger']);

        $lead->setContacts($contactsCollection);
        $lead->setCustomFieldsValues($leadsCustomFieldsCollection);

        try {
            $client->leads()->addOneComplex($lead);
        } catch (AmoCRMApiException $e) {
            dd($e);
        }
        return redirect()->route('index');
    }
}
