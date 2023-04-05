<x-layout>
    <div class="container mt-5">
        <div class="row">
            <div class="col-12">
                <h1 class="display-3 text-center mt-4 mb-0">{{__('ui.Forgot Password?')}}</h1>
            </div>
        </div>
        <div class="row justify-content-center">
            <div class="col-12 col-md-8">
                <form id="contact_us_form" method="POST" action="/forgot-password" class="p-4 shadow text_main rounded my-5">
                    @csrf
                    @if(session('status'))
                        <p>{{session('status')}}</p>
                    @endif
                    @if ($errors->any())
                        <div class="alert alert-danger">
                            <ul>
                                @foreach ($errors->all() as $error)
                                    <li>{{$error}}</li>
                                @endforeach
                            </ul>
                        </div>
                    @endif               

                    @if (session('status') == "We have emailed your password reset link.")
                        <div class="mb-4 font-medium text-sm text-green-600 bg-success">
                            <p class="text-center text-white">{{__('ui.Check your email')}}</p>
                        </div>
                    @endif
                        <div class="mb-3">
                            <label for="email" class="form-label text-dark fw-bold">Email Address</label>
                            <input name="email" type="email" class="form-control" id="email" placeholder="Enter your email" value="">
                        </div>
                        <button type="submit" class="btn btn-dark text_accent">{{__('ui.Reset Password')}}</button>
                </form>
            </div>
        </div>
    </div>
</x-layout>