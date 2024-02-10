<div>
    @if(session('success'))
    <div class="alert alert-info" role="alert">
       {{session('success')  }}
    </div>
     @endif
     @if(session('error'))
     <div class="alert alert-warning" role="alert">
        {{session('success')  }}
     </div>
     @endif
</div>