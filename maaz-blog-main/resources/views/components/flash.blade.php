@if(session()->has('success'))
    <div x-data="{show:true}"
         x-init="setTimeout(()=>show=false,4000)"
         x-show="show"
         class="tm-btn tm-btn-primary tm-btn-small"
         style="color:green; background-color:green;text-decoration: #0c5460  "

    >
        <p>{{session('success')}}</p>
    </div>
@endif
