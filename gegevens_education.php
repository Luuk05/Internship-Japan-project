<h3>Contact person data:</h3>
<input type="email" placeholder="Email" name="email" id="email" class="input-algemeen">
<div id="names">
    <input type="text" placeholder="Firstname" name="firstname" id="first-name" class="input-algemeen input-helft">
    <input type="text" placeholder="Lastname" name="lastname" id="last-name" class="input-algemeen input-helft">
</div>
<hr>
<h3>Education data:</h3>
<input type="text" placeholder="Education name" name="educationname" id="education-name" class="input-algemeen">
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
<input type="text" placeholder="Adress" name="streetadress" id="street-adress" class="input-algemeen">
<div id="input-postal-city">
    <input type="text" placeholder="Postal code" name="postalcode" id="postal-code" class="input-algemeen input-helft">
    <input type="text" placeholder="City" name="city" id="city" class="input-algemeen input-helft">
</div>
<textarea placeholder="Profile text" name="profiletext" id="profile-text" class="input-algemeen input-textarea"></textarea>
<input type="text" placeholder="Education logo link" name="profileimage" id="profile-image" class="input-algemeen">
<input type="text" placeholder="Education video link" name="profilevideo" id="profile-video" class="input-algemeen">
<input type="text" placeholder="Website link" name="websitelink" id="website-link" class="input-algemeen">
<hr>
<input type="text" placeholder="Position" name="position" id="position" class="input-algemeen">
<textarea type="text" id="position-text" placeholder="Informational text for the intern. You can write what you are working on and what the intern will have to do for your education." name="positiontext" class="input-algemeen input-textarea"></textarea>
<hr>