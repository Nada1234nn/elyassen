@foreach($products as $product)
    @can('name_pro')

        {{$product->username}}
    @endcan
    @can('supplier_pro')
        {{$product->email}}
    @endcan
    <h1>dddddddd</h1>
@endforeach