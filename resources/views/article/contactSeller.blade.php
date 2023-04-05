<x-layout>

    <div class="container-fluid mt-5 wp_createEdit">
        <row class="row justify-content-center justify-content-md-end  mt-5">
            <div class="col-10 col-md-5 mt-5 mx-3">
                @livewire('contact-seller-form', ['article' =>$article])
            </div>
        </row>
    </div>
</x-layout>