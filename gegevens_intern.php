<?php 
    include_once "pdo_verbinding.php";
?>

<input type="email" placeholder="Email" name="email" id="email" class="input-algemeen"> 
<div id="names"> 
    <input type="text" placeholder="Firstname" name="firstname" id="first-name"class="input-algemeen input-helft"> 
    <input type="text" placeholder="Lastname" name="lastname" id="last-name" class="input-algemeen input-helft"> 
</div>
<h3>Date of birth</h3>
<input type="date" name="dateofbirth" id="date-of-birth" class="input-algemeen input-helft"> 
<br> 
<select name="nationalityid" id="nationality-id" class="input-algemeen input-helft"> 
    <option value="Nationality" disabled selected>Nationality</option>
    <?php 
        $stmt = $pdo->query("SELECT * FROM country");
        $stmt->execute();

        foreach ($stmt as $row) {
            echo "<option value='" . $row["country_id"] . "'>" . $row["countryname"] . "</option>";
        }
    ?>
</select> 
<hr> 
<select name="countryid" id="country-id" class="input-algemeen input-helft">
    <option value="Country" disabled selected>Country</option>
    <?php 
        $stmt = $pdo->query("SELECT * FROM country");
        $stmt->execute();

        foreach ($stmt as $row) {
            echo "<option value='" . $row["country_id"] . "'>" . $row["countryname"] . "</option>";
        }
    ?>
</select>
<input type="text" placeholder="Adress" name="streetadress" id="street-adress"class="input-algemeen">
<div id="input-postal-city">
<input type="text" placeholder="Postal code" name="postalcode" id="postal-code"class="input-algemeen input-helft">
<input type="text" placeholder="City" name="city" id="city" class="input-algemeen input-helft"></div>
<hr>
<input type="text" placeholder="Study" name="study" id="study" class="input-algemeen">
<input type="text" placeholder="Field of studies" name="fieldofstudies" id="field-of-studies" class="input-algemeen">
<input type="text" placeholder="Graduated from" name="graduatedfrom" id="graduated-from"class="input-algemeen">
<select name="currentlystudent" id="currently-student"class="input-algemeen input-helft">
    <option value="Currently student?" disabled selected>Currently student?</option>
    <option value="1">Yes</option>
    <option value="0">No</option>
</select>
    <br>
    <select name="seekinginternship" id="seeking-internship" class="input-algemeen input-helft">
        <option value="" disabled selected>Seeking internship?</option>
        <option value="yes on-site">Yes, on-site</option>
        <option value="yes remote">Remote</option>
        <option value="yes temporarily remote">Temporarily remote</option>
        <option value="no">No</option>
    </select>
    <br>
    <select name="openforrealemplyoment" id="open-for-real-employment" class="input-algemeen input-helft">
        <option value="Open for real employment?" disabled selected>Open for real employment?</option>
        <option value="1">Yes</option>
        <option value="0">No</option>
    </select>
    <br>
<select name="languages" id="languages" class="input-algemeen input-helft">
    <option value="Languages" disabled selected>Languages</option>
    <?php 
        $stmt = $pdo->query("SELECT * FROM country");
        $stmt->execute();

        foreach ($stmt as $row) {
            echo "<option value='" . $row["country_id"] . "'>" . $row["countryname"] . "</option>";
        }
    ?>
</select>
<hr>
<textarea placeholder="Profile text" name="profiletext" id="profile-text"class="input-algemeen input-textarea"></textarea>
<input type="text" placeholder="Profile image link" name="profileimage" id="profile-image" class="input-algemeen">
<input type="text" placeholder="Profile Video link" name="profilevideo" id="profile-video" class="input-algemeen">
<input type="text" placeholder="Social media link &emsp; e.g. LinkedIn" name="socialmedia" id="social-media" class="input-algemeen">
<hr>
<p id="data-veranderd"></p>