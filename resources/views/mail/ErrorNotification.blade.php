@component('mail::message')

# Dear {{ $user['Fname'] }}

You have been assigned new KRI.Below are the details.

### Name:

{{ $documentData['Name']}}

### Description:

{{ $documentData['description']}}


Thanks,

{{ config('app.name') }}
@endcomponent
