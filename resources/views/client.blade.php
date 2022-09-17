<div class="form-group">
    <label for="">Name</label>
    <input type="text" class="form-control" placeholder="Enter customer name" value="{{ $user->first_name }}" disabled name="name">
</div>
<div class="form-group">
    <label for="">Email</label>
    <input type="text" class="form-control" placeholder="Enter a email address" value="{{ $user->email }}" disabled name="email">
</div>
<div class="form-group">
    <label for="">Phone</label>
    <input type="text" class="form-control" placeholder="Enter phone" value="{{ $user->phone }}" disabled name="phone">
</div>
<h5>Contact Person/Guarantor Information: </h5>
<div class="form-group row">
    <div class="col-sm-6">
        <label for="">Name</label>
        <input type="text" class="form-control" placeholder="Enter name of guarantor" required name="guarantor_name">
    </div>
    <div class="col-sm-6">
        <label for="">Phone</label>
        <input type="text" class="form-control" placeholder="Enter phone number of guarantor" required name="guarantor_phone">
    </div>
</div>