<x-layout>
    <div class="container mt-5 vh-100 ">
        <div class="row">
            <div class="col-12">
                <h1 class="display-3 text-center mt-4 mb-0">{{__('ui.Set a new password')}}</h1>
            </div>
        </div>
        <div class="row justify-content-center">
            <div class="col-12 col-md-8 mt-4">
                <form id="contact_us_form" method="POST" action="/reset-password" class="p-5 shadow  fw-bold rounded">
                    @csrf
                    
                   
                    @if ($errors->any())
                    <div class="alert alert-danger">
                        <ul>
                            @foreach ($errors->all() as $error)
                            <li>{{$error}}</li>
                            @endforeach
                        </ul>
                    </div>
                    @endif
                    
                    <div class="mb-3">
                        <label for="email" class="form-label">{{__('ui.Your email')}}</label>
                        <input name="email" type="email" class="form-control" id="email" value="{{$request->email}}">
                    </div>
                    <div class="mb-3">
                        <label for="password" class="form-label">{{__('ui.New password')}}</label>
                        <input name="password" type="password" class="form-control" id="password">
                    </div>
                    <div class="mb-3">
                        <label for="password" class="form-label">{{__('ui.Repeat Password')}}</label>
                        <input name="password_confirmation" type="password" class="form-control" id="password_confirmation">
                    </div>
                    <input type="hidden" name="token" value="{{$request->route('token')}}">
                    <div class="d-flex justify-content-between">
                        <button type="submit" class="btn bg_accent fw-bold">{{__('ui.Change Password')}}</button>
                        
                    </div>
                </form>
            </div>
        </div>
    </div>
</x-layout>