@extends('layouts.dashboard')
@section('content')
<!-- Main Content -->
<div id="content">

    <!-- Topbar -->
    <nav class="navbar navbar-expand navbar-light bg-white topbar mb-4 static-top shadow">

        <!-- Sidebar Toggle (Topbar) -->
        <button id="sidebarToggleTop" class="btn btn-link d-md-none rounded-circle mr-3">
            <i class="fa fa-bars"></i>
        </button>

        <!-- Topbar Navbar -->
        <ul class="navbar-nav ml-auto">
            <!-- Nav Item - User Information -->
            <li class="nav-item dropdown no-arrow">
                <a class="nav-link dropdown-toggle" href="#" id="userDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                    <span class="mr-2 d-none d-lg-inline text-gray-600 small">Administrator</span>
                    <img class="img-profile rounded-circle" src="https://source.unsplash.com/QAB-WJcbgJk/60x60">
                </a>
                <!-- Dropdown - User Information -->
                <div class="dropdown-menu dropdown-menu-right shadow animated--grow-in" aria-labelledby="userDropdown">
                    <a class="dropdown-item" href="#" data-toggle="modal" data-target="#logoutModal">
                        <i class="fas fa-sign-out-alt fa-sm fa-fw mr-2 text-gray-400"></i>
                        Logout
                    </a>
                </div>
            </li>

        </ul>

    </nav>
    <!-- End of Topbar -->

    <!-- Begin Page Content -->
    <div class="container-fluid">
		@if($errors->any())
		<div class="col-lg-12 mb-4">
            <div class="card bg-danger text-white shadow">
                <div class="card-body">
                    <b><i class="fas fa-exclamation-triangle"></i> Error</b><br>{{$errors->first()}}
                </div>
            </div>
        </div>
        @endif
        <!-- DataTales Example -->
        <div class="card shadow mb-4">
            <div class="card-header py-3">
                <h6 class="m-0 font-weight-bold text-primary">Edit<br><center>{{$game->teamA->name}} <i class="fas fa-times"></i> {{$game->teamB->name}}</center></h6>
            </div>
            <div class="card-body">
                <div class="table-responsive">
                    {!! Form::open(['action' => ['Dashboard\GameController@update', $game->id], 'method' => 'POST', 'id' => 'addForm' ]) !!}
                    @csrf
                    <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                        <tbody>
                            <tr>
                                <th>Team A</th>
                                <td>
                                    {!! Form::select('team_a_id', $teams_a, $game->team_a_id, ['id' => 'teams_a', 'class' => 'form-control', 'style' => 'width:100%']) !!}
                                </td>
                            </tr>
                            <tr>
                                <th>Team B</th>
                                <td>
                                    {!! Form::select('team_b_id', $teams_b, $game->team_b_id, ['id' => 'teams_b', 'class' => 'form-control', 'style' => 'width:100%']) !!}
                                </td>
                            </tr>
                            <tr>
                                <th>Channels</th>
                                <td>{!! Form::select('channel_id_list[]', $channels, $game->channels, ['id' => 'channels', 'multiple' => 'multiple', 'class' => 'form-control', 'style' => 'width:100%']) !!}</td>
                            </tr>
                            <tr>
                                <th>Competition</th>
                                <td>
                                    {!! Form::select('competition_id', $competitions, $game->competition_id, ['id' => 'competitions', 'class' => 'form-control', 'style' => 'width:100%']) !!}
                                </td>
                            </tr>
                            <tr>
                                <th>Round</th>
                                <td>
                                    {!! Form::text('round', $game->round, ['id' => 'round', 'class' => 'form-control', 'style' => 'width:100%']) !!}
                                </td>
                            </tr>
                            <tr>
                                <th>Location</th>
                                <td>
                                    {!! Form::select('location_id', $locations, $game->location_id, ['id' => 'locations', 'class' => 'form-control', 'style' => 'width:100%']) !!}
                                </td>
                            </tr>
                            <tr>
                                <th>Start Date</th>
                                <td style="min-width:70%;">
                                    <div>
                                        {{ Form::input('startDate', '', $game->start_date, array('class' => 'form-control', 'id' => 'startDate')) }}
                                    </div>
                                </td>
                            </tr>
                            <tr>
                                <th>End Date</th>
                                <td style="min-width:70%;">
                                    <div class="input-group">
                                        {{ Form::input('endDate', '', $game->end_date, array('class' => 'form-control', 'id' =>  'endDate')) }}
                                    </div>
                                </td>
                            </tr>
                            <tr>
                                <td colspan="8">
                                    <button type="submit" href="#" class="btn btn-success btn-icon-split" style="margin-bottom:20px;" onclick="loadingscreen()">
                                        <span class="icon text-white-50">
                                            <i class="fas fa-plus-square"></i>
                                        </span>
                                        <span class="text">Edit</span>
                                    </button>
                                </td>
                            </tr>
                        </tbody>
                    </table>
                    {!! Form::close() !!}

                </div>
            </div>

        </div>

        @endsection

        @section('js')
        <script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.21.0/moment.min.js" type="text/javascript"></script>
        <script src="{{ asset('/dashboard/js/bootstrap-datetimepicker.min.js') }}"></script>

        <script type="text/javascript">
            $(function() {
                $('#startDate').datetimepicker({
                    format: 'YYYY-MM-DD HH:mm',
                    default: null
                });
            });
        </script>
        <script type="text/javascript">
            $(function() {
                $('#endDate').datetimepicker({
                    format: 'YYYY-MM-DD HH:mm',
                    default: null
                });
            });
        </script>
        <script>
            $('#teams_a').select2();
            $('#teams_b').select2();
            $('#channels').select2();
            $('#competitions').select2();
            $('#locations').select2();
        </script>
        @endsection