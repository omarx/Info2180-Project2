<?php include 'base.php'?>

<main>
    <h1>New Contact</h1>
    <div class="container">
        <form>
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
                    <label for="telephone">Telephone</label>
                    <input type="text" name="telephone" id="telephone" />
                </div>
            </div>
            <div class="inline-form-row">
                <div class="form-row">
                    <label for="company">Company</label>
                    <input type="text" name="company" id="company"/>
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
                    <option value="omar_peart">Omar Peart</option>
                    <option value="john_smith">John Smith</option>
                </select>
            </div>
            <div class="form-row">
                <button type="submit" class="save-button">Save</button>
            </div>
        </form>
    </div>

</main>