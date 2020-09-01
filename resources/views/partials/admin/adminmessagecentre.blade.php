<div class="card">
<div class="card-body">
<h5 class="card-title">Messages</h5>
<p class="card-text">You have @include('messenger.unread-count') user messages and @include('messenger.unread-count-admin') admin messages</p>
    <a href="/messages" class="btn btn-primary">User - @include('messenger.unread-count')</a>
   <a href="/messages/admininbox" class="btn btn-primary">Admin - @include('messenger.unread-count-admin')</a>
<button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModal">Create Message</button>
<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
<div class="modal-dialog" role="document">
<div class="modal-content">
<div class="modal-body">
      @include('partials.admin.adminmessagecentreint')
      
</div>
</div>
</div>
</div>
</div>
       
    


           
            
           
       
        
       
        
      
        