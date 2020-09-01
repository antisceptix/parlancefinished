

    <div class="card">
        <div class="card-body">
        <h5 class="card-title">Latest Messages</h5>
        
        {{ $threads->links() }} 
        @foreach ($sposts as $post)
           
                        @include('messenger.partials.flash')
            
                <table class="table table-hover" id="laravel_crud">
                <thead>
                <tr>
                <td class="table-primary" colspan="4">Messages</td>
                </tr>
                <tr>
                <td class="table-success" colspan="1">Subject</td>
                <td class="table-info" colspan="1">Read</td>
                <td class="table-success" colspan="1">From</td>
                <td class="table-info" colspan="1">Date</td>
                </tr>
                </thead>
                @each('messenger.partials.thread', $threads, 'thread', 'messenger.partials.no-threads')
                </table>
            </div>
        @endforeach
        </div>
    