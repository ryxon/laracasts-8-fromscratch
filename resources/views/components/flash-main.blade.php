@if(session('success'))
    <div class="regsuccess fixed top-0 left-1/2 transform -translate-x-1/2 w-1/2 text-center py-2 px-6 bg-blue-300 border-black border-solid border-2">
        {{ session('success') }}
    </div>
@endif
@if(session('error'))
    <div class="regsuccess fixed top-0 left-1/2 transform -translate-x-1/2 w-1/2 text-center py-2 px-6 bg-red-300 border-black border-solid border-2">
        {{ session('error') }}
    </div>
@endif
@error('email')
<div class="regsuccess fixed top-0 left-1/2 transform -translate-x-1/2 w-1/2 text-center py-2 px-6 bg-red-300 border-black border-solid border-2">
    {{ $message }}
</div>
@endif
<script type="text/javascript">
    jQuery(function($){
        setTimeout(function(){
            $('.regsuccess').fadeOut();
        }, 3000);
    });
</script>
