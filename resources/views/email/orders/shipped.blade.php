@component('mail::message')
# Your order is complete

Dear, {{ $order->fullname }}
we are sending your order to address...




@component('mail::table')
| Name of Part      | Quantity      | Price    |
| :---------------- |:-------------:| :-------:|
@foreach($order->parts['items'] as $item)
| {{$item['item']['name'] }} |  {{$item['quantity'] }}  | {{ $item['price'] }} $ |
@endforeach
------------------------------------------------
@endcomponent

##Total price: {{ $order->total_price }}$

Thanks,<br>
{{ config('app.name') }}
@endcomponent
