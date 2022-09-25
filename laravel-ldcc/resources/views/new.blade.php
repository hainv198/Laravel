<form action="post" method="post">
    <label>Name</label>
{{--    <input type="hidden" name="_token" value="<?php echo csrf_token();?>">--}}
    @csrf
    <input type="text" name="name">
    <br>
    <button>Submit</button>
</form>
