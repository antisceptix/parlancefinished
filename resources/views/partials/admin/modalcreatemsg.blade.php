<div class="modal-body">
      <script>
               function selectall(source) {
  checkboxes = document.getElementsByClassName("everyone")
  for(var i=0, n=checkboxes.length;i<n;i++) {
    checkboxes[i].checked = source.checked;}}

    function selectteacher(source) {
  checkboxes = document.getElementsByClassName("everyone2")
  for(var i=0, n=checkboxes.length;i<n;i++) {
    checkboxes[i].checked = source.checked;}}

    function selectparents(source) {
  checkboxes = document.getElementsByClassName("everyone3")
  for(var i=0, n=checkboxes.length;i<n;i++) {
    checkboxes[i].checked = source.checked;}}

    function selectadmin(source) {
  checkboxes = document.getElementsByClassName("everyone4")
  for(var i=0, n=checkboxes.length;i<n;i++) {
    checkboxes[i].checked = source.checked;}}

    function selectpaentteacher(source) {
  checkboxes = document.getElementsByClassName("everyone5")
  for(var i=0, n=checkboxes.length;i<n;i++) {
    checkboxes[i].checked = source.checked;}}

    function selectclassparents(source) {
  checkboxes = document.getElementsByClassName("everyone6")
  for(var i=0, n=checkboxes.length;i<n;i++) {
    checkboxes[i].checked = source.checked;}}

                </script>
    
    <form class="formtable" action="{{ route('messages.store') }}" method="post">
        {{ csrf_field() }}
        <h1>Create a new message</h1>
        <div class="col-md-6">
            <!-- Subject Form Input -->
            <div class="form-group {{ $errors->has('subject') ? 'has-error' : ''}}">
                <label class="control-label">Subject</label>
                <input type="text" class="form-control" name="subject" placeholder="Subject"
                       value="{{ old('subject') }}">
                      
            </div>

            <!-- Message Form Input -->
            <div class="form-group {{ $errors->has('message') ? 'has-error' : ''}}">
                <label class="control-label">Message</label>
                <textarea name="message" class="form-control">{{ old('message') }}</textarea>
               
            </div>
            @foreach ($profileUser->roles as $adminrole)
<!-- //---------------------------------------------------------------------------------------------------------------------------------------------------// -->
            @if($adminrole->name == 'admin')
                <div class="checkbox">
                    <div class="checkline">
                    <input type="checkbox" onClick="selectall(this)"/>Select All Users<br/>
                        @foreach($allusers as $user)
                        <label title="{{ $user->name }}"><input class="everyone" type="checkbox"  name="recipients[]" value="{{ $user->id }}">{!!$user->name!!}</label>
                        @endforeach
                    </div>

                    <div class="checkline">
                    <input type="checkbox" onClick="selectteacher(this)"/>Select All Teachers<br/>
                        @foreach($allteachers as $user2)
                        <label title="{{ $user2->name }}"><input class="everyone2" type="checkbox"  name="recipients[]" value="{{ $user2->id }}">{!!$user2->name!!}</label>
                        @endforeach
                    </div>

                    <div class="checkline">
                    <input type="checkbox" onClick="selectparents(this)"/>Select All Parents<br/>
                        @foreach($allparents as $user3)
                        <label title="{{ $user3->name }}"><input class="everyone3" type="checkbox"  name="recipients[]" value="{{ $user3->id }}">{!!$user3->name!!}</label>
                        @endforeach
                    </div>

                    <div class="checkline">
                    <input type="checkbox" onClick="selectadmin(this)"/>Select All Admin<br/>
                        @foreach($alladmin as $user4)
                        <label title="{{ $user4->name }}"><input class="everyone4" type="checkbox"  name="recipients[]" value="{{ $user4->id }}">{!!$user4->name!!}</label>
                        @endforeach
                    </div>
                </div> 
            @endif
<!-- //---------------------------------------------------------------------------------------------------------------------------------------------------// -->
  
<!-- //---------------------------------------------------------------------------------------------------------------------------------------------------// -->
@if($adminrole->name == 'parent' )
                <div class="checkbox">
                <div class="checkline">
                    Admin<br/>
                    @foreach($alladmin as $user4)
                    @if ($user4->name == "AdminInbox")
                    <label title="{{ $user4->name }}"><input class="everyone4" type="checkbox"  name="recipients[]" value="{{ $user4->id }}">School Office</label>
                    @endif 
                    @endforeach
                </div>
                <div class="checkline">
                    Teachers<br/>
                    @foreach ($parentstoteacher as $students1)
                    @foreach ($allteachers as $teachers1)
                    @foreach ($teachers1->Classes as $teachers1Classes)
                    @foreach ($students1->User as $students1user)
                    @foreach ($students1->Classes as $students1Classes)
                        @if ($students1user->name == $profileUser->name && $students1Classes->classes_name == $teachers1Classes->classes_name )
                            <tr>
                            <label title="{{ $teachers1->name }}"><input class="everyone5" type="checkbox"  name="recipients[]" value="{{ $teachers1->id }}">{!!$teachers1->name!!} ppp  - {!!$students1->student_name!!} </label>
                            </tr>
                        @endif    
                    @endforeach
                    @endforeach
                    @endforeach
                    @endforeach
                    @endforeach
                </div>
                </div> 
            @endif
 <!-- //---------------------------------------------------------------------------------------------------------------------------------------------------// -->           
 @if($adminrole->name == 'teacher')
                <div class="checkbox">
                    <div class="checkline">
                    <input type="checkbox" onClick="selectadmin(this)"/>Select All Admin<br/>
                            @foreach($alladmin as $user4)
                            <label title="{{ $user4->name }}"><input class="everyone4" type="checkbox"  name="recipients[]" value="{{ $user4->id }}">{!!$user4->name!!}</label>
                        @endforeach
                    
                    </div>
                    <div class="checkline">
                        <input type="checkbox" onClick="selectclassparents(this)"/>Select All Users<br/>
                    </div>
                    @foreach ($teachertoparent as $students1)
                    @foreach ($currentteacher as $teacherclass)
                    @foreach ($students1->Classes as $student1Classes)
                    @foreach ($students1->User as $student1Parent)
                    @foreach ($teacherclass->Classes as $teacherclasses)       
                        @if ($student1Classes->classes_name  ==  $teacherclasses->classes_name)
                            <tr>
                            <label title="{{ $student1Classes->classes_name }}"><input class="everyone6" type="checkbox"  name="recipients[]" value="{{ $student1Parent->id }}">{!!$student1Classes->classes_name!!}-{!!$students1->student_name!!}-{!!$student1Parent->name!!}</label>
                            </tr>
                        @endif 
                    @endforeach   
                    @endforeach
                    @endforeach
                    @endforeach
                    @endforeach
                    </div>
                </div> 
            @endif

            @endforeach
    
            <!-- Submit Form Input -->
            <div class="form-group">
                <button type="submit" class="btn btn-primary form-control">Submit</button>
            </div>
        </div>
    </form>
      </div>
      <div class="modal-footer">
      <button class="btn btn-primary" data-dismiss="modal">Close</button>
      </div>
    </div>
  </div>
</div>