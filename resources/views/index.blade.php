@extends('layout')

@section('content')

        @if(!$libros)

            <div class="col-xs-12 error404 text-center">

                    <h1><small>¡Oops!</small></h1>

                    <h2>There are no products in this section yet</h2>

            </div>

        @else
            <div class="col-xs-12 col-lg-12">

                <div class="col-xs-12 col-lg-2">
                    <h3><b>Language<b></h3>
                    <br>
                    <form class="form-inline" method="POST" action="{{ route('indexcheck') }}">

                        <input type="hidden" name="_token" value="{{ csrf_token() }}" >

                        <label class="custom-control custom-checkbox mb-2 mr-sm-2 mb-sm-0">
                            <input name="check[]" type="checkbox" class="custom-control-input1" value="php">
                            <span class="custom-control-indicator checkbox1"></span>
                            <span class="custom-control-description">PHP</span>
                        </label><br>

                        <label class="custom-control custom-checkbox mb-2 mr-sm-2 mb-sm-0">
                            <input name="check[]" type="checkbox" class="custom-control-input2" value="javascript">
                            <span class="custom-control-indicator checkbox2"></span>
                            <span class="custom-control-description">Javascript</span>
                          </label><br>

                        <label class="custom-control custom-checkbox mb-2 mr-sm-2 mb-sm-0">
                            <input name="check[]" type="checkbox" class="custom-control-input3" value="java">
                            <span class="custom-control-indicator checkbox3"></span>
                            <span class="custom-control-description">Java</span>
                        </label><br><br>

                          <button type="submit" class="btn btn-primary">Submit</button>
                    </form>
                    <!--<form action="/action_page.php" method="get">
                          <input type="checkbox" name="vehicle" value="Bike"> I have a bike<br>
                          <input type="checkbox" name="vehicle" value="Car" checked> I have a car<br>
                          <input type="submit" value="Submit">
                    </form>-->

                </div>
                <br>    
                <div class="col-xs-12 col-lg-10"> 

                    <div class="boton1 pull-right">
                          <div class="dropdown">
                          <button class="btn btn-secondary dropdown-toggle" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            Sort by Relevance
                          </button>
                          <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                            <a class="dropdown-item combo" style="text-decoration: none;" href="{{ route('indexrelevance') }}">Sort by Relevance</a><br>
                            <a class="dropdown-item combo" style="text-decoration: none;" href="{{ route('indextitle') }}">Title</a><br>
                            <a class="dropdown-item combo" style="text-decoration: none;" href="{{ route('indexlowprice') }}">Lowest Price</a><br>
                            <a class="dropdown-item combo" style="text-decoration: none;" href="{{ route('indexhighestprice') }}">highest price</a><br>
                            <a class="dropdown-item combo" style="text-decoration: none;" href="{{ route('index3cheapest') }}">the 3 cheapest</a><br>
                          </div>
                        </div>
                    </div>

                    <br><br><br>

                    <div class="row">
                        <div class="card-group">
                            <?php $i = 0; ?>
                            <div class="prueba"></div>

                            @foreach($libros as $libro)

                            <div class="col-3 col-md-3 mb-5 mb-md-0">
                                <div class="card-deck">
                                    <div class="card">
                                        
                                        <a href="http://127.0.0.1:8000/indexdetail/{{ $libro->id }}" class="link-libro" style="text-decoration: none; color: #050505;">

                                                {{ Html::image('/img/' . $libro->imagenurl . '' ,'img', array('class' => 'img-responsive img-libros imglibro')) }}

                                            <div class="card-block">
                                                <h4 class="card-title text-uppercase mb-0" style="color:#ec6611;">
                                                    @if ($libro->idcategoria == 1)
                                                        <b>PHP</b>
                                                    @endif
                                                    @if ($libro->idcategoria == 2)
                                                        <b>Javascript</b>
                                                    @endif
                                                    @if ($libro->idcategoria == 3)
                                                        <b>Java</b>
                                                    @endif
                                                </h4>
                                                <h5><b>{{ $libro->name }}</b></h5>
                                                <h3><b><p class="card-text text-uppercase price" style="color:#5594db;">{{ $libro->price }} €</p></b></h3>

                                            </div>
                                        </a>
                                        <div class="card-footer">
                                            <!--<small class="text-muted">Last updated 3 mins ago</small>-->
                                            {!!link_to_route('indexdetail',$title = 'View details', $id = $libro->id, $attributes = ['class'=>'btn btn-warning btn-lg btn-block text-center'])!!}
                                            {!!link_to_route('indexcar',$title = 'Add to car', $id = $libro->id, $attributes = ['class'=>'btn btn-primary btn-lg btn-block text-center'])!!}
                                        </div>

                                    </div> <!--.card-->
                                </div>
                            </div><!--col-6 col-md-3-->

                            <?php
                                $i++;
                                if ($i==3)
                                {
                                    $i=0;?>
                                    <div class="col-xs-12"><br><br></div>
                                    <div class="clearfix"></div>

                                <?php } ?>

                            @endforeach
                        </div>
                    </div>
                </div>

            </div>

            <div class="text-center pag">{{ $libros->links() }}</div>

        @endif

@endsection


