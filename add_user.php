<?php
include 'base.php'
?>
<main>
    <h1>New User</h1>
    <div class="container">
        <form>
            <div class="inline-form-row">
                <div class="form-row">
                    <label for="fname">First Name</label>
                    <input type="text" name="fname" id="fname" placeholder="First Name"/>
                </div>
                <div class="form-row">
                    <label for="lname">Last Name</label>
                    <input type="text" name="lname" id="lname" placeholder="Last Name"/>
                </div>
            </div>
            <div class="inline-form-row">
                <div class="form-row">
                    <label for="email">Email</label>
                    <input type="text" name="email" id="email" placeholder="Email"/>
                </div>
                <div class="form-row">
                    <label for="password">Password</label>
                    <input type="text" name="password" id="password" placeholder="Password"/>
                </div>
            </div>
            <div class="form-row">
                <label for="role">Role</label>
                <select name="role" id="role">
                    <option value="member">Member</option>
                    <option value="admin">Administrator</option>
                </select>
            </div>
            <div class="form-row">
                <button type="submit" class="save-button">Save</button>
            </div>
        </form>
    </div>
</main>
