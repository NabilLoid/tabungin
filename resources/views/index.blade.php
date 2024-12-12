<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<link rel="stylesheet" href="css/style.css">
	<!-- Menambahkan Phosphor Icons dari CDN -->
	<script src="https://unpkg.com/@phosphor-icons/web"></script>
	<link rel='stylesheet' href='https://cdn-uicons.flaticon.com/2.6.0/uicons-regular-rounded/css/uicons-regular-rounded.css'>
	<title>Document</title>
	<style>
		:root{
            --primer-color: #4D5CC9;
            --primer-child-color: #4C55AE;
            --second-color: #EFBE6E;
            --second-child-color: #EDA670;
            --bg-primer-color: #ffffff;
            --bg-second-color: #F3F4EF;
            --df-text-color: #ffffff;
            --in-text-color: #222222;
            --butler-font: 'Louis George Café', sans-serif;
        }

        .dark-mode {
            --primer-color: green;
	    }
        *,h3{
        	box-sizing: border-box;
        	margin: 0;
        	padding: 0;
        }
        i{
            position: relative;
            top: 0px;
        } 
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
           /*backdrop-filter: blur(10px);*/

        }
        header{
        	width: 100%;
        	height: 50px;
            background-color: var(--primer-color);
            color: var(--df-text-color);
            padding: 10px 15px;
            display: flex;
            justify-content: space-between;
            align-items: center;
            position: fixed;
            top: 0;
            left: 0;
            z-index: 5;
            
        }
        .filler-top{
        	height: 50px;
        	width: 100%;
        }
        .continer-left-header{
        	display: flex;
        	justify-content: center;
        	align-items: center;
        	gap:10px;
        }
        .continer-left-header a{
        	text-decoration: none;
        	color: var(--df-text-color);
        }
        .wrapper-judul{
        	display: flex;
        	justify-content: center;
        	align-items: flex-start;
        	flex-direction: column;
        }
        .wrapper-judul h3{
        	font-size: 15px;
        	display: flex;
        	justify-content: center;
        	align-items: center;

        }
        .wrapper-judul h3 span{
        	height:15px;
        	display: flex;
        	justify-content: center;
        	align-items: center;
        	background-color: rgba(255,255,255,0.2);
        	padding: 0px 5px;
        	font-size: 10px;
        	margin-left: 10px;
        	border-radius: 100px;
        	position: relative;
        	bottom: 1px;
        	left: -2px;
        }
        .wrapper-judul span{
        	font-size: 10px;
        	color: #ddd;
        }
        .container-icon-right{
        	display: flex;
        	justify-content: center;
        	align-items: center;
        	color: rgba(255,255,255,0.6);
        }
        .add-table{
        	margin-left: 10px;
        	position: relative;
        	display: flex;
        	justify-content: flex-end;
        	align-items: center;
        	position: relative;
        	z-index: 3;

        }
        .add-table img{
        	width: 30px;
        	height: 30px;
        	border-radius: 100px;
        	border: 2px solid var(--df-text-color);
        	z-index: 5;
        	
        }

