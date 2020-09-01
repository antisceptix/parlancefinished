<div class="card">
<div class="card-body">
<h5 class="card-title">you have @include('messenger.unread-count') unread messages </h5>
    <a href="/messages" class="btn btn-primary">User Messages - @include('messenger.unread-count')</a>
   
<button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModal">Create Message</button>
<!-- Modal -->
<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
<div class="modal-dialog" role="document">
<div class="modal-content">
<div class="modal-body">
      @include('partials.admin.adminmessagecentreint')
  <div class="modal-footer">
  <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
  </div>
</div>
</div>
</div>
</div>

       