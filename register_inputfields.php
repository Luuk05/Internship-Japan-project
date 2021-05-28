<script>
    var role = document.getElementById("role");
    role.onchange = function() {
        if (role.value == "intern") {
            document.getElementById("andere-input-velden").innerHTML = '<?php echo '<input type="email" placeholder="Email" name="email" class="input-algemeen"> <div id="names"> <input type="text" placeholder="Firstname" name="firstname" class="input-algemeen input-helft"> <input type="text" placeholder="Lastname" name="lastname" class="input-algemeen input-helft"> </div> <input type="date" placeholder="Date of birth" name="dateofbirth" class="input-algemeen input-helft"> <br> <select name="nationalityid" id="nationality" class="input-algemeen input-helft"> <option value="" disabled selected>Nationality</option> <option value="">Etwas anderes</option> </select> <hr> <select name="countryid" id="country" class="input-algemeen input-helft"><option value="" disabled selected>Country</option><option value="">Etwas anderes</option></select><input type="text" placeholder="Adress" name="streetadress" class="input-algemeen"><div id="input-postal-city"><input type="text" placeholder="Postal code" name="postalcode" class="input-algemeen input-helft"><input type="text" placeholder="City" name="city" class="input-algemeen input-helft"></div><hr><input type="text" placeholder="Study" name="study" class="input-algemeen"><input type="text" placeholder="Field of studies" name="fieldofstudies" class="input-algemeen"><input type="text" placeholder="Graduated from" name="graduatedfrom" class="input-algemeen"><select name="currentlystudent" class="input-algemeen input-helft"><option value="" disabled selected>Currently student?</option><option value="yes">Yes</option><option value="no">No</option></select><br><select name="seekinginternship" class="input-algemeen input-helft"><option value="" disabled selected>Seeking internship?</option><option value="yes on-site">Yes, on-site</option><option value="yes remote">Remote</option><option value="yes temporarily remote">Temporarily remote</option><option value="no">No</option></select><br><select name="openforrealemplyoment" class="input-algemeen input-helft"><option value="" disabled selected>Open for real employment?</option><option value="yes">Yes</option><option value="no">No</option></select><br><select name="languages" class="input-algemeen input-helft"><option value="" disabled selected>Languages</option><option value="">Etwas anderes</option></select><hr><textarea placeholder="Profile text" name="profiletext" class="input-algemeen input-textarea"></textarea><input type="text" placeholder="Profile image link" name="profileimage" class="input-algemeen"><input type="text" placeholder="Profile Video link" name="profilevideo" class="input-algemeen"><input type="text" placeholder="Social media link &emsp; e.g. LinkedIn" name="socialmedia" class="input-algemeen"><hr>'; ?>';
        } else if (role.value == "company") {
            document.getElementById("andere-input-velden").innerHTML = '<?php echo '<h3>Contact person data:</h3><input type="email" placeholder="Email" name="email" class="input-algemeen"><div id="names"><input type="text" placeholder="Firstname" name="firstname" class="input-algemeen input-helft"><input type="text" placeholder="Lastname" name="lastname" class="input-algemeen input-helft"></div><hr><h3>Company data:</h3><input type="text" placeholder="Company name" name="companyname" class="input-algemeen"><select name="countryid" id="country" class="input-algemeen input-helft"><option value="" disabled selected>Country</option><option value="">Etwas anderes</option></select><input type="text" placeholder="Adress" name="streetadress" class="input-algemeen"><div id="input-postal-city"><input type="text" placeholder="Postal code" name="postalcode" class="input-algemeen input-helft"><input type="text" placeholder="City" name="city" class="input-algemeen input-helft"></div><textarea placeholder="Profile text" name="profiletext" class="input-algemeen input-textarea"></textarea><input type="text" placeholder="Company logo link" name="profileimage" class="input-algemeen"><input type="text" placeholder="Company video link" name="profilevideo" class="input-algemeen"><input type="text" placeholder="Website link" name="websitelink" class="input-algemeen"><hr><input type="text" placeholder="Position (what function are you looking for?)" name="position" class="input-algemeen"><textarea type="text" placeholder="Informational text for the intern. You can write what you are working on and what the intern will have to do for your company." name="positiontext" class="input-algemeen input-textarea"></textarea><hr>'; ?>';
        } else if (role.value == "education") {
            document.getElementById("andere-input-velden").innerHTML = '<?php echo '<h3>Contact person data:</h3><input type="email" placeholder="Email" name="email" class="input-algemeen"><div id="names"><input type="text" placeholder="Firstname" name="firstname" class="input-algemeen input-helft"><input type="text" placeholder="Lastname" name="lastname" class="input-algemeen input-helft"></div><hr><h3>Education data:</h3><input type="text" placeholder="Education name" name="educationname" class="input-algemeen"><select name="countryid" id="country" class="input-algemeen input-helft"><option value="" disabled selected>Country</option><option value="">Etwas anderes</option></select><input type="text" placeholder="Adress" name="streetadress" class="input-algemeen"><div id="input-postal-city"><input type="text" placeholder="Postal code" name="postalcode" class="input-algemeen input-helft"><input type="text" placeholder="City" name="city" class="input-algemeen input-helft"></div><textarea placeholder="Profile text" name="profiletext" class="input-algemeen input-textarea"></textarea><input type="text" placeholder="Education logo link" name="profileimage" class="input-algemeen"><input type="text" placeholder="Education video link" name="profilevideo" class="input-algemeen"><input type="text" placeholder="Website link" name="websitelink" class="input-algemeen"><hr><input type="text" placeholder="Position" name="position" class="input-algemeen"><textarea type="text" placeholder="Informational text for the intern. You can write what you are working on and what the intern will have to do for your education." name="positiontext" class="input-algemeen input-textarea"></textarea><hr>'; ?>';
        } else {
            document.getElementById("andere-input-velden").innerHTML = "";
        }
    };