/*        .add-table{
        	display: flex;
        	justify-content: center;
        	align-items: center;
        	height: 30px;
        	width: 30px;
        	border-radius: 100px;
        	background-color: var(--df-text-color);
        	color: var(--primer-color);
        	font-size: 20px;
        	margin-left: 10px;
        	position: relative;
        }
        .add-table span{
        	font-size: 10px;
        	font-weight: bold;
        	position: absolute;
        	top: 0;
        	right: -100%;
        }
        .add-table i {
        	position: relative;
        	font-size: 20px;
        	top: 2px;
        }

		
*/       
		.logout{
			display: flex;
			justify-content: center;
			align-items: center;

		}
		.logout button{
			background-color: transparent;
			text-align: center;
			border: none;
			outline: none;
			color: rgba(255,255,255,0.6);
			font-size: 17px;
			position: relative;
			top: 2px;
		}
		.notification{
/*        	background-color: var(--primer-child-color);
*/        	width: 25px;
        	height: 25px;
        	display: flex;
        	justify-content: center;
        	align-items: center;
        	border-radius: 100px;
        	font-size: 17px;
        }
        .move-table{
/*        	background-color: var(--primer-child-color);
*/        	height: 25px;
        	padding: 0px 10px;
        	display: flex;
        	justify-content: center;
        	align-items: center;
        	border-radius: 100px;

        }
        .move-table .ph-table{
        	font-size: 20px;
        }
        .move-table .ph-caret-up-down{
        	position: relative;
        	left: 2px;
        	font-size: 12px;
        }
        main{
        	padding: 10px;
        }
        .wrapper-tabel{
        	width: 100%;
        	border-radius: 10px;
        	border: 1px solid #ddd;
        	box-shadow: 2px 2px 10px rgba(0,0,0,0.1);
        	overflow: hidden;
        }
        table {
            width: 100%;
            border-collapse: collapse;
        }

        th, td {
            padding: 10px;
            text-align: center;
            vertical-align: middle;
            border-bottom: 1px solid #ddd;
            text-align: center;
            font-size: 12px;
        }
        th {
            background-color: var(--primer-color);
            color: var(--df-text-color);
        }
        tr:nth-child(even) {
            background-color: #f9f9f9;
        }
        /* Mengatur lebar kolom berdasarkan urutan */
        th:nth-child(1), td:nth-child(1) {
            width: 1%; /* Kolom tanggal */
            
        }
        th:nth-child(2), td:nth-child(2) {
            width: 10%; /* Kolom jumlah */
        }
        th:nth-child(3), td:nth-child(3) {
            width: 40%; /* Kolom deskripsi */
        }
        td{
        	text-align: center; /* Memusatkan konten secara horizontal */
		    vertical-align: middle; /* Memusatkan konten secara vertikal */
		    height: auto;
        }
        .up,.down {
        	text-align:center;
        	width: 20px;
        	display: inline-block;
        	vertical-align: middle;
        	background-color: green;
        	padding: 2px 2px;
        	border-radius: 5px;
        	font-size: 12px;
        	color: rgba(45, 204, 16, 1);
        	background-color: rgba(45, 204, 16, .2);

        }
        .down{
        	background-color: rgba(255, 65, 54, .2);
        	color: rgba(255, 65, 54, 1);
        }

        .filler-bottom{
        	height: 100px;
        	width: 100%;
        }

        form{
        	display: flex;
        	justify-content: center;
        	align-items: center;
        	gap: 5px;
        }
        .form-add-data{
        	position: fixed;
        	bottom: 0;
        	left: 0;
        	width: 100%;
        	padding: 5px;
        	display: flex;
        	justify-content: center;
        	align-items: center;
        	gap: 5px;
        	z-index: 3;
        	
        }
        .form-add-data input{
        	box-sizing: border-box;
        	border: none;
        	border-radius: 5px;
        	height: 35px;
        	width: 100%;
        	padding: 0px 10px;
        	border: 1.5px solid var(--primer-color);
        }
        .form-add-data input:focus{
        	outline: none;
        }
        #status{
        	height: 35px;
        	box-sizing: border-box;
        	border-radius: 5px;
        	border: none;
        	padding: 10px ;
        	background-color: var(--primer-color);
        	color: var(--df-text-color);
        	font-size: 15px;
        	text-align:center;
        	display: flex;
        	justify-content: center;
        	align-items: center;
        }
        #status:hover{
        	outline: none;
        }
        #status option{
        	font-size: 10px;
        	background-color: red;
        	border-radius: 10px;
        }
        #status option:focus{
        	background-color: red;
        }
        .form-add-data button{
        	height: 35px;
        	width: 70px;
        	border-radius: 5px;
        	outline: none;
        	border: none;
        	display: flex;
        	justify-content: center;
        	align-items: center;
        	font-size: 17px;
        	background-color: var(--primer-color);
        	color: var(--df-text-color);
        	box-sizing: border-box;
        	transition: color 0.5s ease;
        }
        .form-add-data button:hover{
        	background-color: var(--df-text-color);
        	border: 1.5px solid var(--primer-color);
        	color: var(--primer-color);
        	box-sizing:border-box;
        }
        /* From Uiverse.io by Yaya12085 */ 
		.radio-inputs {
		  position: relative;
		  display: flex;
		  justify-content: center;
		  align-items: center;
		  flex-wrap: wrap;
		  border-radius: 5px;
		  background-color: var(--primer-color);
		  box-sizing: border-box;
		  box-shadow: 0 0 0px 1px rgba(0, 0, 0, 0.06);
		  padding: 0.25rem;
		  width: 150px;
		  font-size: 12px;
		  height: 35px;
		}

		.radio-inputs .radio {
		  flex: 1 1 auto;
		  text-align: center;
		}

		.radio-inputs .radio input {
		  display: none;
		}

		.radio-inputs .radio .name {
		  display: flex;
		  cursor: pointer;
		  align-items: center;
		  justify-content: center;
		  border-radius: 5px;
		  border: none;
		  padding: 5px 0;
		  color: var(--df-text-color);
		  transition: all .15s ease-in-out;
		}

		.radio-inputs .radio input:checked + .name {
		  background-color: #fff;
		  font-weight: 600;
		  color: #222;
		}


        /* From Uiverse.io by Yaya12085 */ 
        .container-login{
        	width: 100%;
        	height: 100vh;
        	display:flex;
        	justify-content: center;
        	align-items: center;
        	background: var(--primer-color);
        	padding: 10px;
        }
		.button {
		  width: calc(100% - 115px);
		  display: flex;
		  justify-content: center;
		  align-items: center;
		  padding: 0.5rem 1rem;
		  font-size: 12px;
		  line-height: 1.25rem;
		  font-weight: 700;
		  text-align: center;
		  text-transform: uppercase;
		  vertical-align: middle;
		  align-items: center;
		  border-radius: 0.5rem;
		  border: 1px solid rgba(0, 0, 0, 0.25);
		  gap: 0.75rem;
		  color: rgb(65, 63, 63);
		  background-color: #fff;
		  cursor: pointer;
		  transition: all .6s ease;
		  text-decoration: none;
		}

		.button svg {
		  height: 20px;
		}

		button:hover {
		  transform: scale(1.02);
		}

	</style>
