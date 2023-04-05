<div>
    
    <form class="my-3 shadow py-3 px-3 glass_effect  rounded" method="POST" action="{{route('login')}}">
        @csrf
        @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
        @endif
        @if(session('userDeleted'))
                <div class="alert alert-success">
                    {{session('userDeleted')}}
                </div>
            @endif
        <h1 class="text-center display-3 mb-4 text_accent text_shadow">{{__('ui.Login')}}</h1>
        <div class="mb-3">
            <label for="email_loginForm" class="form-label text_main">{{__('ui.Email address')}}</label>
            <input type="email" name="email" class="form-control" wire:model.lazy="email" @error ('email') is-invalid @enderror id="email_loginForm">
        </div>
        <div class="mb-3">
            <label for="password_loginForm" class="form-label text_main">{{__('ui.Password')}}</label>
            <input type="password" name="password" class="form-control" wire:model.lazy="password" @error ('email') is-invalid @enderror id="password_loginForm">
        </div>
       
        <div class="my-3">
            <a href="/forgot-password" class="text-decoration-none">{{__('ui.Forgot Password?')}}</a>
        </div>
        <div class="d-flex flex-column justify-content-center align-items-center">
            <button type="submit" class="btn bg_accent text_dark px-4 mt-3 fw-bold">{{__('ui.Enter')}}</button>
            <div class="mt-3">
                <p class="m-0 d-inline lead text_main">{{__('ui.New to Presto.it?')}}</p>
                <a href="{{route('register')}}" class="text-decoration-none fw-bold text-uppercase">{{__('ui.Create an account')}}</a>
            </div>
        </div>
    </form>
    
</div>
