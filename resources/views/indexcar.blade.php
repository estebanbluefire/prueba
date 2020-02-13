@extends('layout')

@section('content')
    <div class="col-12 col-md-12 mb-12 mb-md-0">
        <div class="col-8 col-md-8 mb-8 mb-md-0">
            <div class="col-12 col-md-12 mb-12 mb-md-0 box2">
                <h2>Your Cart</h2>
            </div>
            
            @foreach($car as $carro)
                <div class="col-12 col-md-12 mb-12 mb-md-0 box2">
                    <section>
                            <div class="col-4 col-md-4 mb-5 mb-md-0">
                                {{ Html::image('/img/' . $carro->imagenurl . '' ,'img', array('class' => 'img-responsive img-libros')) }}
                            </div>
                            <div class="col-8 col-md-8 mb-5 mb-md-0">

                                    <h3><b>{{ $carro->name}}</b></h3>

                                    <h6>{{ $carro->descripcion }}</h6>

                                    <h3><b>{{ $carro->price }} €</b></h3>
                                        {!! Form::open(['route' => ['indexcardelete'],'method' => 'DELETE']) !!}
                                            <input type="hidden" name="idproducto" value="{{ $carro->car_id_producto }}"/>
                                            <label>Quantity:&nbsp;&nbsp;</label>
                                            {{ $carro->cantidad }}
                                            <input type="number" name="cantidad" size="2" min="1" max="5" style="width: 3em;"/>
                                            <input type="submit" name="submit" class="btn btn-primary" value="Delete product" size="5" />
                                       {!! Form::close() !!}
            
                                <div class="separa"></div>
                            </div>
                    </section>
                </div>
                <hr width="75%" />
                
            @endforeach
        </div>
        <div class="col-4 col-md-4 mb-5 mb-md-0">
            <div class="col-12 col-md-12 mb-12 mb-md-0 box2">
            </div>
            <div class="col-12 col-md-12 mb-12 mb-md-0 box3">
                <h2>Summary</h2>
            </div>
            <div class="col-12 col-md-12 mb-12 mb-md-0 box4">
                Free Shipping<br><br>
                Free shipping on print orders for US, UK, Europe and selected Asian countries
                <hr width="75%" />
                Sub Total:€ {{ $obj->sumtotal}}<br>
                Quantity: {{ $obj->items }}
                VAT:€6.24<br>
                Shipping:€0.00<br><br>

                @if ($obj->sumtotal<=0)
                    <h2>Total:{{ $obj->sumtotal }}</h2>
                @else                               
                    <h2>Total:{{ $obj->sumtotal + 6.24 }}</h2>
                @endif
            </div>

        </div>
    </div>
@endsection