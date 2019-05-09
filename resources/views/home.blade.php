@extends('layouts.app')

@section('content')
    <div class="container">
        @if (count($errors) > 0)
            <div class="alert alert-danger">
                <strong>Whoops!</strong> There were some problems with your input.<br><br>
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif
        @if(session('success'))
            <div class="alert alert-success">
                {{ session('success') }}
            </div>
        @endif
            @if(session('error'))
                <div class="alert alert-danger">
                    {{ session('error') }}
                </div>
            @endif
        <div class="row">

            @if($allQuotes->isEmpty())
                <div class="col-lg-3"></div>
                <div class="col-lg-6">
                    <div class="panel panel-info">
                        <div class="panel-heading"><h3>Add your favorite quotes</h3></div>
                        <div class="panel-body">
                            <h4>To add your favorite quotes please click on the button...</h4>
                            <button type="button" class="btn btn-info btn-md" data-toggle="modal" data-target="#myModal">Add Quotes</button>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3"></div>


            @else
                <div class="row1">
                    <div class="search">
                    <div class="col-lg-6">
                        <div class="panel panel-info">
                            <div class="panel-heading"><h3>Add your favorite quotes</h3></div>
                            <div class="panel-body">
                                <h4>To add your favorite quotes please click on the button...</h4>
                                <button type="button" class=" addQuotes btn btn-warning btn-md" data-toggle="modal" data-target="#myModal">Add Quotes</button>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-6">
                        <div class="panel panel-warning">
                            <div class="panel-heading"><h3>Search for your favorite quotes</h3></div>
                            <div class="panel-body">
                                <form method="POST" action="/searchQuote"enctype="multipart/form-data">
                                    {{csrf_field()}}
                                    <input style="width:90% " type="text" class="form-control" id="detail"  name="detail" placeholder="Search">
                                    <br><button type="submit" class="btn btn-info"  >Search</button>

                                </form>
                            </div>
                        </div>

                    </div>
                    </div>
                    <h2 class="text-center" style="color:white;">List of All Favorite Quotes</h2>
                    <div class="row  ">
                        @if(isset($_GET['detail']))
                        @foreach($allQuotes as $singleQuote)
                            <div class="col-lg-3 col-md-3 col-sm-6 col-xs-6 " >
                                <div class="card " >

                                    <div class="card-body">
                                        <img class="img-thumbnail cardImage" src="{{$singleQuote->Image}}" alt="Card image" >
                                        <p class="text-justify quotes"> {{ str_limit($singleQuote->quotes, $limit = 100, $end = '...') }} </p>
                                        <a href="" class="btn btn-warning btn-sm" data-toggle="modal" data-target="#myModal2">View Details</a>
                                        <a href="/deleteQuotes/{{$singleQuote->id}}" class="btn btn-danger btn-sm">Delete</a>
                                        <a href="" class="btn btn-success btn-sm" data-toggle="modal" data-target="#myModal1">Update</a>
                                    </div>
                                </div>
                            </div>
                    @endforeach
                    @else
                            @foreach($allQuotes as $singleQuote)
                                <div class="col-lg-3 col-md-3 col-sm-6 col-xs-6 " >
                                    <div class="card " >

                                        <div class="card-body">
                                            <img class="img-thumbnail cardImage" src="{{$singleQuote->Image}}" alt="Card image" >
                                            <p class="text-justify quotes"> {{ str_limit($singleQuote->quotes, $limit = 100, $end = '...') }} </p>
                                            <a href="" class="btn btn-warning btn-sm" data-toggle="modal" data-target="#myModal2">View Details</a>
                                            <a href="/deleteQuotes/{{$singleQuote->id}}" class="btn btn-danger btn-sm">Delete</a>
                                            <a href="" class="btn btn-success btn-sm" data-toggle="modal" data-target="#myModal1">Update</a>
                                        </div>
                                    </div>
                                </div>
                        @endforeach        @endif

                    <!-- Modal for update -->
                        <div class="modal fade" id="myModal1" role="dialog">
                            <div class="modal-dialog modal-lg">

                                <!-- Modal content-->
                                <div class="modal-content">
                                    <div class="modal-header">

                                        <h4 class="modal-title">Update Quotes</h4>

                                        <button type="button" class="close" data-dismiss="modal">&times;</button>
                                    </div>
                                    <div class="modal-body">
                                        <form method="post" action="/updateQuotes/{{$singleQuote->id}}"enctype="multipart/form-data">
                                            {{csrf_field()}}
                                            <div class="form-group row">
                                                <div class="col-lg-4">
                                                    <label for="showName">Show Name: </label>
                                                    <input class="form-control" name="showName" type="text" value="{{$singleQuote->show_name}}">
                                                </div>
                                                <div class="col-lg-4">
                                                    <label for="season">Season:</label>
                                                    <input class="form-control" name="season" type="text" value="{{$singleQuote->season}}">
                                                </div>
                                                <div class="col-lg-4">
                                                    <label for="episode">Episode:</label>
                                                    <input class="form-control" name="episode" type="text" value="{{$singleQuote->episode}}">
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <div class="form-group">
                                                    <label for="quote">Quote:</label>
                                                    <textarea class="form-control" rows="5" name="quote">{{$singleQuote->quotes}}</textarea>
                                                </div>
                                            </div>
                                            <label for="quote">Images:</label>
                                            <div class="input-group control-group increment" >
                                                <input type="file" name="filename[]" class="form-control"  >
                                                <div class="input-group-btn">

                                                </div>
                                            </div>
                                            <button type="submit" class="btn btn-success">Submit</button>
                                        </form>
                                    </div>

                                </div>

                            </div>
                        </div>

                        <!-- Modal for view details -->
                        <div class="modal fade" id="myModal2" role="dialog">
                            <div class="modal-dialog modal-lg">

                                <!-- Modal content-->
                                <div class="modal-content">
                                    <div class="modal-header">

                                        <h4 class="modal-title">View details of Quote</h4>

                                        <button type="button" class="close" data-dismiss="modal">&times;</button>
                                    </div>
                                    <div class="modal-body">
                                        <h6 class="card-title"><span class="showHead">Show :</span> <span class="showContent">{{$singleQuote->show_name}}</span></h6>
                                        <h6><span class="showHead">Season:</span ><span class="showContent"> {{$singleQuote->season}} </span> <span class="showHead"> Episode: </span> <span class="showContent">{{$singleQuote->episode}}</span></h6>
                                        <p class="text-justify"><span class="showQuote">{{ $singleQuote->quotes }}</span></p>
                                    </div>

                                </div>

                            </div>
                        </div>
                    </div>

                </div>



        </div>

    </div>
            @endif
        </div>
            <!-- Modal -->
            <div class="modal fade" id="myModal" role="dialog">
                <div class="modal-dialog modal-lg">

                    <!-- Modal content-->
                    <div class="modal-content">
                        <div class="modal-header">

                            <h4 class="modal-title">Add Quotes</h4>

                            <button type="button" class="close" data-dismiss="modal">&times;</button>
                        </div>
                        <div class="modal-body">
                            <form method="post" action="/addQuotes" enctype="multipart/form-data">
                                {{csrf_field()}}
                                <div class="form-group row">
                                    <div class="col-lg-4">
                                        <label for="showName">Show Name: </label>
                                        <input class="form-control" name="showName" type="text">
                                    </div>
                                    <div class="col-lg-4">
                                        <label for="season">Season:</label>
                                        <input class="form-control" name="season" type="text">
                                    </div>
                                    <div class="col-lg-4">
                                        <label for="episode">Episode:</label>
                                        <input class="form-control" name="episode" type="text">
                                    </div>
                                </div>
                                <div class="form-group">
                                    <div class="form-group">
                                        <label for="quote">Quote:</label>
                                        <textarea class="form-control" rows="5" name="quote"></textarea>
                                    </div>
                                </div>

                                <label for="quote">Images:</label>
                                <div class="input-group control-group increment" >
                                    <input type="file" name="filename[]" class="form-control">
                                    <div class="input-group-btn">

                                    </div>
                                </div>
                                <button type="submit" class="btn btn-success">Submit</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
    </div>
 @endsection