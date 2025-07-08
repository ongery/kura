@component('mail::message')

# Dear {{ $user['Fname'] }}

Below are the task waiting for your action:


### KRIs: {{ $totalKris }}

<ul>
    @foreach($kris as $dt)
    <li>{{$dt['document']['Name']}}</li>
    @endforeach
</ul>

[View All]({{ $allURLS['kriURL'] }})

### KCIs: {{ $totalKcis }}

<ul>
    @foreach($kcis as $dt)
    <li>{{$dt['document']['Name']}}</li>
    @endforeach
</ul>

[View All]({{ $allURLS['kciURL'] }})

### KPIs: {{ $totalKpis }}

<ul>
    @foreach($kpis as $dt)
    <li>{{$dt['document']['Name']}}</li>
    @endforeach
</ul>

[View All]({{ $allURLS['kpiURL'] }})

### KMIs: {{ $totalKmis }}

<ul>
    @foreach($kmis as $dt)
    <li>{{$dt['document']['Name']}}</li>
    @endforeach
</ul>

[View All]({{ $allURLS['kmisURL'] }})

Thanks,

{{ config('app.name') }}
@endcomponent
