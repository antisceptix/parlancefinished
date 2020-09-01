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
<p>Parlance is a messenging web application for use in education establishments to message and pass information between Staff, Teachers and Parents.</p>
</div></div>

<div class="card text-white bg-primary mb-3 border-dark mb-3">
<h4 class="card-header"><u>Logging in</u></h4>
<div class="card-body">
<p>To login from the main page, please click on the naviagation bar or the "login" button on the main page as shown below.</p>
<img class="card-img-top" src="..\img\documentation\login.jpg" alt="Parlance Login Page"> 
<p>To logout from parlance, please click on the logout button on the navigation bar. If you are logged in and the application is unused for more than 30 minutes, your session will be disconnected and will be automatically logged out.</p>
<img class="card-img-top" src="..\img\documentation\logout.jpg" alt="Main Page"> 
</div></div>

<div class="card text-white bg-primary mb-3 border-dark mb-3">
<h4 class="card-header"><u>Main Page</u></h4>
<div class="card-body">
<p>The main admin page is where all functionality of the application can be found. You can access the requested functionality by either clicking on the "Admin Centre" tab on the navigation bar or by clicking on the specified button on the main page.</p>
<p>For ease of use you can view your own messages and amend posts directly on the main page.</p>

<img class="card-img-top" src="..\img\documentation\adminfp.jpg" alt="Main Page"> 
<img class="card-img-top" src="..\img\documentation\adminfp2.jpg" alt="Main Page"> 
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
<img class="card-img-top" src="..\img\documentation\message3.jpg" alt="New Message Page"> 

<p>Recieved messages can be responded to to create a chain, reply to the user just click submit, if you wish to add any other participants click on the specific user and submit.</p>
<img class="card-img-top" src="..\img\documentation\messageoutlay.jpg" alt="Current Message Page"> 
</div></div>

<div class="card text-white bg-primary mb-3 border-dark mb-3">
<h4 class="card-header"><u>Admin Functions</u></h4>
<div class="card-body">

<p>Parlance offers users a number of powerful functions to administrators to manage users, posts, messages and searching for users.</p>
<p>The user list is where Admin, Parents and Teachers are stored and the role is assigned. Admin can add, edit and delete users.</p>
<p>To delete or edit a user, click on the corresponding button to access the function.</p>
<p>To add a user, click on the "add" button above the user table.</p>
<img class="card-img-top" src="..\img\documentation\adminfunction1.jpg" alt="User Table">

<p>To add a user fill in the fields and choose the role that fits the user then click submit and the user is created. </p>
<img class="card-img-top" src="..\img\documentation\adminfunction2.jpg" alt="Create User Page">

<p>Acessing the Student-Parent Panel can be done by clicking on "Student Panel" on the main page or by accessing the "Admin Centre" link and clicking on "Student Parent".</p>
<p>The Student-Parent Panel is where Students can be paired to parents who have an account. Admin can add, edit and delete Student-Parent links.</p>
<p>To delete or edit a link, click on the corresponding button to access the function.</p>
<p>To add a link, click on the "add" button above the Student-Parent table.</p>
<img class="card-img-top" src="..\img\documentation\adminfunction3.jpg" alt="Student-Parent Panel">

<p>To add a link choose the student and parent in the respective fields then click submit and the link is created.</p>
<img class="card-img-top" src="..\img\documentation\adminfunction4.jpg" alt="Create Student-Parent Page">

<p>Acessing the Student-Classes Panel can be done by clicking on "Student Classes" on the main page or by accessing the "Admin Centre" link and clicking on "Student Classes".</p>
<p>The Student-Classes Panel is where Students can be paired to their respective classes. Admin can add, edit and delete Student-Classes links.</p>
<p>To delete or edit a link, click on the corresponding button to access the function.</p>
<p>To add a link, click on the "add" button above the Student-Classes table.</p>
<img class="card-img-top" src="..\img\documentation\adminfunction5.jpg" alt="Student-Classes Page">

<p>To add a link choose the student and class in the respective fields then click submit and the link is created.</p>
<img class="card-img-top" src="..\img\documentation\adminfunction6.jpg" alt="Create Student-Classes Page">

<p>Acessing the Classes Panel can be done by clicking on "Classes" on the main page or by accessing the "Admin Centre" link and clicking on "View Classes".</p>
<p>The Classes Panel is where all Classes are stored. Admin can add, edit and delete Classes.</p>
<p>To delete or edit a link, click on the corresponding button to access the function.</p>
<p>To add a Class, click on the "add" button above the Classes table.</p>
<img class="card-img-top" src="..\img\documentation\adminfunction7.jpg" alt="Classes Page">

<p>Acessing the Teacher Classes Panel can be done by clicking on "Teacher Classes" on the main page or by accessing the "Admin Centre" link and clicking on "Teacher Classes".</p>
<p>The Teachers-Classes Panel is where Students can be paired to their respective classes. Admin can add, edit and delete Teacher-Classes links.</p>
<p>To delete or edit a link, click on the corresponding button to access the function.</p>
<p>To add a Class, click on the "add" button above the Teachers-Classes table.</p>
<img class="card-img-top" src="..\img\documentation\adminfunction8.jpg" alt="Teachers Classes Page">

<p>To add a link choose the teacher and class in the respective fields then click submit and the link is created.</p>
<img class="card-img-top" src="..\img\documentation\adminfunction9.jpg" alt="Create Teachers Classes Page">

</div></div>

<div class="card text-white bg-primary mb-3 border-dark mb-3">
<h4 class="card-header"><u>Posts</u></h4>
<div class="card-body">
<p>The post function of the application can be used to create a post for all users to see in the application. </p>
<p>Accessing the post list can be done by clicking on "View all posts" on the main page.</p>
<p>The post panel is where all posts are stored. Admin can add, edit and delete posts.</p>
<p>To delete or edit a link, click on the corresponding button to access the function.</p>
<p>To add a post, click on the the "Admin Centre" link and clicking on "Create Post"</p>
<img class="card-img-top" src="..\img\documentation\post1.jpg" alt="Posts Page">
<p>Posts can be uploaded by adding a subject title and content in the form of text and files </p>
<p>To attach a file, click on the image icon on the text box and confirm the file which you wish to send. When completed you should see the file in the textbox</p>
<img class="card-img-top" src="..\img\documentation\post2.jpg" alt="Create Posts Page">
</div></div>

<div class="card text-white bg-primary mb-3 border-dark mb-3">
<h4 class="card-header"><u>User file uploads</u></h4>
<div class="card-body">
<p>The file upload function of the application can be used to create a mass number of users on the application from a .xml file usually associated with School Information Managment System such as Capita-Sims.</p>
<p>The desired file can be uploaded by clicking "choose File".</p>
<img class="card-img-top" src="..\img\documentation\upload1.jpg" alt="User File Uploads Page">
<p>Locate the file and click open.</p>
<img class="card-img-top" src="..\img\documentation\upload2.jpg" alt="User File Uploads File Search">
<p>When successful, you will recieve a message confirming the following users have been added and a list of users with details should be visable.</p>
<img class="card-img-top" src="..\img\documentation\upload3.jpg" alt="User File Uploads Success">
<p>If you encounter any issues uploading your desired .xml file, please check the file and make sure the file shows a similar structure and the encoding is set to "utf-8"</p>
<img class="card-img-top" src="..\img\documentation\upload4.jpg" alt="XML File Layout">
</div></div>

<div class="card text-white bg-primary mb-3 border-dark mb-3">
<h4 class="card-header"><u></u></h4>
<div class="card-body">

</div>



</div> 
</div>

@endsection  