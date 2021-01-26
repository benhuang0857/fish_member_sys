@extends('layouts.boradlayout') 
@section('content')

<style> 
    #seat input[type=button] {
        background-color: #6cd670;
        border: none;
        color: white;
        padding: 25px 25px;
        width: 90px;
        text-decoration: none;
        margin: 10px;
        border: 3px solid rgb(27, 29, 27);
        border-radius: 5px;
        cursor: pointer;
    }
</style>

<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Main content -->
    <div class="content">
        <div class="container-fluid" style="margin-top: 100px;">
            <div class="row">
                <div class="col-lg-6">
                    <div class="card">
                        <div class="card-header border-0">
                            <div class="d-flex justify-content-between">
                            <h3 class="card-title">機台座位</h3>
                            </div>
                        </div>
                        <div id="seat" class="card-body">
                            <div class="d-flex">
                                <div class="row" style="margin: auto;">
                                    <div class="col-sm">
                                        <div class="text-center">座位01</div>
                                        <input type="button" id="seat0" value="無">
                                        <input type="text" id="seat0_memid" value="無" style="display: none">
                                    </div>
                                    <div class="col-sm">
                                        <div class="text-center">座位02</div>
                                        <input type="button" id="seat1" value="無">
                                        <input type="text" id="seat1_memid" value="無" style="display: none">
                                    </div>
                                    <div class="col-sm">
                                        <div class="text-center">座位03</div>
                                        <input type="button" id="seat2" value="無">
                                        <input type="text" id="seat2_memid" value="無" style="display: none">
                                    </div>
                                </div>
                            </div>
                            <div class="d-flex">
                                <img src="{{asset('assets/img/playtable.png')}}" alt="" style="width:70%; margin:auto">
                            </div>
                            <div class="d-flex">
                                <div class="row" style="margin: auto;">
                                    <div class="col-sm">
                                        <input type="button" id="seat3" value="無">
                                        <div class="text-center">座位04</div>
                                        <input type="text" id="seat3_memid" value="無" style="display: none">
                                    </div>
                                    <div class="col-sm">
                                        <input type="button" id="seat4" value="無">
                                        <div class="text-center">座位05</div>
                                        <input type="text" id="seat4_memid" value="無" style="display: none">
                                    </div>
                                    <div class="col-sm">
                                        <input type="button" id="seat5" value="無">
                                        <div class="text-center">座位06</div>
                                        <input type="text" id="seat5_memid" value="無" style="display: none">
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- /.card -->
                </div>
                <!-- /.col-md-6 -->
            <div class="col-lg-6">
                <div class="card">
                    <div class="card-header border-0">
                        <div class="d-flex justify-content-between">
                        <h3 class="card-title">綁定座位</h3>
                        </div>
                    </div>
                    <form>
                        <div class="card-body">
                            <div class="d-flex">
                                <div class="col-12 col-sm-6">
    
                                    <div class="form-group">
                                        <input type="number" id="seat-num" value="0" disabled>
                                    </div>
    
                                    <div class="form-group">
                                        <label>選擇會員</label>
                                        <select id="select_member" class="form-control select2 ">
                                            <option value="無">無</option>
                                            @foreach ($USERS as $USER)
                                            <option value="{{$USER->id}}">{{$USER->phone}} ({{$USER->name}})</option>
                                            @endforeach
                                        </select>
                                    </div>
                                    <!-- /.form-group -->
                                </div>
                            </div>
                        </div>
                        <div class="card-footer">
                            <input type="button" id="binding" class="btn btn-primary" value="綁定">
                            <input type="button" id="start-game" class="btn btn-primary" value="開始遊戲">
                            <input type="button" id="close-game" class="btn btn-primary" value="結束遊戲">
                        </div>
                    </form>
                </div>
                <!-- /.card -->
            </div>
            <!-- /.col-md-6 -->
            </div>
            <!-- /.row -->
        </div>
    <!-- /.container-fluid -->
    </div>
    <!-- /.content -->
</div>
<!-- /.content-wrapper -->

@endsection