</head>
<body>
    @auth
	<x-header></x-header>
	<div class="filler-top"></div>
	<main>
<div class="wrapper-tabel">
	<x-table></x-table>
</div>
<div class="filler-bottom"></div>


		<div class="form-add-data" >
			<div class="total-amount">
			</div>
			<form action="{{ route('books.store') }}" method="POST">
				@csrf

			<div class="radio-inputs">
			  <label class="radio">
			    <input type="radio" value="1" name="status" checked="">
			    <span class="name"><i class="ph-fill ph-caret-up"></i></span>
			  </label>
			  <label class="radio">
			    <input type="radio" value="0" name="status">
			    <span class="name"><i class="ph-fill ph-caret-down"></i></span>
			  </label>
			</div>
			
			<input list="fruits" name="amount" id="amount" required min="1" placeholder="Nominal">
			<datalist id="fruits">
			  <option value="5000">
			  <option value="10000">
			  <option value="20000">
			  <option value="50000">
			  <option value="100000">
			</datalist>
            <input type="hidden" name="user_id" value="{{ auth()->user()->id }}">

			<button type="submit"><i class="ph-fill ph-paper-plane-right"></i></button>
			</form>
		</div>
	</main>
    @else
    <div class="container-login">
    <a href="{{ route('redirect') }}" class="button" >
      <svg xmlns="http://www.w3.org/2000/svg" preserveAspectRatio="xMidYMid" viewBox="0 0 256 262">
      <path fill="#4285F4" d="M255.878 133.451c0-10.734-.871-18.567-2.756-26.69H130.55v48.448h71.947c-1.45 12.04-9.283 30.172-26.69 42.356l-.244 1.622 38.755 30.023 2.685.268c24.659-22.774 38.875-56.282 38.875-96.027"></path>
      <path fill="#34A853" d="M130.55 261.1c35.248 0 64.839-11.605 86.453-31.622l-41.196-31.913c-11.024 7.688-25.82 13.055-45.257 13.055-34.523 0-63.824-22.773-74.269-54.25l-1.531.13-40.298 31.187-.527 1.465C35.393 231.798 79.49 261.1 130.55 261.1"></path>
      <path fill="#FBBC05" d="M56.281 156.37c-2.756-8.123-4.351-16.827-4.351-25.82 0-8.994 1.595-17.697 4.206-25.82l-.073-1.73L15.26 71.312l-1.335.635C5.077 89.644 0 109.517 0 130.55s5.077 40.905 13.925 58.602l42.356-32.782"></path>
      <path fill="#EB4335" d="M130.55 50.479c24.514 0 41.05 10.589 50.479 19.438l36.844-35.974C195.245 12.91 165.798 0 130.55 0 79.49 0 35.393 29.301 13.925 71.947l42.211 32.783c10.59-31.477 39.891-54.251 74.414-54.251"></path>
    </svg>
      Continue with Google
    </a>
    </div>
    @endauth
    <script src="{{ asset('js/app.js') }}"></script>

</body>
</html>