</script>


<!-- dit is de code die in innerhtml gaat bij intern. Alles moet aan elkaar anders word de code niet gelezen -->
<!-- <input type="email" placeholder="Email" name="email" class="input-algemeen">
<div id="names">
    <input type="text" placeholder="Firstname" name="firstname" class="input-algemeen input-helft">
    <input type="text" placeholder="Lastname" name="lastname" class="input-algemeen input-helft">
</div>
<input type="date" placeholder="Date of birth" name="dateofbirth" class="input-algemeen input-helft">
<br>
<select name="nationalityid" id="nationality" class="input-algemeen input-helft">
    <option value="" disabled selected>Nationality</option>
    <option value="">Etwas anderes</option>
</select>
<hr>
<select name="countryid" id="country" class="input-algemeen input-helft">
    <option value="" disabled selected>Country</option>
    <option value="">Etwas anderes</option>
</select>
<input type="text" placeholder="Adress" name="streetadress" class="input-algemeen">
<div id="input-postal-city">
    <input type="text" placeholder="Postal code" name="postalcode" class="input-algemeen input-helft">
    <input type="text" placeholder="City" name="city" class="input-algemeen input-helft">
</div>
<hr>
<input type="text" placeholder="Study" name="study" class="input-algemeen">
<input type="text" placeholder="Field of studies" name="fieldofstudies" class="input-algemeen">
<input type="text" placeholder="Graduated from" name="graduatedfrom" class="input-algemeen">
<select name="currentlystudent" class="input-algemeen input-helft">
    <option value="" disabled selected>Currently student?</option>
    <option value="yes">Yes</option>
    <option value="no">No</option>
</select>
<br>
<select name="seekinginternship" class="input-algemeen input-helft">
    <option value="" disabled selected>Seeking internship?</option>
    <option value="yes on-site">Yes, on-site</option>
    <option value="yes remote">Remote</option>
    <option value="yes temporarily remote">Temporarily remote</option>
    <option value="no">No</option>
</select>
<br>
<select name="openforrealemplyoment" class="input-algemeen input-helft">
    <option value="" disabled selected>Open for real employment?</option>
    <option value="yes">Yes</option>
    <option value="no">No</option>
</select>
<br>
<select name="languages" class="input-algemeen input-helft">
    <option value="" disabled selected>Languages</option>
    <option value="">Etwas anderes</option>
