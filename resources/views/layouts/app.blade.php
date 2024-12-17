<!doctype html>
<html class="fixed has-top-menu">
	<head>

		<!-- Basic -->
		<meta charset="UTF-8">

		<title>@yield('title') | {{ env('APP_NAME') }}</title>

		<meta name="author" content="Auxilio IT">

		<!-- Mobile Metas -->
		<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no" />
		<!-- Font Awesome -->
        <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.7.0/css/all.min.css" rel="stylesheet"/>
        <!-- Google Fonts -->
        <link href="https://fonts.googleapis.com/css?family=Roboto:300,400,500,700&display=swap" rel="stylesheet" />
        <!-- MDB -->
        <link href="https://cdnjs.cloudflare.com/ajax/libs/mdb-ui-kit/8.1.0/mdb.min.css" rel="stylesheet"/>

	</head>
	<body class="min-vh-100 d-flex flex-column">
        <!-- start: nav -->
		@include('includes.header')
        <!-- end: nav -->
        <main role="main">
            <div class="container">
                @if ($errors->any())
                    <div class="alert alert-danger">
                        <ul>
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif
                @if(session('success'))
                <div class="row">
                    <div class="col">
                        <div class="alert alert-success alert-dismissible fade show" role="alert">
                            {{session('success')}}
                        </div>
                    </div>
                </div>
                @endif
            </div>

            @yield('content')
            
        </main>
        @include('includes.footer')
        <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/mdb-ui-kit/8.1.0/mdb.umd.min.js"></script>
    </body>
    
</html>


