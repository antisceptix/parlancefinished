<?php $class = $thread->isUnread(Auth::id()) ? 'alert-info' : ''; ?>


           <tbody> 
           @if ($thread->userUnreadMessagesCount(Auth::id()) === 0)
          
           <td class="subjectmsg"><a href="{{ route('messages.show', $thread->id) }}">{{ $thread->subject }}</a></td>
           <td class="statusmsg text-primary" rel="readmsg"><p> read</p></td>
           <td class="frommsg"><p> {{ $thread->creator()->name }}</p></td>
           <td class="datesent"><p> {{\Carbon\Carbon::parse ($thread->created_at)->format('d-m-Y')}}</p></td>
           
          

           @else
           <div class="">
           <td class="subjectmsg "><a class="text-danger" href="{{ route('messages.show', $thread->id) }}">{{ $thread->subject }}</a></td>
           <td class="statusmsg text-danger" rel="unreadmsg"><p> unread</p></td>
           <td class="frommsg"><p> {{ $thread->creator()->name }}</p></td>
           <td class="datesent"><p> {{\Carbon\Carbon::parse ($thread->created_at)->format('d-m-Y')}}</p></td>
           </div>
        
           @endif
           
                        
           </tbody>

        
         
  

