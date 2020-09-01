<div class="col-sm-12">
<div class="card">
<h3><u>Message</u></h3>
 {!! html_entity_decode($message->body) !!}
<br>
<p>Sent by - {{ $message->user->name }}, Recieved {{ $message->created_at->diffForHumans() }}</p>

</div>

</div>