</select>
<hr>
<textarea placeholder="Profile text" name="profiletext" class="input-algemeen input-textarea"></textarea>
<input type="text" placeholder="Profile image link" name="profileimage" class="input-algemeen">
<input type="text" placeholder="Profile Video link" name="profilevideo" class="input-algemeen">
<input type="text" placeholder="Social media link &emsp; e.g. LinkedIn" name="socialmedia" class="input-algemeen">
<hr> -->
<!--<input type="email" placeholder="Email" name="email" class="input-algemeen"> <div id="names"> <input type="text" placeholder="Firstname" name="firstname" class="input-algemeen input-helft"> <input type="text" placeholder="Lastname" name="lastname" class="input-algemeen input-helft"> </div> <input type="date" placeholder="Date of birth" name="dateofbirth" class="input-algemeen input-helft"> <br> <select name="nationalityid" id="nationality" class="input-algemeen input-helft"> <option value="" disabled selected>Nationality</option> <option value="">Etwas anderes</option> </select> <hr> <select name="countryid" id="country" class="input-algemeen input-helft"><option value="" disabled selected>Country</option><option value="">Etwas anderes</option></select><input type="text" placeholder="Adress" name="streetadress" class="input-algemeen"><div id="input-postal-city"><input type="text" placeholder="Postal code" name="postalcode" class="input-algemeen input-helft"><input type="text" placeholder="City" name="city" class="input-algemeen input-helft"></div><hr><input type="text" placeholder="Study" name="study" class="input-algemeen"><input type="text" placeholder="Field of studies" name="fieldofstudies" class="input-algemeen"><input type="text" placeholder="Graduated from" name="graduatedfrom" class="input-algemeen"><select name="currentlystudent" class="input-algemeen input-helft"><option value="" disabled selected>Currently student?</option><option value="yes">Yes</option><option value="no">No</option></select><br><select name="seekinginternship" class="input-algemeen input-helft"><option value="" disabled selected>Seeking internship?</option><option value="yes on-site">Yes, on-site</option><option value="yes remote">Remote</option><option value="yes temporarily remote">Temporarily remote</option><option value="no">No</option></select><br><select name="openforrealemplyoment" class="input-algemeen input-helft"><option value="" disabled selected>Open for real employment?</option><option value="yes">Yes</option><option value="no">No</option></select><br><select name="languages" class="input-algemeen input-helft"><option value="" disabled selected>Languages</option><option value="">Etwas anderes</option></select><hr><textarea placeholder="Profile text" name="profiletext" class="input-algemeen input-textarea"></textarea><input type="text" placeholder="Profile image link" name="profileimage" class="input-algemeen"><input type="text" placeholder="Profile Video link" name="profilevideo" class="input-algemeen"><input type="text" placeholder="Social media link &emsp; e.g. LinkedIn" name="socialmedia" class="input-algemeen"><hr> -->



<!-- dit is de code die in innerhtml gaat bij company. Alles moet aan elkaar anders word de code niet gelezen -->
<!-- <h3>Contact person data:</h3>
<input type="email" placeholder="Email" name="email" class="input-algemeen">
<div id="names">
    <input type="text" placeholder="Firstname" name="firstname" class="input-algemeen input-helft">
    <input type="text" placeholder="Lastname" name="lastname" class="input-algemeen input-helft">
</div>
<hr>
<h3>Company data:</h3>
<input type="text" placeholder="Company name" name="companyname" class="input-algemeen">
<select name="countryid" id="country" class="input-algemeen input-helft">
    <option value="" disabled selected>Country</option>
    <option value="">Etwas anderes</option>
</select>
<input type="text" placeholder="Adress" name="streetadress" class="input-algemeen">
<div id="input-postal-city">
    <input type="text" placeholder="Postal code" name="postalcode" class="input-algemeen input-helft">
    <input type="text" placeholder="City" name="city" class="input-algemeen input-helft">
