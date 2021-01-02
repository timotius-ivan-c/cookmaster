@foreach($subscriptions as $subscription)
    {{$subscription->chef_id}}
    {{$subscription->member_id}}
    {{$subscription->start}}
    {{$subscription->duration}} months
    {{$subscription->end}}
    <br>
@endforeach