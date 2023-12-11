<?php
include 'base.php';

?>
<main>
    <h1>New User</h1>
    <div class="container">
        <form id="addUserForm" method="post" action="./utils/create_user.php">
            <div class="inline-form-row">
                <div class="form-row">
                    <label for="fname">First Name</label>
                    <input type="text" name="fname" id="fname" placeholder="First Name" required/>
                </div>
                <div class="form-row">
                    <label for="lname">Last Name</label>
                    <input type="text" name="lname" id="lname" placeholder="Last Name" required/>
                </div>
            </div>
            <div class="inline-form-row">
                <div class="form-row">
                    <label for="email">Email</label>
                    <input type="email" name="email" id="email" placeholder="Email" required/>
                </div>
                <div class="form-row">
                    <label for="password">Password</label>
                    <input type="password" name="password" id="password" placeholder="Password" required/>
                </div>
            </div>
            <div class="form-row">
                <label for="confirmPassword">Confirm Password</label>
                <input type="password" name="confirmPassword" id="confirmPassword" placeholder="Confirm Password" required/>
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
