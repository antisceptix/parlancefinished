@auth
<?php $count = Auth::user()->where('name', 'admininbox')->firstOrFail()->newThreadsCount();?>

    <span class="label label-danger">{{ $count }}</span>
@endauth   