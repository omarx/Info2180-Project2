<?php
include 'base.php';
include './utils/connection.php'
?>

<main>
    <h1>New Contact</h1>
    <div class="container">
        <form id="addContactForm" method="post" action="./utils/new_contact.php">
            <div class="inline-form-row">
                <div class="form-row">
                    <label for="title">Title</label>
                    <select name="title" id="title">
                        <option value="mr">Mr</option>
                        <option value="ms">Ms</option>
                        <option value="mrs">Mrs</option>
                    </select>
                </div>
            </div>
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
                    <label for="telephone">Telephone</label>
                    <input type="tel" id="telephone" name="phone" pattern="[0-9]{3}-[0-9]{3}-[0-9]{4}" required placeholder="123-456-7890"/>
                    <small>Format: 123-456-7890</small>
                </div>
            </div>
            <div class="inline-form-row">
                <div class="form-row">
                    <label for="company">Company</label>
                    <input type="text" name="company" id="company" required/>
                </div>
                <div class="form-row">
                    <label for="type">Type</label>
                    <select name="type" id="type">
                        <option value="sales_lead">Sales Lead</option>
                        <option value="support">Support</option>
                    </select>
                </div>
            </div>
            <div class="form-row">
                <label for="assigned">Assigned To</label>
                <select name="assigned" id="assigned">
                    <!-- Options will be populated by jQuery -->
                </select>
            </div>
            <div class="form-row">
                <button type="submit" class="save-button">Save</button>
            </div>
        </form>
    </div>

</main>