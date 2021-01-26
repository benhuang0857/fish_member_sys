<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel Back') }}</title>

    <!-- Google Font: Source Sans Pro -->
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="{{asset('plugins/fontawesome-free/css/all.min.css')}}">
    <!-- Mobile -->
    <link rel="stylesheet" href="{{asset('mobile/css/bootstrap.min.css')}}">
	<link rel="stylesheet" href="{{asset('mobile/css/lightbox.css')}}">
	<link rel="stylesheet" href="{{asset('mobile/css/owl.carousel.min.css')}}">
	<link rel="stylesheet" href="{{asset('mobile/css/owl.theme.default.min.css')}}">
	<link rel="stylesheet" href="{{asset('mobile/css/animsition.css')}}">
    <link rel="stylesheet" href="{{asset('mobile/css/style.css')}}">
    <!-- Select2 -->
    <link rel="stylesheet" href="{{ asset('plugins/select2/css/select2.min.css') }}">
	<link rel="stylesheet" href="{{ asset('plugins/select2-bootstrap4-theme/select2-bootstrap4.min.css') }}">
	
	<style>
		input,
		textarea {
		border: 1px solid #eeeeee;
		box-sizing: border-box;
		margin: 0;
		outline: none;
		padding: 10px;
		}

		input[type="button"] {
		-webkit-appearance: button;
		cursor: pointer;
		}

		input::-webkit-outer-spin-button,
		input::-webkit-inner-spin-button {
		-webkit-appearance: none;
		}

		.input-group {
		clear: both;
		margin: 15px 0;
		position: relative;
		}

		.input-group input[type='button'] {
		background-color: rgb(54, 152, 245);
		min-width: 38px;
		width: auto;
		transition: all 300ms ease;
		}

		.input-group .button-minus,
		.input-group .button-plus {
		font-weight: bold;
		height: 38px;
		padding: 0;
		width: 38px;
		position: relative;
		}

		.input-group .quantity-field {
		position: relative;
		height: 38px;
		left: -6px;
		text-align: center;
		width: 62px;
		display: inline-block;
		font-size: 13px;
		margin: 0 0 5px;
		resize: vertical;
		}

		.button-plus {
		left: -13px;
		}

		input[type="number"] {
		-moz-appearance: textfield;
		-webkit-appearance: none;
		}
	</style>

</head>

<body class="animsition">

	<!-- navbar -->
	<div class="navbar navbar-home">
		<div class="container">
			<div class="content-left">
				<a href="#menu" class="menu-link"><i class="fa fa-bars"></i></a>
			</div>
			<div class="content-center">
				<h1>魚機前台綁定介面</h1>
			</div>
		</div>
	</div>
	<!-- end navbar -->

	<!-- sidebar -->
	<div class="side-overlay"></div>
	<div id="menu" class="panel sidebar" role="navigation">
		<div class="sidebar-header">
			<img src="{{asset("assets/img/about.jpg")}}" alt="">
			<span>XXX</span>
		</div>
		<ul>
			<li>
				<a href="{{url('/')}}"><i class="fa fa-braille"></i>座位設定頁面</a>
			</li>
			<li>
				<a href="{{url('/register')}}"><i class="fa fa-location-arrow"></i>開帳號</a>
			</li>
			
		</ul>
	</div>
	<!-- end sidebar -->
	
	@yield('content')
	
	<!-- mobile -->
    <script src="{{asset('mobile/js/jquery.min.js')}}"></script>
    <script src="{{asset('mobile/js/bootstrap.min.js')}}"></script>
    <script src="{{asset('mobile/js/lightbox.js')}}"></script>
    <script src="{{asset('mobile/js/animsition.min.js')}}"></script>
    <script src="{{asset('mobile/js/animsition-custom.js')}}"></script>
    <script src="{{asset('mobile/js/jquery.big-slide.js')}}"></script>
    <script src="{{asset('mobile/js/owl.carousel.min.js')}}"></script>
    <script src="{{asset('mobile/js/main.js')}}"></script>
    <!-- Select2 -->
	<script src="{{ asset('plugins/select2/js/select2.full.min.js') }}"></script>


	<script>
		$('.select2').select2();

		//Initialize Select2 Elements
		$('.select2bs4').select2({
			theme: 'bootstrap4'
		});

		for(let i = 0; i<6; i++)
		{
			$( "#seat"+ i ).click(function() {
				$(this).css("border", "3px solid rgb(250, 137, 44)");
				$( "#seat input[type=button]" ).not(this).css("border", "3px solid  rgb(27, 29, 27)");
				$("#seat-num").val(i);
				let uid = $( "#seat"+ i +"_memid" ).val();
				let html =  '<option value="無">無</option>'+
                            '@foreach ($USERS as $USER)'+
                            '<option value="{{$USER->id}}">{{$USER->phone}} ({{$USER->name}})</option>'+
                            '@endforeach';
				$.ajax({
					success: function(result) {
						$("#select_member").html(html);
						$('#select_member option[value="'+uid+'"]').prop('selected', true);
					},
					error: function(result) {
						alert('發生錯誤');
					}
				});
			});
		}

		$('#binding').click(function(){
			$.ajax({
				success: function(result) {
					let seat_num = $("#seat-num").val();
					let selected_mem = $('#select_member :selected').text();
					let selected_mem_id = $('#select_member :selected').val();
					if (selected_mem == '無')
					{
						alert('請選擇會員在進行綁定');
						$( "#seat"+ seat_num ).val(selected_mem);
						$( "#seat"+ seat_num ).css("background", "#6cd670");
					}	
					else
					{
						alert('綁定成功');
						selected_mem_name = selected_mem.split(' ');
						$( "#seat"+ seat_num ).val(selected_mem_name[1]);
						$( "#seat"+seat_num+"_memid" ).val(selected_mem_id);
						$( "#seat"+ seat_num ).css("background", "rgb(54, 152, 245)");
					}
				},
				error: function(result) {
					alert('發生錯誤binding-error');
				}
			});
		});

		$('#start-game').click(function(){
			let seat_num = $("#seat-num").val();
			let select_member_id = $("#select_member").val();
			//$.ajaxSetup({headers: {'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')}});
			$.ajax({
				headers: {'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')},
				type: "POST",
				url: "/gamestart",
				data: { 
					uid: select_member_id,
					mac: '123456',
					seat_num: seat_num,
				},
				success: function(result) {
					alert(select_member_id);
				},
				error: function(result) {
					alert('發生錯誤start-game-error');
				}
			});
		});

		$('#close-game').click(function(){
			alert('遊戲結束！記錄會員成績');
		});
		
	</script>

</body>
</html>
