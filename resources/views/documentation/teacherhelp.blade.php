@extends('layouts.app')

@section('content')
<div class="col-sm-10 col-centered">
<div>
<a class="btn btn-success mb-2" href="/userprofile/{{ Auth::user()->name }}">Back</a> 
</div>
<div class="card">
<br>
<div class="col-sm-12 col-centered">
<div class="card">
<h5 class="card-header">Documentation</h5>
<div class="card-body">
<h2><u>Parlance Documentation & Support</u></h2>
<div class="col-sm-12">


<div class="card text-white bg-primary mb-3 border-dark mb-3">
<h4 class="card-header"><u>What is Parlance</u></h4>
<div class="card-body">
<p>Parlance is a messenging web application for use in education establishments pass information between Staff, Teachers and Parents.</p>
</div></div>

<div class="card text-white bg-primary mb-3 border-dark mb-3">
<h4 class="card-header"><u>Logging in</u></h4>
<div class="card-body">
<p>To login from the main page, please click on the naviagation bar or the "login" button on the main page as shown below.</p>
<img class="card-img-top" src="..\img\documentation\login.jpg" alt="Parlance Login Page"> 
<p>To logout from parlance, please click on the logout button on the navigation bar. If you are logged in and the application is unused for more than 30 minutes, your session will be disconnected and will be automatically logged out.</p>
<img class="card-img-top" src="..\img\documentation\logouttp.jpg" alt="Main Page"> 
</div></div>

<div class="card text-white bg-primary mb-3 border-dark mb-3">
<h4 class="card-header"><u>Main Page</u></h4>
<div class="card-body">
<p>The main admin page is where all functionality of the application can be found. You can access the requested functionality by clicking on the specified button on the main page.</p>
<p>For ease of use you can view your own messages and view posts directly on the main page.</p>
<p>A list of current students can be viewed with each class and respective teacher.</p>

<img class="card-img-top" src="..\img\documentation\mainpaget.jpg" alt="Main Page"> 
</div></div>

<div class="card text-white bg-primary mb-3 border-dark mb-3">
<h4 class="card-header"><u>Messenger</u></h4>
<div class="card-body">

<p>The messenging function of the application can be used to message any user in the application. To access your personal mailbox either click on the user button on the message panel on the main page or click on "messages" on the navigation bar to acces your message inbox.</p>
<img class="card-img-top" src="..\img\documentation\messageindex1.jpg" alt="Message List"> 

<p>Messages can be sent by adding a subject title, content in the form of text and files and selection of the recipient</p>
<p>To attach a file, click on the image icon on the text box and confirm the file which you wish to send. When completed you should see the file in the textbox</p>
<p>The following filetypes are accepted, </p>
<p>'pdf'  => 'Adobe Acrobat'</p>
<p>'doc'  => 'Microsoft Word'</p>
<p>'docx' => 'Microsoft Word'</p>
<p>'xls'  => 'Microsoft Excel'</p>
<p>'xlsx' => 'Microsoft Excel'</p>
<p>'zip'  => 'Archive'</p>
<p>'gif'  => 'GIF Image'</p>
<p>'jpg'  => 'JPEG Image'</p>
<p>'jpeg' => 'JPEG Image'</p>
<p>'png'  => 'PNG Image'</p>
<p>'ppt'  => 'Microsoft PowerPoint'</p>
<p>'pptx' => 'Microsoft PowerPoint'</p>
<img class="card-img-top" src="..\img\documentation\messageoutlayp.jpg" alt="New Message Page"> 

<p>Recieved messages can be responded to to create a chain, reply to the user just click submit, if you wish to add any other participants click on the specific user and submit.</p>
<img class="card-img-top" src="..\img\documentation\messageoutlay.jpg" alt="Current Message Page"> 
</div></div>

<div class="card text-white bg-primary mb-3 border-dark mb-3">
<h4 class="card-header"><u>Posts</u></h4>
<div class="card-body">
<p>The post function of the application can be viewed by all users to pass general information regarding the learning establishment. </p>
<p>Accessing the post list can be done by clicking on "View all posts" on the main page or by clicking on posts on the navigation bar.</p>
<img class="card-img-top" src="..\img\documentation\postadminpagep.jpg" alt="Posts Page">
<p>Posts can be uploaded by adding a subject title and content in the form of text and files </p>
<p>To attach a file, click on the image icon on the text box and confirm the file which you wish to send. When completed you should see the file in the textbox</p>
<img class="card-img-top" src="..\img\documentation\post2.jpg" alt="Create Posts Page">
</div></div>

<div class="card text-white bg-primary mb-3 border-dark mb-3">
<h4 class="card-header"><u>Classes</u></h4>
<div class="card-body">
<p>The post function of the application can be viewed by all users to pass general information regarding the learning establishment. </p>
<p>Accessing the post list can be done by clicking on "View all posts" on the main page or by clicking on posts on the navigation bar.</p>
<img class="card-img-top" src="..\img\documentation\classest.jpg" alt="Main Page">
<p>Posts can be uploaded by adding a subject title and content in the form of text and files </p>
<p>To attach a file, click on the image icon on the text box and confirm the file which you wish to send. When completed you should see the file in the textbox</p>
<img class="card-img-top" src="..\img\documentation\classeslistt.jpg" alt="Classes List">
</div></div>

<div class="card text-white bg-primary mb-3 border-dark mb-3">
<h4 class="card-header"><u></u></h4>
<div class="card-body">

</div>



</div> 
</div>

@endsection  