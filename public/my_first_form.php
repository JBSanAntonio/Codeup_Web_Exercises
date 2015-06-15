<?php
  var_dump($_GET);
  var_dump($_POST);
?>
<!DOCTYPE html>
<html>
    <head>
    <title><strong>My First Post</strong></title>

    <h1>My First Post Form</h1>

    </head>

<body>

    <section>
<form method="POST" action="/my_first_form.php">
    <p>
        <label for="email">Input your email</label>
        <input id="email" name="email" type="email" placeholder=username" autofocus required>
    </p>
    <p>
        <label for="password">Password</label>
        <input id="password" name="password" type="password" placeholder=password required>
    </p>
    <p>
        <button type="submit">Log in now</button>
    </p>
</form>
    </section>

    <section>
        <h2>Email</h2>

<form>

<form method="POST" action="my_first_form.php">

        <label for="to">To</label>
        <input id="to" name="to" input type=text required>
<p></p>
        <label for="from">From</Label>
        <input id="from" name="from" input type=text required>
<p></p>
        <label for="subject">Subject</Label>
        <input id="subject" name="subject" input type=text required>
<p></p>
        <label for="email body">Email Body</label>
        <textarea id="email_body" name="email_body" type="text" rows="5" cols="40" placeholder=Type Here></textarea>
<p></p>
      
<input type="checkbox" id="save copy" name="save copy" value="yes" checked>
<label>Save a copy to sent folder</label>
    <button type="submit">Send Email</button>
<p></p>
    <label> 

</form>

<h2><strong>Multiple Choice Test</strong></h2>

<form method="POST" action="my_first_form.php">

    <p><strong>What is the capital of Texas?</strong></p>

<label>
    <input type="radio" name="q1" value="houston">
    Houston
</label>
<label>
    <input type="radio" name="q1" value="dallas">
    Dallas
</label>
<label>
    <input type="radio" name="q1" value="austin">
    Austin
</label>
<label>
    <input type="radio" name="q1" value="san antonio">San Antonio
</label>

<section>
    <method="POST" action="my_first_form.php">

<p><strong>What are the 2 largest cities in Texas?</strong></p>
<label>
    <input type="checkbox" id="city1" name="city[]" value="houston">Houston</label>
<label>
    <input type="checkbox" id="city2" name="city[]" value="dfw">Dallas Fort Worth</label>
<label>
    <input type="checkbox" id="city3" name="city[]" value="austin">Austin</label>
<label>
    <input type="checkbox" id="city4" name="city[]" value="san antonio">San Antonio</label>
    <button type="submit">Send it</button>
</section>
<p></p>
</form>
<p></p>
 <form>
 <method="POST" action="/my_first_form.php">
<label for "texascitiesvisited"><strong>What cities in Texas have you visited?</strong></label>
<p></p>
<select id="texascitiesvisited" name="texascitiesvisited[ ]" multiple>
    <option value="Dallas">Dallas</option>
    <option value="Fort Worth">Fort Worth</option>
    <option value="Houston">Houston</option>
    <option value="Austin">Austin</option>
    <option value="San Antonio">San Antonio</option>
    <option value="Corpus Christi">Corpus Christi</option>
</select>
    <button type="submit">Send it</button>
</form>
<p></p>
<p></p>
<h2><strong>Select Testing</strong></h2>
<p></p>
<p></p>
<form>
    <method="POST" action="/my_first_form.php">
    <p></p>
        <label for="newcar">Do you want a new car?</label>
    <select id="newcar" name="newcar">
        <option value="1">yes</option>
        <option value="2">no</option>
    </select>   
        <button type="submit">Send it</button>
</form>

</body>

</html>