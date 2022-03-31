<?php
$session_keys = ['success','danger','error', 'warning', 'info'];
?>
@foreach($session_keys as $session_key)
    @if(session()->has($session_key))
        <div class="alert alert-{{$session_key}} py-2" role="alert">
            {{session($session_key)}}
        </div>
    @endif
@endforeach
