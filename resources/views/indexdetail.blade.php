@extends('layout')

@section('content')
<br><br>

        @if(!$libro)

            <div class="col-xs-12 error404 text-center">

                    <h1><small>¡Oops!</small></h1>

                    <h2>There are no products in this section yet</h2>

            </div>

        @else

                    <div class="row">
                        <div class="card-group">
                            <?php $i = 0; ?>

                            @foreach($libro as $libro)

                            <div class="col-4 col-md-4 mb-5 mb-md-0">
                                <div class="card-deck">
                                    <div class="card">
                                        <br>

                                      {{ Html::image('/img/' . $libro->imagenurl . '' ,'img', array('class' => 'img-responsive img-libros')) }}

                                    </div>
                                </div>
                            </div>
                            <div class="col-8 col-md-8 mb-5 mb-md-0">

                                            <div class="card-block">
                                                <h2 class="card-title text-uppercase mb-0" style="color:#ec6611;">
                                                    @if ($libro->idcategoria == 1)
                                                        <b>PHP</b>
                                                    @endif
                                                    @if ($libro->idcategoria == 2)
                                                        <b>Javascript</b>
                                                    @endif
                                                    @if ($libro->idcategoria == 3)
                                                        <b>Java</b>
                                                    @endif
                                                </h2>
                                                <h2><b>{{ $libro->name }}</b></h2>
                                                <h4><b>{{ $libro->descripcion }}</b></h4>

                                                <div class="col-3 col-md-3 mb-5 mb-md-0 box">
                                                	<h4>Mapt Subscription</h4>
													<h3 style="color:#5594db;"><b>FREE</b></h3>
													<h4>€30.23/m after trial</h4>
                                        		</div>
                                                <div class="col-3 col-md-3 mb-5 mb-md-0 box">
                                                	<h4>Book</h4>
													<h3 style="color:#5594db;"><b>{{ $libro->price }} €</b></h3>
													<h4 style="color:red;">Save 29%</h4>
                                        		</div>
                                                <div class="col-3 col-md-3 mb-5 mb-md-0 box">
                                                	<h4>Print + eBook</h4>
                                                	<h3 style="color:#5594db;"><b>€42.99</b></h3>
                                                	<h4>RRP €42.99</h4>
                                        		</div>

                                            </div>
                                        <div class="col-6 col-md-6 mb-5 mb-md-0">
                                            
                                        </div>
                                        <div class="col-6 col-md-6 mb-5 mb-md-0">
	                                        <div class="card-footer">
	                                            <!--<small class="text-muted">Last updated 3 mins ago</small>-->
                                                {!!link_to_route('indexcar',$title = 'Add to car', $id = $libro->id, $attributes = ['class'=>'btn btn-primary btn-lg btn-block text-center'])!!}
	                                        </div>
	                                    </div>
                            </div><!--col-8 col-md-8-->

                            @endforeach
                        </div>
                    </div>
                
        @endif

@endsection