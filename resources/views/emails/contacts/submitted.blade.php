<div>
    <h1>{{ $contact->subject }}</h1>
    <p>{{ $contact->message }}</p>
    <ul>
        <li>From: {{ $contact->first_name }} {{ $contact->last_name }}</li>
        <li>Email: {{ $contact->email }}</li>
        <li>Phone: {{ $contact->phone }}</li>
    </ul>
</div>
