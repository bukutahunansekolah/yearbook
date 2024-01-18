<html>

<head>
    @vite(['resources/sass/app.scss', 'resources/js/app.js'])
    <style>
        * {
            font-family: 'Fraunces', serif;
        }

        body {
            background-color: #DABC9A;
        }

        .card {
            border: 1px solid #ccc;
            border-radius: 10px;
        }

        .card-body {
            padding: 2rem;
        }

        .form-label {
            font-weight: bold;
        }

        .btn-primary {
            background-color: #6FB3B8;
            color: #fff;
        }

        .btn-primary:hover {
            background-color: #ADD0D8;
        }
    </style>
</head>

<body>
    <nav class="navbar" style="background-color: #493D30; color: white; height: 70px;">
        <img src="{{ asset('logo.png') }}"
            style="width: 50px; height: 50px; margin-top: 1 px; margin-left: 10px; border-radius: 5px;">
        <h4 style="font-size: 14px; margin-right: 990; margin-top: 10px;"><b>SMK NEGERI 1 KOTA BEKASI</b></h4>
    </nav>
    <section class="vh-10">
        <div class="container py-5 h-100">
            <div class="row d-flex justify-content-center align-items-center h-100">
                <div class="col-md-8 col-lg-6 col-xl-4">
                    <div class="card shadow" style="background-color: #493D30; border-radius: 30px; margin-top: -60px;">
                        <div class="card-body p-4" style="margin-top: -40px;">
                            <div class="text-center" style="color: white;">
                                <img src="people.svg">
                                <h3>LOGIN</h3>
                            </div>
                            <form action="" style="color: white; margin-top: 20px;">

                                <div class="mb-3">
                                    {{--   <label for="username" class="form-label" >Username</label> --}}
                                    <input type="text" id="username" class="form-control" placeholder="USERNAME"
                                        name="username" required autocomplete="username" />
                                </div>

                                <div class="mb-3">
                                    {{--   <label for="password" class="form-label">Password</label> --}}
                                    <input type="password" id="password" class="form-control" placeholder="PASSWORD"
                                        name="password" required />
                                </div>

                                <div class="text-danger errors">
                                    <p class="err-message"></p>
                                </div>

                                <div class="text-center">
                                    <button type="submit" class="btn"
                                        style="background-color: #DABC9A; border-radius: 10px; width: 80px; ">LOGIN</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <script type="module">
        $('form').submit(async function(e) {
            e.preventDefault();
            let username = $('#username').val();
            let password = $('#password').val();
            var _tok = "{{ csrf_token() }}";

            await axios({
                method: 'post',
                url: "{{ url('/login') }}",
                data: {
                    username: username,
                    password: password,
                    _token: _tok
                }
            }).then(async () => {
                await swal.fire({
                    title: 'Login berhasil!',
                    text: 'Redirecting to dashboard...',
                    icon: 'success',
                    timer: 1000,
                    showConfirmButton: false
                })
                window.location = '/dashboard'
                console.log('success')
            }).catch(({
                response
            }) => {
                if (!$('.err-message').text()) {
                    $('.err-message').append(document.createTextNode(response.data.errors.message))
                }
            })

        })
    </script>

</body>

</html>
