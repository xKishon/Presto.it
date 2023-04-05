<div>
    <form class="my-3 shadow py-2 px-3 rounded bg_secondary glass_effect" method="POST" action="{{route('register')}}" >
        @csrf

        <h1 class="text-center display-3 mb-4 text_accent text_shadow">{{__('ui.Register')}}</h1>
        <div class="mb-3">
          <label for="username" class="form-label text-white">{{__('ui.Username')}}</label>
          <input type="text" name="name" wire:model.lazy="username" class="form-control @error ('username') is-invalid @enderror" id="username" value="{{old('name')}}">
          @error('username') 
          <span class="fst-italic text-danger small">{{$message}}</span>
          @enderror
    
        </div>
        <div class="mb-3">
          <label for="email" class="form-label text-white">{{__('ui.Email address')}}</label>
          <input type="email" name="email" wire:model.lazy="email" class="form-control @error ('email') is-invalid @enderror" id="email" value="{{old('email')}}">
          @error('email') 
          <span class="fst-italic text-danger small">{{$message}}</span>
          @enderror
    
        </div>
        <div class="d-flex justify-content-between">
          <div class="mb-3">
            <label for="password" class="form-label text-white">{{__('ui.Password')}}</label>
            <input type="password" name="password" wire:model.lazy="password" class="form-control @error ('password') is-invalid @enderror" id="password">
            @error('password') 
            <span class="fst-italic text-danger small">{{$message}}</span>
            @enderror
          </div>
          <div class="mb-3">
            <label for="password" class="form-label text_shadow text-white">{{__('ui.Repeat password')}}</label>
            <input type="password" name="password_confirmation" class="form-control @error ('password_confirmation') is-invalid @enderror" wire:model.lazy="password_confirmation" id="password_registerForm">
            @error('password_confirmation') 
            <span class="fst-italic text-danger small">{{$message}}</span>
            @enderror
          </div>
    
        </div>
        <button type="submit" class="btn btn-outline-light btn_1 mt-3 mb-2">{{__('ui.Register')}}</button>
      </form>
    
</div>