</div>
<textarea placeholder="Profile text" name="profiletext" class="input-algemeen input-textarea"></textarea>
<input type="text" placeholder="Company logo link" name="profileimage" class="input-algemeen">
<input type="text" placeholder="Company video link" name="profilevideo" class="input-algemeen">
<input type="text" placeholder="Website link" name="websitelink" class="input-algemeen">
<hr>
<input type="text" placeholder="Position" name="position" class="input-algemeen">
<textarea type="text" placeholder="Informational text for the intern. You can write what you are working on and what the intern will have to do for your company." name="positiontext" class="input-algemeen input-textarea"></textarea>
<hr> -->
<!-- <h3>Contact person data:</h3><input type="email" placeholder="Email" name="email" class="input-algemeen"><div id="names"><input type="text" placeholder="Firstname" name="firstname" class="input-algemeen input-helft"><input type="text" placeholder="Lastname" name="lastname" class="input-algemeen input-helft"></div><hr><h3>Company data:</h3><input type="text" placeholder="Company name" name="companyname" class="input-algemeen"><select name="countryid" id="country" class="input-algemeen input-helft"><option value="" disabled selected>Country</option><option value="">Etwas anderes</option></select><input type="text" placeholder="Adress" name="streetadress" class="input-algemeen"><div id="input-postal-city"><input type="text" placeholder="Postal code" name="postalcode" class="input-algemeen input-helft"><input type="text" placeholder="City" name="city" class="input-algemeen input-helft"></div><textarea placeholder="Profile text" name="profiletext" class="input-algemeen input-textarea"></textarea><input type="text" placeholder="Company logo link" name="profileimage" class="input-algemeen"><input type="text" placeholder="Company video link" name="profilevideo" class="input-algemeen"><input type="text" placeholder="Website link" name="websitelink" class="input-algemeen"><hr><input type="text" placeholder="Position" name="position" class="input-algemeen"><textarea type="text" placeholder="Informational text for the intern. You can write what you are working on and what the intern will have to do for your company." name="positiontext" class="input-algemeen input-textarea"></textarea><hr> -->



<!-- dit is de code die in innerhtml gaat bij education. Alles moet aan elkaar anders word de code niet gelezen -->
<!-- <h3>Contact person data:</h3>
<input type="email" placeholder="Email" name="email" class="input-algemeen">
<div id="names">
    <input type="text" placeholder="Firstname" name="firstname" class="input-algemeen input-helft">
    <input type="text" placeholder="Lastname" name="lastname" class="input-algemeen input-helft">
</div>
<hr>
<h3>Education data:</h3>
<input type="text" placeholder="Education name" name="educationname" class="input-algemeen">
<select name="countryid" id="country" class="input-algemeen input-helft">
    <option value="" disabled selected>Country</option>
    <option value="">Etwas anderes</option>
</select>
<input type="text" placeholder="Adress" name="streetadress" class="input-algemeen">
<div id="input-postal-city">
    <input type="text" placeholder="Postal code" name="postalcode" class="input-algemeen input-helft">
    <input type="text" placeholder="City" name="city" class="input-algemeen input-helft">
</div>
<textarea placeholder="Profile text" name="profiletext" class="input-algemeen input-textarea"></textarea>
<input type="text" placeholder="Education logo link" name="profileimage" class="input-algemeen">
<input type="text" placeholder="Education video link" name="profilevideo" class="input-algemeen">
<input type="text" placeholder="Website link" name="websitelink" class="input-algemeen">
<hr>
<input type="text" placeholder="Position" name="position" class="input-algemeen">
<textarea type="text" placeholder="Informational text for the intern. You can write what you are working on and what the intern will have to do for your education." name="positiontext" class="input-algemeen input-textarea"></textarea>
<hr> -->
<!-- <h3>Contact person data:</h3><input type="email" placeholder="Email" name="email" class="input-algemeen"><div id="names"><input type="text" placeholder="Firstname" name="firstname" class="input-algemeen input-helft"><input type="text" placeholder="Lastname" name="lastname" class="input-algemeen input-helft"></div><hr><h3>Education data:</h3><input type="text" placeholder="Education name" name="educationname" class="input-algemeen"><select name="countryid" id="country" class="input-algemeen input-helft"><option value="" disabled selected>Country</option><option value="">Etwas anderes</option></select><input type="text" placeholder="Adress" name="streetadress" class="input-algemeen"><div id="input-postal-city"><input type="text" placeholder="Postal code" name="postalcode" class="input-algemeen input-helft"><input type="text" placeholder="City" name="city" class="input-algemeen input-helft"></div><textarea placeholder="Profile text" name="profiletext" class="input-algemeen input-textarea"></textarea><input type="text" placeholder="Education logo link" name="profileimage" class="input-algemeen"><input type="text" placeholder="Education video link" name="profilevideo" class="input-algemeen"><input type="text" placeholder="Website link" name="websitelink" class="input-algemeen"><hr><input type="text" placeholder="Position" name="position" class="input-algemeen"><textarea type="text" placeholder="Informational text for the intern. You can write what you are working on and what the intern will have to do for your education." name="positiontext" class="input-algemeen input-textarea"></textarea><hr> -->